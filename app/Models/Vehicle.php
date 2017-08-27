<?php

namespace App\Models;

/**
 * Vehicle model
 *
 * @since     v0.0.1
 * @version   v0.0.1
 * @package   App\Models
 * @author    Freddy Vielma <freddyvielma@gmail.com>
 * @copyright Copyright (c) 2017, Freddy Vielma
 * @license   Private license
 */
class Vehicle extends Base {

    /**
     * Short description
     *
     * @var $id
     */
    protected $id;

    /**
     * Short description
     *
     * @var $color
     */
    protected $color;

    /**
     * Short description
     *
     * @var $mark;
     */
    protected $mark;

    /**
     * Short description
     *
     * @var $model;
     */
    protected $model;

    /**
     * Short description
     *
     * @var $price;
     */
    protected $price;

    /**
     * Short description
     *
     * @var $year;
     */
    protected $year;

    /**
     * Short description
     *
     * @var $milage;
     */
    protected $milage;

    /**
     * Short description
     *
     * @var $type_id;
     */
    protected $type_id;


    /**
     * Framework function
     */
    public function getSource()
    {
        return 'vehicles';
    }



    /*****************************/
    /* GETTERS AND SETTERS       */
    /*****************************/
    public function getId()
    {
        return $this->id;
    }

    public function getTypeId() {
        return $this->type_id;
    }

    public function setTypeId($type)
    {
        $this->type_id = $type;
    }

    public function getYear() {
        return $this->year;
    }

    public function setYear($year)
    {
        $this->year = $year;
    }

    public function getMilage() {
        return $this->milage;
    }

    public function setMilage($milage)
    {
        $this->milage = $milage;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($model)
    {
        if (strlen($model) > 50) {
            throw new ApiException(
                'The name is to long'
            );
        }

        $this->model = $model;
    }

    public function getMark() {
        return $this->mark;
    }

    public function setMark($mark)
    {
        if (strlen($mark) > 50) {
            throw new ApiException(
                'The name is to long'
            );
        }

        $this->mark = $mark;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color)
    {
        if (strlen($color) > 50) {
            throw new ApiException(
                'The name is to long'
            );
        }

        $this->color = $color;
    }
}
