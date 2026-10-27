<?php
 ob_start();
    session_start();
    $inactive = 600;

    if (isset($_SESSION['timeout'])) {
        $session_life = time() - $_SESSION['timeout'];
        if($session_life > $inactive) {
           session_destroy();
           session_start();
        }
    }
    $_SESSION['timeout']=time();

    define('usrnam','root');
    define('pwd','');
    //define('dbname','demouser_triveni');
    define('dbname','rahman-aos');
    $mysqli = mysqli_connect("localhost",usrnam,pwd,dbname);
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
      exit();
    }

    // define("BASE_URL","https://coolkaki.com/2021-22/perf-safety/");
    // define("PRODUCT_URL","https://coolkaki.com/2021-22/perf_cms/public/");
    // define("STORAGE_URL","https://coolkaki.com/2021-22/perf_cms/storage/app/public/");
?>