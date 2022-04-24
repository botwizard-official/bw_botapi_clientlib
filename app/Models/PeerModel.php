<?php

namespace BotapiClient\Models;

use BotapiClient\Dto\PeerListItem;
use BotapiClient\Helpers\PeersList;
use BotapiClient\Helpers\PeersListResult;

class PeerModel extends AbstractModel {

    /**
     * 
     * @param array $filter [program,folder_id,user_id]
     * @param string $cursor
     * @param int $limit
     * @return PeersListResult
     */
    public function getPeersList(array $filter = [],
            $cursor = '', $limit = 25) {
        $params = [
            'cursor' => strval($cursor),
            'limit' => strval($limit),
            'program' => strval($filter['program'] ?? ''),
            'folder_id' => intval($filter['folder_id'] ?? 0),
            'user_id' => intval($filter['user_id'] ?? 0),
        ];
        $result = parent::call('bot.peer.list', $params);
        $items = (array) ($result['peers'] ?? []);
        $messages = (array) ($result['messages'] ?? []);
        $lastCursor = strval($result['cursor'] ?? '');
        $out = [];
        foreach ($items as $item) {
            array_push($out, PeerListItem::fromArr($item));
        }
        return new PeersListResult($lastCursor,
                new PeersList($out), $messages);
    }

    /**
     * 
     * @param string[] $clauses
     * @return PeersListResult
     */
    public function getPeersByClauses($clauses) {
        $peersJson = json_encode($clauses, true);
        $params = [
            'peers' => strval($peersJson),
        ];
        $result = parent::call('bot.peer.get', $params);
        $items = (array) ($result['peers'] ?? []);
        $messages = (array) ($result['messages'] ?? []);
        $out = [];
        foreach ($items as $item) {
            array_push($out, PeerListItem::fromArr($item));
        }
        return new PeersListResult('',
                new PeersList($out), $messages);
    }

    /**
     * 
     * @return array
     */
    public function getCounts() {
        return parent::call('bot.peer.counts');
    }

    /**
     * 
     * @param string $peer
     * @param int $userId
     * @return void
     */
    public function allowUserAccessToPeer($peer, $userId) {
        $params = [
            'peer' => strval($peer),
            'user_id' => intval($userId),
        ];
        parent::call('bot.peer.acl.allow_user_access', $params);
    }

    /**
     * 
     * @param string $peer
     * @param int $userId
     * @return void
     */
    public function disallowUserAccessToPeer($peer, $userId) {
        $params = [
            'peer' => strval($peer),
            'user_id' => intval($userId),
        ];
        parent::call('bot.peer.acl.disallow_user_access', $params);
    }

    /**
     * 
     * @param string $peer
     * @return int[]
     */
    public function getPeerAllowedUsers($peer) {
        $params = [
            'peer' => strval($peer),
        ];
        return parent::call('bot.peer.acl.get_peer_allowed_users', $params);
    }

    /**
     * 
     * @param string $peer
     * @return void
     */
    public function ban($peer) {
        $params = [
            'peer' => strval($peer),
        ];
        return parent::call('bot.peer.ban', $params);
    }

    /**
     * 
     * @param string $peer
     * @return void
     */
    public function unban($peer) {
        $params = [
            'peer' => strval($peer),
        ];
        return parent::call('bot.peer.unban', $params);
    }

    /**
     * 
     * @param string $peer
     * @return bool
     */
    public function isBanned($peer) {
        $params = [
            'peer' => strval($peer),
        ];
        return parent::call('bot.peer.is_banned', $params);
    }

}
