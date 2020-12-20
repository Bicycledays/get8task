<?php

use Phalcon\Mvc\ModelInterface;

class Data extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $dataid;

    /**
     *
     * @var string
     */
    public $url;

    /**
     *
     * @var string
     */
    public $imgname;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("webhooks");
        $this->setSource("data");
        $this->hasMany('dataid', 'Users', 'dataid', ['alias' => 'Users']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Data[]|Data|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Data|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null): ?ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
