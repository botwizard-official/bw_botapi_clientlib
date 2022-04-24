<?php

namespace BotapiClient\Models;

class RouteModel extends AbstractModel {

    const ROUTE_DEFAULT = '@default';
    const ROUTE_BOT = '@bot';
    const ROUTE_SUPPORT = '@support';
    const ROUTE_APP_PATTERN = '@app(\d+)';

    /**
     * 
     * @param string $peer
     * @param string $newRoute
     */
    public function switch($peer, $newRoute) {
        $params = [
            'peer' => strval($peer),
            'new_route' => strval($newRoute),
        ];
        parent::call('bot.route.switch', $params);
    }

    /**
     * 
     * @param string $peer
     * @return string
     */
    public function get($peer) {
        $params = [
            'peer' => strval($peer),
        ];
        return parent::call('bot.route.get', $params);
    }

}
