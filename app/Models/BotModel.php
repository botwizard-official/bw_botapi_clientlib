<?php

namespace BotapiClient\Models;

use BotapiClient\Dto\EmulatorMessage;
use BotapiClient\Dto\PeerListItem;
use BotapiClient\Helpers\PeersList;
use BotapiClient\Helpers\SearchResult;

class BotModel extends AbstractModel {

    public function getBotList() {
        return parent::call('bot.list');
    }

    public function create($name) {
        $params = [
            'name' => strval($name),
        ];
        return parent::call('bot.create', $params);
    }

    public function delete() {
        return parent::call('bot.delete');
    }

    public function getLatestErrors() {
        return parent::call('bot.get_latest_errors');
    }

    /**
     * 
     * @param string $customer (program:chat) example: EM:test
     * @param int $nodeNum Block ID
     * @return array
     */
    public function startNode($customer, $nodeNum) {
        $params = [
            'customer' => strval($customer),
            'nid' => intval($nodeNum),
        ];
        return parent::call('bot.start_node', $params);
    }

    /**
     * 
     * @param string $text
     * @return EmulatorMessage[]
     */
    public function emulate($text) {
        $params = [
            'text' => strval($text),
        ];
        $items = parent::call('bot.emu', $params);
        $fn = function ($item) {
            if (!is_array($item) || empty($item['type'])) {
                return null;
            }
            return EmulatorMessage::fromArr($item);
        };
        return array_values(array_filter(array_map($fn, $items)));
    }

    /**
     * 
     * @return float
     */
    public function balance() {
        return parent::call('bot.balance.get');
    }

    /**
     * 
     * @return array
     */
    public function getSettings() {
        return parent::call('bot.settings.get');
    }

    /**
     * 
     * @param array $settings
     * @return array
     */
    public function putSettings(array $settings) {
        $params = [
            'settings' => json_encode($settings),
        ];
        return parent::call('bot.settings.get', $params);
    }

    /**
     * 
     * @param string $text
     * @return array
     * [search_results, messages, peers]
     */
    public function search($text) {
        $params = [
            'q' => strval($text),
        ];
        $result = parent::call('bot.search', $params);

        $items = (array) ($result['peers'] ?? []);
        $messages = (array) ($result['messages'] ?? []);
        $searchResults = (array) ($result['search_results'] ?? []);

        $out = [];
        foreach ($items as $item) {
            array_push($out, PeerListItem::fromArr($item));
        }

        return new SearchResult($searchResults,
                new PeersList($out), $messages);
    }

}
