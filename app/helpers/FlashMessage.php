<?php

namespace helpers;

class FlashMessage extends \Plasticbrain\FlashMessages\FlashMessages
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }

    public function errors(array $messages, $redirectUrl = null, $sticky = false)
    {
        foreach ($messages as $message) {
            parent::error($message, $redirectUrl, $sticky);
        }
    }
}