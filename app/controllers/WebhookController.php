<?php
declare(strict_types=1);


use Phalcon\Http\Request;
use Phalcon\Http\Response;

class WebhookController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $request = new Request();

        // webhook по определению POST запрос, так что необходимо
        // убедиться в типе поступающего запроса
        if (true === $request->isPost()) {

            // формируем массив из json, который пришёл в теле запроса
            $json = $request->getJsonRawBody();

            // записываем данные в таблицу Data
            $data = new Data();
            $data->assign([
                "dataid" => $json['data']['key'],
                "url" => $json['data']['url'],
                "imgname" => $json['data']['imgname'],
            ]);
            $success = $data->save();

            // записываем данные в таблицу users
            $user = new Users();
            $user->assign([
                "hash" => $json['hash'],
                "name" => $json['name'],
                "family" => $json['family'],
                "dataid" => $json['data']['key'],
                "updatenum" => $json['update']
            ]);
            $success = $success && $user->save();

            // формируем ответ на webhook запрос
            // если запись в БД прошла без ошибок
            if ($success) {

                $response = new Response();
                $response
                    ->setStatusCode(200, 'OK')
                    ->setHeader('Access-Control-Allow-Origin', '*')
                    ->setHeader('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, DELETE, PUT')
                    ->setHeader('Access-Control-Max-Age', '1000')
                    ->setHeader('Access-Control-Allow-Headers', 'x-requested-with, Content-Type, origin, authorization, accept, client-security-token')
                    ->send();
            }
        }
    }
}