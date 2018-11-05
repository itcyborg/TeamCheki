<?php
    /**
     * Created by PhpStorm.
     * User: itcyb
     * Date: 11/3/2018
     * Time: 4:16 PM
     */

    class App
    {
        private static $table='users';
        public static function boot()
        {
            if (Request::method()==="POST"){
                $data=$_POST;
                return print_r(json_encode(DB::add(self::$table,$data),true));
            } elseif (Request::method()==="GET") {
                header("Access-Control-Allow-Origin: *");
                header("Content-Type: application/json; charset=UTF-8");
                return print_r(json_encode(DB::listData(self::$table),true));
            }
        }
    }