<?php

namespace BotapiClient\Dto;

class Botscript {

    /**
     *
     * @var string
     */
    protected $contents;

    public function __construct(string $contents) {
        $this->contents = $contents;
    }

    public function getContents(): string {
        return $this->contents;
    }

    public function setContents(string $contents) {
        $this->contents = $contents;
        return $this;
    }

}
