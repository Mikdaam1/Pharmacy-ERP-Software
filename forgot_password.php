<?php 
// ob_start();
// ob_clean();
// session_start();
// if(isset($_SESSION['data'])){
//   header('location:dashboard.php');die();
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHARMACY | ERP</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<style>
body{
  background-image: url(docs/assets/img/login_bg.jpg);
  background-repeat:no-repeat;
  background-size:cover;
}
</style>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  <img src="docs/assets/img/logo.png" alt="logo" style="max-width: -webkit-fill-available;">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

      <form id="forgot_password_form" method="post">
      <?php include 'display_message/display_message.php'?>
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Request new password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="index.php">Login</a>
      </p>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script type="text/javascript">
  
  $(document).ready(function (e) {
   $("#forgot_password_form").on('submit',(function(e) {
    e.preventDefault();     
    var formData = new FormData(this);
    $.ajax({
      url: "api/forgot_password/forgot_password_api.php",
      type: "POST",
      data:  formData,
      contentType: false,
      cache: false,
      processData:false,
      beforeSend : function()
      {
      },
      success: function(response)
      {
        if(response){
          var message = response.message
          var status = response.status
          $.ajax({
            url: "api/message_session/message_session.php",
            type: 'POST',
            data: {message:message,status:status},
            success: function (response) {
              location.reload();
            },
            error: function(e) 
            {
              console.log(e);
              alert("Contact IT Department");
            }   
          })
        }
      },
      error: function(e) 
      {
        console.log(e);
        alert("Contact IT Department");
      }          
    });
   }));
  });
</script>
</body>
</html>