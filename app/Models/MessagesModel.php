<?php

namespace BotapiClient\Models;

use BotapiClient\Dto\ApiClientPostFile;

class MessagesModel extends AbstractModel {

    /**
     * 
     * @param array $phone
     * @param string $program
     * @param string $text
     * @return array
     */
    public function writeFirst($phone, $program, $text) {
        $params = [
            'tel' => $phone,
            'program' => $program,
            'text' => $text,
        ];
        return parent::call('bot.messages.write_first', $params);
    }

    /**
     * 
     * @param string $peer
     * @param int $id
     * @param int $limit
     * @return array
     */
    public function history($peer,
            $id = 0, $limit = 50) {
        $params = [
            'customer' => $peer,
            'id' => $id,
            'limit' => $limit,
        ];
        return parent::call('bot.messages.history.get', $params);
    }

    /**
     * 
     * @param int[] $ids
     * @return array
     */
    public function getMsgStatus(array $ids) {
        $params = [
            'idlist' => implode(',', $ids),
        ];
        return parent::call('bot.messages.status', $params);
    }

    public function sendTextMessage($peer, $text) {
        $params = [
            'customer' => $peer,
            'text' => $text,
        ];
        return parent::call('bot.messages.send.text', $params);
    }

    public function sendImageMessage($peer, $text, ApiClientPostFile $image) {
        $params = [
            'customer' => $peer,
            'text' => $text,
        ];
        $files = [
            'image' => $image,
        ];
        return parent::call('bot.messages.send.image', $params, $files);
    }

    public function sendAudioMessage($peer, ApiClientPostFile $audio) {
        $params = [
            'customer' => $peer,
        ];
        $files = [
            'audio' => $audio,
        ];
        return parent::call('bot.messages.send.audio', $params, $files);
    }

    public function sendVideoMessage($peer, ApiClientPostFile $video) {
        $params = [
            'customer' => $peer,
        ];
        $files = [
            'video' => $video,
        ];
        return parent::call('bot.messages.send.video', $params, $files);
    }

    public function sendFileMessage($peer, ApiClientPostFile $file) {
        $params = [
            'customer' => $peer,
        ];
        $files = [
            'file' => $file,
        ];
        return parent::call('bot.messages.send.file', $params, $files);
    }

}
