<?php

session_start();

$name = $_SESSION['patient_name'];

?>
<html>
<head>
<title>My Profile | CareVista Superspeciality Hospital</title>
<link rel = "icon" href = "IMAGES/img1/logo.png" type = "image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/patient_my_profile.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"/>
  <!-- Bootstrap Font Icon CSS -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
  />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
</head>
<body>
  <?php include 'includes/patient_navbar.php';?>
  <div class="profile-photo-id-mail">
    <div class="profile-photo">
    <form method="post" action="" enctype="multipart/form-data" id="myform">
        <div class='preview'>
          <img src="" id="img" width="100" height="100">
        </div>
        <div>
          <input type="file" id="file" name="file" />
          <input type="button" class="button" value="Upload" id="but_upload">
        </div>
      </form>
    </div>
    <div class="profile-id-mail"></div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){

    $("#but_upload").click(function(){
      var fd = new FormData();
      var files = $('#file')[0].files[0];
      fd.append('file',files);
      $.ajax({
              url: 'upload.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                if(response != 0){
                    $("#img").attr("src",response); 
                    $(".preview img").show(); // Display image element
                }else{
                    alert('file not uploaded');
                  }
                }
            });
        });
    });
  </script>
</body>
</html>