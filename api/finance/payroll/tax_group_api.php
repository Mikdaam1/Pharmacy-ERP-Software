<?php
session_start();
include("../../auth/db.php");
header("Content-Type: application/json");
//$json_array = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];  
$user_id = $_SESSION['data']['ID'];
$current_date = date('j-M-y');
$ip_address = getHostByName(getHostName());

if(isset($_GET['action']) && $_GET['action'] == 'get_Checkboxes_all'){
  $query = "SELECT * FROM COD_TAX_PAYROLL WHERE DELETE_FLG = '0' AND COMPANY_ID = '$company_id'";  
  $run = oci_parse($c, $query);
  oci_execute($run);
  $return_data=[];
  while ($row = oci_fetch_assoc($run)){
    $return_data[] = array('ID' => $row['ID'], 'TAX_NAME' => $row['TAX_NAME']);
  }  
}elseif(isset($_POST['action']) && $_POST['action'] == 'append_Checkboxes'){
    $data = $_POST['data'];
    $num = "0";
    $return_data = '';
    foreach ($data as $taxes) {
      $num++;
	    $return_data .= '<div class="col-md-4"><div class="custom-control custom-checkbox"><input name="checkbox" class="custom-control-input" type="checkbox" id="customCheckbox'.$num.'" value="'.$taxes['ID'].'"><label for="customCheckbox'.$num.'" class="custom-control-label">'.$taxes['TAX_NAME'].'</label></div></div>';
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'insert_tax_group'){ 
  // print_r($_POST); die();
  if(isset($_POST['tax_group_name']) && isset($_POST['tax_group_description']) && isset($_POST['check_value']) && (empty($_POST['tax_group_name']) || empty($_POST['tax_group_description']) || empty($_POST['check_value']))){
		$return_data = array(
			"status" => 0,
			"message" => "All fields are required!"
		);
  }else{
    $tax_group_name = $_POST['tax_group_name'];
    $tax_group_description = $_POST['tax_group_description'];
    $checked_values = $_POST['check_value'];
    $check_value = implode(',', $checked_values);
    $select="INSERT INTO COD_TAX_GROUP_PAYROLL (TAX_GROUP,TAX_DESCRIPTION,COMPANY_ID,ACTION_TYPE,ACTION_ON,ACTION_BY,TAX_ID) VALUES ('$tax_group_name','$tax_group_description','$company_id','Insert','$current_date','$user_id','$check_value')";
    // print_r($select); die();
    $run = oci_parse($c, $select);
    if(oci_execute($run)){
      $return_data = array(
        "status" => 1,
        "message" => "Tax group has been inserted!"
      );
    }
    else
    {
      $return_data = array(
        "status" => 0,
        "message" => "Tax group has not been inserted!"
      );
    }
    oci_free_statement($run);
    oci_close($c);
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'select_group'){
    $query = "SELECT ID, TAX_GROUP FROM COD_TAX_GROUP_PAYROLL WHERE COMPANY_ID = '$company_id' AND DELETE_FLG = '0'"; 
    $run = oci_parse($c, $query);
    oci_execute($run);

    $return_data = '<option value="">Select Tax Group</option>';
    $return_data .= '<option value="0" style="font-family:Arial">Add New</option>';
        
    while($row=oci_fetch_assoc($run)){
        $ID[] = $row['ID'];
        $TAX_GROUP[] = $row['TAX_GROUP'];
    }
    for($i=0;$i<count($TAX_GROUP);$i++){
        $return_data .= '<option data-code="'.$ID[$i].'" value="'.$ID[$i].'">'.$TAX_GROUP[$i].'</option>';
    }

}elseif(isset($_POST['action']) && $_POST['action'] == 'selected_data'){
    if(isset($_POST['id']) && !empty($_POST['id'])){
        
        $id = $_POST['id'];
        
        $query = "SELECT * FROM COD_TAX_GROUP_PAYROLL WHERE ID = '$id' AND DELETE_FLG = '0' AND COMPANY_ID = '$company_id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $row = oci_fetch_assoc($run);
            $return_data = $row;
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Data not found"
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
}elseif(isset($_POST['action']) && $_POST['action'] == 'delete'){
  if(isset($_POST['id']) && !empty($_POST['id'])){
    $id=$_POST['id'];
    $query = "UPDATE COD_TAX_GROUP_PAYROLL 
              SET DELETE_FLG='1',
              ACTION_TYPE = 'Delete',
              ACTION_BY = '$user_id',
              ACTION_ON = '$current_date'
              WHERE ID = '$id'";
    $run = oci_parse($c, $query);
    if(oci_execute($run)){
      $return_data = array(
        "status" => 1,
        "message" => "Group has been deleted"
      );
    }else{
      $return_data = array(
        "status" => 0,
        "message" => "Group has not been deleted"
      );
    }
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
  if(isset($_POST['id']) && empty($_POST['id'])){
    $return_data = array(
      "status" => 0,
      "message" => "All Fields Are Required!"
    );
  }else{
    $id = $_POST['id'];
    $tax_group_name= ucfirst(preg_replace("/[^a-zA-Z0-9 .,_-]+/", "", $_POST['tax_group_name']));
    $tax_group_description = ucfirst(preg_replace("/[^a-zA-Z0-9 .,_-]+/", "", $_POST['tax_group_description']));
    $checked_values = $_POST['check_value'];
    $check_value = implode(',', $checked_values);

    $select="UPDATE COD_TAX_GROUP_PAYROLL SET TAX_GROUP = '$tax_group_name', TAX_DESCRIPTION = '$tax_group_description', TAX_ID = '$check_value', ACTION_TYPE ='Update', ACTION_ON ='$current_date', ACTION_BY ='$user_id' WHERE ID = '$id' AND COMPANY_ID = '$company_id'";
    //print_r($select); die();
    $run = oci_parse($c, $select);
    if(oci_execute($run)){
      $return_data = array(
        "status" => 1,
        "message" => "Tax Group Has Been Updated!"
      );
    }
    else
    {
      $return_data = array(
        "status" => 0,
        "message" => "Tax Group Has Not Been Updated!"
      );
    }
    
    oci_free_statement($run);
    oci_close($c);
  }
}else{
    $return_data = array(
      "status" => 0,
      "message" => "Action Not Matched"
    );
}
print(json_encode($return_data, JSON_PRETTY_PRINT)); 

?>