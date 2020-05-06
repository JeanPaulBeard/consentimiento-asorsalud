<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('America/Bogota');


$fgc = json_decode(file_get_contents("php://input"), true);

if (!$fgc['f'] != '') {
    $fgc = $_REQUEST;
}

if ($fgc['f'] != '') {
    if (function_exists($fgc['f'])) {
        header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/json');
        call_user_func($fgc['f'], $fgc);
    } else {
        header('HTTP/1.0 404 Not Found');
    }
} else {
    header('HTTP/1.0 404 Not Found');
}




function save_consentimiento($data)
{
    //

    try {
        $ip = "";
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $mbd = new PDO('mysql:host=localhost;dbname=asorsalu_consentimiento', "asorsalu_jean", "Camelar01");

        $sql = "INSERT INTO consentimientos(nombres, documento, phone, mail, req_acomp, user_agent, ip) 
                VALUES (
                    :names
                    ,:doc
                    ,:phone
                    ,:mail
                    ,:req_acomp
                    ,:user_agent
                    ,:ip
                    )";

        $SqlData = [
            'names' => $data['name'],
            'doc' => $data['documento'],
            'phone' => $data['phone'],
            'mail' => $data['email'],
            'req_acomp' => $data['select'],
            'user_agent' =>  $_SERVER['HTTP_USER_AGENT'],
            'ip' => $ip,
        ];
        $stmt = $mbd->prepare($sql);
        $stmt->execute($SqlData);

        echo json_encode(
            [
                'staus' => true,
                'msg' => 'Consentimiento guardado correctamente'
            ]
        );
    } catch (PDOException $e) {
        echo json_encode(
            [
                'staus' => false,
                'msg' => $e->getMessage()
            ]
        );
    }
}
