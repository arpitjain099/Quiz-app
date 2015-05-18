<?php


    $datetime1 = $_POST['datetime1'];
    $timezone1 ='UTC';$timezone2 = 'UTC';
    $datetime2 = $_POST['datetime2'];

    //$datetime1 = "04/27/2015 10:02:44 AM";
  //  $timezone1 = "04/27/2015 10:02:44 AM";$timezone2 = "05/27/2015 10:02:44 AM";
    //$datetime2 = "05/27/2015 10:02:44 AM";



    $timestamp1 = strtotime($datetime1 . ' ' . $timezone1);
    //echo $timestamp1;
    $timestamp2 = strtotime($datetime2 . ' ' . $timezone2);
    if ($timestamp1) {
       // header('Content-Type: application/json');
        $date1 = getdate($timestamp1);
        $date1['timestamp'] = $date1[0];
        echo ($date1[0]);
        //echo json_encode($date1);
        //exit;
    }
  
    if ($timestamp2) {
       // header('Content-Type: application/json');
        $date2 = getdate($timestamp2);
        $date2['timestamp'] = $date2[0];
        //echo $date2;
        echo $date2[0];
        //echo json_encode($date2);
       // exit;
    }



