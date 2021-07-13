<?php


function sys_log($user, $controller, $message){
    $session = \Config\Services::session();
    $param['user'] = $user;
    $param['controller'] = $controller;
    $param['message']   = $message;

    $slModel = new \App\Models\SLogModel;
    
    $slModel->save($param);
}
