<?php


function token($user_id, $token)
{
    $param['user_id']   = $user_id;
    $param['token']   = $token;

    $TModel = new \App\Models\AuthTokensModel();

    $TModel->save($param);
}
