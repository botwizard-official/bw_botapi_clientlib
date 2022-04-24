<?php

namespace BotapiClient\Models;

class BotChannelModel extends AbstractModel {

    /**
     * 
     * @param string $program
     * @param string $token
     * @return array [name]
     */
    public function register($program, $token) {
        $params = [
            'program' => strval($program),
            'token' => strval($token),
        ];
        return parent::call('bot.channel.register', $params);
    }

    /**
     * 
     * @param string $program
     * @return void
     */
    public function unregister($program) {
        $params = [
            'program' => strval($program),
        ];
        return parent::call('bot.channel.unregister', $params);
    }

    /**
     * 
     * @return array
     */
    public function getChannelsStatus() {
        return parent::call('bot.channel.status');
    }

}
