<?php

namespace BotapiClient\Helpers;

use BotapiClient\Dto\PeerListItem;

class PeersList {

    /**
     *
     * @var PeerListItem[]
     */
    protected $peers;

    public function __construct(array $peers = []) {
        $this->peers = $peers;
    }

    /**
     * 
     * @return PeerListItem[]
     */
    public function getPeers() {
        return $this->peers;
    }

    public function setPeers($peers) {
        $this->peers = $peers;
        return $this;
    }

    public function findByProgramAndChat($program, $chat) {
        foreach ($this->peers as $item) {
            if (strcmp($item->getProgram(), strval($program)) === 0 &&
                    strcmp($item->getChat(), strval($chat)) === 0) {
                return $item;
            }
        }
        return null;
    }

    public function findByCustomer($customer) {
        if (strpos($customer, ':') === false) {
            return null;
        }
        list($program, $chat) = explode(':', $customer, 2);
        return $this->findByProgramAndChat($program, $chat);
    }

    public function findByProgram($program) {
        $out = [];
        foreach ($this->peers as $item) {
            if (strcmp($item->getProgram(), strval($program)) === 0) {
                array_push($out, $item);
            }
        }
        return new PeersList($out);
    }

}
