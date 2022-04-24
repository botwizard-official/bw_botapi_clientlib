<?php

namespace BotapiClient\Models;

class UtilModel extends AbstractModel {

    /**
     * 
     * @return int
     */
    public function getServerTime() {
        $res = parent::call('util.time');
        return $res['now'] ?? 0;
    }

    /**
     * 
     * @return array
     */
    public function getApiStats() {
        return parent::call('util.api.stats');
    }

    /**
     * 
     * @return array
     */
    public function getApiLatestErrors($userId = 0) {
        $params = [];
        if ($userId > 0) {
            $params = [
                'user_id' => $userId,
            ];
        }
        return parent::call('util.api.log', $params);
    }

}
