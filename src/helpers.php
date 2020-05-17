<?php

if (!function_exists('flash'))
{
    /**
     * Helper method for flashing messages.
     * 
     * @param string|null $message
     * @param string $level
     * @return \EZ\FlashMessages\FlashService
     */
    function flash($message = null, $level = 'info')
    {
        $service = app('flash');

        if (!is_null($service)) {
            return $service->message($message, $level);
        }

        return $service;
    }
}