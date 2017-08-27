<?php

namespace App\Web\Service\Delete;

use App\Models\Vehicle;
use App\Web\Entity\Match;
use App\Exceptions\ApiException;

/**
 * Delete row in DB
 *
 * @since     v0.0.1
 * @version   v0.0.1
 * @package   App\Web\Service\Delete
 * @author    Freddy Vielma <freddyvielma@gmail.com>
 * @copyright Copyright (c) 2017, Freddy Vielma
 * @license   Private license
 */
 class Delete
 {
     use \App\Web\Entity\Utility\Request;

     /**
      * Handler the common logic for adding
      *
      * @return void
      */
     public function process() {
         $identifier = Match::getId();

         if ($identifier === null) {
             throw new ApiException('Invalid request');
         }

         $vehicle = Vehicle::find(
             [
                 'conditions' => 'id = :id:',
                 'bind' => ['id' => $identifier],
             ]
         );

         if (count($vehicle) !== 1) {
             throw new ApiException('Invalid request');
         }

         if ( ! $vehicle->delete()) {
             throw new ApiException('System error');
         }
     }
 }
