<?php

namespace BotapiClient\Dto;

use JsonSerializable;

class EmulatorMessage implements JsonSerializable {

    const TYPE_TEXT = 'text';
    const TYPE_IMAGE = 'image';
    const TYPE_AUDIO = 'audio';
    const TYPE_VIDEO = 'video';
    const TYPE_FILE = 'file';

    /**
     *
     * @var string
     */
    protected $type;

    /**
     *
     * @var string
     */
    protected $text;

    /**
     *
     * @var string
     */
    protected $visibleText;

    /**
     *
     * @var string[]
     */
    protected $quickReplyButtons;

    /**
     *
     * @var string
     */
    protected $url;

    /**
     *
     * @var string
     */
    protected $origName;

    function __construct() {
        $this->setType(self::TYPE_TEXT)
                ->setText('')
                ->setVisibleText('')
                ->setQuickReplyButtons([])
                ->setOrigName('')
                ->setUrl('');
    }

    public function getType(): string {
        return $this->type;
    }

    public function getText(): string {
        return $this->text;
    }

    public function getVisibleText(): string {
        return $this->visibleText;
    }

    public function getQuickReplyButtons(): array {
        return array_values($this->quickReplyButtons);
    }

    public function getUrl(): string {
        return $this->url;
    }

    public function getOrigName(): string {
        return $this->origName;
    }

    public function setType(string $type) {
        $this->type = $type;
        return $this;
    }

    public function setText(string $text) {
        $this->text = $text;
        return $this;
    }

    public function setVisibleText(string $visibleText) {
        $this->visibleText = $visibleText;
        return $this;
    }

    public function setQuickReplyButtons(array $quickReplyButtons) {
        $this->quickReplyButtons = array_values($quickReplyButtons);
        return $this;
    }

    public function setUrl(string $url) {
        $this->url = $url;
        return $this;
    }

    public function setOrigName(string $origName) {
        $this->origName = $origName;
        return $this;
    }

    public function isText() {
        return strcmp($this->getType(), self::TYPE_TEXT) === 0;
    }

    public function isFile() {
        $types = [
            self::TYPE_FILE,
            self::TYPE_AUDIO,
            self::TYPE_VIDEO,
            self::TYPE_IMAGE,
        ];
        return in_array($this->getType(), $types, true);
    }

    public function toArr() {
        $arr = [
            'kind' => 'message',
            'type' => $this->getType(),
            'text' => $this->getText(),
            'visible' => $this->getVisibleText(),
            'quick_reply_buttons' => $this->getQuickReplyButtons(),
        ];
        if ($this->isFile()) {
            $fileinfo = [
                'url' => $this->getUrl(),
                'orig_name' => $this->getOrigName(),
            ];
            return array_merge($arr, $fileinfo);
        }
        return $arr;
    }

    public function jsonSerialize() {
        return $this->toArr();
    }

    public function toJson() {
        return json_encode($this);
    }

    public static function fromArr($arr) {
        $msg = new EmulatorMessage();
        if (is_array($arr) && !empty($arr['type'])) {
            $msg->setType($arr['type']);
        }
        if (is_array($arr) && !empty($arr['text'])) {
            $msg->setText($arr['text']);
        }
        if (is_array($arr) && !empty($arr['visible'])) {
            $msg->setVisibleText($arr['visible']);
        }
        if (is_array($arr) &&
                !empty($arr['quick_reply_buttons']) &&
                is_array($arr['quick_reply_buttons'])) {
            $msg->setQuickReplyButtons($arr['quick_reply_buttons']);
        }
        if ($msg->isFile()) {
            if (is_array($arr) && !empty($arr['url'])) {
                $msg->setUrl($arr['url']);
            }
            if (is_array($arr) && !empty($arr['orig_name'])) {
                $msg->setOrigName($arr['orig_name']);
            }
        }
        return $msg;
    }

    /**
     * 
     * @param string $json
     * @return EmulatorMessage
     */
    public static function fromJson($json) {
        $arr = json_decode($json, true);
        return static::fromArr($arr);
    }

}
