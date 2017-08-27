<?php

namespace App\Web\Service\Add;

use App\Models\Vehicle;
use App\Web\Entity\Match;
use App\Exceptions\ApiException;

/**
 * Add value in DB
 *
 * @since     v0.0.1
 * @version   v0.0.1
 * @package   App\Web\Service\Add
 * @author    Freddy Vielma <freddyvielma@gmail.com>
 * @copyright Copyright (c) 2017, Freddy Vielma
 * @license   Private license
 */
class Add
{
    use \App\Web\Entity\Utility\Request;

    /**
     * Handler the common logic for adding
     *
     * @return void
     */
    public function process() {

        $type = Match::getType();
        $color = Match::getColor();
        $mark = Match::getMark();
        $model = Match::getModel();
        $price = Match::getPrice();
        $year = Match::getYear();
        $milage = Match::getMilage();

        if (
            $type === null
            || $color === null
            || $mark === null
            || $model === null
            || $mark === null
            || $price === null
            || $year === null
            || $milage === null
        ) {
            throw new ApiException('Invalid request');
        }

        $vehicle = new Vehicle();

        $vehicle->mark = $mark;
        $vehicle->year = $year;
        $vehicle->color = $color;
        $vehicle->model = $model;
        $vehicle->price = $price;
        $vehicle->milage = $milage;
        $vehicle->type_id = $type;

        $vehicle->save();

        $this->vehicle = $vehicle->getId();
    }
}
