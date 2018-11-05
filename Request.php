<?php
    /**
     * Created by PhpStorm.
     * User: itcyb
     * Date: 11/3/2018
     * Time: 4:15 PM
     */

    class Request
    {
        public static function method()
        {
            return $_SERVER['REQUEST_METHOD'];
        }

        public static function uri()
        {
            return $_SERVER['PATH_INFO'];
        }
    }