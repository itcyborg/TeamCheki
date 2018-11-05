<?php
    /**
     * Created by PhpStorm.
     * User: itcyb
     * Date: 11/3/2018
     * Time: 4:18 PM
     */

    class DB
    {

        private static $host="127.0.0.1";
        private static $database="team";
        private static $username="root";
        private static $password="";

        public static function add($table,$data)
        {
            $sql = sprintf(
                'insert into %s (%s) value (%s)',
                $table,
                implode(',', array_keys($data)),
                ':' . implode(', :', array_keys($data))
            );
            //insert into (name) values (:name)
            try {
                $connection = self::connect();
                $statement = $connection->prepare($sql);
                return $statement->execute($data);
            } catch (PDOException $e) {
                die(print_r($e));
            }
        }

        public static function listData($table)
        {
            $sql=sprintf("select * from %s", $table);
            try {
                $connection = self::connect();
                $statement = $connection->prepare($sql);
                $statement->execute();
                return $statement->fetchAll();
            } catch (PDOException $e) {
                die(print_r($e));
            }
        }

        private static function connect(){
            return new PDO(
                "mysql:
                host=" . self::$host . ";
                dbname=" . self::$database, // database name
                self::$username, // database username
                self::$password,//, //database password
                $options = [
                    PDO::ATTR_EMULATE_PREPARES => true, // turn on emulation mode for "real" prepared statements
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ //make the default fetch be both associative array and object
                ] # database
            );
        }
    }