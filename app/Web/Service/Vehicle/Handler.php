<?php

namespace App\Web\Service\Vehicle;

use App\Web\Service\Add\Add;
use App\Web\Service\Edit\Edit;
use App\Exceptions\ApiException;
use App\Web\Service\Delete\Delete;
use App\Web\Service\Filter\Filter;

/**
 * Handler for the vehicles request
 *
 * @since     v0.0.1
 * @version   v0.0.1
 * @package   App\Web\Service\Vehicle
 * @author    Freddy Vielma <freddyvielma@gmail.com>
 * @copyright Copyright (c) 2017, Freddy Vielma
 * @license   Private license
 */
class Handler
{
    public static function process($params) {

        if (isset($params['mode'])) {
            $mode = $params['mode'];
            unset($params['mode']);
        } else {
            throw new ApiException('Missing mode');
        }

        switch ($mode) {
            case 'filter':
                $filter = new Filter();
                return $filter->handler($params);
            case 'add':
                $add = new Add();
                return $add->handler($params);
                break;
            case 'edit':
                $edit = new Edit();
                return $edit->handler($params);
                break;
            case 'delete':
                $delete = new Delete();
                return $delete->handler($params);
                break;
            default:
                throw new ApiException('Invalid mode');
        }
    }
}
