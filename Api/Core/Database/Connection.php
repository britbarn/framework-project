<?php

namespace Api\Core\Database;

use \PDO;

    class Connection
    {
        
        public static function getConnection() {
            $app['config'] = require 'config.php';
            $config = $app['config']['database'];
            try {

                return new PDO(
                    $config['connection'].';dbname='.$config['name'],
                    $config['username'],
                    $config['password'],
                    $config['options']
                );

            } catch (PDOException $e) {

                return ($e->getMessage());
            }
        }
    }
