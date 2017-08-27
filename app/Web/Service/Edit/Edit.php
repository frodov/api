<?php

namespace App\Web\Service\Edit;

use App\Models\Vehicle;
use App\Web\Entity\Match;
use App\Exceptions\ApiException;

/**
 * Edit value in DB
 *
 * @since     v0.0.1
 * @version   v0.0.1
 * @package   App\Web\Service\Edit
 * @author    Freddy Vielma <freddyvielma@gmail.com>
 * @copyright Copyright (c) 2017, Freddy Vielma
 * @license   Private license
 */
class Edit
{
    use \App\Web\Entity\Utility\Request;

    /**
     * Handler the common logic for adding
     *
     * @return void
     */
    public function process() {

        $identifier = Match::getId();
        $type = Match::getType();
        $color = Match::getColor();
        $mark = Match::getMark();
        $model = Match::getModel();
        $price = Match::getPrice();
        $year = Match::getYear();
        $milage = Match::getMilage();

        if ($identifier === null) {
            throw new ApiException('Invalid request');
        }

        $vehicle = Vehicle::findFirst("id = 3");

        if ($type !== null) {
            $vehicle->setType($type);
        }

        if ($color !== null) {
            $vehicle->setColor($color);
        }

        if ($mark !== null) {
            $vehicle->setMark($mark);
        }

        if ($model !== null) {
            $vehicle->setModel($model);
        }

        if ($price !== null) {
            $vehicle->setPrice($price);
        }

        if ($year !== null) {
            $vehicle->setYear($year);
        }

        if ($milage !== null) {
            $vehicle->setMilage($milage);
        }

        if ( ! $vehicle->update()) {
            throw new ApiException('Error updating record ' . $vehicle->getMessages());
        }

        $this->vehicle = $vehicle->getId();
    }
}
