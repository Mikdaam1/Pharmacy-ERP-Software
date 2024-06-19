<style>
select{
      width:82% !important;
      /* border: 1px solid #d9dbde */
    }
    #btn-back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        /* display: none; */
    }
    html {
        scroll-behavior: smooth;
    }
    #down {
        margin-top: 1%;
        padding-bottom: 1%;
    } 
    input,select,textarea,.select2-selection{
        border:1px solid black !important;
    }
    .input-group-prepend{
        /* border-right:2px solid black !important */
    }
    .select2-hidden-accessible{
        border:1px solid black !important;

    }
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap");




h2 {
  color: black;
  font-size: 34px;
  position: relative;
  text-transform: uppercase;
  /* -webkit-text-stroke: 0.3vw #f7f7fe; */
  font-weight:600;
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
  font-weight:600;
}

@keyframes animate {
  0%,
  10%,
  100% {
    width: 0;
  }

  70%,
  90% {
    width: 100%;
  }
}
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none !important;
      margin: 0!important;
    }
    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield !important;
    }

</style>
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Party Information Edit</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"><i class="fas fa-tachometer-alt"></i></button></li>
                <li class="breadcrumb-item active"><button class="btn btn-sm" id="setup_breadcrumb">Setup</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="party_setup_breadcrumb">Party Setup</button></li>
                <li class="breadcrumb-item"><button class="btn btn-sm" id="edit_party_breadcrumb">Edit Party</button></li>
              </ol>
            </div>   
          </div>
        </div><!-- /.container-fluid -->
      </section>

     
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <form method="post" id="party_form">
                                <?php include '../display_message/display_message.php'?>
                                <span id="msg" style="color: red;font-size: 13px;"></span>
                                <input type="hidden" name="form_no" id="form_no" value="">
                                <div class="row">
                                    <div class="col-sm-3 form-group">
                                        <label for="">Company Code :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="company_code" name="company_code" disabled=readonly>
                                            </select>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Company Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="company_name" id="company_name" class="form-control form-control-sm" placeholder="Company Name" readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Division :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="division" name="division"  disabled=readonly>
                                            </select>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Division Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="division_name" id="division_name" class="form-control form-control-sm" placeholder="Division Name" readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Control Code :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <select name="control_code" class="form-control form-control-sm" id="control_code"   disabled=readonly>
                                                <option value="610">610</option>
                                                <option value="650">650</option>
                                            </select>                                
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Party Code :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div> 
                                            <input maxlength="3" min="1" max="999" type="number" name="party_code" id="party_code" class="form-control form-control-sm" placeholder="Party Code"   disabled=readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Party Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="party_name" id="party_name" class="form-control form-control-sm" placeholder="Party Name"  >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Party Account Code :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <input pattern="[a-zA-Z0-9 ,._-]{1,}" maxlength="15" type="number" name="party_account" id="party_account" class="form-control form-control-sm" placeholder="Party Account" readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="">Address :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <textarea rows="1" name="address" id="address" class="form-control form-control-sm" placeholder="Address" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Billing Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="bill_name" id="bill_name" class="form-control form-control-sm" placeholder="Billing Name"  >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Billing Address :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-address-card"></i></span>
                                            </div>
                                            <textarea rows="1" name="bill_address" id="bill_address" class="form-control form-control-sm" placeholder="Billing Address" ></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Person :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="person" id="person" class="form-control form-control-sm" placeholder="Person Name"  >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for=""> Phone Number :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" name = "contact_no" id="contact_no" placeholder="xxxx-xxx-xxxx" value="" class="form-control form-control-sm" data-inputmask="'mask': ['9999-999-9999', '+99-999-999-9999']" data-mask="" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Email :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-envelope"></i></span>
                                            </div>
                                            <input type="email" id="email" name="email" class="form-control form-control-sm" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter Valid Email Address">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">CNIC Number :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                            </div>
                                            <input type="text" name = "cnic_no" id="cnic_no" placeholder="xxxxx-xxxxxxx-x" value="" class="form-control form-control-sm" data-inputmask="&quot;mask&quot;: &quot;99999-9999999-9&quot;" data-mask="" inputmode="text">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">GST #:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <input maxlength="30" type="number" name="gst_no" id="gst_no" class="form-control form-control-sm" placeholder="GST" >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">NTN Number :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <input maxlength="30" type="number" name="ntn_no" id="ntn_no" class="form-control form-control-sm" placeholder="NTN Number 1-9" >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Zone :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="zone_code" name="zone_code">
                                            </select>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Zone Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="zone_name" id="zone_name" class="form-control form-control-sm" placeholder="Zone Name" readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-2 form-group"></div>
                                    <div class="col-sm-4 form-group">
                                        <label for="">City :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="city_code" name="city_code">
                                            </select>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="">City Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="city_name" id="city_name" class="form-control form-control-sm" placeholder="City Name" readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-2 form-group"></div>
                                </div>
                                <a href="#down" ><button style="background:#4b545c" type="button" class="btn btn-floating btn-lg"  id="btn-back-to-top">
                                    <i style="color:white" class="fas fa-arrow-down"></i>
                                </button></a><br><br>
                                <div class=" text-center"><h2 data-text="More Details...">More Details...</h2></div>

                                <div class="row" id="down">
                                    <div class="col-sm-3 form-group">
                                        <label for="">Salesman :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="salesman_code" name="salesman_code">
                                            </select>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Salesman Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="salesman_name" id="salesman_name" class="form-control form-control-sm" placeholder="Salesman Name" readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Account Code :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <select class="form-control form-control-sm  js-example-basic-single" id="account_code" name="account_code">
                                            </select>                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Account Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="account_name" id="account_name" class="form-control form-control-sm" placeholder="Account Name" readonly >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Druglic #:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <input maxlength="30" type="number" name="druglic_no" id="druglic_no" class="form-control form-control-sm" placeholder="Druglic No" >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Druglic Date :</label><span style="color:red;">*</span>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                            </div>
                                            <input type="date" name="druglic_date" id="druglic_date" class="form-control form-control-sm" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Druglic Name :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <input maxlength="30" type="text" name="druglic_name" id="druglic_name" class="form-control form-control-sm" placeholder="Druglic Name" >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Customer Type :<span style="color:red">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-user"></i></span>
                                            </div>
                                            <select name="cus_type" class="form-control form-control-sm" id="cus_type" >
                                                <option value="Distb">Distb</option>
                                                <option value="RT">RT</option>
                                                <option value="Manf">Manf</option>
                                                <option value="Importer">Importer</option>
                                                <option value="End Consumer">End Consumer</option>
                                            </select>                                
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="">Credit Days :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <input maxlength="30" type="number" name="cr_days" id="cr_days" class="form-control form-control-sm" placeholder="CR Days" >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Check Y/N :</label><span style="color:red;">*</span>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-file-check"></i></span>
                                            </div>
                                            <select name="days_check" id="days_check" class="form-control form-control-sm">
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>                          
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-md-3 form-group">
                                        <label for="">Credit Limit :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-sort-numeric-asc"></i></span>
                                            </div>
                                            <input maxlength="30" type="number" name="cr_limits" id="cr_limits" class="form-control form-control-sm" placeholder="CR Limit" >
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group">
                                        <label for="">Check Y/N :</label><span style="color:red;">*</span>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-file-check"></i></span>
                                            </div>
                                            <select name="limit_check" id="limit_check" class="form-control form-control-sm">
                                            <option value="Y">Yes</option>
                                            <option value="N">No</option>                          
                                            </select>
                                        </div>
                                    </div> 
                                    <div class="col-md-3 form-group">
                                        <label for="">Opening Debit :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;" pattern="[a-zA-Z0-9 ,._-]{1,}"  tabindex="-1" maxlength="30" type="text" name="debit" id="debit" class="form-control form-control-sm" placeholder="Opening Debit" > 
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="">Opening Credit :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;" pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1" maxlength="30" type="text" name="credit" id="credit" class="form-control form-control-sm" placeholder="Opening Credit" > 
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="">Open Debit 2018 :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;" pattern="[a-zA-Z0-9 ,._-]{1,}"  tabindex="-1" maxlength="30" type="text" name="debit_18" id="debit_18" class="form-control form-control-sm" placeholder="Opening Debit 2018" > 
                                        </div>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="">Opening Credit 2018:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;" pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1" maxlength="30" type="text" name="credit_18" id="credit_18" class="form-control form-control-sm" placeholder="Opening Credit 2018" > 
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-1"></div> -->
                                    <div class="col-md-4 form-group">
                                        <label for="">Limit Utilised:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;" pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1" maxlength="30" type="text" name="limit_utilized" id="limit_utilized" class="form-control form-control-sm" placeholder="Limit Utilized" > 
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Entries Debit :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;" pattern="[a-zA-Z0-9 ,._-]{1,}"  tabindex="-1" maxlength="30" type="text" name="entries_debit" id="entries_debit" class="form-control form-control-sm" placeholder="Entries Debit" > 
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Entries Credit:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;" pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1" maxlength="30" type="text" name="entries_credit" id="entries_credit" class="form-control form-control-sm" placeholder="Entries Credit" > 
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-1"></div> -->
                                    <div class="col-md-4 form-group">
                                        <label for="">Limit Balance:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;" pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1" maxlength="30" type="text" name="limit_balance" id="limit_balance" class="form-control form-control-sm" placeholder="Limit Balance" > 
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Closing Debit :</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;" pattern="[a-zA-Z0-9 ,._-]{1,}"  tabindex="-1" maxlength="30" type="text" name="closing_debit" id="closing_debit" class="form-control form-control-sm" placeholder="Closing Debit" > 
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">Closing Credit:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                            </div>
                                            <input style="text-align:right;" pattern="[a-zA-Z0-9 ,._-]{1,}" tabindex="-1" maxlength="30" type="text" name="closing_credit" id="closing_credit" class="form-control form-control-sm" placeholder="Closing Credit" > 
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <input type="submit" id="add" class="btn btn-primary" >
                                </div>
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


