<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT * FROM COD_DATE_LOCK WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'";
    $run = oci_parse($c, $query); 
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    $fiscal_year= $_POST['fiscal_year'];
    $start_date= $_POST['start_date'];
    $end_date=$_POST['end_date'];
    $status= $_POST['status'];
    if($start_date < $end_date){
        $select = "SELECT * FROM COD_FISCAL_YEAR WHERE SNO = '$fiscal_year' AND ACTIVE = 'Y' AND COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'";
        $compiled = oci_parse($c, $select);
        if(oci_execute($compiled)){
            $row = oci_fetch_assoc($compiled);
            $check_start_date = date('Y-m-d', strtotime($row['FROM_DATE']));
            $check_end_date = date('Y-m-d', strtotime($row['TO_DATE']));
            
            if($start_date >= $check_start_date && $end_date <= $check_end_date){
                
                if($status == "Y"){
                    //all dates inactive
                    $update_q = "UPDATE COD_DATE_LOCK SET ACTIVE = 'N' WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'"; 
                    $ucompiled = oci_parse($c, $update_q);
                    oci_execute($ucompiled); 
                }     
                
                $insert_query="INSERT INTO COD_DATE_LOCK (FISCAL_YEAR,FROM_DATE,TO_DATE,ACTIVE,PROJECT_ID,COMPANY_ID)
                VALUES ($fiscal_year,TO_DATE('".$start_date."','YYYY-MM-DD'),TO_DATE('".$end_date."','YYYY-MM-DD'),'$status','$project_id','$company_id')";
                // PRINT_R($insert_query); die();
                $compiled = oci_parse($c, $insert_query);

                if(oci_execute($compiled)){
                    $return_data = array(
                        "status" => 1,
                        "message" => "Transaction Date Has Been Inserted!"
                    );
                }
                else
                {
                    $return_data = array(
                        "status" => 0,
                        "message" => "Transaction Date Has Not Been Inserted!"
                    );
                }
                
            }
            else
            {
                $return_data = array(
                    "status" => 0,
                    "message" => "Invalid Date Format!"
                );
            }
        }
        else
        {
            $return_data = array(
                "status" => 0,
                "message" => "Invalid Fiscal Year!"
            );
        }
    }
    else
    {
        $return_data = array(
            "status" => 0,
            "message" => "start date should be less than end date!"
        );
    }

}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
    $fiscal_year= $_POST['fiscal_year'];
    $start_date= $_POST['start_date'];
    $end_date=$_POST['end_date'];
    $status= $_POST['status'];
    if($start_date < $end_date){
        $select = "SELECT * FROM COD_FISCAL_YEAR WHERE SNO = '$fiscal_year' AND ACTIVE = 'Y' AND COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'";
        $compiled = oci_parse($c, $select);
        if(oci_execute($compiled)){
            $row = oci_fetch_assoc($compiled);
            $check_start_date = date('Y-m-d', strtotime($row['FROM_DATE']));
            $check_end_date = date('Y-m-d', strtotime($row['TO_DATE']));
            if($start_date >= $check_start_date && $end_date <= $check_end_date){
                
                if($status == "Y"){
                    //all dates inactive
                    $update_q = "UPDATE COD_DATE_LOCK SET ACTIVE = 'N' WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'"; 
                    $ucompiled = oci_parse($c, $update_q);
                    oci_execute($ucompiled); 
                }     
                
                $update_query="UPDATE COD_DATE_LOCK SET FROM_DATE=TO_DATE('".$start_date."','YYYY-MM-DD'),TO_DATE=TO_DATE('".$end_date."','YYYY-MM-DD'),ACTIVE='$status' WHERE PROJECT_ID='$project_id' AND COMPANY_ID='$company_id' AND FISCAL_YEAR='$fiscal_year'";
                $compiled = oci_parse($c, $update_query);
                if(oci_execute($compiled)){
                    $return_data = array(
                        "status" => 1,
                        "message" => "Transaction Date Has Been Updated!"
                    );
                }
                else
                {
                    $return_data = array(
                        "status" => 0,
                        "message" => "Transaction Date Has Not Been Updated!"
                    );
                }
                
            }
            else
            {
                $return_data = array(
                    "status" => 0,
                    "message" => "Invalid Date Format!"
                );
            }
        }
        else
        {
            $return_data = array(
                "status" => 0,
                "message" => "Invalid Fiscal Year!"
            );
        }
    }
    else
    {
        $return_data = array(
            "status" => 0,
            "message" => "start date should be less than end date!"
        );
    }

}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
    $id = $_POST['id'];
    $query = "SELECT * FROM COD_DATE_LOCK WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id' AND ID = '$id'";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $row = oci_fetch_assoc($run);
    $return_data = $row;

    oci_free_statement($run);
    oci_close($c);

}else{
    $return_data = array(
      "status" => 0,
      "message" => "Action Not Matched"
    );
}
print(json_encode($return_data, JSON_PRETTY_PRINT));

?>