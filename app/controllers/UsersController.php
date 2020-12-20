<?php
declare(strict_types=1);

use Phalcon\Paginator\Adapter\Model as PaginatorModel;
class UsersController extends \Phalcon\Mvc\Controller
{
    /**
     * метод выводит страницу со списком пользователей из БД
     */
    public function indexAction()
    {
        $currentPage = $this->request->getQuery('page', 'int', 1);
        $paginator = new PaginatorModel(
            [
                'model' => Users::class,
                'limit' => 10,
                'page' => $currentPage,
            ]
        );

        $page = $paginator->paginate();

        $this->view->setVar('page', $page);
    }
}

