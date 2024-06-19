<?php
session_start();
include("../../auth/db.php");
header("Content-Type: application/json"); 
//$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID']; 
$user_id = $_SESSION['data']['ID'];
$current_date = date('j:M:y');
$ip_address = getHostByName(getHostName());

if(isset($_POST['action']) && $_POST['action'] == 'posted_count'){ 

    $query = "SELECT COUNT(A.VNO) AS P_TOT
    FROM V_MASTER A
    INNER JOIN COD_FISCAL_YEAR B ON B.SNO = A.FISCAL_YEAR
    INNER JOIN COD_DATE_LOCK C ON B.SNO = C.FISCAL_YEAR 
    WHERE A.VNO IN (SELECT VNO FROM V_DETAIL WHERE VNO = A.VNO AND VTYPE = A.VTYPE AND FISCAL_YEAR = A.FISCAL_YEAR) 
    AND A.COMPANY_ID = '$company_id' AND A.PROJECT_ID = '$project_id' AND B.ACTIVE = 'Y' AND C.ACTIVE = 'Y' AND A.POSTED = 'Y'";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $row = oci_fetch_assoc($run);
    $return_data = $row;
    oci_free_statement($run);
    oci_close($c); 
}elseif(isset($_POST['action']) && $_POST['action'] == 'unposted_count'){ 

  $query = "SELECT COUNT(A.VNO) AS P_TOT
  FROM V_MASTER A
  INNER JOIN COD_FISCAL_YEAR B ON B.SNO = A.FISCAL_YEAR
  INNER JOIN COD_DATE_LOCK C ON B.SNO = C.FISCAL_YEAR 
  WHERE A.VNO IN (SELECT VNO FROM V_DETAIL WHERE VNO = A.VNO AND VTYPE = A.VTYPE AND FISCAL_YEAR = A.FISCAL_YEAR) 
  AND A.COMPANY_ID = '$company_id' AND A.PROJECT_ID = '$project_id' 
  AND B.ACTIVE = 'Y' AND C.ACTIVE = 'Y' AND A.POSTED = 'N'";
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