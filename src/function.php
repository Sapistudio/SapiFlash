<?php
if (!function_exists('flash')) {
    /** Wrapper for flash object to be used as global function.*/
    function flash($message = '', $type = 'info')
    {
        $flash = \SapiStudio\SimpleFlash\Engine::load();
        if (!empty($message))
            return $flash->message($message, $type);
        return $flash;
    }
}
