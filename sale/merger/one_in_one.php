<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Customer CNIC Check</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="merger_breadcrumb">Merger</button></li>
                  <li class="breadcrumb-item"><button class="btn btn-sm" id="dashboard_breadcrumb"> <i class="fas fa-tachometer-alt"></i></li>
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
                        <div class="card mt-3">
                            <div class="card-body container">
                                <form method="post" id="CheckCnicForm">
                                    <?php include '../../display_message/display_message.php'?>
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label for="">Enter Customer CNIC Number :<span style="color:red">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                                </div>
                                                <input type="text" name = "cnic_no" id="cnic_number" placeholder="xxxxx-xxxxxxx-x" value="" class="form-control form-control-sm" data-inputmask="&quot;mask&quot;: &quot;99999-9999999-9&quot;" data-mask="" inputmode="text">
                                            </div>
                                            <div class="row">
                                                <div style="text-align: center;">
                                                    <span id="msg" style="color: red;font-size: 13px;"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary" id="add"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <div class="card mt-3" id="category_div" style="display:none">
                            <div class="card-body container">
                                <form method="post" id="unit_type_Form">
                                    <?php include '../../display_message/display_message.php'?>
                                    <div class="row">
                                        <div class="col-sm-12 form-group">
                                            <label for="">Select Unit Category Type :<span style="color:red">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                                </div>
                                                <select name="unit_type" id="unit_type" class="form-control"></select>
                                            </div>
                                            <div class="row">
                                                <div style="text-align: center;">
                                                    <span id="msg" style="color: red;font-size: 13px;"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card mt-3" id="forms_div" style="display:none">
                            <div class="card-body">
                                <form method="post" id="merge_form">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="card card-success">
                                                <div class="card-header">
                                                    <h3 class="card-title">Want To Dispatch</h3>
                                                </div>
                                                <div class="card-body">
                                                    <!-- radio -->
                                                    <div class="form-group clearfix radiodispatchDiv">
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <h1 class="text-center">&rarr;</h1>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="card card-success">
                                                <div class="card-header">
                                                    <h3 class="card-title">Want To Merge With</h3>
                                                </div>
                                                <div class="card-body">
                                                    <!-- radio -->
                                                    <div class="form-group clearfix radiomergeDiv">
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <span id="error_msg" style="color: red;font-size: 13px;"></span>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary" id="merge_form_btn"><i class="fa fa-refresh"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      <!-- /.content -->
    </div>

