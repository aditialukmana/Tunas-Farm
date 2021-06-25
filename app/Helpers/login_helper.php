<?php


function token($token, $user_id){

    $param['token']   = $token;
    $param['user_id']   = $user_id;

    $TModel = new \App\Models\AuthTokensModel();
    
    $TModel->save($param);
}
