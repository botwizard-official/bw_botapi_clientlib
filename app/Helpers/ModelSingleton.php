<?php

namespace BotapiClient\Helpers;

use BotapiClient\BotapiException;
use BotapiClient\Models\AbstractModel;

class ModelSingleton {

    protected $models;
    protected $client;

    public function __construct($client) {
        $this->client = $client;
    }

    public function get($clazz) {
        if (empty($this->models)) {
            $this->models = [];
        }
        if (empty($this->models[$clazz])) {
            if (!is_subclass_of($clazz, AbstractModel::class)) {
                throw new BotapiException('bad model class=' . $clazz);
            }
            $this->models[$clazz] = new $clazz($this->client);
        }
        return $this->models[$clazz];
    }

}