<!-- Model for Detail Quater -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
    role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Merger Detail</h5>
                <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card-body">
                
                <form id="merger_form">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <h5><u>Dissolve File:</u> </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group"> 
                            <label for="">Form No : </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                            <input type="number" class="form-control" id="dissolved_formno" name="dissolved_formno" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 form-group"> 
                            <label for="">Paid Amount : </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="number" class="form-control" id="dissolved_amount" name="dissolved_amount" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 form-group"> 
                            <label for="">Paid Quarters : </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="number" class="form-control" id="dissolved_quarter" name="dissolved_quarter" readonly>
                            </div>
                        </div>
                        <hr>
                    </div><hr style="color:black">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <h5><u>Merge File:</u> </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group"> 
                            <label for="">Form No : </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                            <input type="number" class="form-control" id="merger_formno" name="merger_formno" readonly>
                            </div>
                        </div>
                        <div class="col-md-3 form-group"> 
                            <label for="">Unpaid Amount : </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="number" class="form-control" id="merger_amount" name="merger_amount" readonly>
                            </div>
                        </div>
                        <div class="col-md-3 form-group"> 
                            <label for="">Unpaid Quarters : </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                            <input type="number" class="form-control" id="merger_unpaidquarter" name="merger_unpaidquarter" readonly>
                            </div>
                        </div>
                        <div class="col-md-3 form-group"> 
                            <label for=""> Pay Quarters : </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                            <input type="number" class="form-control" id="merger_paidquarter" name="merger_paidquarter" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <span id="error_msg1" style="color: red;font-size: 13px;"></span>
                    </div>
                    <div class="modal-body">
                        <div class="modal-footer justify-content-between">  
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            <button type="submit" class="btn btn-primary" id="merger_form_btn"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show" id="backdrop" style="display: none;"></div>
<script>
$(document).ready(function () {
    // Form Validations

    $(":input").inputmask();


    $(function () {
        $.validator.setDefaults({
            submitHandler: function () {
            // alert( "Form successful submitted!" );
            }
        });
        $('#CheckCnicForm').validate({
            rules: {
                cnic_no: {
                    required: true,
                    // minlength: true
                }
            },

            messages: {
                cnic_no: {
                    minlength: "Cnic should be at least 13 characters"
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

    
    // ****************
    $("#CheckCnicForm").on("submit", function(e) {
            $('#forms_div').css('display', 'none');
            $('#unit_type').html('');
            $('.radiodispatchDiv').html('');
            $('.radiomergeDiv').html('');
            $("#msg").html('');
            $("#error_msg").html('');
            e.preventDefault();
            let cnic_no = $('#cnic_number').val();
            let request = $(this).serialize();
            cnic_no = cnic_no.replace(/-/g,'');
            if (cnic_no.length != 13) {
                $('#forms_div').css('display', 'none');
                $("#msg").html('ERROR ! Cnic Number Should Have 13 Characters');
            }else{
                if ($("#CheckCnicForm").valid()) {
                    $("#ajax-loader").show();
                    
                    $.ajax({
                        url: 'api/sales/merger/merger_api.php',
                        type:'POST',
                        data: {action:'get_unit_types',cnic_no:cnic_no},
                        success: function(response)
                        {
                            console.log(response);
                            $("#ajax-loader").hide();
                            $('#category_div').css('display', '');
                            $('#unit_type').append($('<option disabled selected>Choose Option</option>'));
                            for (var i=0; i<response.length; i++) {
                                $('#unit_type').append($('<option>', {  
                                    value: response[i].TYPE_ID,
                                    text : response[i].DESCRIPTION
                                }));
                            }
                        },
                        error: function(e){
                            console.log(e);
                            alert("Contact IT Department");
                        }
                    });
                }
            }
    });

    $('#unit_type').on("change", function(){
        console.log("1");
        $('.radiodispatchDiv').html('');
        $('.radiomergeDiv').html('');
        let unit_type = $(this).val();
        let cnic_no = $('#cnic_number').val();
        cnic_no = cnic_no.replace(/_/g,'');
        $("#ajax-loader").show();
        $.ajax({
            url: 'api/sales/merger/merger_api.php',
            type: 'POST',
            dataType: "json",
            data: {action:'cnic_form_numbers',unit_type:unit_type,cnic_no:cnic_no},
            success: function(response){
                console.log(response);
                $("#ajax-loader").hide();
                if(response == ''){
                    $('#forms_div').css('display', 'none');
                    $("#msg").html('Data Not Found. Try another cnic number');
                }else{
                    $('#forms_div').css('display', '');
                    
                    for (var i=0; i<response.length; i++) {
                        console.log("kk");
                        // var j = i+'+1';s
                        $('.radiodispatchDiv').append('<div class="icheck-danger"><input type="radio" id="radiodispatch'+i+'" name="radiodispatch" data-cus-id="'+response[i].CUS_ID+'" data-id="'+response[i].SALE_ID+'" value="'+response[i].FORM_NO+'"><label for="radiodispatch'+i+'">'+response[i].FORM_NO+'</label></div>');
                    }
                    
                    for (var i=0; i<response.length; i++) {
                        // var j = i+'+1';
                        $('.radiomergeDiv').append('<div class="icheck-primary"><input type="radio" id="radiomerge'+i+'" name="radiomerge" data-cus-id="'+response[i].CUS_ID+'" data-id="'+response[i].SALE_ID+'" value="'+response[i].FORM_NO+'"><label for="radiomerge'+i+'">'+response[i].FORM_NO+'</label></div>');
                    }
                }
                
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });   
    });
    
    // ****************
    $("#merge_form").on("submit", function(e) {
            $("#error_msg").html('');
            e.preventDefault();
            var ck_dissolved_form = $('input[name=radiodispatch]:checked').length;
            var ck_merge_form = $('input[name=radiomerge]:checked').length;
            if(ck_dissolved_form < 1){
                $("#error_msg").text("please check at least one file in dispatch section");
            }else if(ck_merge_form < 1){
                $("#error_msg").text("please check at least one file in merge section");
            }else{
                var dissolved_form = $('input[name=radiodispatch]:checked').val();
                var merge_form = $('input[name=radiomerge]:checked').val();
                var dissolved_sale_id = $('input[name=radiodispatch]:checked').attr("data-id");
                var merge_sale_id = $('input[name=radiomerge]:checked').attr("data-id");
                var cus_id = $('input[name=radiomerge]:checked').attr("data-cus-id");
                let action = 'one_in_one_submit';
                if (dissolved_form == merge_form) {
                    $("#error_msg").text("ERROR ! Form numbers sholud be different.");
                }else if (confirm('Are you sure, you want to merge "'+dissolved_form+'" to "'+merge_form+'" ?')){

                    // var merge_form = $('input[name=radiomerge]:checked').val();
                        let action = 'get_record_of_one_in_one';
                        $("#ajax-loader").show();
                        
                        $.ajax({
                            url: 'api/sales/merger/merger_api.php',
                            type: 'POST',
                            data: {action:action,dissolved_form:dissolved_form,merge_form:merge_form,dissolved_sale_id:dissolved_sale_id,merge_sale_id:merge_sale_id,cus_id:cus_id},
                            success: function(response){
                                // var a=response.DISSOLVED_PAID_QUARTER;
                                console.log(response);
                                var merger_quarter=response.merger_quarter;
                                $('#dissolved_formno').val(dissolved_form);
                                $('#dissolved_quarter').val(response.disolved_quarter);
                                $('#dissolved_amount').val(response.disolved_amount);
                                $('#merger_formno').val(response.merge_form);
                                $('#merger_unpaidquarter').val(merger_quarter);
                                $('#merger_paidquarter').val(response.disolved_quarter);
                                $('#merger_amount').val(response.merger_amount);
                                $('#merger_paidquarter').attr('max',merger_quarter);
                                $('#exampleModal1').modal('show');
                                $("#ajax-loader").hide();
                            },
                            error: function(error) {
                                console.log(error);
                                alert("Contact IT Department");
                            }
                        });

                    // $("#ajax-loader").show();
                    // $('#merge_form_btn').css('pointer-events','');
                    // $('#merge_form_btn').find($(".fa")).removeClass('fa-refresh').addClass('fa-spin fa-refresh');
                    // $.ajax({
                    //     url: 'api/sales/merger/merger_api.php',
                    //     type: 'POST',
                    //     data: {action:action,dissolved_form:dissolved_form,merge_form:merge_form,dissolved_sale_id:dissolved_sale_id,merge_sale_id:merge_sale_id},
                    //     success: function(response){
                    //         console.log(response);
                    //         printChallan(response.mid);
                    //         var message = response.message;
                    //         var status = response.status;
                    //         $.ajax({
                    //             url: "api/message_session/message_session.php",
                    //             type: 'POST',
                    //             data: {message:message,status:status},
                    //             success: function (response) {
                    //                     $("#ajax-loader").hide();
                    //                     $('#merge_form_btn').css('pointer-events','');
                    //                     $('#merge_form_btn').find($(".fa")).removeClass('fa-spin fa-refresh').addClass('fa-refresh');
                    //                     $.get('sale/merger/one_in_one.php',function(data,status){
                    //                         $('#content').html(data);
                    //                     });
                    //             },
                    //             error: function(e) 
                    //             {
                    //                 console.log(e);
                    //                 alert("Contact IT Department");
                    //             }   
                    //         });
                    //     },
                    //     error: function(error) {
                    //         console.log(error);
                    //         alert("Contact IT Department");
                    //     }
                    // });
                }else{
                    return false;
                }
            }
    });

    // ****************
    $("#merger_form").on("submit", function(e) {
            $("#error_msg1").html('');
            e.preventDefault();

            var dissolved_quarter = $('#dissolved_quarter').val();
            var merger_unpaidquarter = $('#merger_unpaidquarter').val();
            var merger_paidquarter = $('#merger_paidquarter').val();
            var dissolved_form = $('#dissolved_formno').val();
            var merger_formno = $('#merger_formno').val();
            var dissolved_amount = $('#dissolved_amount').val();
            var merger_amount = $('#merger_amount').val();
            var dissolved_sale_id = $('input[name=radiodispatch]:checked').attr("data-id");
            var merge_sale_id = $('input[name=radiomerge]:checked').attr("data-id");
            var cus_id = $('input[name=radiomerge]:checked').attr("data-cus-id");

            if(dissolved_quarter < 1){
                $("#error_msg1").text("Dissolve file quarter must be equal or greater then 1");
            }else if(parseInt(dissolved_quarter) != parseInt(merger_paidquarter)){
                $("#error_msg1").text("Pay quarters total must be equal to "+dissolved_quarter);
            }else if(parseInt(merger_unpaidquarter) < parseInt(merger_paidquarter)){
                $("#error_msg1").text("Pay quarter must be equal or less then "+merger_unpaidquarter+" of "+merger_formno);
            }else if(parseInt(merger_amount) < parseInt(dissolved_amount)){
                $("#error_msg1").text("Pay quarter amount must be equal or less then "+merger_amount+" of "+merger_formno);
            }else{
                let action = 'one_in_one_submit';
                $("#ajax-loader").show();
                $("#merger_form_btn").css('pointer-events','none');
                $("#merger_form_btn").find($(".fa")).removeClass('fa-plus').addClass('fa-spin fa-refresh');
                
                $.ajax({
                    url: 'api/sales/merger/merger_api.php',
                    type: 'POST',
                    data: {action:action,dissolved_quarter:dissolved_quarter,merger_paidquarter:merger_paidquarter,dissolved_form:dissolved_form,merger_formno:merger_formno,dissolved_sale_id:dissolved_sale_id,merge_sale_id:merge_sale_id,dissolved_amount:dissolved_amount,merger_amount:merger_amount,cus_id:cus_id},
                    success: function(response){
                        console.log(response);
                        printChallan(response.mid);
                        var message = response.message;
                        var status = response.status;
                        $.ajax({
                            url: "api/message_session/message_session.php",
                            type: 'POST',
                            data: {message:message,status:status},
                            success: function (response) {
                                    $("#ajax-loader").hide();
                                    $('#merge_form_btn').css('pointer-events','');
                                    $('#merge_form_btn').find($(".fa")).removeClass('fa-spin fa-refresh').addClass('fa-plus');
                                    $.get('sale/merger/one_in_one.php',function(data,status){
                                        $('#content').html(data);
                                        $('#exampleModal1').modal('hide');
                                        $('#exampleModal1 input').trigger("reset");
                                        $(".modal-backdrop").remove();
                                        $('body').removeClass('modal-open');
                                    });
                            },
                            error: function(e) 
                            {
                                console.log(e);
                                alert("Contact IT Department");
                            }   
                        });
                    },
                    error: function(error) {
                        console.log(error);
                        alert("Contact IT Department");
                    }
                });
            }
    });
    //  Print Challan Fucntion 
    function printChallan(mid) {
        let action = 'get_invoice';
        $.ajax({
            url: 'api/sales/merger/merger_api.php',
            type: 'POST',
            data: "&action="+action + "&mid="+mid,
            dataType: "json",
            success: function(response){
                console.log(response);
                console.log(response.TRNO);
                let invoice_url = "invoicereports/merger_fees_challan.php?action=invoice_generate&tr_no="+response.TRNO;
                window.open(invoice_url, '_blank');
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });
    }

    // breadcrumbs
    $('#dashboard_breadcrumb').click(function(){
        $.get('dashboard_main/dashboard_main.php',function(data,status){
            $('#content').html(data);
        });
    });
    $("#merger_breadcrumb").on("click", function() {
        $.get('sale/merger/merger.php', function(data,status){
            $("#content").html(data);
        });
    });
});
</script>
<?php include '../../includes/loader.php'?>