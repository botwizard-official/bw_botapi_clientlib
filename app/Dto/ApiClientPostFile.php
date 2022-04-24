<?php

namespace BotapiClient\Dto;

class ApiClientPostFile {

    protected $filename;
    protected $mimetype;
    protected $postname;

    function getFilename() {
        return $this->filename;
    }

    function getMimetype() {
        return $this->mimetype;
    }

    function getPostname() {
        return $this->postname;
    }

    function setFilename($filename) {
        $this->filename = $filename;
        return $this;
    }

    function setMimetype($mimetype) {
        $this->mimetype = $mimetype;
        return $this;
    }

    function setPostname($postname) {
        $this->postname = $postname;
        return $this;
    }

}
