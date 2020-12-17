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


            $response = new Response();
            $response->setStatusCode(200, 'OK');
            $response->send();
        }
    }

}

