<?php
if (!function_exists('flashh')) {
    /** Wrapper for flash object to be used as global function.*/
    function flashh($message = '', $type = 'info')
    {
        $flash = \SapiStudio\SimpleFlash\Engine::load();
        if (!empty($message))
            return $flash->message($message, $type);
        return $flash;
    }
}