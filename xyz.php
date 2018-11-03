<?php

$cat1 = null;
$val1 = 0;
$cat2 = null;
$val2 = 0;
$cat3 = null;
$val3 = 0;
$cat4 = null;
$val4 = 0;
$cat5 = null;
$val5 = 0;

function cloudsProperty($cloudsProperty) {



    if ($cloudsProperty == "clouds") {

        $clouds1 = array("Rainy" => 0.6, "Winter" => 0.3, "Summer" => 0.1, "Spring" => 0.2);
    } else if ($cloudsProperty == "mist") {
        $clouds1 = array("Rainy" => .02, "Winter" => 0.6, "Summer" => 0.1, "Spring" => 0.3);
    } else if ($cloudsProperty == "clear") {
        $clouds1 = array("Rainy" => .01, "Winter" => 0.2, "Summer" => 0.6, "Spring" => 0.3);
    } else {
        $clouds1 = array("Rainy" => .01, "Winter" => 0.2, "Summer" => 0.6, "Spring" => 0.3);
    }
    global $val1;
    global $cat1;
    foreach ($clouds1 as $key => $val) {

        if ($val > $val1) {
            $val1 = $val;
            $cat1 = $key;
        }
    }
}

function temperatureProperty($temp) {


    if ($temp > 5 && $temp <= 20) {

        $temperature1 = array("Rainy" => 0.2, "Winter" => 0.6, "Summer" => 0.1, "Spring" => 0.3);
    } else if ($temp > 20 && $temp <= 50) {

        $temperature1 = array("Rainy" => 0.3, "Winter" => 0.1, "Summer" => 0.6, "Spring" => 0.2);
    } else {
        echo "Temperature out of range";
    }

    global $val2;
    global $cat2;
    foreach ($temperature1 as $key => $val) {

        if ($val > $val2) {
            $val2 = $val;
            $cat2 = $key;
        }
    }
}

function humidity($humid) {

    if ($humid >= 100) {

        $humidity1 = array("Rainy" => 0.3, "Winter" => 0.6, "Summer" => 0.1, "Spring" => 0.2);
    } else if ($humid >= 50 && $humid < 100) {

        $humidity1 = array("Rainy" => 0.2, "Winter" => 0.5, "Summer" => 0.2, "Spring" => 0.3);
    } else if ($humid >= 10 && $humid < 50) {
        $humidity1 = array("Rainy" => 0.1, "Winter" => 0.2, "Summer" => 0.6, "Spring" => 0.3);
    } else {

        echo "Humidity out of range";
    }

    global $val3;
    global $cat3;
    foreach ($humidity1 as $key => $val) {

        if ($val > $val3) {
            $val3 = $val;
            $cat3 = $key;
        }
    }
}

function visibility($visible) {

    if ($visible >= 10000) {

        $visibility1 = array("Rainy" => 0.2, "Winter" => 0.1, "Summer" => 0.6, "Spring" => 0.3);
    } else if ($visible >= 5000 && $visible < 10000) {

        $visibility1 = array("Rainy" => 0.2, "Winter" => 0.2, "Summer" => 0.3, "Spring" => 0.3);
    } else if ($visible >= 10 && $visible < 5000) {
        $visibility1 = array("Rainy" => 0.2, "Winter" => 0.4, "Summer" => 0.1, "Spring" => 0.3);
    } else {

        echo "visibility out of range";
    }

    global $val4;
    global $cat4;

    foreach ($visibility1 as $key => $val) {

        if ($val > $val4) {
            $val4 = $val;
            $cat4 = $key;
        }
    }
}

function windSpeed($speed) {

    if ($speed <= 2.5) {

        $visibility1 = array("Rainy" => 0.2, "Winter" => 0.6, "Summer" => 0.1, "Spring" => 0.3);
    } else if ($speed > 2.5 && $speed <= 4) {

        $visibility1 = array("Rainy" => 0.1, "Winter" => 0.3, "Summer" => 0.1, "Spring" => 0.6);
    } else if ($speed > 4 && $speed < 10) {
        $visibility1 = array("Rainy" => 0.2, "Winter" => 0.3, "Summer" => 0.5, "Spring" => 0.4);
    } else {

        echo "windSpeed out of range";
    }

    global $val5;
    global $cat5;
    foreach ($visibility1 as $key => $val) {

        if ($val > $val5) {
            $val5 = $val;
            $cat5 = $key;
        }
    }
}

//weather data

$user_ip = getenv('REMOTE_ADDR');
$properIp = substr($user_ip, 2, 1);

$testIp = "192.168.204.1";


$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$properIp"));

$country = $geo["geoplugin_countryName"];
$city = $geo["geoplugin_city"];


$api = "http://api.openweathermap.org/data/2.5/weather?q=";

$apiKey = "&APPID=ad66a8e0b7b81e0c91add019bde3f5d5&units=metric";

$completeUrl = $api . $city . $apiKey;



$fileGetData = file_get_contents($completeUrl);

$json = json_decode($fileGetData, true);

$indiaLat = $json['coord']['lat'];
$indiaLong = $json['coord']['lon'];

//var_dump($indiaLong);

$clouds = $json['weather'][0]['main'];
$temp = $json['main']['temp'];
$humidity = $json['main']['humidity'];
//$visibility = $json['visibility'];
$windSpeed = $json['wind']['speed'];
$countryCode = $json['sys']['country'];
$sunRiseInSec = $json['sys']['sunrise'];
$sunSetInSec = $json['sys']['sunset'];




//


cloudsProperty($clouds);
temperatureProperty($temp);
humidity($humidity);
visibility(2500);
windSpeed($windSpeed);

$summer = 0;
$rainy = 0;
$spring = 0;
$winter = 0;


//$total = array($val1=>$cat1,$val2=>$cat2,$val3=>$cat3,$val4=>$cat4,$val5=>$cat5);

$total = array($cat1, $cat2, $cat3, $cat4, $cat5);


$probR = 0;
$probW = 0;
$probSu = 0;
$probSp = 0;

function frequency($str, $total, $prob) {

    $count = 0;
    global $probR;
    global $probW;
    global $probSu;
    global $probSp;


    foreach ($total as $key) {

        if ($key == $str) {

            if ($str == "Rainy") {
                $probR++;
            } else if ($str == "Winter") {
                $probW++;
            } else if ($str == "Summer") {
                $probSu++;
            } else if ($str == "Spring") {
                $probSp++;
            }

            $count++;
        }
    }
}

frequency("Rainy", $total, $probR);
frequency("Summer", $total, $probSu);





frequency("Winter", $total, $probW);
frequency("Spring", $total, $probSp);

$finalSelected = null;

if ($probR >= $probSp && $probR >= $probSu && $probR >= $probW) {

    $finalSelected = "Rainy";
} else if ($probW >= $probSp && $probW >= $probSu && $probW >= $probR) {

    $finalSelected = "Winter";
} else if ($probSu >= $probSp && $probSu >= $probW && $probSu >= $probR) {

    $finalSelected = "Summer";
} else if ($probSp >= $probSu && $probSp >= $probW && $probSp >= $probR) {

    $finalSelected = "Spring";
} else {
    $finalSelected = "Winter";
}
      echo  "img/".$finalSelected;
?>