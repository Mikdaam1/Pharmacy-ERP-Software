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


if(isset($_POST['action']) && $_POST['action'] == 'gl_acc_transaction_statement'){
	if(isset($_POST['from_gl_acc_id']) && isset($_POST['to_gl_acc_id']) && !(empty($_POST['from_gl_acc_id']) || empty($_POST['to_gl_acc_id']))){
		// // print_r($_POST);die();
		$from_gl_acc_id = $_POST['from_gl_acc_id'];
		$to_gl_acc_id = $_POST['to_gl_acc_id'];
		$cd = $_POST['to_date'];
		$ma = $_POST['from_date'];
		
		$pre_days = '30';
		$pre_date =  date('Y-m-d', strtotime($ma. ' - 30 days'));

		//balance amount
		$balance_amount = "SELECT B.ID,SUM(case when OFF_AMOUNT>0 then OFF_AMOUNT end) AS DEBIT,
							SUM(case when OFF_AMOUNT<0 then OFF_AMOUNT end) AS CREDIT,
							SUM(case when OFF_AMOUNT<0 then 0 else OFF_AMOUNT end) +
							SUM(case when OFF_AMOUNT>0 then 0 else OFF_AMOUNT end) AS BALANCE
							FROM LEDGER_VIEW  A 
							INNER JOIN CHART_DETAIL B ON B.CHART_ACC_CODE = A.CHART_ACC_CODE
							WHERE VDATE >= TO_DATE('".$pre_date."','YYYY-MM-DD') AND VDATE <= TO_DATE('".$ma."','YYYY-MM-DD') AND B.ID = '$from_gl_acc_id' GROUP BY B.ID";
// print_r($balance_amount);die();
		$compiled = oci_parse($c, $balance_amount);
		oci_execute($compiled);
		$row=oci_fetch_assoc($compiled);

		$empty_balance = isset($row['BALANCE']) ? $row['BALANCE'] : '0';

		if($empty_balance == '0'){
			$opening_debit = 0;
			$opening_credit = 0;
			$return_data = '';
		}else{
			$opening_debit = isset($row['BALANCE']) > 0 ? $row['BALANCE'] : '0';
			$opening_credit = isset($row['BALANCE']) < 0 ? $row['BALANCE'] : '0';
			$return_data = '
			<tr>
				<td colspan="3">Opening Balance From '.$pre_date.' - '.$ma.'</td>
				<td style="color:green;">'.($row['BALANCE'] > 0?str_replace("-","",$row['BALANCE']):'').'</td>
				<td style="color:red;">'.($row['BALANCE'] < 0?str_replace("-","",$row['BALANCE']):'').'</td>
				<td></td>
			</tr>';
		}
		$re_balance = $opening_debit;
		$ending_debit = $opening_debit;
		$total_debit = "0";
		$ending_credit = $opening_credit;
		$total_credit = "0";

		// all data in table
		$all_data = "SELECT A.VNO,A.VDATE,B.VTYPE,B.DEBIT,B.CREDIT,B.FISCAL_YEAR
					FROM V_MASTER A
					INNER JOIN V_DETAIL B ON B.VNO = A.VNO
					INNER JOIN CHART_DETAIL C ON C.CHART_ACC_CODE = B.CHART_ACC_CODE
					INNER JOIN COD_FISCAL_YEAR D ON D.SNO = A.FISCAL_YEAR
					INNER JOIN COD_DATE_LOCK E ON D.SNO = E.FISCAL_YEAR 
					WHERE D.ACTIVE = 'Y' AND E.ACTIVE = 'Y' AND A.VDATE > TO_DATE('".$ma."','YYYY-MM-DD') AND A.VDATE <= TO_DATE('".$cd."','YYYY-MM-DD') AND C.ID = '$id' ORDER BY A.VDATE ASC";
		
		$compiled = oci_parse($c, $all_data);
		oci_execute($compiled);

		while($row1=oci_fetch_array($compiled)){
			$vno = $row1['VNO'];
			$type_name = $row1['VTYPE'];
			$trans_date = $row1['VDATE'];
			$fiscal_year = $row1['FISCAL_YEAR'];
			$debit = str_replace("-","",$row1['DEBIT']);
			$credit = str_replace("-","",$row1['CREDIT']);
			$balance = ((int)$re_balance + (int)$debit) - ((int)$credit);
			$re_balance = $balance;
			$total_debit += (int)$debit;
			$total_credit += (int)$credit;
			$ending_debit = (int)$opening_debit + (int)$total_debit;
			$ending_credit = (int)$opening_credit + (int)$total_credit;
			$return_data .= '
			<tr>
				<td class="vno" data-vno='.$vno.' data-vtype='.$type_name.' data-fiscal_year='.$fiscal_year.'><a href="#">'.$vno.'</a></td>
				<td>'.$type_name.'</td>
				<td>'.$trans_date.'</td>
				<td style="color:green;">'.$debit.'</td>
				<td style="color:red;">'.$credit.'</td>
				<td><b>'.$re_balance.'</b></td>
			</tr>';
		}
			$return_data .= '
			<tr>
				<td colspan="3">Ending Balance - '.$cd.'</td>
				<td style="color:green;">'.($ending_debit > 0?$ending_debit:'').'</td>
				<td style="color:red;">'.($ending_credit > 0?$ending_credit:'').'</td>
				<td><b>'.($ending_debit - $ending_credit).'</b></td>
			</tr>';
	}else{
		$return_data = '
		<tr><td colspan="10" style="text-align: center;">Transaction Not Found</td></tr>';
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