<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");  
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
$current_date = date('j:M:y');

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT A.ACC_TYPE,A.ACC_DETAIL_TYPE,A.CHART_HEAD_CODE,A.CHART_ACC_CODE
    FROM CHART_DETAIL A
    WHERE A.DELETE_FLG = '0'
    AND A.COMPANY_ID = '2'
    AND A.PROJECT_ID = '4'
    ORDER BY A.ACC_TYPE ASC";
    //print_r($query);
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

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