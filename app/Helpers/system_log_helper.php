<?php


function sys_log($controller, $message){
    $session = \Config\Services::session();
    $param['user'] = $session->username;
    $param['controller'] = $controller;
    $param['message']   = $message;

    $slModel = new \App\Models\SLogModel;
    
    $slModel->save($param);
}
