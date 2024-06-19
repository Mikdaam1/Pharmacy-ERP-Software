<?php
session_start();
include("db.php");
header("Content-Type: application/json");
$json_array = array();

if(isset($_POST['action']) && $_POST['action'] == 'login'){
  if(isset($_POST['username']) && isset($_POST['password']) && !(empty($_POST['username']) || empty($_POST['password']))){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT a.ID,a.NAME
    FROM user a
    WHERE NAME = '$username' AND  PASSWORD = '$password'";
    
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $show = mysqli_fetch_assoc($result);
    // $run = oci_parse($c, $query);
    // oci_execute($run);
    // $row = oci_fetch_assoc($run);

    // print_r($row);die();

    if ($count > 0) {
          $_SESSION['data']=$show;
          // $_SESSION['company_id']=$_POST['company'];
       
          $return_data = array(
            "status" => 1,
            "message" => "you are logged in successfully."
          );
    }else {
        $return_data = array(
          "status" => 0,
          "message" => "Incorrect username or Password"
        );
    }
    
  }else{
    $return_data = array(
      "status" => 0,
      "message" => "All Fields Are Required"
    );
  }
}elseif(isset($_POST['action']) && $_POST['action'] == 'login_project'){
  if(isset($_POST['project_id']) && !(empty($_POST['project_id']))){

    $project_id = $_POST['project_id'];

    $query = "SELECT * FROM PRJ_PROJECT_SETUP WHERE PROJECT_ID = '$project_id'";
    // print_r($query);
    $run = oci_parse($c, $query);
    oci_execute($run);
    $row = oci_fetch_assoc($run);

    if ($row > 0) {
          $_SESSION['project']=$row;

          $return_data = array(
            "status" => 1,
            "message" => "You Are Logged in"
          );
    }
    else {
        $return_data = array(
          "status" => 0,
          "message" => "Project data not found"
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