<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT * FROM COD_FISCAL_YEAR WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'get_last_end_date'){
    $query = "SELECT MAX(TO_DATE) as TO_DATE FROM COD_FISCAL_YEAR WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $row = oci_fetch_assoc($run);
    $return_data = $row;

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    $start_date= $_POST['start_date'];
    $to_date=$_POST['to_date'];
    $status= $_POST['status'];
    if($start_date < $to_date){
        $select = "SELECT MAX(TO_DATE) as TO_DATE FROM COD_FISCAL_YEAR WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'";
        $compiled = oci_parse($c, $select);
        if(oci_execute($compiled)){
            $row = oci_fetch_assoc($compiled);
            $check_to_date = date('Y-m-d', strtotime($row['TO_DATE']));
            if($start_date > $check_to_date){
                
                $last_id_select = "SELECT MAX(SNO) as SNO FROM COD_FISCAL_YEAR WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'";
                $last_id_compiled = oci_parse($c, $last_id_select);
                oci_execute($last_id_compiled);
                $last_id_row = oci_fetch_assoc($last_id_compiled);
                $last_id = $last_id_row['SNO']+1;
                
                $insert_query="INSERT INTO COD_FISCAL_YEAR (SNO,FROM_DATE,TO_DATE,ACTIVE,PROJECT_ID,COMPANY_ID) 
                VALUES ($last_id,TO_DATE('".$start_date."','YYYY-MM-DD'),TO_DATE('".$to_date."','YYYY-MM-DD'),'$status','$project_id','$company_id')";
                $compiled = oci_parse($c, $insert_query);
        
                if(oci_execute($compiled)){
                    $return_data = array(
                        "status" => 1,
                        "message" => "Fiscal Year Has Been Inserted!"
                    );
                }
                else
                {
                    $return_data = array(
                        "status" => 0,
                        "message" => "Fiscal Year Has Not Been Inserted!"
                    );
                }
            }
            else
            {
                $return_data = array(
                    "status" => 0,
                    "message" => "start date should be greater than from last record!"
                );
            }
        }
        else
        {
            $return_data = array(
                "status" => 0,
                "message" => "Query Error!"
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
    $query = "SELECT * FROM COD_FISCAL_YEAR WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id' AND SNO = '$id'";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $row = oci_fetch_assoc($run);
    $return_data = $row;

    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
    $id = $_POST['id'];
    $status = $_POST['status'];
    $query = "UPDATE COD_FISCAL_YEAR SET ACTIVE = '$status' WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id' AND SNO = '$id'";
    $compiled = oci_parse($c, $query);
    if(oci_execute($compiled)){
        $return_data = array(
            "status" => 1,
            "message" => "Fiscal Year Has Been Updated!"
        );
    }
    else
    {
        $return_data = array(
            "status" => 0,
            "message" => "Fiscal Year Has Not Been Updated!"
        );
    }
    oci_free_statement($compiled);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'not_allocated_fical_year'){
    $query = "SELECT * FROM COD_FISCAL_YEAR WHERE SNO NOT IN (SELECT FISCAL_YEAR FROM COD_DATE_LOCK WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id') AND COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id' AND ACTIVE = 'Y'";
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