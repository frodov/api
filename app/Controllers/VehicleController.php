<?php

namespace App\Controllers;

use App\Web\Service\Vehicle\Handler;

/**
 * Vehicle controller
 *
 * @since     v0.0.1
 * @version   v0.0.1
 * @package   App\Controllers\Vehicle
 * @author    Freddy Vielma <freddyvielma@gmail.com>
 * @copyright Copyright (c) 2017, Freddy Vielma
 * @license   Private license
 */
class VehicleController extends ApiController {

    /**
     * Process the request for the API
     *
     * @return string
     */
    public function processAction()
    {
        try {
            $response = Handler::process($this->dispatcher->getParams());

            $this->setMessage('Success');
        } catch (\Exception $e) {
            $this->setCode(9000);
            $this->setError($e->getMessage());
        }


        return $response;
    }
}
