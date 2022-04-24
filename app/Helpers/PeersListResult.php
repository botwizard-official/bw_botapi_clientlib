<?php

namespace BotapiClient\Helpers;

class PeersListResult {

    /**
     *
     * @var string
     */
    protected $cursor;

    /**
     *
     * @var PeersList
     */
    protected $peersList;

    /**
     *
     * @var array
     */
    protected $messages;

    public function __construct(string $cursor,
            PeersList $peersList, array $messages) {
        $this->cursor = $cursor;
        $this->peersList = $peersList;
        $this->messages = $messages;
    }

    public function getCursor(): string {
        return $this->cursor;
    }

    public function getPeersList(): PeersList {
        return $this->peersList;
    }

    public function setCursor(string $cursor) {
        $this->cursor = $cursor;
        return $this;
    }

    public function setPeersList(PeersList $peersList) {
        $this->peersList = $peersList;
        return $this;
    }

    public function getMessages(): array {
        return $this->messages;
    }

    public function setMessages(array $messages) {
        $this->messages = $messages;
        return $this;
    }

}
