<?php

$PATH = "./templates/";
$FILE_NAME = "/result.txt";

header("ngrok-skip-browser-warning: true");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: text/html");


if(isset($_POST['send_me_result'])){

    $data = array_slice(scandir($PATH),2);

    foreach($data as $i ){
        $data = file_get_contents($PATH.$i.$FILE_NAME);
        if($data != ""){
            echo $data;
            file_put_contents($PATH.$i.$FILE_NAME,""); //clear result.txt
        }
    }

}

?>