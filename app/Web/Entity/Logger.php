<?php

namespace App\Web\Entity;

class Logger
{
    public static $request;
    public static $response;

    public static function process() {
        $log = new Vehicle();

        $log->request = $request;
        $log->response = $response;

        $log->save();
    }
}
