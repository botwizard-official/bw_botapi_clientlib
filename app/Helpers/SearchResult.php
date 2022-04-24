<?php

namespace BotapiClient\Helpers;

class SearchResult extends PeersListResult {

    /**
     *
     * @var array
     */
    protected $searchResults;

    public function __construct(array $searchResults,
            PeersList $peersList, array $messages) {
        parent::__construct('', $peersList, $messages);

        $this->searchResults = $searchResults;
    }

    public function getSearchResults(): array {
        return $this->searchResults;
    }

    public function setSearchResults(array $searchResults) {
        $this->searchResults = $searchResults;
        return $this;
    }

}
