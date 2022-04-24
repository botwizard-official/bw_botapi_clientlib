<?php

namespace BotapiClient\Dto;

class NewHsmTemplateParams {

    protected $el;
    protected $lang;
    protected $text;
    protected $category;
    //
    protected $interactive;
    //
    protected $siteValue;
    protected $siteLabel;
    protected $telValue;
    protected $telLabel;
    //
    protected $quickReplyButtons;

    public function getEl() {
        return $this->el;
    }

    public function getLang() {
        return $this->lang;
    }

    public function getText() {
        return $this->text;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getInteractive() {
        return $this->interactive;
    }

    public function getSiteValue() {
        return $this->siteValue;
    }

    public function getSiteLabel() {
        return $this->siteLabel;
    }

    public function getTelValue() {
        return $this->telValue;
    }

    public function getTelLabel() {
        return $this->telLabel;
    }

    public function getQuickReplyButtons() {
        return $this->quickReplyButtons;
    }

    public function setEl($el) {
        $this->el = $el;
        return $this;
    }

    public function setLang($lang) {
        $this->lang = $lang;
        return $this;
    }

    public function setText($text) {
        $this->text = $text;
        return $this;
    }

    public function setCategory($category) {
        $this->category = $category;
        return $this;
    }

    public function setInteractive($interactive) {
        $this->interactive = $interactive;
        return $this;
    }

    public function setSiteValue($siteValue) {
        $this->siteValue = $siteValue;
        return $this;
    }

    public function setSiteLabel($siteLabel) {
        $this->siteLabel = $siteLabel;
        return $this;
    }

    public function setTelValue($telValue) {
        $this->telValue = $telValue;
        return $this;
    }

    public function setTelLabel($telLabel) {
        $this->telLabel = $telLabel;
        return $this;
    }

    public function setQuickReplyButtons($quickReplyButtons) {
        $this->quickReplyButtons = $quickReplyButtons;
        return $this;
    }

}
