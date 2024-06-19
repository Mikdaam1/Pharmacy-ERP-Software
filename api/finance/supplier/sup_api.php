<?php
session_start();
include("../../auth/db.php");
header("Content-Type: application/json");  
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID'];
$user_id = $_SESSION['data']['ID'];
$current_date = date('j:M:y');
$ip_address = getHostByName(getHostName());

if(isset($_POST['action']) && $_POST['action'] == 'view'){
    $query = "SELECT A.AG_ID,A.AG_NAME,A.SUPPLIER_TYPE,A.SUP_REGISTRATION_NO,B.DSCRIPTION
    FROM SET_SUPPLIER_MASTER A
    LEFT JOIN SET_SUPPLIER_CAT B ON B.SUP_CAAT_ID = A.SUPPLIER_CAT_ID
    WHERE A.DELETE_FLG = '0'
    AND A.PROJECT_ID = '$project_id'
    ORDER BY AG_ID DESC";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){ 
        $return_data[] = $row;
    }
    oci_free_statement($run);
    oci_close($c);
}elseif(isset($_POST['action']) && $_POST['action'] == 'all_cat'){
    $query = "SELECT SUP_CAAT_ID,DSCRIPTION FROM SET_SUPPLIER_CAT ";
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){ 
        $return_data[] = $row;
    }
    oci_free_statement($run);
    oci_close($c);
}elseif(isset($_POST['action']) && $_POST['action'] == 'select_tax_group'){
    $query = "SELECT ID, TAX_GROUP FROM COD_TAX_GROUP WHERE COMPANY_ID = '$company_id' AND DELETE_FLG = '0'"; 
    $run = oci_parse($c, $query);
    oci_execute($run); 
    while($row=oci_fetch_assoc($run)){
        $return_data[] = $row;
    }
    oci_free_statement($run);
    oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'view_supplier'){
    if(isset($_POST['id']) && !empty($_POST['id'])){
        // print_r($_POST);die();
        $id = $_POST['id'];
        $master_data = "SELECT A.*,B.DSCRIPTION,C.CHART_ACC_DESC,D.HEAD_DESC,E.TAX_GROUP
        FROM SET_SUPPLIER_MASTER A
        LEFT JOIN SET_SUPPLIER_CAT B ON B.SUP_CAAT_ID = A.SUPPLIER_CAT_ID
        LEFT JOIN CHART_DETAIL C ON (C.CHART_ACC_CODE = A.ACC_CHARTACC_CODE AND C.CHART_HEAD_CODE = A.ACC_HEAD_CODE)
        LEFT JOIN CHART_HEAD D ON (D.HEAD_CODE = A.ACC_HEAD_CODE AND D.ACC_DETAIL_TYPE = A.ACC_DETAIL_TYPE AND D.ACC_TYPE = A.ACC_TYPE)
        LEFT JOIN COD_TAX_GROUP E ON E.ID = A.GST
        WHERE A.AG_ID = '$id'";
        // print_r($master_data); die();
        $compiled_master = oci_parse($c, $master_data);
        oci_execute($compiled_master);
        // $data_sup=[];
        while ($row_master = oci_fetch_assoc($compiled_master)){ 
            $data_sup = $row_master;
        }
        $return_data = array(
            "data_sup" => $data_sup,
        );
    }else{
        $return_data = '
        <tr><td colspan="10" style="text-align: center;">Supplier details are not found</td></tr>';
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'select_head'){
    // print_r($_POST); die();
    //$query = "SELECT * FROM BANKS_SETUP WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'";
    $query = "SELECT * FROM CHART_HEAD WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id' AND DELETE_FLG = '0'";
    // print_r($query); die();
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c); 

}elseif(isset($_POST['action']) && $_POST['action'] == 'select_chart'){
    $id = $_POST['id'];
    //$query = "SELECT * FROM BANKS_SETUP WHERE COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id'";
    $query = "SELECT CHART_ACC_CODE,CHART_ACC_DESC FROM CHART_DETAIL WHERE CHART_HEAD_CODE = '$id' AND COMPANY_ID = '$company_id' AND PROJECT_ID = '$project_id' AND DELETE_FLG = '0'";
    // print_r($query); die();
    $run = oci_parse($c, $query);
    oci_execute($run);
    $return_data=[];
    while ($row = oci_fetch_assoc($run)){
        $return_data[] = $row;
    }

    oci_free_statement($run);
    oci_close($c); 

}elseif(isset($_POST['action']) && $_POST['action'] == 'insert'){
    if(isset($_POST['d']) && !empty($_POST['d'])){
    // print_r($_POST); die();
        $head = $_POST['a'];
        $chart = $_POST['b'];
        $cat = $_POST['c'];
        $name = $_POST['d'];
        $cnic = $_POST['e'];
        $ntn = $_POST['f'];
        $cp = $_POST['g'];
        $cn = $_POST['h'];
        $email = $_POST['i'];
        $pa = $_POST['j'];
        $sa = $_POST['k'];
        $tx = $_POST['l'];
        
        $check_query_account = "SELECT ACC_TYPE,ACC_DETAIL_TYPE FROM CHART_DETAIL WHERE CHART_HEAD_CODE = '$head' AND CHART_ACC_CODE = '$chart'";
        $check_run_account = oci_parse($c, $check_query_account);
        oci_execute($check_run_account);
        $check_row_account = oci_fetch_assoc($check_run_account);

        $type = $check_row_account['ACC_TYPE'];
        $type_detail = $check_row_account['ACC_DETAIL_TYPE'];

        $check_query = "SELECT MAX(SUP_REGISTRATION_NO) AS REG_NO FROM SET_SUPPLIER_MASTER";
        $check_run = oci_parse($c, $check_query);
        oci_execute($check_run);
        $check_row = oci_fetch_assoc($check_run);

        if (empty($check_row['REG_NO'])) {
            $SUP_REGISTRATION_NO = '1';
        }else{
            $SUP_REGISTRATION_NO = $check_row['REG_NO']+'1';
        }

        $check_query_ag = "SELECT MAX(AG_ID) AS AG_ID FROM SET_SUPPLIER_MASTER";
        $check_run_ag = oci_parse($c, $check_query_ag);
        oci_execute($check_run_ag);
        $check_row_ag = oci_fetch_assoc($check_run_ag);

        if (empty($check_row_ag['AG_ID'])) {
            $AG_ID = '1';
        }else{
            $AG_ID = $check_row_ag['AG_ID']+'1';
        }

        $query = "INSERT INTO SET_SUPPLIER_MASTER (AG_ID,ACC_HEAD_CODE,ACC_CHARTACC_CODE,SUPPLIER_CAT_ID,AG_NAME,AG_CNIC_NO,NTN,CONT_PERSON,AG_CONTACT_NO,AG_EMAIL_ID,PERM_ADDRESS_STREET,ALT_ADDRESS_STREET,GST,PROJECT_ID,PC_IP,ACTION_BY,ACTION_ON,ACTION_TYPE,SUP_REGISTRATION_NO,ACC_TYPE,ACC_DETAIL_TYPE) VALUES ('$AG_ID','$head','$chart','$cat','$name','$cnic','$ntn','$cp','$cn','$email','$pa','$sa','$tx','$project_id','$ip_address','$user_id','$current_date','insert','$SUP_REGISTRATION_NO','$type','$type_detail')";
        // print_r($query); die();
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Supplier has been inserted!"
            );
        }else{
            $return_data = array(
              "status" => 0,
              "message" => "Supplier has not been inserted!"
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
    //fetch for edit
}elseif(isset($_POST['action']) && $_POST['action'] == 'edit'){
    if(isset($_POST['id']) && !(empty($_POST['id']))){
        $id = $_POST['id'];
        // print_r($_POST); die();
        $query = "SELECT * FROM SET_SUPPLIER_MASTER WHERE AG_ID = '$id'";
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
          "message" => "ID not found or mached!"
        );
    }
}elseif(isset($_POST['action']) && $_POST['action'] == 'update'){
    // print_r($_POST); die();
    if(isset($_POST['id']) && isset($_POST['name']) && !(empty($_POST['id']) || empty($_POST['name']))){
        //$class_code = $_POST['class_code'];
        $id = $_POST['id'];
        $head = $_POST['head'];
        $chart = $_POST['chart'];
        $cat = $_POST['cat'];
        $name = $_POST['name'];
        $cnic = $_POST['cnic'];
        $ntn = $_POST['ntn'];
        $cp = $_POST['cp'];
        $cpn = $_POST['cpn'];
        $email = $_POST['email'];
        $p_add = $_POST['p_add'];
        $s_add = $_POST['s_add'];
        $tax = $_POST['tax'];
        $query = "UPDATE SET_SUPPLIER_MASTER 
            SET ACC_HEAD_CODE = '$head' ,
            ACC_CHARTACC_CODE = '$chart' ,
            SUPPLIER_CAT_ID = '$cat' ,
            AG_NAME = '$name' ,
            AG_CNIC_NO = '$cnic' ,
            NTN = '$ntn' ,
            CONT_PERSON = '$cp' ,
            AG_CONTACT_NO = '$cpn' ,
            AG_EMAIL_ID = '$email' ,
            PERM_ADDRESS_STREET = '$p_add' ,
            ALT_ADDRESS_STREET = '$s_add' ,
            GST = '$tax' ,
            ACTION_TYPE = 'update',
            ACTION_BY = '$user_id',
            ACTION_ON = '$current_date',
            PROJECT_ID = '$project_id',
            PC_IP = '$ip_address'
            WHERE AG_ID = '$id'";
            //print_r($query); die();
            $run = oci_parse($c, $query);
            if(oci_execute($run)){
                $return_data = array(
                    "status" => 1,
                    "message" => "Supplier has not been updated!"
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
}else if(isset($_POST['action']) && $_POST['action'] == 'delete'){
// print_r($_POST); die();
    $id=$_POST['id'];
    $query = "UPDATE SET_SUPPLIER_MASTER SET DELETE_FLG='1', ACTION_TYPE = 'delete',ACTION_BY = '$user_id',ACTION_ON = '$current_date',PC_IP = '$ip_address' WHERE AG_ID = '$id'";
        $run = oci_parse($c, $query);
        if(oci_execute($run)){
            $return_data = array(
                "status" => 1,
                "message" => "Supplier has been deleted!"
            );
        }else{
            $return_data = array(
                "status" => 0,
                "message" => "Supplier has not been deleted!"
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