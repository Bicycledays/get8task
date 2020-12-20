<?php

use Phalcon\Mvc\ModelInterface;

/**
 * Class Users
 *
 * Модель Users имеет связь с моделью Data
 */
class Users extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $hash;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $family;

    /**
     *
     * @var integer
     */
    public $dataid;

    /**
     *
     * @var integer
     */
    public $updatenum;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("webhooks");
        $this->setSource("users");
        $this->belongsTo('dataid', '\Data', 'dataid', ['alias' => 'Data']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users[]|Users|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Users|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null): ?ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
