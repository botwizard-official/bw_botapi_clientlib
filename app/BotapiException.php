<?php

namespace BotapiClient;

use Exception;

class BotapiException extends Exception {

    public function __construct($message = '', $code = 0, $previous = null) {
        parent::__construct(strval($message), intval($code), $previous);
    }

}
