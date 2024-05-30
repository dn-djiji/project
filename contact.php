<?php

include_once "db/conn.php";


?>


<!DOCTYPE html>
<html lang="fr" >

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


</head>

<body class="page-contact" onload="getLocation()" >

  <!-- ======= Header ======= -->
  <?php include_once "structure/header.php"; ?>
  

<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
              




  <script src="js/jquery.js"></script>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/contact-header.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>اتصل بنا</h2>
       

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container position-relative" data-aos="fade-up">

      
            <b> يمكن مراسلة صاحب الموقع من هنا.</b>
            <hr>
      
        <div class="row gy-4 d-flex justify-content-end">

       



<script>
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } 
}
function showPosition(position) {
  const latitude = document.querySelector('#latitude').value = position.coords.latitude;
  const longitude = document.querySelector('#longitude').value =position.coords.longitude ;
}
getLocation()

</script>



   
        
          <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">

            <div class="info-item d-flex">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h4>الموقع:</h4>
                <p>عنابة , وسط المدينة.</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h4>البريد الالكتروني:</h4>
                <p>info@example.com</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex">
              <i class="bi bi-phone flex-shrink-0"></i>
              <div>
                <h4>رقم الهاتف:</h4>
                <p>+1 5589 55488 55</p>
              </div>
            </div><!-- End Info Item -->

          </div>
         
         
       

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
          <div id="error" class="alert alert-success alert-dismissible fade show w-80" role="alert"></div>
          
              <div class="php-email-form">
              <input type="hidden" name="latitude" value="" id="latitude">
              <input type="hidden" name="longitude" value="" id="longitude">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="fulname" class="form-control" id="fulname" placeholder="الاسم الكامل" >
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="البريد الالكتروني" >
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="الموضوع" >
              </div>





              <div class="form-group mt-3">
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="الرسالة" ></textarea>
              </div>

             

          
             
              <div class="text-center"><button type="submit" id="send" name="submit" >ارسال</button>
              <br> <br>
              <div class="spinner-border text-primary" id="loader" role="status"><span class="sr-only"></span></div>

              
              
              
            </div>
              
           
            </div>
          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->

<script>
  $(document).ready(function(){
    $("#loader").hide();
    $("#error").hide();
    $("#send").click(function(){
      let latitude = $("#latitude").val();
      let longitude = $("#longitude").val();
      let fulname = $("#fulname").val();
      let email = $("#email").val();
      let subject = $("#subject").val();
      let message = $("#message").val();
        $.ajax({
          url : "ajax/contact.php",
          type: "POST",
          data:{
            latitude:latitude,
            longitude:longitude,
            fulname:fulname,
            email:email,
            subject:subject,
            message:message, 
          },
          beforeSend:function(){
            $("#loader").show()
          },
          complete:function(){
            $("#loader").hide(); 
          },
          cache:false,    
          success: function(response){
            if(response == "تم ارسال الرسالة شكرا لك ."){
              $("#loader").show();
              $("#error").show().html(response);
            }else {
              $("#error").show().html(response);
            }
					}
        })  
        return false;
    })
  })
</script>









  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include_once "structure/footer.php"; ?>
  <!-- End Footer --><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>