<?php

namespace EZ\FlashMessages;

interface SessionStore
{
    /**
     * Flash a message to the session
     * 
     * @param string $name
     * @param array $data
     * @return void
     */
    public function flash($name, $data);
}