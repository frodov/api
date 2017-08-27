<?php

namespace App\Web\Entity\Utility;

use App\Web\Entity\Match;
use App\Exceptions\ApiException;

trait Request
{
    /**
     * @var $vehicle Vehicle
     */
    public $vehicle = null;

    /**
     * Get the current vehicle data
     *
     * @return $vehicle
     */
    public function getVehicle() {
        if ($this->vehicle === null) {
            $this->process();
        }

        return $this->vehicle;
    }

    /**
     * Handler the request
     *
     * @throws ApiException
     *
     * @return void
     */
    public function handler($request) {

        if ( ! is_array($request)) {
            throw new ApiException('System error');
        }

        $matcher = new Match();

        foreach ($request as $data) {

            $value = preg_split('/:/', $data);

            if ( ! $value) {
                throw new ApiException('Bad request');
            }

            $matcher->define($value);
        }

        return $this->getVehicle();
    }
}
