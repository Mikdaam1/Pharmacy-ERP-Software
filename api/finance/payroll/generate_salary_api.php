<?php
session_start();
include("../../auth/db.php");
header("Content-Type: application/json");
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
$current_date = date('j-M-y');
$ex_query = "";
$dep_query = "";
if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $view_q = "SELECT ID,MONTH,REMARKS,TRANSFER,UPLOAD_ATTENDANCE FROM COD_HRM_ADVICED_MONTH WHERE GENERATE_SALARY='0'";
    // PRINT_R($view_q);
    $view_r = oci_parse($c, $view_q);
    oci_execute($view_r);
    $return_data=[];
    while ($view_row = oci_fetch_assoc($view_r)){
        $return_data[] = $view_row;
    }
    oci_free_statement($view_r);
    oci_close($c);
}else if(isset($_POST['action']) && $_POST['action'] == 'generate_salary_detail_view'){
    $month_id = $_POST['month_id'];
    $view_q = "SELECT A.ID,A.TOTAL_PRESENT,A.TOTAL_ABSENT,A.TOTAL_LEAVE,B.MONTH,C.FIRST_NAME,A.TRANSFER FROM COD_HRM_ADVICED_MONTH_DETAIL A
    JOIN COD_HRM_ADVICED_MONTH B ON A.MONTH_ID=B.ID JOIN  COD_EMPLOYEES C ON A.EMPLOYEE_ID=C.ID 
    WHERE A.MONTH_ID='$month_id' ";
    // PRINT_R($view_q);
    $view_r = oci_parse($c, $view_q);
    oci_execute($view_r);
    $return_data=[];
    while ($view_row = oci_fetch_assoc($view_r)){
        $return_data[] = $view_row;
    }
    oci_free_statement($view_r);
    oci_close($c);
}else if(isset($_POST['action']) && $_POST['action'] == 'store'){
    
    $attendance_month_days = date('t',strtotime($current_date));

    // print_r($attendance_month_days);die(); 
    // print_r($_POST);die(); 
    $month_id=$_POST['approved_file'];
    
    $adviced_flg_sql="UPDATE COD_HRM_ADVICED_MONTH SET GENERATE_SALARY='1' WHERE ID='$month_id'";
    $adviced_flg_sql_r = oci_parse($c, $adviced_flg_sql);
    if(oci_execute($adviced_flg_sql_r)){ 

        $sql="SELECT TOTAL_PRESENT,TOTAL_LEAVE,TOTAL_ABSENT,EMPLOYEE_ID FROM COD_HRM_ADVICED_MONTH_DETAIL WHERE MONTH_ID='$month_id'";
        
        $view = oci_parse($c, $sql);
        oci_execute($view);
        while ($view_row = oci_fetch_assoc($view)){
            $total_present = $view_row['TOTAL_PRESENT'];
            $total_leave = $view_row['TOTAL_LEAVE'];
            $total_absent = $view_row['TOTAL_ABSENT'];
            $total_days_of_salary=$total_present+ $total_leave;
            $employee_id = $view_row['EMPLOYEE_ID'];

            $get_salary="SELECT A.BASIC_SALARY, SUM(C.ALLOWANCE_AMOUNT) AS ALLOWANCE_AMOUNT,
                        (SELECT TAX_ID FROM COD_TAX_GROUP_PAYROLL WHERE TAX_GROUP='IncomeTax') AS TAX_ID
                        FROM COD_EMPLOYEES A
                        INNER JOIN COD_HRM_PAYSCALE B ON A.PAY_SCALE = B.ID
                        INNER JOIN COD_HRM_PAYSCALE_DETAIL C ON C.PAYSCALE_ID=B.ID
                        WHERE A.ID='$employee_id'
                        GROUP BY A.BASIC_SALARY";
                        // print_r($get_salary);
            $view_sal = oci_parse($c, $get_salary); 
            oci_execute($view_sal);
            $view_sal_row = oci_fetch_assoc($view_sal);
            $basic_salary = $view_sal_row['BASIC_SALARY'];
            $allowance_amount = $view_sal_row['ALLOWANCE_AMOUNT'];
            $tax_ids = $view_sal_row['TAX_ID'];

            if($tax_ids > '0'){

                $tax_id = str_replace(",", "','", $tax_ids);
                $itax_rate_sql="SELECT SUM(DEFAULT_RATE) AS TAX_RATE FROM COD_TAX_PAYROLL WHERE ID IN ('$tax_id')";
                // PRINT_R($itax_rate_sql); DIE();
                $view_itax_rate = oci_parse($c, $itax_rate_sql); 
                oci_execute($view_itax_rate);
                $view_itax_rate_row = oci_fetch_assoc($view_itax_rate);
                $tax_rate = $view_itax_rate_row['TAX_RATE'];
                $deduct_incometax= ($basic_salary*$tax_rate)/100;
            }else{
                // $tax_ids='';
                $deduct_incometax=0;
            }
            // $tax_ids = explode (",", $tax_ids); 
            $eobi_sql="SELECT TAX_AMOUNT FROM COD_SOCIAL_TAX_PAYROLL WHERE TAX_NAME='Eobi'";
            $view_eobi = oci_parse($c, $eobi_sql); 
            oci_execute($view_eobi);
            $view_eobi_row = oci_fetch_assoc($view_eobi);
            if(!empty($view_eobi_row)){
                $eobi = $view_eobi_row['TAX_AMOUNT'];
            }else{
                $eobi=0;
            }

            $one_day_salary= $basic_salary/$attendance_month_days; //basic salary after deduction/totaldays
            $deduct_absent= $total_absent * $one_day_salary;

            $total_deduct_amount = $deduct_incometax+$eobi+$deduct_absent;

            $after_deduct_salary = $basic_salary - $total_deduct_amount;

            $net_salary = $after_deduct_salary + $allowance_amount;
            
            $salary_sql="INSERT INTO COD_EMPLOYEE_SALARY(MONTH_ID,EMPLOYEE_ID,BASIC_SALARY,TOTAL_DEDUCTION,NET_SALARY,EOBI,ALLOWANCES,ACTION_ON,ACTION_BY,ACTION_TYPE,DEL_FLG,GENERATE,PROJECT_ID,COMPANY_ID,ITAX)
                        VALUES('$month_id','$employee_id','$basic_salary','$total_deduct_amount','$net_salary','$eobi','$allowance_amount','$current_date','$user_id','Insert','0','1','$project_id','$company_id','$deduct_incometax')";
            // PRINT_R($salary_sql); die();
            $salary_sql_r = oci_parse($c, $salary_sql);
            $query_execute=oci_execute($salary_sql_r);

            
        }
        
        $return_data = array(
            "status" => 1,
            "message" => "Payroll has been inserted"
        );
    }else{
        $return_data = array(
            "status" => 0,
            "message" => "Payroll has not been inserted"
        );
    }
}else{
    $return_data = array(
        "status" => 0,
        "message" => "Action Not Matched"
    );
}
print(json_encode($return_data, JSON_PRETTY_PRINT));


?>