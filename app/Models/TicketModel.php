<?php

namespace BotapiClient\Models;

use BotapiClient\BotapiException;
use BotapiClient\Dto\ApiClientPostFile;

class TicketModel extends AbstractModel {

    /**
     * 
     * @return array
     * [details,status]
     * @throws BotapiException
     */
    public function getTicketsInfo() {
        return parent::call('bot.support.ticket.tickets_info');
    }

    /**
     * 
     * @param string $peer
     * @return void
     */
    public function resetUnreadMsgCount($peer) {
        $params = [
            'customer' => strval($peer),
        ];
        parent::call('bot.support.ticket.reset_unread', $params);
    }

    /**
     * 
     * @param string $peer
     * @return void
     */
    public function leave($peer) {
        $params = [
            'customer' => strval($peer),
        ];
        parent::call('bot.support.ticket.op_leave', $params);
    }

    /**
     * 
     * @param string $peer
     * @return void
     */
    public function close($peer) {
        $params = [
            'customer' => strval($peer),
        ];
        parent::call('bot.support.ticket.close', $params);
    }

    public function replyText($peer, $text) {
        $params = [
            'customer' => $peer,
            'ticket_auto_create' => 'Y',
            'text' => $text,
        ];
        return parent::call('bot.support.ticket.reply.text', $params);
    }

    public function replyImage($peer, $text, ApiClientPostFile $image) {
        $params = [
            'customer' => $peer,
            'ticket_auto_create' => 'Y',
            'text' => $text,
        ];
        $files = [
            'image' => $image,
        ];
        return parent::call('bot.support.ticket.reply.image', $params, $files);
    }

    public function replyAudio($peer, ApiClientPostFile $audio) {
        $params = [
            'customer' => $peer,
            'ticket_auto_create' => 'Y',
        ];
        $files = [
            'audio' => $audio,
        ];
        return parent::call('bot.support.ticket.reply.audio', $params, $files);
    }

    public function replyVideo($peer, ApiClientPostFile $video) {
        $params = [
            'customer' => $peer,
            'ticket_auto_create' => 'Y',
        ];
        $files = [
            'video' => $video,
        ];
        return parent::call('bot.support.ticket.reply.video', $params, $files);
    }

    public function replyFile($peer, ApiClientPostFile $file) {
        $params = [
            'customer' => $peer,
            'ticket_auto_create' => 'Y',
        ];
        $files = [
            'file' => $file,
        ];
        return parent::call('bot.support.ticket.reply.file', $params, $files);
    }

    /**
     * 
     * @param string $peer
     * @param int $operatorId
     * @return void
     */
    public function assignOperator($peer, $operatorId) {
        $params = [
            'customer' => $peer,
            'op_id' => intval($operatorId),
        ];
        parent::call('bot.support.ticket.assign_op', $params);
    }

}
