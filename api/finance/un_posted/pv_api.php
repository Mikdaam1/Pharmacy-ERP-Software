<?php
session_start();
include("../../auth/db.php");
header("Content-Type: application/json");  
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
$current_date = date('j:M:y');

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    
    // $query = "SELECT A.VNO,A.VTYPE,A.VDATE,A.REMARKS,A.CHQDT,A.CHQNO,A.POST_DT,A.ACTION_BY 
    // FROM V_MASTER A
    // INNER JOIN COD_FISCAL_YEAR B ON B.SNO = A.FISCAL_YEAR
    // INNER JOIN COD_DATE_LOCK C ON B.SNO = C.FISCAL_YEAR 
    // WHERE A.COMPANY_ID = '$company_id' AND A.PROJECT_ID = '$project_id' AND A.VTYPE = 'PV' AND B.ACTIVE = 'Y' AND C.ACTIVE = 'Y'";

    $query = "SELECT A.VNO,A.VTYPE,A.VDATE,A.REMARKS,A.CHQDT,A.CHQNO,A.ACTION_ON,A.ACTION_BY,A.FISCAL_YEAR
    FROM V_MASTER A
    INNER JOIN COD_FISCAL_YEAR B ON B.SNO = A.FISCAL_YEAR
    INNER JOIN COD_DATE_LOCK C ON B.SNO = C.FISCAL_YEAR 
    WHERE A.VNO IN (SELECT VNO FROM V_DETAIL WHERE VNO = A.VNO AND VTYPE = A.VTYPE AND FISCAL_YEAR = A.FISCAL_YEAR)
    AND A.POSTED = 'N' AND A.COMPANY_ID = '$company_id' AND A.PROJECT_ID = '$project_id' 
    AND A.VTYPE = 'PV' AND B.ACTIVE = 'Y' AND C.ACTIVE = 'Y' AND A.POSTED = 'N' ORDER BY A.ACTION_ON DESC";
    // print_r($query);
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){ 
        $return_data[] = $row;
    }
    oci_free_statement($run);
    oci_close($c);
}elseif(isset($_POST['action']) && $_POST['action'] == 'posted_voucher_inquiry'){
    if(isset($_POST['id']) && !empty($_POST['id'])){
        // print_r($_POST);die();
        $id = $_POST['id'];
    
        // all data in table
        $all_data = "SELECT A.VNO,A.REMARKS,A.CREDIT,A.DEBIT,D.CHART_ACC_DESC,E.HEAD_DESC,A.CHQDT,A.ACTION_ON,A.CHQNO,A.VTYPE,A.FISCAL_YEAR
        FROM V_DETAIL A
        INNER JOIN COD_FISCAL_YEAR B ON B.SNO = A.FISCAL_YEAR
        INNER JOIN COD_DATE_LOCK C ON C.FISCAL_YEAR = A.FISCAL_YEAR 
        INNER JOIN CHART_DETAIL D ON D.CHART_HEAD_CODE = A.HEAD_CODE AND D.CHART_ACC_CODE = A.CHART_ACC_CODE
        INNER JOIN CHART_HEAD E ON E.HEAD_CODE = A.HEAD_CODE
        WHERE B.ACTIVE = 'Y' AND C.ACTIVE = 'Y' AND A.VNO = '$id' AND A.VTYPE = 'PV' AND A.COMPANY_ID = '$company_id' 
        AND A.PROJECT_ID = '$project_id' ORDER BY A.CREDIT ASC";
                    
        // print_r($all_data);die();
        $compiled = oci_parse($c, $all_data);
        oci_execute($compiled);

        $master_data = "SELECT A.VNO,A.CHQNO,A.CHQDT,A.REMARKS
        FROM V_MASTER A 
        INNER JOIN COD_FISCAL_YEAR B ON B.SNO = A.FISCAL_YEAR
        INNER JOIN COD_DATE_LOCK C ON C.FISCAL_YEAR = A.FISCAL_YEAR 
        WHERE B.ACTIVE = 'Y' AND C.ACTIVE = 'Y' AND A.VNO = '$id' AND A.VTYPE = 'PV' AND A.COMPANY_ID = '$company_id' AND A.PROJECT_ID = '$project_id'";
        $compiled_master = oci_parse($c, $master_data);
        oci_execute($compiled_master);

        while($row_master=oci_fetch_array($compiled_master))
        {
            $data_master = $row_master;
        }
    
        $data1 = '';
        $total_credit = 0;
        $total_debit = 0;
        
        while($row1=oci_fetch_array($compiled))
        {
            $acc_head = $row1['HEAD_DESC']; 
            $acc_chart = $row1['CHART_ACC_DESC'];
            $remarks = $row1['REMARKS']; 
            $t_credit = $row1['CREDIT'];
            $t_debit = $row1['DEBIT'];
            
            $total_credit += (int)$t_credit;
            $total_debit += (int)$t_debit;

            $t_credit=number_format($t_credit,2);
            $t_debit=number_format($t_debit,2);
            

            $data1 .= '
            <tr>
                <td style="vertical-align: middle;">'.$acc_head.'</td>
                <td style="vertical-align: middle;">'.$acc_chart.'</td>
                <td style="vertical-align: middle;">'.$remarks.'</td>
                <td class="text-center" style="vertical-align: middle;">'.$t_debit.'</td>
                <td class="text-center" style="vertical-align: middle;">'.$t_credit.'</td>
            </tr>';

            $data2 = $row1;
        }
        
        $return_data = array( 
            "data_master" => $data_master,
            "data1" => $data1,
            "data2" => $data2,
            'total_debit' => $total_debit=number_format($total_debit,2),
            'total_credit' => $total_credit=number_format($total_credit,2)
        );
    }else{
        $return_data = '
        <tr><td colspan="10" style="text-align: center;">Voucher details not found</td></tr>';
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'post_voucher_update'){
  // print_r($_POST); die();
  if(isset($_POST['vno']) && isset($_POST['vtype']) && isset($_POST['fiscal_year']) && !(empty($_POST['vno']) || empty($_POST['vtype']) || empty($_POST['fiscal_year']))){
      //$class_code = $_POST['class_code'];
      $vno = $_POST['vno'];
      $vtype = $_POST['vtype'];
      $fiscal_year = $_POST['fiscal_year'];
      
          $query = "UPDATE V_MASTER SET POSTED = 'Y',POSTED_BY = '$user_id',POSTED_ON = '$current_date' WHERE VNO = '$vno' AND VTYPE = '$vtype' AND FISCAL_YEAR = '$fiscal_year'";
          //print_r($query); die();
          $run = oci_parse($c, $query);
          if(oci_execute($run)){
              $return_data = array(
                  "status" => 1,
                  "message" => "Voucher Posted Successfully!"
              );
          }
      
          oci_free_statement($run);
          oci_close($c);
      

  }else{
      $return_data = array(
        "status" => 0,
        "message" => "All Fields Are Required"
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