<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>

<script>

$(document).ready(function(){
      $("#party_form").on('change','#credit',function(){
        var credit=$('#credit').val();
        if(credit==''){
          credit=0;
        }else{
          // myStr_min = credit.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_min = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_min);
          // credit = commaNotations_min ?
          // Math.round(parseFloat(credit.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(credit.replace(/[^\d\.]/g, ''))); 
          credit = credit.replaceAll(',','');
          var credit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(credit);
            var credit=credit.replace(/[$]/g,'');
              console.log(credit);
          $('#credit').val(credit);
        }
      });
      $("#party_form").on('change','#debit',function(){
        var debit=$('#debit').val();
        if(debit==''){
          debit=0;
        }else{
          // myStr_deb = debit.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_deb = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_deb);
          // debit = commaNotations_deb ?
          // Math.round(parseFloat(debit.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(debit.replace(/[^\d\.]/g, '')));
          debit = debit.replaceAll(',','');
          var debit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(debit);
          var debit=debit.replace(/[$]/g,'');
          $('#debit').val(debit);
        }
      });
      $("#party_form").on('change','#credit_18',function(){
        var credit=$('#credit_18').val();
        if(credit==''){
          credit=0;
        }else{
          // myStr_min = credit.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_min = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_min);
          // credit = commaNotations_min ?
          // Math.round(parseFloat(credit.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(credit.replace(/[^\d\.]/g, ''))); 
          credit = credit.replaceAll(',','');
          var credit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(credit);
            var credit=credit.replace(/[$]/g,'');
              console.log(credit);
          $('#credit_18').val(credit);
        }
      });
      $("#party_form").on('change','#debit_18',function(){
        var debit=$('#debit_18').val();
        if(debit==''){
          debit=0;
        }else{
          // myStr_deb = debit.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_deb = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_deb);
          // debit = commaNotations_deb ?
          // Math.round(parseFloat(debit.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(debit.replace(/[^\d\.]/g, '')));
          debit = debit.replaceAll(',','');
          var debit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(debit);
          var debit=debit.replace(/[$]/g,'');
          $('#debit_18').val(debit);
        }
      });
      $("#party_form").on('change','#entries_credit',function(){
        var credit=$('#entries_credit').val();
        if(credit==''){
          credit=0;
        }else{
          // myStr_min = credit.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_min = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_min);
          // credit = commaNotations_min ?
          // Math.round(parseFloat(credit.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(credit.replace(/[^\d\.]/g, ''))); 
          credit = credit.replaceAll(',','');
          var credit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(credit);
            var credit=credit.replace(/[$]/g,'');
              console.log(credit);
          $('#entries_credit').val(credit);
        }
      });
      $("#party_form").on('change','#entries_debit',function(){
        var debit=$('#entries_debit').val();
        if(debit==''){
          debit=0;
        }else{
          // myStr_deb = debit.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_deb = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_deb);
          // debit = commaNotations_deb ?
          // Math.round(parseFloat(debit.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(debit.replace(/[^\d\.]/g, '')));
          debit = debit.replaceAll(',','');
          var debit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(debit);
          var debit=debit.replace(/[$]/g,'');
          $('#entries_debit').val(debit);
        }
      });
      $("#party_form").on('change','#closing_credit',function(){
        var credit=$('#closing_credit').val();
        if(credit==''){
          credit=0;
        }else{
          // myStr_min = credit.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_min = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_min);
          // credit = commaNotations_min ?
          // Math.round(parseFloat(credit.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(credit.replace(/[^\d\.]/g, ''))); 
          credit = credit.replaceAll(',','');
          var credit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
            currencyDisplay: 'narrowSymbol'}).format(credit);
            var credit=credit.replace(/[$]/g,'');
          $('#closing_credit').val(credit);
        }
      });
      $("#party_form").on('change','#closing_debit',function(){
        var debit=$('#closing_debit').val();
        if(debit==''){
          debit=0;
        }else{
          // myStr_deb = debit.replace(/[^\d\,\.]/g, '');  
          // let commaNotations_deb = /^\d+(\.\d{3})?\,\d{2}$/.test(myStr_deb);
          // debit = commaNotations_deb ?
          // Math.round(parseFloat(debit.replace(/[^\d\,]/g, '').replace(/,/, '.'))) :
          // Math.round(parseFloat(debit.replace(/[^\d\.]/g, '')));
          debit = debit.replaceAll(',','');
          var debit=new Intl.NumberFormat(
          'en-US', { style: 'currency', 
            currency: 'USD',
          currencyDisplay: 'narrowSymbol'}).format(debit);
          var debit=debit.replace(/[$]/g,'');
          $('#closing_debit').val(debit);
        }
      });
});

