<style>
select{width:82% !important;}
#btn-back-to-top {
position: fixed;
bottom: 20px;
right: 20px;
}
html {
scroll-behavior: smooth;
}
#down {
margin-top: -1%;
padding-top: -1%;
} 
input,select,textarea,.select2-selection{
border:1px solid black !important;
}
.select2-hidden-accessible{
border:1px solid black !important;
}
.select2-selection{
background-color: #ccd4e1 !important  
}
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap");
h2 {
color: black;
font-size: 34px;
position: relative;
text-transform: uppercase;
font-weight:600;margin-top: -58px;
}
h2::before {
top: 0;
left: 0;
width: 0;
height: 100%;
color: #007bff;
overflow: hidden;
position: absolute;
content: attr(data-text);
border-right: 2px solid #37b9f1;
-webkit-text-stroke: 0vw #f7f7fe;
animation: animate 6s linear infinite;
font-weight:600
}
@keyframes animate { 0%,10%,100% {
width: 0;
}70%,90% {width: 100%;}
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
-webkit-appearance: none !important;
margin: 0!important;
}
input[type=number] {
-moz-appearance: textfield !important;
}
table {
font-family: arial, sans-serif;
border-collapse: collapse;
width: 100%;
}
td,th {
border: 1px solid #dddddd;
text-align: left;
font-size:15px
}
tr:nth-child(even) {
background-color: #dddddd;
}
.select2-container{
width:75% !important;
}
.amount::placeholder { 
text-align:right !important
}
@media only screen and (min-width: 250px) and (max-width: 350px) {
.select2-container{
width:78% !important;
}
}
@media only screen and (min-width: 350px) and (max-width: 754px) {
.select2-container{
width:85% !important;
}
}
@media screen and (min-width: 766px) and (max-width:994px) {
.select2-container{
width:72% !important;
} 
}
td .select2-container{
width:100% !important;
}
td select{
width:100% !important;
}
.table td, .table th {
padding:0.15rem !important;
}
.table th{
text-align:center !important;
}
.hover-item,.even,.odd {
background-color: #FFF;
cursor:pointer;
}
.hover-item,.odd:hover {
background-color: gray;
color:white
}
.even:hover{
background-color: gray;color:white
}#salesman{
background-color:#afafaf85;
}
#party{
background-color:#afafaf85;
}
#division{
background-color:#afafaf85;
}
#company_code{
background-color:#afafaf85;
}
#main_tr td input,select{ 
font-size:12px !important; 
height:35px; 
border-radius:5%;
}
td input{ font-size:12px !important;
}.select2-selection__rendered,.select2-results{
font-size:12px !important;
}.card-body{ padding:0px !important;}.form-group{margin-bottom:4px !important}
</style>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Delivery Challan Edit</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="tf_breadcrumb"> Transaction Files</button></li>
                  <li class="breadcrumb-item active"><button class="btn btn-sm" id="dc_list_breadcrumb"> Delivery Challan List</button></li>
                <li class="breadcrumb-item">Edit Delivery Challan</li>
              </ol>
            </div>   
          </div>
        </div><!-- /.container-fluid -->
      </section>

     
  
  <section class="content">
      <div class="container-fluid">
          <div class="row" style="margin-top:-23px">
              <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                        <div class="container">
                          <form method = "post" id = "order_form">
                            <?php include '../../display_message/display_message.php'?>
                            <input type="hidden" id="receipt">
                              <div class="row">
                                <div style="border  :4px solid #937272; padding-top:8px" class="col-lg-3">
                                    <div class="row">
                                        <div class="col-sm-3 form-group">
                                            <label>Doc#:</label> 
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <!-- <label for="">Document Number :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="doc_no" id="doc_no" class="form-control form-control-sm" placeholder="Document No" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Date:</label> 
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="date" name="voucher_date" id="voucher_date" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>DC Ref#:</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <!-- <label for="">Document Number :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="dc_ref" id="dc_ref" class="form-control form-control-sm" placeholder="DC REF" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>CATG/DIV:</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <select class="form-control js-example-basic-single  form-control-sm" id="catg_div" name="catg_div">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>Voucher#:</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <!-- <label for="">Voucher# :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="v_no" id="v_no" class="form-control form-control-sm" placeholder="Voucher No" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>Ship Mde:</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <!-- <label for="">PO Catg L/I :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                                </div>
                                                <select style="width:73% !important" title="purchase mode" name="ship_mode" class="form-control form-control-sm" id="ship_mode" >
                                                    <option value="">Select Ship Mode</option>
                                                    <option value="By_Air">By Air</option>
                                                    <option value="Hand_Deliver">Hand Deliver</option>
                                                    <option value="Leopards">Leopards O/N</option>
                                                    <option value="e2e">e2e O/L</option>
                                                    <option value="Daewoo">Daewoo</option>
                                                    <option value="G_T_C">G.T.C</option>
                                                    <option value="Others">Others</option>
                                                    <option value="TCS">TCS</option>
                                                </select>                                
                                            </div>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Ship#:</label> 
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <!-- <label for="">Ship# :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="ship_no" id="ship_no" class="form-control form-control-sm" placeholder="Ship #" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>Due Date:</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="date" name="due_date" id="due_date" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>CRDAYS:</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="cr_days" id="cr_days" class="form-control form-control-sm" placeholder="CR DAYS" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="border  :4px solid #937272;border-left:3px solid #937272; padding-top:8px" class="col-lg-3">
                                    <div class="row">
                                        <div class="col-sm-3 form-group">
                                            <label>Order#:</label> 
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <!-- <label for="">Sale Code :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input title="Sale Code" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="order_key" id="order_key" class="form-control form-control-sm" placeholder="Order No" readonly >
                                            </div>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Date:</label> 
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <!-- <label for=""> Date :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input type="date" name="po_date" id="po_date" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Company:</label> 
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <!-- <label for="">Company Code :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="company_code" id="company_code" class="form-control form-control-sm" placeholder="Select Company" readonly>
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Name:</label> 
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <!-- <label for="inputCompanyName">Company Name :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly >
                                            </div>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Division:</label> 
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <!-- <label for="">Division :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="division" id="division" class="form-control form-control-sm" placeholder="Select Division" readonly>
                                                
                                            </div>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>Name:</label> 
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <!-- <label for="">Division Name :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="division_name" id="division_name" class="form-control form-control-sm" placeholder="Division Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <label>PO Cat:</label> 
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <!-- <label for="">PO Catg L/I :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                                </div>
                                                <input maxlength="1" type="text" name="purchase_mode" id="purchase_mode" class="form-control form-control-sm" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>Order Ref</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="order_ref" id="order_ref" class="form-control form-control-sm" placeholder="Order Ref" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <label>Party Ref:</label> 
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <!-- <label for="">Party Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="party_ref" id="party_ref" class="form-control form-control-sm" placeholder="Party Ref" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group text-center">
                                            <span id="msg3" style="color: red;font-size: 13px;"></span>
                                        </div>
                                    </div>
                                </div>
                                <div style="border  :4px solid #937272;border-left:3px solid #937272; padding-top:8px" class="col-lg-6">
                                    <div class="row">
                                        <div class="col-sm-2 form-group">
                                            <label>Party:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">Party :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="party" id="party" class="form-control form-control-sm" placeholder="Select Party" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <!-- <label for="">Party :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Party Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Address:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <textarea rows="1" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" name="address" id="address" class="form-control form-control-sm" placeholder="Address" readonly></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 form-group">
                                            <label>City:</label> 
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <textarea rows="1" pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" name="city_p" id="city_p" class="form-control form-control-sm" placeholder="City" readonly></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Zone:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="zone_p" id="zone_p" class="form-control form-control-sm" placeholder="Zone No" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Phone#:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="phone" id="phone" class="form-control form-control-sm" placeholder="Phone No" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Division:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="division_p" id="division_p" class="form-control form-control-sm" placeholder="Division No" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Balance:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">CO Ref :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-sort-numeric-down"></i></span>
                                                </div>
                                                <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="30" type="text" name="balance_p" id="balance_p" class="form-control form-control-sm" placeholder="Balance" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Salesman:</label> 
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <!-- <label for="">Division :<span style="color:red">*</span></label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="salesman" id="salesman" class="form-control form-control-sm" placeholder="Select Salesman" readonly>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <!-- <label for="">Division Name :</label><span style="color:red;">*</span> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <input maxlength="30" type="text" name="salesman_name" id="salesman_name" class="form-control form-control-sm" placeholder="Salesman Name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 form-group">
                                            <label>Remarks:</label> 
                                        </div>
                                        <div class="col-md-10  form-group">
                                            <!-- <label for="">Narration :</label> -->
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                                </div>
                                                <textarea rows="1" name="narration" id="narration" class="form-control form-control-sm" placeholder="Narration" ></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group text-center">
                                            <span id="msg3" style="color: red;font-size: 13px;"></span>
                                        </div>
                                    </div>
                                </div>
                              </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-12">
                                        <div style="height:50px" class="loading">
                                          <span style="text-align:center;font-weight:bold;">Stock Details</span>
                                        </div>
                                    </div>
                                </div>
                              <div class="card-body">
                                  <table id="example1" class="table table-bordered table-striped table-responsive">
                                      <thead>
                                          <tr>
                                              <th>Item Code</th>
                                              <th>Name</th>
                                              <th>Order</th>
                                              <th>DC</th>
                                              <th>Bal</th>
                                              <th>Type</th>
                                              <th>Loc</th>
                                              <th>Loc Name</th>
                                              <th>Quantity</th>
                                              <th>Balance</th>
                                              <th>Batch No</th>
                                              <th>Expiry Dt</th>
                                              <th>GD No</th>
                                              <th>GD Dt</th>
                                              <th>Item HScode</th>
                                              <th>Tax Rate</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody id="d_items">
                                        <tr id="main_tr">
                                            <td style="width:10%"><select name="" id = "acc_desc" class=" js-example-basic-single acc_desc"></select></td>
                                            <td style="width: 12%;"><textarea style="height:35px !important;background-color:#ccd4e1;" style rows="1"   name="" id = "detail" class="detail" readonly></textarea></td>
                                            <td style="width: 8%;"><input  style="width:85px;text-align:right; padding:0 1px 0 0;background-color:#ccd4e1;" type="text"  name="" id="order_qtys" class="order_qtys" readonly></td>
                                            <td style="width: 8%;"><input  style="width:85px;text-align:right; padding:0 1px 0 0;background-color:#ccd4e1;" type="text"  name="" id="dc_qtys" class="dc_qtys" readonly></td>
                                            <td style="width: 8%;"><input  style="width:85px;text-align:right; padding:0 1px 0 0;background-color:#ccd4e1;" type="text"  name="" id="bal_qts" class="bal_qts" readonly></td>
                                            <td style="width:20%" ><select style="font-size:14px;width:55px !important;" name="" id = "type" class="type"><option value="0" readonly="readonly" selected>Type</option><option value="N">N</option><option value="F">F</option><option value="S">S</option><option value="T">T</option></select></td>
                                            <td style="width:10%"><input style="background-color:#a2e6f1 !important;width:60px;" name="" id = "loc" class="loc"></td>
                                            <td style="width: 10%;"><textarea style="height:35px !important;font-size:12px;background-color:#a2e6f1;" rows="1"   name="" id = "loc_name" class="loc_name" readonly></textarea></td>
                                            <td style="width: 8%;"><input  style="text-align:right; padding:0 1px 0 0;width:85px" type="text"  name="" id="quantity" class="quantity"></td>
                                            <td style="width: 8%;"><input  style="text-align:right; padding:0 1px 0 0;width:85px;background-color:#a2e6f1" type="text"  name="" id="opening_qty" class="opening_qty" readonly></td>
                                            <td style="width: 10%;"><textarea style="height:35px;background-color:#a2e6f1;font-size:12px;" rows="1"   name="" id = "batch_no" class="batch_no" readonly></textarea></td>
                                            <td style="width: 7%;"><input style="width:90px;background-color:#a2e6f1;" type="date" tabindex="-1"  name="" id = "expiry_dt" class="expiry_dt" readonly></td>
                                            <td style="width: 10%;"><textarea style="height:35px !important;background-color:#a2e6f1;font-size:12px" rows="1"   name="" id = "gd_no" class="gd_no" readonly></textarea></td>
                                            <td style="width: 7%;"><input style="width:90px;background-color:#a2e6f1;" type="date" tabindex="-1"  name="" id = "gd_dt" class="gd_dt" readonly></td>
                                            <td style="width: 10%;"><input style="width:85px;background-color:#a2e6f1;font-size:12px;"  type="text" tabindex="-1"  name="" id = "item_hscode" class="item_hscode" readonly></td>
                                            <td style="width: 10%;"><input style="width:85px;background-color:#a2e6f1;font-size:12px;" type="text" tabindex="-1"  name="" id = "tax_rate" class="tax_rate" readonly></td>
                                            <td ><button type = "button" class="btn btn-sm btn-primary add"><i class="fa fa-plus"></i></button></td>
                                        </tr>
                                      </tbody>
                                          <tr id="last_tr">
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td style="text-align:right;">Total:</td>
                                              <td style="font-weight:bold;font-size:12px" name="total" id="total"><b>0</b></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                          </tr>
                                  </table>
                                <!-- </form> -->
                                      <div style="text-align: center;">
                                          <span id="msg" style="color: red;font-size: 13px;"></span>
                                      </div>
                                      <br>
                                  <div class="row">
                                      <div class="col-sm-12 text-right">
                                          <button id="submit" type="submit" value="Submit" class="btn btn-primary toastrDefaultSuccess"><i style="font-size:20px" class="fa fa-plus"></i></button>
                                      </div>
                                  </div>
                            </div>
                            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                          </form>
                        </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </section>  
      <!-- /.content -->
