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
                                <form method="post" id="CheckCnicForm">
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
                                                    <h3 class="card-title">Want To Merge</h3>
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
                                        <button type="submit" class="btn btn-primary" id="merge_form"><i class="fa fa-refresh"></i></button>
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
                            <input type="number" class="form-control" id="formno_1" name="formno_1" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 form-group"> 
                            <label for="">Paid Amount : </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                            <input type="number" class="form-control" id="paid_amount_1" name="paid_amount_1" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 form-group"> 
                            <label for="">Paid Quarters : </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                            <input type="number" class="form-control" id="paidquarter_1" name="paidquarter_1" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group"> 
                            <label for="">Form No : </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                            <input type="number" class="form-control" id="formno_2" name="formno_2" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 form-group"> 
                            <label for="">Paid Amount : </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                            <input type="number" class="form-control" id="paid_amount_2" name="paid_amount_2" readonly>
                            </div>
                        </div>
                        <div class="col-md-4 form-group"> 
                            <label for="">Paid Quarters : </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                            <input type="number" class="form-control" id="paidquarter_2" name="paidquarter_2" readonly>
                            </div>
                        </div>
                    </div>
                    
                    <hr style="color:black">
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
                            <input type="number" class="form-control" id="formno_s" name="formno_s" readonly>
                            </div>
                        </div>
                        <div class="col-md-3 form-group"> 
                            <label for="">Unpaid Amount : </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                            <input type="number" class="form-control" id="unpaid_amount_s" name="unpaid_amount_s" readonly>
                            </div>
                        </div>
                        <div class="col-md-3 form-group"> 
                            <label for="">Unpaid Quarters : </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                            <input type="number" class="form-control" id="unpaidquarter_s" name="unpaidquarter_s" readonly>
                            </div>
                        </div>
                        <div class="col-md-3 form-group"> 
                            <label for=""> Paid Quarters : </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                            <input type="number" class="form-control" id="paidquarter_s" name="paidquarter_s">
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
    // $("#CheckCnicForm").on("submit", function(e) {
    //         $('.radiodispatchDiv').html('');
    //         $('.radiomergeDiv').html('');
    //         $("#msg").html('');
    //         $("#error_msg").html('');
    //         e.preventDefault();
    //         let cnic_no = $('#cnic_number').val();
    //         let request = $(this).serialize();
    //         let action = 'cnic_form_numbers';
    //         cnic_no = cnic_no.replace(/-/g,'');
    //         cnic_no = cnic_no.replace(/_/g,'');
    //         if (cnic_no.length != 13) {
    //             $('#forms_div').css('display', 'none');
    //             $("#msg").html('ERROR ! Cnic Number Should Have 13 Characters');
    //         }else{
    //             if ($("#CheckCnicForm").valid()) {
    //                 $("#ajax-loader").show();
    //                 $.ajax({
    //                     url: 'api/sales/merger/merger_api.php',
    //                     type: 'POST',
    //                     dataType: "json",
    //                     data: request + "&action="+action,
    //                     success: function(response){
    //                         console.log(response);
    //                         $("#ajax-loader").hide();
    //                         if(response == ''){
    //                             $('#forms_div').css('display', 'none');
    //                             $("#msg").html('Data Not Found. Try another cnic number');
    //                         }else{
    //                             $('#forms_div').css('display', '');
    //                             $('#country_id').empty();
                                
    //                             for (var i=0; i<response.length; i++) {
    //                                 // console.log("kk");
    //                                 // var j = i+'+1';s
    //                                 $('.radiomergeDiv').append('<div class="icheck-danger"><input type="radio" id="radiomerge'+i+'" name="radiomerge" data-id="'+response[i].SALE_ID+'" value="'+response[i].FORM_NO+'"><label for="radiomerge'+i+'">'+response[i].FORM_NO+'</label></div>');
    //                             }
                                
    //                             for (var i=0; i<response.length; i++) {
    //                                 // console.log("kk");
    //                                 // var j = i+'+1';
    //                                 $('.radiodispatchDiv').append('<div class="icheck-primary"><input type="checkbox" id="radiodispatch'+i+'" name="radiodispatch" data-id="'+response[i].SALE_ID+'" value="'+response[i].FORM_NO+'"><label for="radiodispatch'+i+'">'+response[i].FORM_NO+'</label></div>');
    //                             }
    //                         }
                            
    //                     },
    //                     error: function(error) {
    //                         console.log(error);
    //                         alert("Contact IT Department");
    //                     }
    //                 });   
    //             }
    //         }
    // });
    
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
            cnic_no = cnic_no.replace(/_/g,'');
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
                        // console.log("kk");
                        // var j = i+'+1';s
                        $('.radiomergeDiv').append('<div class="icheck-danger"><input type="radio" id="radiomerge'+i+'" name="radiomerge" data-cus-id="'+response[i].CUS_ID+'" data-id="'+response[i].SALE_ID+'" value="'+response[i].FORM_NO+'"><label for="radiomerge'+i+'">'+response[i].FORM_NO+'</label></div>');
                    }
                    
                    for (var i=0; i<response.length; i++) {
                        // console.log("kk");
                        // var j = i+'+1';
                        $('.radiodispatchDiv').append('<div class="icheck-primary"><input type="checkbox" id="radiodispatch'+i+'" name="radiodispatch" data-cus-id="'+response[i].CUS_ID+'" data-id="'+response[i].SALE_ID+'" value="'+response[i].FORM_NO+'"><label for="radiodispatch'+i+'">'+response[i].FORM_NO+'</label></div>');
                    }
                }
                
            },
            error: function(error) {
                console.log(error);
                alert("Contact IT Department");
            }
        });   
    });

    //checkbox enable or disable
    $('.radiodispatchDiv').on('click','input[type=checkbox]',function(){
        var radiodispatch_length = $('input[name=radiodispatch]:checked').length;
        console.log(radiodispatch_length);
        if(radiodispatch_length == 2){
            $('input[name=radiodispatch]:not(:checked)').attr('disabled', true);
        }else{
            $('input[name=radiodispatch]').removeAttr('disabled');
        }
    });

    // ****************
    $("#merge_form").on("submit", function(e) {
            $("#error_msg").html('');
            e.preventDefault();
            var ck_dispatch_form = $('input[name=radiodispatch]:checked').length;
            var ck_merge_form = $('input[name=radiomerge]:checked').length;
            var merge_form = $('input[name=radiomerge]:checked').val();
            var cus_id = $('input[name=radiomerge]:checked').attr("data-cus-id");
    
            var dispatch_form = $('input[name=radiodispatch]:checked').map(function()
            {
                return $(this).val();
            }).get();
            if(ck_dispatch_form < 1){
                $("#error_msg").text("please check at least one file in dispatch section");
            }else if(ck_dispatch_form != 2){
                $("#error_msg").text("please check 2 files in dispatch section");
            }else if( $.inArray(merge_form,dispatch_form) > -1 ) {
                    $("#error_msg").text("ERROR ! Form numbers sholud be different.");
            }else{

                // var merge_form = $('input[name=radiomerge]:checked').val();
                let action = 'get_record_of_two_in_one';
                if (confirm('Are you sure, you want to merge "'+dispatch_form+'" to "'+merge_form+'" ?')){
                    $("#ajax-loader").show();
                    $.ajax({
                        url: 'api/sales/merger/merger_api.php',
                        type: 'POST',
                        data: {action:action,dispatch_form:dispatch_form,merge_form:merge_form,cus_id:cus_id},
                        success: function(response){
                            // var a=response.DISSOLVED_PAID_QUARTER;
                            console.log(response);
                            // var disolved_paid_quarter2=response.disolved_paid_quarter2;
                            // var merger_remaining_quarter=response.merger_remaining_quarter;
                            $('#formno_1').val(response.form_no1);
                            $('#formno_2').val(response.form_no2);
                            $('#formno_s').val(response.merge_form_no);
                            $('#paidquarter_1').val(response.disolved_paid_quarter1);
                            $('#paidquarter_2').val(response.disolved_paid_quarter2);
                            $('#unpaidquarter_s').val(response.merger_remaining_quarter);
                            $('#paid_amount_1').val(response.disolved_paid_amount1);
                            $('#paid_amount_2').val(response.disolved_paid_amount2);
                            $('#unpaid_amount_s').val(response.merger_unpaid_amount);
                            $("#ajax-loader").hide();
                            $('#exampleModal1').modal('show');

                            $('#paidquarter_s').attr('max',response.merger_remaining_quarter);
                            // $('#paidquarter_sm').attr('max',merger_remaining_quarter2);
                            // $('#unpaidquarter_s').val(merger_remaining_quarter1);
                            // $('#formno_sm').val(response.form_no2);
                            // $('#unpaidquarter_sm').val(merger_remaining_quarter2); 
                            // $("#ajax-loader").hide();
                            
                        },
                        error: function(error) {
                            console.log(error);
                            alert("Contact IT Department");
                        }
                    });
                }else{
                    return false;
                }
            }
    });

    //submit merge form
    
    $("#merger_form").on("submit", function(e) {
            $("#error_msg1").html('');
            e.preventDefault();

            var formno_1 = $('#formno_1').val();
            var formno_2 = $('#formno_2').val();
            var formno_s = $('#formno_s').val();
            var paidquarter_1 = $('#paidquarter_1').val();
            var paidquarter_2 = $('#paidquarter_2').val();
            var unpaidquarter_s = $('#unpaidquarter_s').val();
            var paidquarter_s = $('#paidquarter_s').val();
            var paid_amount_1 = $('#paid_amount_1').val();
            var paid_amount_2 = $('#paid_amount_2').val();
            var unpaid_amount_s = $('#unpaid_amount_s').val();
            var cus_id = $('input[name=radiomerge]:checked').attr("data-cus-id");

            var merge_sale_id = $('input[name=radiomerge]:checked').attr("data-id");
            
            var dissolved_sale_ids = $('input[name=radiodispatch]:checked').map(function()
            {
                return $(this).attr("data-id");
            }).get();
            var total_paidquarter = parseInt(paidquarter_1) + parseInt(paidquarter_2);
            if(paidquarter_s != total_paidquarter){
                $("#error_msg1").text("Pay quarters total must be equal to "+total_paidquarter);
            }else if(parseInt(unpaidquarter_s) < parseInt(paidquarter_s)){
                $("#error_msg1").text("Pay quarter must be equal or less then "+unpaidquarter_s+" of "+formno_s);
            }else{
                let action = 'two_in_one_submit';
                $("#ajax-loader").show();
                $("#merger_form_btn").css('pointer-events','none');
                $("#merger_form_btn").find($(".fa")).removeClass('fa-plus').addClass('fa-spin fa-refresh');
                
                $.ajax({
                    url: 'api/sales/merger/merger_api.php',
                    type: 'POST',
                    data: {action:action,paidquarter_1:paidquarter_1,paidquarter_2:paidquarter_2,formno_1:formno_1,formno_2:formno_2,unpaidquarter_s:unpaidquarter_s,formno_s:formno_s,paidquarter_s:paidquarter_s,dissolved_sale_ids:dissolved_sale_ids,merge_sale_id:merge_sale_id,paid_amount_1:paid_amount_1,paid_amount_2:paid_amount_2,unpaid_amount_s:unpaid_amount_s,cus_id:cus_id},
                    success: function(response){
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
                                    $.get('sale/merger/two_in_one.php',function(data,status){
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