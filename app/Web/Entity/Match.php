<?php

namespace App\Web\Entity;

use App\Exceptions\ApiException;

/**
 * Match the request and prepare for getters
 *
 * @since     v0.0.1
 * @version   v0.0.1
 * @package   App\Web\Entity
 * @author    Freddy Vielma <freddyvielma@gmail.com>
 * @copyright Copyright (c) 2017, Freddy Vielma
 * @license   Private license
 */
class Match
{
    /**
     * Short description
     *
     * @var $id
     */
    public static $id = null;

    /**
     * Short description
     *
     * @var $type
     */
    public static $type = null;

    /**
     * Short description
     *
     * @var $color
     */
    public static $color = null;

    /**
     * Short description
     *
     * @var $model
     */
    public static $model = null;

    /**
     * Short description
     *
     * @var $year
     */
    public static $year = null;

    /**
     * Short description
     *
     * @var $yearSince
     */
    public static $yearSince = null;

    /**
     * Short description
     *
     * @var $yearUntil
     */
    public static $yearUntil = null;

    /**
     * Short description
     *
     * @var $mark
     */
    public static $mark = null;

    /**
     * Short description
     *
     * @var $price
     */
    public static $price = null;

    /**
     * Short description
     *
     * @var $priceSince
     */
    public static $priceSince = null;

    /**
     * Short description
     *
     * @var $priceUntil
     */
    public static $priceUntil = null;

    /**
     * Short description
     *
     * @var $milage
     */
    public static $milage = null;

    /**
     * Short description
     *
     * @var $milageSince
     */
    public static $milageSince = null;

    /**
     * Short description
     *
     * @var $milageUntil
     */
    public static $milageUntil = null;


    /*****************************/
    /*          GETTERS          */
    /*****************************/

    public static function getId() {

        return static::$id;
    }

    public static function getType() {

        return static::$type;
    }

    public static function getColor() {

        return static::$color;
    }

    public static function getMark() {

        return static::$mark;
    }

    public static function getYear() {

        return static::$year;
    }

    public static function getYearSince() {

        return static::$yearSince;
    }

    public static function getYearUntil() {

        return static::$yearUntil;
    }

    public static function getModel() {

        return static::$model;
    }

    public static function getPrice() {

        return static::$price;
    }

    public static function getPriceSince() {

        return static::$priceSince;
    }

    public static function getPriceUntil() {

        return static::$priceUntil;
    }

    public static function getMilage() {

        return static::$milage;
    }

    public static function getMilageSince() {

        return static::$milageSince;
    }

    public static function getMilageUntil() {

        return static::$milageUntil;
    }

    /**
     * Define the params
     *
     * @throws ApiException
     *
     * @return void
     */
    public function define($value) {

        switch ($value[0]) {
            case 'id':
                static::$id = $value[1];
                break;
            case 'type':
                static::$type = $value[1];
                break;
            case 'color':
                static::$color = $value[1];
                break;
            case 'mark':
                static::$mark = $value[1];
                break;
            case 'model':
                static::$model = $value[1];
                break;
            case 'year':
                if (count($value) >= 3) {
                    static::$yearSince = $this->formatDate($value[1]);
                    static::$yearUntil = $this->formatDate($value[2]);
                } else {
                    static::$year = $this->formatDate($value[1]);
                }
                break;
            case 'price':
                if (count($value) >= 3) {
                    static::$priceSince = $this->getFloat($value[1]);
                    static::$priceUntil = $this->getFloat($value[2]);
                } else {
                    static::$price = $this->getFloat($value[1]);
                }
                break;
            case 'milage':
                if (count($value) >= 3) {
                    static::$milageSince = $this->getInt($value[1]);
                    static::$milageUntil = $this->getInt($value[2]);
                } else {
                    static::$milage = $this->getInt($value[1]);
                }
                break;
            default:
                throw new ApiException('Bad request');
                break;
        }
    }

    /**
     * Format the date
     *
     * @param string $value
     * @throws ApiException
     *
     * @return date $date
     */
    private function formatDate($value) {

        $date = new  \DateTime();

        try {
            $date = $date::createFromFormat('Y', $value);
        } catch (\Exception $e) {
            throw new ApiException('Bad date format');
        }

        if ( ! $date) {
            throw new ApiException('Bad date format');
        }

        return $date->format('Y');
    }

    /**
     * Get float
     *
     * @params string
     *
     * @return float $value
     */
    private function getFloat($value) {

        return (float) $value;
    }

    /**
     * Get int
     *
     * @params string
     *
     * @return int $value
     */
    private function getInt($value) {

        return (int) $value;
    }
}