</div>
<!-- ./wrapper -->



<!-- view party detail -->
<div class="modal fade bd-example-modal-xl" id="ViewPartyModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Party Detail</h5>
        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="" id="view_partys">
        <div class="modal-body container" style="border:1px solid black">
          <div class="row">
            <div class="col-sm-12">
              <table class=" table table-bordered table-hover table-sm">    
                  <div class="row">
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Name:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="name" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Address:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="address" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Phone#:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="phone" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">GST#:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="gst" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">NTN#:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="ntn" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Division:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="division_p" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-3">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">City:</h3>
                    </div>
                    <div class="col-md-9">
                      <p id="city_p" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                  </div>
              </table>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- view item detail -->
<div class="modal fade bd-example-modal-xl" id="ViewItemModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Item Detail</h5>
        <button type="button" class="close" aria-label="Close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="" id="view_items">
        <div class="modal-body container" style="border:1px solid black">
          <div class="row">
            <div class="col-sm-12">
              <table class=" table table-bordered table-hover table-sm">    
                  <div class="row">
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Division Name:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="division_i" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Gen Name:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="gen_i" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Order:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="order" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">DC Quantity:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="dc_qty" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Balance Quantity:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="bal_qty" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">GD Number:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="gd_no" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">GD Date:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="gd_date" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Item HSCode:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="item_hs" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                    <div class="col-md-4">
                      <h3 class="card-title" style="color:#2c85b8; font-weight:bold;">Tax Rate:</h3>
                    </div>
                    <div class="col-md-8">
                      <p id="tax_r" class="card-title" style=" font-weight:bold;"></p>
                    </div>
                  </div>
              </table>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  var dc=0;
  var previous_qty_ext=0;
  var previous_qty=0;
    // sessionStorage.clear();
    // sessionStorage.setItem("dc", 0);
    // sessionStorage.setItem("previous_qty_ext", 0);
    // sessionStorage.setItem("previous_qty", 0);
    // console.log(sessionStorage.getItem('previous_qty'));
  // if(sessionStorage.getItem('previous_qty')=='' || isNaN(sessionStorage.getItem('previous_qty')) || sessionStorage.getItem('previous_qty')==null){

  // }
    $("#order_form").on('focus','.quantity',function(){
        var button_id = $(this).attr("id");
        if(button_id =='quantity'){
        var p_qty_id='';
        }else{
        var p_totalid = button_id.split("y");
        var p_qty_id=p_totalid[1];
        }
         previous_qty= $('#quantity'+p_qty_id).val();
        // console.log(previous_qty);
        var open_bl= $('#opening_qty'+p_qty_id).val();
        var dc_qt_p=dc;
        // console.log(dc_qt_p);
        if(dc_qt_p=='' || dc_qt_p=='' || isNaN(dc_qt_p)){
          var dc_qt_p= $('#dc_qtys'+p_qty_id).val();
          // console.log(open_bl);
          var previous_final=open_bl - dc_qt_p;
        }else{
        var dc_qt_p=dc;
        previous_final=0;
        }
        dc=dc_qt_p;
        previous_qty_ext=previous_final;
        previous_qty=previous_qty;
        console.log(dc);
        console.log(previous_qty_ext);
        console.log(previous_qty);
        // sessionStorage.setItem("dc", dc_qt_p);
        // sessionStorage.setItem("previous_qty_ext", previous_final);
        // sessionStorage.setItem("previous_qty", previous_qty);
    });
    $("#order_form").on('change','.quantity',function(){
        // var previous_qtys=sessionStorage.getItem('previous_qty');
        // // console.log(previous_qtys);
        // var previous_qty_exts=sessionStorage.getItem('previous_qty_ext');
        // console.log(previous_qty_exts);
        // var dc=sessionStorage.getItem('dc');
        previous_qtys=previous_qty;
        previous_qty_exts=previous_qty_ext;
        // console.log(previous_qty_exts);
        if(previous_qtys == ""){
          previous_qtys=0;
        }else{
          previous_qtys = previous_qtys.replaceAll(',','');
          // previous_qty_exts = previous_qty_exts.replaceAll(',','');
        }
        // console.log(previous_qtys);
        var total=$('#total').text();
        if(total == '' || total == '0' || total=='0.00'){
            minuss=0;
        }else{
          minuss = total.replaceAll(',','');
        }
        var minus=parseFloat(minuss) - parseFloat(previous_qtys);
        var button_id = $(this).attr("id");
        if(button_id =='quantity'){
            quantity_id='';
        }else{
        var quantityid = button_id.split("y");
        quantity_id=quantityid[1];
        }
        var quantity=$('#quantity'+quantity_id).val();
        var opening_qty=parseInt($('#opening_qty'+quantity_id).val());
        // $('#bal_qtys'+quantity_id).val(quantity);
        var qty=parseInt($('#quantity'+quantity_id).val());
        // console.log(qty);
        var bal_qts=parseInt($('#bal_qts'+quantity_id).val());
        var od_qt=parseInt($('#order_qtys'+quantity_id).val());
        var loc=$('#loc'+quantity_id).val();
        // console.log(dc);
        // console.log(previous_qtys);
        // console.log(qty);
        var finl=dc - previous_qtys + qty;
        var bl_qt_fnf=parseInt(od_qt)-parseInt(finl);
        console.log(dc);
        console.log(previous_qtys);
        console.log(qty);
        console.log(finl);
        dc=finl;
        // console.log(bl_qt_fnf);
          // sessionStorage.setItem("dc", finl);
        if(loc==null || loc=='0'){
          $('#msg').html("****Item is not available in the location****");
          // $('#quantity'+quantity_id).val('');
        }else if(finl > bl_qt_fnf){
          $('#msg').html("****Quantity can't be greater than balance quantity****");
          // $('#quantity'+quantity_id).val('');
        }else if(parseInt(finl) > opening_qty){
          $('#msg').html("****Quantity can't be greater than batch quantity****");
          // $('#quantity'+quantity_id).val('');
        }else{
          $('#msg').html("");
          if (quantity.indexOf(',') > -1) { 
          pre_quantity = quantity.replaceAll(',','');
          }else{
            pre_quantity = quantity;
          }
          var final_qty=parseFloat(minus) + parseFloat(pre_quantity);
          var final_qty=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
              currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(final_qty);
          var final_qty=final_qty.replace(/[$]/g,'');
          $('#total'+quantity_id).text(final_qty);


          var quantity=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
              currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(pre_quantity);
          var quantity=quantity.replace(/[$]/g,'');
          var  show_quantity=quantity;
          $('#quantity'+quantity_id).val(show_quantity);
        }

    });

