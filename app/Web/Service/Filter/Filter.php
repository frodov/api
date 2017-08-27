<?php

namespace App\Web\Service\Filter;

use App\Models\Vehicle;
use App\Web\Entity\Match;
use Phalcon\Mvc\Model\Query\Builder;

/**
 * Filter and process the request
 *
 * @since     v0.0.1
 * @version   v0.0.1
 * @package   App\Web\Service\Filter
 * @author    Freddy Vielma <freddyvielma@gmail.com>
 * @copyright Copyright (c) 2017, Freddy Vielma
 * @license   Private license
 */
class Filter
{
    use \App\Web\Entity\Utility\Request;

    /**
     * Process the filter resquest
     *
     * @return array<int, string> $response
     */
    public function process() {

        $id = Match::getId();
        $type = Match::getType();
        $color = Match::getColor();
        $mark = Match::getMark();
        $model = Match::getModel();
        $price = Match::getPrice();
        $priceSince = Match::getPriceSince();
        $priceUntil = Match::getPriceUntil();
        $year = Match::getYear();
        $yearSince = Match::getYearSince();
        $yearUntil = Match::getYearUntil();
        $milage = Match::getMilage();
        $milageSince = Match::getMilageSince();
        $milageUntil = Match::getMilageUntil();

        if ($id !== null) {
            $params['id'] = $id;
            $conditions .= 'id = :id:';
        } else {
            // Define this way becouse a phalcon multi-parameters phalcon bug
            $conditions = 'id IS NOT NULL';
        }

        if ($type !== null) {
            $params['type_id'] = $type;
            $conditions .= ' AND type_id = :type_id:';
        }

        if ($color !== null) {
            $params['color'] = $color;
            $conditions .= ' AND color = :color:';
        }

        if ($mark !== null) {
            $params['mark'] =  $mark;
            $conditions .= ' AND mark = :mark:';
        }

        if ($model !== null) {
            $params['model'] = $model;
            $conditions .= ' AND model = :model:';
        }

        if ($price !== null) {
            $params['price'] = $price;
            $conditions .= ' AND price = :price:';
        } elseif ($priceSince !== null && $priceUntil !== null) {
            $conditions .= ' AND price BETWEEN ' . $priceSince . ' AND ' . $priceUntil;
        }

        if ($milage !== null) {
            $params['milage'] = $milage;
            $conditions .= ' AND milage = :milage:';
        } elseif ($milageSince !== null && $milageUntil !== null) {
            $conditions .= ' AND milage BETWEEN ' . $milageSince . ' AND ' . $milageUntil;
        }

        if ($year !== null) {
            $params['year'] = $year;
            $conditions .= ' AND year = :year:';
        } elseif ($yearSince !== null && $yearUntil !== null) {
            $conditions .= ' AND year BETWEEN ' . $yearSince . ' AND ' . $yearUntil;
        }

        $vehicle = Vehicle::find(
            [
                'conditions' => $conditions,
                'bind' => $params,
            ]
        );

        $this->vehicle = $vehicle;
    }
}
