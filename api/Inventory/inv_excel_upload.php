<?php
session_start();
include("../auth/db.php");
header("Content-Type: application/json");
$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];

if(isset($_POST['action']) && $_POST['action'] == 'upload'){
    if(isset($_FILES['upload_file']) && !empty($_FILES['upload_file'])) {
        $allowedExtensions = array("xls","xlsx");
        $ext = pathinfo($_FILES['upload_file']['name'], PATHINFO_EXTENSION);
		
        $fileName=uploadFile($_FILES['upload_file'],array(".xls",".xlsx"),"excel_file");
        if(in_array($ext, $allowedExtensions)) {
            $data = new Spreadsheet_Excel_Reader();
            $data->read('excel_file/'.$fileName);
            for($i=1;$i<=$data->sheets[0]['numRows'];$i++)
            {
                $firstname=$data->sheets[0]['cells'][$i][1];
                $lastname=$data->sheets[0]['cells'][$i][2];
                $mobile=$data->sheets[0]['cells'][$i][3];
                $city=$data->sheets[0]['cells'][$i][4];
                $query="INSERT INTO StudentData(FirstName,LastName,MobileNo,City)
                            VALUES('".$firstname."','".$lastname."','".$mobile."','".$city."')";
                print_r($query);
            }
        } else {
            echo '<span class="msg">Please upload excel sheet.</span>';
        }
    } else {
        echo '<span class="msg">Please upload excel file.</span>';
    }
}else{
    $return_data = array(
      "status" => 0,
      "message" => "Action Not Matched"
    );
}
print(json_encode($return_data, JSON_PRETTY_PRINT));

?>