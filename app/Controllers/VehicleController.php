<?php

namespace App\Controllers;

use App\Models\Log;
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
        $log = new Log();
        $request = $this->dispatcher->getParams();
        $log->setRequest($request);

        try {
            $response = Handler::process($request);
            $this->setMessage('Success');
            $log->setResponse($response);
        } catch (\Exception $e) {
            $this->setCode(310);
            $this->setError($e->getMessage());
            $log->setResponse($e->getMessage());
        }

        if( ! $log->save()) {
            throw new \Exception('System error');
        }

        return $response;
    }
}
