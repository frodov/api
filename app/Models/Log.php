<?php

namespace App\Models;

use App\Exceptions\ApiException;

class Log extends Base {

    /**
     * @var $request string
     */
    protected $request;

    /**
     * @var $response string
     */
    protected $response;

    /**
     * Get Api request
     *
     * @return string
     */
    public function getRequest() {
        return $this->request;
    }

    /**
     * Set Api request
     *
     * @param $request string
     *
     * @return void
     */
    public function setRequest($request) {

        $json = json_encode($request);
        if ( ! $json) {
            throw new ApiException('System error');
        }

        $this->request = $json;
    }

    /**
     * Api response
     *
     * @return string
     */
    public function getResponse() {
        return $this->response;
    }

    /**
     * Set Api response
     *
     * @param $response string
     *
     * @return void
     */
    public function setResponse($response) {
        $json = json_encode($response);
        if ( ! $json) {
            throw new ApiException('System error');
        }
        
        $this->response = $json;
    }

    /**
     * Framework function
     */
    public function getSource()
    {
        return 'logs';
    }

}
