<?php
class Session
{
    public static function init()
    {
        session_start();
    }
    public static function unset($key)
    {
        unset($_SESSION[$key]);
    }
}