$(document).ready(function(){
    $('.js-example-basic-single').select2();
});
//validation
$(function () {
      $.validator.setDefaults({
        submitHandler: function () {
          // alert( "Form successful submitted!" );
        }
      });
      $('#order_form').validate({
        rules: {
            company_code: {
            required: true,
          },
          division: {
            required: true,
          },
          party: {
            required: true,
          },
          salesman: {
            required: true,
          },
          doc_no: {
            required: true,
          },
          po_code: {
            required: true,
          },
          purchase_mode: {
            required: true,
          }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
});
    
$('#view_party').click(function(){
    var party_code=$('#party').val();
    // console.log(party_code);
    if(party_code !=''){
        // document no dropdown
        $.ajax({
            url: 'api/sales_module/transaction_files/sales_order_api.php',
            type: 'POST',
            data: {action: 'party_detail',party_code:party_code},
            dataType: "json",
            success: function(data){
                // console.log(data);
                $('#name').html(data.party_name);
                $('#address').html(data.address);
                $('#phone').html(data.phone_nos);
                $('#gst').html(data.gst);
                $('#ntn').html(data.ntn);
                $('#division_p').html(data.division_name);
                $('#city_p').html(data.city_name);
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });
        $('#ViewPartyModal').modal('show');
    }
});

$(document).ready(function(){
    var co_code=<?php echo $_GET['co_code'] ?>;
    var div_code=<?php echo $_GET['div_code'] ?>;
    var party_code=<?php echo $_GET['party_code'] ?>;
    // console.log(party_code);
    var salesman_code=<?php echo $_GET['salesman_code'] ?>;
    var po_catg="<?php echo $_GET['po_catg'] ?>";
    var doc_year=<?php echo $_GET['doc_year'] ?>;
    var doc_no=<?php echo $_GET['doc_no'] ?>;
    var po_no="<?php echo $_GET['po_no'] ?>";
    $('#order_key').val(po_no);
    $('#doc_no').val(doc_no);
    $('#company_code').val(co_code);
    $('#division').val(div_code);
    $('#party').val(party_code);
    $('#purchase_mode').val(po_catg);
    $('#salesman').val(salesman_code);
    $("#purchase_mode").attr({disabled:'readonly !important'});
    // party detail dropdown
    $.ajax({
        url: 'api/sales_module/transaction_files/sales_order_api.php',
        type: 'POST',
        data: {action: 'party_detail',party_code:party_code},
        dataType: "json",
        success: function(data){
            // console.log(data);
            $('#name').val(data.party_name);
            $('#address').val(data.address);
            $('#city_p').val(data.city_name);
            $('#zone_p').val(data.zone_name);
            $('#phone').val(data.phone_nos);
            $('#division_p').val(data.division_name);
            $('#salesman_code').val(data.salesman_code);
            $('#salesman_name_p').val(data.sman_name);
            $('#balance_p').val(data.balance);
            $('#cr_days').val(data.crdays);
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });
    // $('#purchase_mode').enable(false);
    // $('#purchase_mode').attr('disabled','readonly');
  $.ajax({
    url: 'api/sales_module/transaction_files/delivery_challan_api.php',
      type : "post",
      data : {action:'edit',doc_no:doc_no,co_code:co_code,doc_year:doc_year,div_code:div_code,party_code:party_code,salesman_code:salesman_code,po_catg:po_catg},
      success: function(response)
      {
        console.log(response);
        $('#voucher_date').val(response.doc_date);
        $('#ship_mode').val(response.ship_mode);
        $('#ship_no').val(response.ship_no);
        $('#narration').val(response.remarks);
        $('#order_ref').val(response.order_refnum);
        $('#party_ref').val(response.order_party_ref);
        $('#v_no').val(response.refnum2);
        $('#narration').val(response.remarks);
        $('#po_date').val(response.po_date);
        $('#company_name').val(response.co_name);
        $('#division_name').val(response.division_name);
        $('#party_name').val(response.party_name);
        $('#salesman_name').val(response.sman_name);
    
        // ACCOUNT code dropdown
        $.ajax({
            url: 'api/sales_module/transaction_files/sales_order_api.php',
            type: 'POST',
            data: {action: 'item_code',company_code:co_code,order_key:po_no},
            dataType: "json",
            success: function(data){
                $("#ajax-loader").hide();
                // console.log(data);
                $('#acc_desc').html('');
                $('#acc_desc').append('<option value="" selected disabled>Select Item</option>');
                $.each(data, function(key, value){
                    $('#acc_desc').append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
                });
            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        }); 
        var account_code=$('#acc_desc').find(':selected').val();
        var detail=$('#acc_desc').find(':selected').attr("data-name");
        $('#select2-acc_desc-container').html(account_code);
        $('#detail').val(detail);
 
        $.ajax({
            url: 'api/sales_module/transaction_files/delivery_challan_api.php',
            type: 'POST',
            data: {action: 'edit_table',co_code:co_code,doc_no:doc_no,party_code:party_code,
              div_code:div_code,po_catg:po_catg,doc_year:doc_year},
            dataType: "json",
            success: function(data){
                console.log(data);
                var total_quantity=0;
                var j=1;
                var k=0;
                var l=0;
                var m=0;
                var n=1;
                if(data.length >= 1){
                    for(var i=1;i<=data.length;i++){
                        $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class="js-example-basic-single acc_desc" ></td><td><textarea style="height:35px;background-color:#ccd4e1" name="detail[]" id = "detail'+i+'" class="detail" rows="1" readonly></textarea></td><td><input style="width:85px;height:35px;background-color:#ccd4e1" type="text" name="order_qtys[]" id = "order_qtys'+i+'" class="order_qtys"></td><td><input style="width:85px;height:35px;background-color:#ccd4e1" type="text" name="dc_qtys[]" id = "dc_qtys'+i+'" class="dc_qtys"></td><td><input style="width:85px;height:35px;background-color:#ccd4e1" type="text" name="bal_qts[]" id = "bal_qts'+i+'" class="bal_qts"></td><td><select style="font-size:9px !important;" name="type[]" id = "type'+i+'" class="type"><option value="0" readonly="readonly" selected>Type</option><option value="N">N</option><option value="F">F</option><option value="S">S</option><option value="T">T</option></select></td><td><input style="width:60px !important;background-color:#a2e6f1 !important;height:35px !important" name="loc[]" id = "loc'+i+'" class="loc" ></td><td><textarea style="height:35px;width:142px;font-size:12px;baclground-color:#a2e6f1;" name="loc_name[]" id = "loc_name'+i+'" class="loc_name" ></textarea></td><td><input style="height:35px;width:85px" type="text" name="quantity[]" id = "quantity'+i+'" class="quantity"></td><td><input style="height:35px;width:85px;background-color:#a2e6f1" type="text" name="opening_qty[]" id = "opening_qty'+i+'" class="opening_qty" readonly></td><td><textarea  style="height:35px;font-size:12px;background-color:#a2e6f1" rows="1" type="text" name="batch_no[]" id = "batch_no'+i+'"  class="batch_no"></textarea></td><td><input style="height:35px;width:87px;background-color:#a2e6f1" type="date" name="expiry_dt[]" id = "expiry_dt'+i+'" class="expiry_dt" readonly></td><td><textarea  style="height:35px;font-size:12px;background-color:#a2e6f1" value='+gd_no+' rows="1" name="gd_no[]" id = "gd_no'+i+'" class="gd_no" readonly></textarea></td><td><input style="height:35px;width:87px;background-color:#a2e6f1" type="date" name="gd_dt[]" id = "gd_dt'+i+'" class="gd_dt" readonly></td><td><input style="height:35px;width:87px;font-size:12px;background-color:#a2e6f1" value='+item_hscode+' type="text" name="item_hscode[]" id = "item_hscode'+i+'" class="item_hscode" readonly></td><td><input style="height:35px;width:87px;font-size:12px;background-color:#a2e6f1" value='+tax_rate+' type="text" name="tax_rate[]" id = "tax_rate'+i+'" class="tax_rate" readonly></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');          
                                      
                        // ACCOUNT code dropdown
                        $.ajax({
                            url: 'api/sales_module/transaction_files/delivery_challan_api.php',
                            type: 'POST',
                            data: {action: 'item_code',company_code:co_code,order_key:po_no},
                            dataType: "json",
                            // async:false,
                            success: function(data1){
                                // $("#ajax-loader").show();
                                // console.log(data1);
                                $('#acc_desc'+j).html('');
                                $('#acc_desc'+j).addClass('js-example-basic-single');
                                $('.js-example-basic-single').select2();
                                $('#acc_desc'+j).append('<option value="" selected disabled>Select Item</option>');
                                
                                $.each(data1, function(key, value){
                                  $('#acc_desc'+j).append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
                                  $('#acc_desc'+j).val(data[l].item_code);
                                });
                                // console.log(j);
                                var account_code=$('#acc_desc'+j).find(':selected').val();
                                var detail=$('#acc_desc'+j).find(':selected').attr("data-name");
                                $('#select2-acc_desc'+j+'-container').html(account_code);
                                $('#detail'+j).val(detail);
                                $.ajax({
                                    url: 'api/sales_module/transaction_files/delivery_challan_api.php',
                                    type: 'POST',
                                    data: {action: 'item_detail_edit',item_code:account_code,doc_no:doc_no,order_key:po_no},
                                    dataType: "json",
                                    success: function(datad){
                                      console.log(datad);
                                      var qty_e=data[m].qty;
                                        console.log(datad.total_order_receipt_qty);
                                        console.log(qty_e);
                                        var total_order_qty=parseInt(datad.total_order_qty);
                                        var total_order_receipt_qty=parseInt(datad.total_order_receipt_qty);
                                        var final_qty=total_order_qty-total_order_receipt_qty;
                                        $('#dc_qtys'+n).val(total_order_receipt_qty);
                                        $('#bal_qts'+n).val(final_qty);
                                        $('#order_qtys'+n).val(total_order_qty);
                                        m++;
                                        n++;
                                    },
                                    error: function(error){
                                        console.log(error);
                                        alert("Contact IT Department");
                                    }
                                });
                                l++;
                                j++;
                                        
                            },
                            error: function(error){
                                console.log(error);
                                alert("Contact IT Department");
                            }
                        }); 
                        var loc_code=data[k].loc_code;
                        // var hscode=data[k].item_hscode==''?'':data[k].item_hscode;
                        $('#item_hscode'+i).val(data[k].item_hscode);
                        $('#loc'+i).val(data[k].loc_code);
                        $('#loc_name'+i).val(data[k].loc_name);
                        $('#opening_qty'+i).val(data[k].bal_stock);
                        // var tax_rate=data[k].stax_rate==''?'0':data[k].stax_rate;
                        $('#tax_rate'+i).val(data[k].stax_rate);
                        $('#item_hscode'+i).val(data[k].item_hscode);
                        $('#gd_no'+i).val(data[k].g_d);
                        $('#gd_dt'+i).val(data[k].gd_date);
                        $('#batch_no'+i).val(data[k].batch_no);
                        $('#expiry_dt'+i).val(data[k].expiry_date);
                        var qty=data[k].qty;
                        var qtys=new Intl.NumberFormat(
                          'en-US', { style: 'currency', 
                            currency: 'USD',
                          currencyDisplay: 'narrowSymbol'}).format(qty);
                        var qtys=qtys.replace(/[$]/g,''); 
                        $('#quantity'+i).val(qtys);
                        $('#quantity'+i+'').css('text-align','right ');
                        $('#quantity'+i+'').css('padding','0 1px 0 0');
                        $('#type'+i).val(data[k].item_type);
                        total_quantity = parseFloat(total_quantity) + parseFloat(qty);
                        var total_quantity_com=new Intl.NumberFormat(
                          'en-US', { style: 'currency', 
                            currency: 'USD',
                          currencyDisplay: 'narrowSymbol'}).format(total_quantity);
                        var total_quantity_com=total_quantity_com.replace(/[$]/g,''); 
                        $('#total').text(total_quantity_com);
                        k++;

                }
              }

            },
            error: function(error){
                console.log(error);
                alert("Contact IT Department");
            }
        });

      },
      error: function(e) 
      {
        console.log(e);
        alert("Contact IT Department");
      }
  });
});
 
$('#example1').on('click','.detail',function(){
    $('#msg').html('');
    var button_id= $(this).attr('id');
    var id = button_id.split("l");
    id=id[1];
    // if(id != ''){
      var item_code=$('#acc_desc'+id).val();
      if(item_code =='' || item_code == null){
       $('#msg').html("select the item to get details.")
      }
      else{
        $('#msg').html('');
        var qty=$('#quantity'+id).val();
          // document no dropdown
          $.ajax({
              url: 'api/sales_module/transaction_files/delivery_challan_api.php',
              type: 'POST',
              data: {action: 'item_detail',item_code:item_code},
              dataType: "json",
              success: function(data){
                  console.log(data.bal_qty);
                  $('#division_i').html(data.division_name);
                  $('#gen_i').html(data.gen_name);
                  $('#gd_no').html(data.gd_no);
                  $('#order').html(qty);
                  $('#dc_qty').html(qty);
                  $('#bal_qty').html(data.bal_qty==null?'0':data.bal_qty);
                  $('#gd_date').html(data.gd_date);
                  $('#item_hs').html(data.hscode);
                  $('#tax_r').html(data.tax_rate);
          $('#ViewItemModal').modal('show');
              },
              error: function(error){
                  console.log(error);
                  alert("Contact IT Department");
              }
          });
      }
    // }
});   
// EditItemModal   
 
$('#example1').ready(function(){
  //on chAnge account code
  $("#order_form").on('change','#acc_desc',function(){
        $("#ajax-loader").show();
      var account_code=$('#acc_desc').find(':selected').val();
      // console.log(account_code);
      var detail=$('#acc_desc').find(':selected').attr("data-name");
      // console.log(detail);
      $('#select2-acc_desc-container').html(account_code);
      $('#detail').val(detail);
  });
  //on chAnge account code
  $("#order_form").on('change','.acc_desc',function(){
        $("#ajax-loader").show();
      var target = event.target || event.srcElement;
      var id = target.id;
      var id = id.split("-");
      id=id[1];
      var id = id.split("acc_desc");
      id=id[1];
      var account_code=$('#acc_desc'+id).find(':selected').val();
      var detail=$('#acc_desc'+id).find(':selected').attr("data-name");
      $('#select2-acc_desc'+id+'-container').html(account_code);
      $('#detail'+id).val(detail);
      
      $('#loc'+id).val('');
      $('#loc_name'+id).val('');
      $('#quantity'+id).val('');
      $('#opening_qty'+id).val('');
      $('#batch_no'+id).val('');
      $('#expiry_dt'+id).val('');
      $('#gd_no'+id).val('');
      $('#gd_dt'+id).val('');
      $('#item_hscode'+id).val('');
      $('#tax_rate'+id).val('');
      var company_code=$('#company_code').val();
      var order_key=$('#order_key').val();
      $('#loc'+id).val('');
      
      $('#loc_batch_tb').dataTable().fnDestroy();
      table = $('#loc_batch_tb').DataTable({
          dom: 'Bfrtip',
          orderCellsTop: true,
          fixedHeader: true,
          
          buttons: [
              'copy', 'csv', 'excel', 'pdf', 'print',
          ]
      });
      // Setup - add a text input to each footer cell
      // $('#loc_batch_tb thead tr').clone(true).appendTo( '#loc_batch_tb thead' );
      $('#loc_batch_tb thead tr:eq(1) th').each( function (i) {
          var title = $(this).text();
          $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
          $( 'input', this ).on( 'keyup change', function () {
              if ( table.column(i).search() !== this.value ) {
                  table
                      .column(i)
                      .search( this.value )
                      .draw();
              }
          });
      });
      // order code dropdown
      $.ajax({
          url: 'api/sales_module/transaction_files/delivery_challan_api.php',
          type: 'POST',
          data: {action: 'locbatch_code',company_code:company_code,item_code:account_code,order_key:order_key},
          dataType: "json",
          success: function(response){
              // console.log(response);
          table.clear().draw();
          // append data in datatable
          for (var i = 0; i < response.length; i++) {
              // var refnum=response[i].refnum==''?'-':response[i].refnum;
              table.row.add([response[i].ITEM_CODE,response[i].item_descr,response[i].ITEM_HSCODE,response[i].ITEM_TAXRATE,'-',response[i].G_D,response[i].GD_DATE,response[i].BATCH_NO,response[i].EXPIRY_DATE,response[i].LOC_CODE,response[i].loc_name,response[i].BAL_STOCK]);
          
          }
          table.draw();
          },
          error: function(error){
              console.log(error);
              alert("Contact IT Department");
          }
      });  
      

      $.ajax({
        url: 'api/sales_module/transaction_files/delivery_challan_api.php',
        type: 'POST',
        data: {action: 'location_code',item_code:account_code},
        dataType: "json",
        success: function(response){
        $("#ajax-loader").hide();
            $('#loc'+id).html('');
            $('#loc'+id).append('<option value="0" selected readonly="readonly">Select Account</option>');
            $.each(response, function(key, value){ 
              $('#loc'+id).append('<option data-name="'+value["loc_name"]+'"  data-code='+value["loc_code"]+' value='+value["loc_code"]+'>'+value["loc_code"]+' - '+value["loc_name"]+'</option>');
            });
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
      });
          $.ajax({
              url: 'api/sales_module/transaction_files/delivery_challan_api.php',
              type: 'POST',
              data: {action: 'item_detail',item_code:account_code,order_key:order_key},
              dataType: "json",
              success: function(data){
                  // console.log(data.bal_qty);
                  var total_order_qty=parseInt(data.total_order_qty);
                  var total_order_receipt_qty=parseInt(data.total_order_receipt_qty);
                  var final_qty=total_order_qty-total_order_receipt_qty;
                  $('#dc_qtys'+id).val(data.total_order_receipt_qty);
                  $('#bal_qts'+id).val(final_qty);
                  $('#order_qtys'+id).val(total_order_qty);
              },
              error: function(error){
                  console.log(error);
                  alert("Contact IT Department");
              }
          }); 
  });
  //on chAnge account code
  $("#order_form").on('change','.loc',function(){
      var target = event.target || event.srcElement;
      var id = target.id;
      var id = id.split("-");
      id=id[1];
      var id = id.split("loc");
      id=id[1];
      var loc_code=$('#loc'+id).find(':selected').val();
      $('#select2-loc'+id+'-container').html(loc_code);
  });
  $('#example1').on('click','.loc',function(){
    $('#LocBatchModal').modal('show');
    var button_id = $(this).attr("id");
    var locid = button_id.split("c");
    id=locid[1];
    //get value of all fields
    $('#loc_batch_tb').on('click','.even',function(){
        var item_code=$(this).closest('tr').children('td:nth-child(1)').text();
        var item_name=$(this).closest('tr').children('td:nth-child(2)').text();
        var hscode=$(this).closest('tr').children('td:nth-child(3)').text();
        var tax=$(this).closest('tr').children('td:nth-child(4)').text();
        var od_tax=$(this).closest('tr').children('td:nth-child(5)').text();
        var g_d=$(this).closest('tr').children('td:nth-child(6)').text();
        var gd_date=$(this).closest('tr').children('td:nth-child(7)').text();
        var batch_no=$(this).closest('tr').children('td:nth-child(8)').text();
        var expiry_date=$(this  ).closest('tr').children('td:nth-child(9)').text();
        var loc=$(this).closest('tr').children('td:nth-child(10)').text();
        var loc_name=$(this).closest('tr').children('td:nth-child(11)').text();
        var bal_stk=$(this).closest('tr').children('td:nth-child(12)').text();
        $('#loc'+id).val(loc);
        $('#loc_name'+id).val(loc_name);
        $('#opening_qty'+id).val(bal_stk);
        $('#batch_no'+id).val(batch_no);
        $('#expiry_dt'+id).val(expiry_date);
        $('#g_d'+id).val(g_d);
        $('#gd_dt'+id).val(gd_date);
        $('#item_hscode'+id).val(hscode);
        $('#tax_rate'+id).val(tax);
        $('#LocBatchModal').modal('hide');
    });
    //get value of all fields
    $('#loc_batch_tb').on('click','.odd',function(){
        var item_code=$(this).closest('tr').children('td:nth-child(1)').text();
        var item_name=$(this).closest('tr').children('td:nth-child(2)').text();
        var hscode=$(this).closest('tr').children('td:nth-child(3)').text();
        var tax=$(this).closest('tr').children('td:nth-child(4)').text();
        var od_tax=$(this).closest('tr').children('td:nth-child(5)').text();
        var g_d=$(this).closest('tr').children('td:nth-child(6)').text();
        var gd_date=$(this).closest('tr').children('td:nth-child(7)').text();
        var batch_no=$(this).closest('tr').children('td:nth-child(8)').text();
        var expiry_date=$(this  ).closest('tr').children('td:nth-child(9)').text();
        var loc=$(this).closest('tr').children('td:nth-child(10)').text();
        var loc_name=$(this).closest('tr').children('td:nth-child(11)').text();
        var bal_stk=$(this).closest('tr').children('td:nth-child(12)').text();
        $('#loc'+id).val(loc);
        $('#loc_name'+id).val(loc_name);
        $('#opening_qty'+id).val(bal_stk);
        $('#batch_no'+id).val(batch_no);
        $('#expiry_dt'+id).val(expiry_date);
        $('#g_d'+id).val(g_d);
        $('#gd_dt'+id).val(gd_date);
        $('#item_hscode'+id).val(hscode);
        $('#tax_rate'+id).val(tax);
        $('#LocBatchModal').modal('hide');
    });
  });  
});

$('#example1').ready(function(){
  var i = 0;
  var total_amount = 0;
  $('.add').click(function(){
    var company_code=$('#company_code').val();
      i++;
      var acc_desc = $('#acc_desc').val();
      var detail = $("#detail").val();
      var type = $("#type").val();
      var loc = $("#loc").val();
      var loc_name = $("#loc_name").val();
      var order_qtys = $("#order_qtys").val();
      var dc_qtys = $("#dc_qtys").val();
      var bal_qts = $("#bal_qts").val();
      var quantitys = $("#quantity").val();
      quantity = quantitys.replaceAll(',','');
      var quantity_op = $("#opening_qty").val();
      var batch_no = $("#batch_no").text();
      var expiry_dt = $("#expiry_dt").val();
      var gd_no = $("#gd_no").val();
      var gd_dt = $("#gd_dt").val();
      var excl_total = $("#excl_t").text();
      var item_hscode = $("#item_hscode").val();
      var tax_rate = $("#tax_rate").val();
      if(acc_desc == null){
          $('#msg').text("Account can't be the null.");
      }else if(quantity == ""){
          $('#msg').text("Quantity can't be the null.");
      }else if(loc == ""){
          $('#msg').text("Location can't be the null.");
      }else{
          $('#msg').text("");
          
          // values empty
          $("#amount").val('0');
          $("#detail").val('');
          $("#quantity").val('');
          $("#loc").val('');
          $("#order_qtys").val('');
          $("#dc_qtys").val('');
          $("#bal_qts").val('');
          $("#loc_name").val('');
          $("#quantity").val('');
          $("#opening_qty").val('');
          $("#batch_no").val('');
          $("#expiry_dt").val('');
          $("#gd_no").val('');
          $("#gd_dt").val('');
          $("#item_hscode").val('');
          $("#tax_rate").val('');
          //   $("#type").val('');
          $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class="js-example-basic-single acc_desc" ></td><td><textarea style="height:35px;background-color:#ccd4e1" name="detail[]" id = "detail'+i+'" class="detail" rows="1" readonly></textarea></td><td><input style="width:85px;height:35px;background-color:#ccd4e1" type="text" name="order_qtys[]" id = "order_qtys'+i+'" class="order_qtys"></td><td><input style="width:85px;height:35px;background-color:#ccd4e1" type="text" name="dc_qtys[]" id = "dc_qtys'+i+'" class="dc_qtys"></td><td><input style="width:85px;height:35px;background-color:#ccd4e1" type="text" name="bal_qts[]" id = "bal_qts'+i+'" class="bal_qts"></td><td><select style="font-size:9px !important;" name="type[]" id = "type'+i+'" class="type"><option value="0" readonly="readonly" selected>Type</option><option value="N">N</option><option value="F">F</option><option value="S">S</option><option value="T">T</option></select></td><td><input style="width:60px !important;background-color:#a2e6f1 !important;height:35px !important" name="loc[]" id = "loc'+i+'" class="loc" ></td><td><textarea style="height:35px;width:142px;font-size:12px;baclground-color:#a2e6f1;" name="loc_name[]" id = "loc_name'+i+'" class="loc_name" ></textarea></td><td><input style="height:35px;width:85px" type="text" name="quantity[]" id = "quantity'+i+'" class="quantity"></td><td><input style="height:35px;width:85px;background-color:#a2e6f1" type="text" name="opening_qty[]" id = "opening_qty'+i+'" class="opening_qty" readonly></td><td><textarea  style="height:35px;font-size:12px;background-color:#a2e6f1" rows="1" type="text" name="batch_no[]" id = "batch_no'+i+'"  class="batch_no"></textarea></td><td><input style="height:35px;width:87px;background-color:#a2e6f1" type="date" name="expiry_dt[]" id = "expiry_dt'+i+'" class="expiry_dt" readonly></td><td><textarea  style="height:35px;font-size:12px;background-color:#a2e6f1" value='+gd_no+' rows="1" name="gd_no[]" id = "gd_no'+i+'" class="gd_no" readonly></textarea></td><td><input style="height:35px;width:87px;background-color:#a2e6f1" type="date" name="gd_dt[]" id = "gd_dt'+i+'" class="gd_dt" readonly></td><td><input style="height:35px;width:87px;font-size:12px;background-color:#a2e6f1" value='+item_hscode+' type="text" name="item_hscode[]" id = "item_hscode'+i+'" class="item_hscode" readonly></td><td><input style="height:35px;width:87px;font-size:12px;background-color:#a2e6f1" value='+tax_rate+' type="text" name="tax_rate[]" id = "tax_rate'+i+'" class="tax_rate" readonly></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');          
          $('#type').prop("selectedIndex", 0).val();

        //   $('#d_items tr:last').before('<tr id="tr'+i+'"><td><select name="acc_desc[]" id = "acc_desc'+i+'" class="form-control js-example-basic-single acc_desc" ></td><td><input name="detail[]" id = "detail'+i+'" class="form-control form-control-sm detail" readonly></td><td ><select style="font-size:12px;" name="type[]" id = "type'+i+'" class="form-control form-control-sm type"><option val="" readonly="readonly" selected></option><option val="N">N</option><option val="F">F</option><option val="S">S</option><option val="T">T</option></select></td><td><input type="number" name="quantity[]" id = "quantity'+i+'" class="form-control form-control-sm quantity"></td><td><input type="text" name="rate[]" id = "rate'+i+'"  class="form-control form-control-sm rate"></td><td><input type="text" name="amount[]" id = "amount'+i+'" onchange="total()" class="form-control form-control-sm total" readonly></td><td><button type = "button" id="'+i+'" class="btn btn-sm btn-danger remove"><b>X<b></button></td></tr>');          
          // Item code dropdown
          $.ajax({
              url: 'api/sales_module/transaction_files/delivery_challan_api.php',
              type: 'POST',
              data: {action: 'item_code',company_code:company_code},
              dataType: "json",
              success: function(response){
                  $('#acc_desc').html('');
                  $('#acc_desc').append('<option value="" selected disabled>Select Account</option>');
                  $.each(response, function(key, value){ 
                    $('#acc_desc').append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
                  });
              },
              error: function(error){
                  console.log(error);
                  alert("Contact IT Department");
              }
          });  
                // ACCOUNT code dropdown
                $.ajax({
                    url: 'api/sales_module/transaction_files/delivery_challan_api.php',
                    type: 'POST',
                    data: {action: 'item_code',company_code:company_code},
                    dataType: "json",
                    success: function(response){
                        $('#acc_desc'+i).html('');
                        $('#acc_desc'+i).addClass('js-example-basic-single');
                        $('.js-example-basic-single').select2();
                        $('#acc_desc'+i).append('<option value="" selected disabled>Select Account</option>');
                        // var j=1;
                        $.each(response, function(key, value){
                            $('#acc_desc'+i).append('<option data-name="'+value["item_descr"]+'"  data-code='+value["item_div"]+' value='+value["item_div"]+'>'+value["item_div"]+' - '+value["item_descr"]+'</option>');
                            if(value["item_div"]== acc_desc){
                              acc_desc= value["item_div"];
                              $('#acc_desc'+i+' option[value='+acc_desc+']').prop("selected", true);
                            }
                            // $('#acc_desc').append('<option data-name='+value["DESCR"]+'  data-code='+value["ACCOUNT_CODE"]+' value='+value["ACCOUNT_CODE"]+'>'+value["ACCOUNT_CODE"]+' - '+value["DESCR"]+'</option>');
                            
                            
                          });
                    },
                    error: function(error){
                        console.log(error);
                        alert("Contact IT Department");
                    }
                });
                $.ajax({
                  url: 'api/sales_module/transaction_files/delivery_challan_api.php',
                  type: 'POST',
                  data: {action: 'location_code',item_code:acc_desc},
                  dataType: "json",
                  success: function(response){
                  $("#ajax-loader").hide();
                      $('#loc'+i).html('');
                      $('#loc'+i).append('<option value="0" selected  readonly="readonly">Select Account</option>');
                      $.each(response, function(key, value){ 
                        $('#loc'+i).append('<option data-name="'+value["loc_name"]+'"  data-code='+value["loc_code"]+' value='+value["loc_code"]+'>'+value["loc_code"]+' - '+value["loc_name"]+'</option>');
                        if(value["loc_code"]== loc){
                          loc= value["loc_code"];
                          $('#loc'+i+' option[value='+loc+']').prop("selected", true);
                        }
                      });
                    // var loc_codee=$('#loc'+i).find(':selected').attr("data-code");
                    // var loc_namee=$('#loc'+i).find(':selected').attr("data-name");
                    // // console.log(loc_codee);
                    // $('#select2-loc1-container').text(loc_codee);
                  },
                  error: function(error){
                      console.log(error);
                      alert("Contact IT Department");
                  }
                }); 
                //on chAnge account code
                $("#transaction_form").on('change','#acc_desc',function(){
                    $('#loc').val('');
                    var account_code=$('#acc_desc').find(':selected').val();
                    var detail=$('#acc_desc').find(':selected').attr("data-name");
                    $('#select2-acc_desc-container').html(account_code);
                    $('#detail').val(detail);
                });
                // console.log(type);
                if(type=='' || type=='0'){
                  $('#type'+i+'').prop("selectedIndex", 0).val();
                }else{
                  $('#type'+i+'').val(type);
                }
              $('#detail'+i+'').val(detail);
              $('#order_qtys'+i+'').val(order_qtys);
              $('#dc_qtys'+i+'').val(dc_qtys);
              $('#bal_qts'+i+'').val(bal_qts);
              $('#loc_name'+i+'').val(loc_name);
              $('#quantity'+i+'').val(quantitys);
              $('#opening_qty'+i+'').val(quantity_op);
              $('#gd_no'+i+'').val(gd_no);
              $('#gd_dt'+i+'').val(gd_dt);
              $('#loc'+i+'').val(loc);
              $('#expiry_dt'+i+'').val(expiry_dt);
              $('#batch_no'+i+'').val(batch_no);
              $('#item_hscode'+i+'').val(item_hscode);
              $('#tax_rate'+i+'').val(tax_rate);
              $('#quantity'+i+'').css('text-align','right');
              $('#quantity'+i+'').css('padding','0 1px 0 0');
              
      }  
  });
     
   
  $('#example1').on('click','.remove', function(){
      var button_id = $(this).attr("id");
      var remove_quantity = $('#quantity'+button_id+'').val();
      remove_quantity = remove_quantity.replaceAll(',','');
      $('#tr'+button_id+'').remove();
      //   $('#um').val('');
      var current_t_qty = $('#total').text();
      current_t_qty = current_t_qty.replaceAll(',','');
      //total amount
      var total_qty = parseFloat(current_t_qty) - parseFloat(remove_quantity);
      if(isNaN(total_qty)){
        total_qty='0';
      }else{
        var total_qty=new Intl.NumberFormat(
            'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(total_qty);
        var total_qty=total_qty.replace(/[$]/g,'');
      }
      $('#total').text(total_qty);

  });
});
      
$("#order_form").on("submit", function (e) {
    if ($("#order_form").valid()) {
        var rowCount = $("#example1 tr").length;
        if(rowCount > 3){
            // var item_code=$('#acc_desc').val();
            var quantity=$('#quantity').val();
            if(quantity == '' || quantity=='0.00' || quantity == '0'){
                e.preventDefault();
                var formData = new FormData(this); 
                var total=$('#total').text();
                formData.append('debit',total);
                var company_code=$('#company_code').val();
                formData.append('company_code',company_code);
                var purchase_mode=$('#purchase_mode').val();
                formData.append('purchase_mode',purchase_mode);
                formData.append('action','update');
                $.ajax({
                    url: 'api/sales_module/transaction_files/delivery_challan_api.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    
                    success: function(response)
                    {
                        $("#ajax-loader").hide();
                        var message = response.message
                        var status = response.status
                        $.ajax({
                            url: "api/message_session/message_session.php",
                            type: 'POST',
                            data: {message:message,status:status},
                            success: function (response) {
                            if(status == 0){
                                $("#msg").html(message);
                            }else{
                                $.get('sales_module/transaction_files/delivery_challan_list.php',function(data,status){
                                    $('#content').html(data);
                                });
                            }
                            },
                            error: function(e) 
                            {
                            console.log(e);
                            alert("Contact IT Department");
                            }
                        });
                    },
                    error: function(e) 
                    {
                        console.log(e);
                        alert("Contact IT Department");
                    } 
                });
            }else{
                $("#msg").html("Click on Add Row otherwise the last Row will not be count");
            }
        }else{
            $("#msg").html("Click on Insert Row");
        }
    }
});




// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#tf_breadcrumb").on("click", function () {
    $.get('sales_module/transaction_files/tansaction_files.php', function(data,status){
        $("#content").html(data);
    });
});
$("#dc_list_breadcrumb").on("click", function () {
    $.get('sales_module/transaction_files/delivery_challan_list.php', function(data,status){
        $("#content").html(data);
    });
});
</script>
<?php include '../../includes/loader.php'?>