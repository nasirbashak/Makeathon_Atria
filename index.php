<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Vyoma Media</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <?php
function is_connected()
{
    $connected = @fsockopen("www.google.com", 443); 
                                        //website, port  (try 80 or 443)
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }
    return $is_conn;

}

if(is_connected()!=null){
    echo '<meta http-equiv="refresh" content="1800">';
}
else{

}

?>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="css/responsive.css" rel="stylesheet">
<!-- 

<?php
//getting current users location
        $user_ip = getenv('REMOTE_ADDR');
         $properIp =substr($user_ip, 2,1);
         
         $testIp="192.168.204.1";
         
         
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$properIp"));
         //$wholeFile = file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip");
        $country = $geo["geoplugin_countryName"];
        $city = $geo["geoplugin_city"];
        
        //echo "<br>city : ";
        //echo $city;
        
        
        $api = "http://api.openweathermap.org/data/2.5/weather?q=";
        
        $apiKey = "&APPID=ad66a8e0b7b81e0c91add019bde3f5d5&units=metric";
        
        $completeUrl = $api.$city.$apiKey;
        
        //echo $completeUrl;
        
        $fileGetData = file_get_contents($completeUrl);
        
        $json = json_decode($fileGetData, true);
    
        //

        //$json = json_decode($fileGetData, true);
        //echo $fileGetData;
        
        //echo "<br>Temperature\n";
        
        //echo $json['main']['temp'];

        //echo "\n\nhai\n\n";


       
        
        
       // echo $geo;
        
        
        //echo $wholeFile;
        
        //echo $country;
        ?>

 -->
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <!--div id="preloader"></div-->



  <!-- Start Testimonials -->
  <div class="testimonials-area">
    <div class="testi-inner area-padding">
      <div class="testi-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- Start testimonials Start -->
            <div class="testimonial-content text-center">
              <!-- start testimonial carousel -->
              <div class="testimonial-carousel">
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      <?php
                        echo "<b>City : </b>";
                        echo "<b>$city</b>";
                        echo "<br>Weather : ";
                        echo $json['weather']['0']['description'];
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Temperature : ";
                        echo $json['main']['temp'];
                        echo "<br>Pressure : ";
                        echo $json['main']['pressure'];
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Humidity : ";
                        echo $json['main']['humidity'];
                      ?>
                    </p>
                  </div>
                </div>
                <!-- End single item -->
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      <?php 
                        $city = "Jaipur";
                        $completeUrl = $api.$city.$apiKey;
                        $fileGetData = file_get_contents($completeUrl);
                        $json = json_decode($fileGetData, true);
                        echo "<b>City : </b>";
                        echo "<b>$city</b>";
                        echo "<br>Weather : ";
                        echo $json['weather']['0']['description'];
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Temperature : ";
                        echo $json['main']['temp'];
                        echo "<br>Pressure : ";
                        echo $json['main']['pressure'];
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Humidity : ";
                        echo $json['main']['humidity'];
                        ?>
                    </p>
                  </div>
                </div>
                <!-- End single item -->
                <div class="single-testi">
                  <div class="testi-text">
                    <p>
                      <?php 
                        $city = "Kolkata";
                        $completeUrl = $api.$city.$apiKey;
                        $fileGetData = file_get_contents($completeUrl);
                        $json = json_decode($fileGetData, true);
                        echo "<b>City : </b>";
                        echo "<b>$city</b>";
                        echo "<br>Weather : ";
                        echo $json['weather']['0']['description'];
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Temperature : ";
                        echo $json['main']['temp'];
                        echo "<br>Pressure : ";
                        echo $json['main']['pressure'];
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Humidity : ";
                        echo $json['main']['humidity'];
                        ?>
                    </p>
                  </div>
                </div>
                <!-- End single item -->
              </div>
            </div>
            <!-- End testimonials end -->
          </div>
          <!-- End Right Feature -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Testimonials -->

  <!-- Start Slider Area -->
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        "<?php $loc = include('xyz.php');?>"
        <img src="<?php echo 'img/'.$finalSelected.'/1.jpg'; ?>" alt="" title="#slider-direction-1" />
        <img src="<?php echo 'img/'.$finalSelected.'/2.jpg'; ?>" alt="" title="#slider-direction-2" />
        <img src="<?php echo 'img/'.$finalSelected.'/3.jpg'; ?>" alt="" title="#slider-direction-3" />
        <img src="<?php echo 'img/'.$finalSelected.'/4.jpg'; ?>" alt="" title="#slider-direction-1" />
        <img src="<?php echo 'img/'.$finalSelected.'/5.jpg'; ?>" alt="" title="#slider-direction-2" />
      </div>
    </div>
  </div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/knob/jquery.knob.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/parallax/parallax.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="lib/appear/jquery.appear.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <!-- Uncomment below if you want to use dynamic Google Maps -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script> -->

  <script src="js/main.js"></script>

  <script type="text/javascript">
    $(document).ready(function () {
    // Handler for .ready() called.
    $('html, body').animate({
        scrollTop: $('#home').offset().top
    }, 'slow');
});
  </script>

</body>

</html>
