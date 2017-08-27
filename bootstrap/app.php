<?php

namespace App;

use Exception;

use Phalcon\Di;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Http\Response;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Events\Manager;
use App\Exception\ApiException;
use Phalcon\Mvc\Application as PhalconApplication;

class Application extends PhalconApplication {
    public function __construct()
    {
        $this->services();
        $this->autoloader();
        $this->config();
    }

    public function run()
    {
        try {
            echo $this->handle()->getContent();
        } catch (\PDOException $e) {

            throw new \Exception('Database error, Description: ' . $e->getMessage());
        } catch (\Phalcon\Di\Exception $e) {

            throw new \Exception('Uri error, Description: ' . $e->getMessage());
        } catch (\Exception $e) {

            throw new \Exception('System error, Description: '. $e->getMessage());
        }
    }

    private function services()
    {
        $di = new Di();

        // Store the api messages
        $di->set('messages', function($input = null) {
            return $input;
        });

        $di->set('view', function () {
            $view = new View();

            return $view;
        });

        $di->set('dispatcher', function() use ($di) {
            $eventsManager = new Manager();

            $eventsManager->attach('dispatch:afterExecuteRoute', function($event, $dispatcher) use ($di) {

                $source = $event->getSource();
                $returned = $source->getReturnedValue();

                if (is_object($returned)) {
                    if ( ! method_exists($returned, 'toArray')) {
                        throw new ApiException('The returned value can not be parsed, try it manual.');
                    }

                    $returned = $returned->toArray();
                }

                $configs = $di->get('config');

                $response = new Response();

                if ($configs->api->cors->enabled) {
                    $response->setHeader('Access-Control-Allow-Origin', $configs->api->cors->hosts);
                }

                foreach ($configs->api->headers as $name => $value) {
                    $response->setHeader($name, $value);
                }

                $json_options = 0;

                if ($configs->debug) {
                    $json_options = JSON_PRETTY_PRINT;
                }

                foreach ($configs->json->options as $option) {
                    $json_options |= $option;
                }

                $activeController = $source->getActiveController();

                $status = $activeController->getStatus();
                $errors = $activeController->getErrors();
                $messages = $activeController->getMessages();
                $status_code = $activeController->getCode();

                $data = [
                    'status' => $status,
                    'status_code' => $status_code,
                    'errors' => $errors,
                    'messages' => $messages,
                    'data' => $returned
                ];

                $response->setJsonContent($data, $json_options);

                $event->getSource()->setReturnedValue($response);
            });

            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace('App\\Controllers\\');
            $dispatcher->setEventsManager($eventsManager);

            return $dispatcher;
        });

        $di->set('modelsMetadata', function(){
            return new \Phalcon\Mvc\Model\Metadata\Memory();
        });

        $di->set('modelsManager', function(){
            return new \Phalcon\Mvc\Model\Manager();
        });

        $this->setDi($di);
    }

    private function autoloader() {}

    private function config()
    {
        $base_path = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR;

        $files = [
            'app',
            'database',
            'routes',
        ];

        foreach ($files as $file) {
            $$file = require $base_path . $file . '.php';
        }

        if ( ! isset($database)) {
            throw new Exception('Database file is not found in configuration.');
        }

        $di = $this->getDi();

        foreach ($database as $name => $db_config) {
            $name = 'db.' . $name;

            $di->set($name, function() use ($db_config) {
                $adapter = $db_config->adapter;

                return new $adapter($db_config->toArray());
            });
        }

        $di->set('config', function () use ($app) {
            return $app;
        });

        $di->set('router', function() use ($routes) {
            return $routes;
        });
    }
}
