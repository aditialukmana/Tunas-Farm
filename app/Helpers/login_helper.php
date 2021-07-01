<?php


function token($token){

    $param['token']   = $token;
    $param['user_id']   = 4;

    $TModel = new \App\Models\AuthTokensModel();
    
    $TModel->save($param);
}
