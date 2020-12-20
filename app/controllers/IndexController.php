<?php
declare(strict_types=1);

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $message = 'ывлорыврпыал';
        $this->view->message = $message;
    }
}

