<?php
session_start();
include("../../auth/db.php");
header("Content-Type: application/json"); 
$return_data = array();
$company_id = $_SESSION['company_id'];
$project_id = $_SESSION['project']['PROJECT_ID']; 
$user_id = $_SESSION['data']['ID'];
$current_date = date('j:M:y');
$ip_address = getHostByName(getHostName());


if(isset($_POST['action']) && $_POST['action'] == 'sup_tran_detail'){
	
	$sup_id = $_POST['sup_id'];

	$from_date = $_POST['from_date'];
	$from_date = new DateTime($from_date);
	$from_date = $from_date->format('d-M-y'); // 27:Sep:21

	$to_date = $_POST['to_date'];
	$to_date = new DateTime($to_date);
  	$to_date = $to_date->format('d-M-y'); // 27:Sep:21
	
	$query = "SELECT A.VNO,A.VTYPE,B.AG_NAME,C.DSCRIPTION,A.CHQNO,A.CHQDT,A.DEBIT,A.CREDIT,A.ACTION_ON,A.SUPNO,A.SUPTYPE,A.FISCAL_YEAR,A.UNIT_ID
	FROM V_DETAIL A
	LEFT JOIN SET_SUPPLIER_MASTER B ON B.AG_ID = A.SUPNO
	LEFT JOIN SET_SUPPLIER_CAT C ON C.SUP_CAAT_ID = B.SUPPLIER_CAT_ID
	WHERE A.SUPNO = '$sup_id' AND A.ACTION_ON >= '$from_date' AND A.ACTION_ON <= '$to_date' AND A.COMPANY_ID = '$company_id' AND A.PROJECT_ID = '$project_id'";
	// print_r($query); die();
	$run = oci_parse($c, $query);
	oci_execute($run);
	$return_data=[];
	while ($row = oci_fetch_assoc($run)){
			$return_data[] = $row;
	}

	oci_free_statement($run);
	oci_close($c);

}elseif(isset($_POST['action']) && $_POST['action'] == 'sup_voucher_inquiry'){
	if(isset($_POST['vno']) && !empty($_POST['vno'])){
			// print_r($_POST);die();
			$vno = $_POST['vno'];
			$vtype = $_POST['vtype'];
			$fiscal_year = $_POST['fiscal_year'];
	
			// all data in table
			$all_data = "SELECT A.VNO,A.REMARKS,A.CREDIT,A.DEBIT,D.CHART_ACC_DESC,E.HEAD_DESC,A.CHQDT,A.ACTION_ON,A.CHQNO,A.VTYPE,A.FISCAL_YEAR,A.ACCOUNT_TITLE
			FROM V_DETAIL A
			INNER JOIN COD_FISCAL_YEAR B ON B.SNO = A.FISCAL_YEAR
			INNER JOIN COD_DATE_LOCK C ON C.FISCAL_YEAR = A.FISCAL_YEAR 
			INNER JOIN CHART_DETAIL D ON D.CHART_HEAD_CODE = A.HEAD_CODE AND D.CHART_ACC_CODE = A.CHART_ACC_CODE
			INNER JOIN CHART_HEAD E ON E.HEAD_CODE = A.HEAD_CODE
			WHERE B.ACTIVE = 'Y' AND C.ACTIVE = 'Y' AND A.VNO = '$vno' AND A.VTYPE = '$vtype' AND A.COMPANY_ID = '$company_id' 
			AND A.PROJECT_ID = '$project_id' ORDER BY A.CREDIT ASC";
									
			// print_r($all_data);die();
			$compiled = oci_parse($c, $all_data);
			oci_execute($compiled);

			$master_data = "SELECT A.VNO,A.CHQNO,A.CHQDT,A.REMARKS
			FROM V_MASTER A 
			INNER JOIN COD_FISCAL_YEAR B ON B.SNO = A.FISCAL_YEAR
			INNER JOIN COD_DATE_LOCK C ON C.FISCAL_YEAR = A.FISCAL_YEAR 
			WHERE B.ACTIVE = 'Y' AND C.ACTIVE = 'Y' AND A.VNO = '$vno' AND A.VTYPE = '$vtype' AND A.COMPANY_ID = '$company_id' AND A.PROJECT_ID = '$project_id'";
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
					$account_title = $row1['ACCOUNT_TITLE']; 
					$t_credit = $row1['CREDIT'];
					$t_debit = $row1['DEBIT'];
					
					// $t_debit = $row1['DEBIT'];
					// $t_debit = $row1['DEBIT'];
					
					$total_credit += (int)$t_credit;
					$total_debit += (int)$t_debit;

					$t_credit=number_format($t_credit);
					$t_debit=number_format($t_debit);
					

					$data1 .= '
					<tr>
							<td style="vertical-align: middle;">'.$acc_head.'</td>
							<td style="vertical-align: middle;">'.$acc_chart.'</td>
							<td style="vertical-align: middle;">'.$account_title.'</td>
							<td class="text-center" style="vertical-align: middle;">'.$t_debit.'</td>
							<td class="text-center" style="vertical-align: middle;">'.$t_credit.'</td>
					</tr>';

					$data2 = $row1;
			}
			
			$return_data = array(
					"data_master" => $data_master,
					"data1" => $data1,
					"data2" => $data2,
					'total_debit' => $total_debit=number_format($total_debit),
					'total_credit' => $total_credit=number_format($total_credit)
			);
	}else{
			$return_data = '
			<tr><td colspan="10" style="text-align: center;">Voucher details not found</td></tr>';
	}
}elseif(isset($_POST['action']) && $_POST['action'] == 'gl_inquiry_voucher'){
	if(isset($_POST['vno']) && isset($_POST['vtype']) && isset($_POST['fiscal_year']) && !(empty($_POST['vno']) || empty($_POST['vtype']) || empty($_POST['fiscal_year']))){
		// print_r($_POST);die();
		$vno = $_POST['vno'];
		$vtype = $_POST['vtype'];
		$fiscal_year = $_POST['fiscal_year'];
		// //balance amount
		$get_v_detail_q = "SELECT A.VNO,A.VTYPE,A.FISCAL_YEAR,A.DEBIT,A.CREDIT,A.CHQNO,A.REMARKS,D.REMARKS AS MASTER_REMARKS,C.HEAD_DESC,B.CHART_ACC_DESC,A.ACTION_ON
							FROM V_DETAIL  A
							LEFT JOIN V_MASTER D ON (D.VNO = A.VNO AND D.VTYPE = A.VTYPE AND D.FISCAL_YEAR = A.FISCAL_YEAR)
							LEFT JOIN CHART_DETAIL B ON (B.CHART_HEAD_CODE = A.HEAD_CODE AND B.CHART_ACC_CODE = A.CHART_ACC_CODE)
							LEFT JOIN CHART_HEAD C ON C.HEAD_CODE = A.HEAD_CODE
							WHERE A.VNO = '$vno' AND A.VTYPE = '$vtype' AND A.FISCAL_YEAR = '$fiscal_year'";
		
		// print_r($get_v_detail_q);die();
		$get_v_detail_r = oci_parse($c, $get_v_detail_q);
		oci_execute($get_v_detail_r);

		$return_data=[];
		while($row=oci_fetch_array($get_v_detail_r)){
			$return_data[] = $row;
		}
	}else{
		$return_data = array(
		  "status" => 0,
		  "message" => "error found"
		);
	}
}else{
    $return_data = array(
      "status" => 0,
      "message" => "Action Not Matched"
    );
}
   //oci_free_statement($compiled);
   //oci_close($c);
	
print(json_encode($return_data, JSON_PRETTY_PRINT));


?>