$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      // alert( "Form successful submitted!" );
    }
  });
  $('#party_form').validate({
    rules: {
        company_code: {
        required: true,
      },
      control_code: {
        required: true,
      },
      division_code: {
        required: true,
      },
      address: {
        required: true,
      },
      bill_name: {
        required: true,
      },
      bill_address: {
        required: true,
      },
      person: {
        required: true,
      },
      contact_no: {
        required: true,
      },
      email: {
        required: true,
      },
      cnic_no: {
        required: true,
      },
      gst_no: {
        required: true,
      },
      ntn_no: {
        required: true,
      },
      zone_code: {
        required: true,
      },
      city_code: {
        required: true,
      },
      salesman_code: {
        required: true,
      },
      account_code: {
        required: true,
      },
      druglic_no: {
        required: true,
      },
      druglic_date: {
        required: true,
      },
      druglic_name: {
        required: true,
      },
      cus_type: {
        required: true,
      },
      debit: {
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


$(document).ready(function() {
    
    var company_code = <?php echo $_GET['company_code'] ?>;
    var party_code = <?php echo $_GET['party_code'] ?>;
    var division_code = <?php echo $_GET['division_code'] ?>;
    var control_code = <?php echo $_GET['control_code'] ?>;
    $('#control_code').val(control_code);
    $('#party_code').val(party_code);
    // $('#division').select2();
    // $('#division').select2();
    $('.js-example-basic-single').select2();
    $("#ajax-loader").show();
    // company code dropdown
    $.ajax({
      url: 'api/setup/chart_of_account/control_account_api.php',
        type: 'POST',
        data: {action: 'company_code'},
        dataType: "json",
        success: function(response){
            console.log(response);
            $('#company_code').select2();
            $('#company_code').html('');
            $('#company_code').append('<option value="" selected disabled>Select Company</option>');
            $.each(response, function(key, value){
                $('#company_code').append('<option data-name="'+value["co_name"]+'"  data-code="'+value["co_code"]+'" value="'+value["co_code"]+'">'+value["co_code"]+' - '+value["co_name"]+'</option>');
            });
            $('#company_code').val(company_code);
            var company_name=$('#company_code').find(':selected').attr("data-name");
            var company_codes=$('#company_code').find(':selected').attr("data-code");
            $('#select2-company_code-container').html(company_codes);
            $('#company_name').val(company_name); 
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    });  
    // division code dropdown
    $.ajax({
        url: 'api/setup/party_api.php',
        type: 'POST',
        data: {action: 'division_code'},
        dataType: "json",
        success: function(data){
            // console.log(data);
            $('#division').html('');
            $('#division').append('<option value="" selected disabled>Select Division</option>');
            $.each(data, function(key, value){
                $('#division').append('<option data-name="'+value["division_name"]+'"  data-code="'+value["division_code"]+'" value="'+value["division_code"]+'">'+value["division_code"]+' - '+value["division_name"]+'</option>');
            });
            $('#division').val(division_code);
            var division_name=$('#division').find(':selected').attr("data-name");
            var division_codes=$('#division').find(':selected').attr("data-code");
            $('#select2-division-container').html(division_codes);
            $('#division_name').val(division_name);
        },
        error: function(error){
            console.log(error);
            alert("Contact IT Department");
        }
    }); 
    $("#ajax-loader").hide();
    $("#party_form").on('change','#salesman_code',function(){
          var salesman_name=$('#salesman_code').find(':selected').attr("data-name");
          var salesman_code=$('#salesman_code').find(':selected').attr("data-code");
          $('#select2-salesman_code-container').html(salesman_code);
          $('#salesman_name').val(salesman_name); 
    });
    $("#party_form").on('change','#account_code',function(){
          var account_name=$('#account_code').find(':selected').attr("data-name");
          var account_code=$('#account_code').find(':selected').attr("data-code");
          $('#select2-account_code-container').html(account_code);
          $('#account_name').val(account_name); 
    });
    $("#party_form").on('change','#city_code',function(){
          var city_name=$('#city_code').find(':selected').attr("data-name");
          var city_code=$('#city_code').find(':selected').attr("data-code");
          $('#select2-city_code-container').html(city_code);
          $('#city_name').val(city_name); 
    });
    $("#party_form").on('change','#zone_code',function(){
          var zone_name=$('#zone_code').find(':selected').attr("data-name");
          var zone_code=$('#zone_code').find(':selected').attr("data-code");
          $('#select2-zone_code-container').html(zone_code);
          $('#zone_name').val(zone_name); 
    });
    $("#ajax-loader").show();
    $.ajax({
          url : 'api/setup/party_api.php',
          type : "post",
          data : {action:'edit',company_code:company_code,party_code:party_code,division_code:division_code,control_code:control_code},
          success: function(response)
          {
              console.log(response);
              $('#company_code').val(response.co_code);
              $('#division').val(response.division_code);
              $('#party_code').val(response.party_code);
              $('#party_name').val(response.party_name);
              $('#address').val(response.address);
              $('#bill_name').val(response.bill_name);
              $('#bill_address').val(response.bill_add);
              $('#person').val(response.contact_name);
              $('#contact_no').val(response.phone_nos);
              $('#email').val(response.e_mail);
              $('#gst_no').val(response.gst);
              $('#ntn_no').val(response.ntn);
              $('#cr_days').val(response.crdays);
              $('#cr_limits').val(response.crlimit);
              $('#limit_utilized').val(response.limit_used);
              $('#cnic_no').val(response.nic_nbr);
              $('#party_account').val(response.party_division);
              $('#druglic_no').val(response.druglic_no);
              $('#druglic_date').val(response.druglic_date);
              $('#druglic_name').val(response.druglic_name);
              $('#debit_18').val(response.open_debit_2018);
              $('#credit_18').val(response.open_credit_2018);
              $('#days_check').val(response.crdays_yn);
              $('#limit_check').val(response.crlimit_yn);
                //   $('#ntn_number').val(response.co1_code);
              $('#cus_type').val(response.cust_type);
              $('#account_name').val(response.gl_name);
              // zone code dropdown
              $.ajax({
                  url: 'api/setup/party_api.php',
                  type: 'POST',
                  data: {action: 'zone_code'},
                  dataType: "json",
                  success: function(data){
                      // console.log(data);
                      $('#zone_code').html('');
                      $('#zone_code').append('<option value="" selected disabled>Select Zone</option>');
                      $.each(data, function(key, value){
                          $('#zone_code').append('<option data-name="'+value["zone_name"]+'"  data-code="'+value["zone_code"]+'" value="'+value["zone_code"]+'">'+value["zone_code"]+' - '+value["zone_name"]+'</option>');
                      });
                      $('#zone_code').val(response.zone_code);
                      var zone_name=$('#zone_code').find(':selected').attr("data-name");
                      var zone_codes=$('#zone_code').find(':selected').attr("data-code");
                      $('#select2-zone_code-container').text(zone_codes);
                      $('#zone_name').val(zone_name); 
                      
                  },
                  error: function(error){
                      console.log(error);
                      alert("Contact IT Department");
                  }
              }); 
              // city code dropdown
              $.ajax({
                  url: 'api/setup/party_api.php',
                  type: 'POST',
                  data: {action: 'city_code'},
                  dataType: "json",
                  success: function(data1){
                      // console.log(data);
                      $('#city_code').html('');
                      $('#city_code').append('<option value="" selected disabled>Select City</option>');
                      $.each(data1, function(key, value){
                          $('#city_code').append('<option data-name="'+value["city_name"]+'"  data-code="'+value["city_code"]+'" value="'+value["city_code"]+'">'+value["city_code"]+' - '+value["city_name"]+'</option>');
                      });
                      $('#city_code').val(response.city_code);
                      var city_name=$('#city_code').find(':selected').attr("data-name");
                      var city_codes=$('#city_code').find(':selected').attr("data-code");
                      $('#select2-city_code-container').html(city_codes);
                      $('#city_name').val(city_name); 
                    },
                  error: function(error){
                      console.log(error);
                      alert("Contact IT Department");
                  }
              });
              // salesman code dropdown
              $.ajax({
                  url: 'api/setup/party_api.php',
                  type: 'POST',
                  data: {action: 'salesman_code'},
                  dataType: "json",
                  success: function(data){
                      // console.log(data);
                      $('#salesman_code').html('');
                      $('#salesman_code').append('<option value="" selected disabled>Select Salesman</option>');
                      $.each(data, function(key, value){
                          $('#salesman_code').append('<option data-name="'+value["sman_name"]+'"  data-code="'+value["sman_code"]+'" value="'+value["sman_code"]+'">'+value["sman_code"]+' - '+value["sman_name"]+'</option>');
                      });
                      $('#salesman_code').val(response.salesman_code);
                      var salesman_name=$('#salesman_code').find(':selected').attr("data-name");
                      var salesman_codes=$('#salesman_code').find(':selected').attr("data-code");
                      $('#select2-salesman_code-container').html(salesman_codes);
                      $('#salesman_name').val(salesman_name); 
                      
                  },
                  error: function(error){
                      console.log(error);
                      alert("Contact IT Department");
                  }
              });
              // account code dropdown
              $.ajax({
                  url: 'api/setup/party_api.php',
                  type: 'POST',
                  data: {action: 'account_code'},
                  dataType: "json",
                  success: function(data){
                      // console.log(data);
                      $('#account_code').html('');
                      $('#account_code').append('<option value="" selected disabled>Select Account</option>');
                      $.each(data, function(key, value){
                          $('#account_code').append('<option data-name="'+value["descr"]+'"  data-code="'+value["account_code"]+'" value="'+value["account_code"]+'">'+value["account_code"]+' - '+value["descr"]+'</option>');
                      });
                      $('#account_code').val(response.gl_code);
                    //   var account_name=$('#account_code').find(':selected').attr("data-name");
                      var account_codes=$('#account_code').find(':selected').attr("data-code");
                      $('#select2-account_code-container').html(account_codes);
                    //   $('#account_name').val(account_name); 
                    },
                  error: function(error){
                      console.log(error);
                      alert("Contact IT Department");
                  }
              });
                $("#ajax-loader").hide();
              //add commas and dot in amount
              var debit=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.open_debit);
              var debit=debit.replace(/[$]/g,'');
              $('#debit').val(debit);
              var credit=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.open_credit);
              var credit=credit.replace(/[$]/g,''); 
              $('#credit').val(credit);

              var debit_18=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.open_debit_2018);
              var debit_18=debit_18.replace(/[$]/g,'');
              $('#debit_18').val(debit_18);
              var credit_18=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.open_credit_2018);
              var credit_18=credit_18.replace(/[$]/g,''); 
              $('#credit_18').val(credit_18);
              
              var entries_debit=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.trs_debit);
              var entries_debit=entries_debit.replace(/[$]/g,'');
              $('#entries_debit').val(entries_debit);
              var entries_credit=new Intl.NumberFormat(
              'en-US', { style: 'currency', 
                currency: 'USD',
              currencyDisplay: 'narrowSymbol'}).format(response.trs_credit);
              var entries_credit=entries_credit.replace(/[$]/g,''); 
              $('#entries_credit').val(entries_credit);;
          
          },
          error: function(e) 
          {
            console.log(e);
            alert("Contact IT Department");
          }
    });
    //update
    $("#party_form").on("submit", function (e) {  
      if ($("#party_form").valid())
      { 
        // $("#ajax-loader").show();
        e.preventDefault();
        var formData = new FormData(this);
       var company_code= $('#company_code').val();
       var control_code= $('#control_code').val();
       var division= $('#division').val();
       var party_code= $('#party_code').val();
        formData.append('company_code',company_code);
        formData.append('control_code',control_code);
        formData.append('division',division);
        formData.append('party_code',party_code);
        formData.append('action','update');
        $.ajax({
                url: 'api/setup/party_api.php',
                type:'POST',
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
                          $.get('setup_files/party_setup.php',function(data,status){
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
      }
    });
});


// breadcrumbs
$('#dashboard_breadcrumb').click(function(){
    $.get('dashboard_main/dashboard_main.php',function(data,status){
        $('#content').html(data);
    });
});
$("#setup_breadcrumb").on("click", function () {
    $.get('setup_files/setup_file.php', function(data,status){
        $("#content").html(data);
    });
});
$("#party_setup_breadcrumb").on("click", function () {
    $.get('setup_files/party_setup.php', function(data,status){
        $("#content").html(data);
    });
});
$("#edit_party_breadcrumb").on("click", function () {
    $.get('setup_files/edit_party.php', function(data,status){
        $("#content").html(data);
    });
});
var $window = $(window),
    $document = $(document),
    button = $('#btn-back-to-top');

button.css({
    opacity: 1
});

$window.on('scroll', function () {
    if (($window.scrollTop() + $window.height()) == $document.height()) {
        button.stop(true).animate({
            opacity:-1
        }, 250);
    } else {
        button.stop(true).animate({
            opacity: 1
        }, 250);
    }
});
</script>
<?php include '../includes/loader.php'?>