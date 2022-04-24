<?php

namespace BotapiClient\Models;

use BotapiClient\BotapiClient;
use BotapiClient\BotapiException;
use BotapiClient\Dto\ApiClientPostFile;
use BotapiClient\Helpers\Util;

abstract class AbstractModel {

    /**
     *
     * @var BotapiClient
     */
    protected $client;

    public function __construct(BotapiClient $client) {
        $this->client = $client;
    }

    /**
     * 
     * @param string $methodName
     * @param mixed $params
     * @param ApiClientPostFile[] $files
     * @return array
     */
    protected function call($methodName, $params = [], array $files = []) {
        $url = $this->client->getApiUrl();
        $botid = $this->client->getBotid();
        $accessToken = $this->client->getAccessToken();
        $timeout = $this->client->getTimeout();
        $headers = Util::makeHeadersArray($methodName, $accessToken);
        $postbody = Util::makePostbody($botid, $params, $files);
        $raw = Util::doPost($url, $postbody, $headers, $timeout);
        $result = Util::parseJson($raw);
        if (empty($result) || !isset($result['success'])) {
            throw new BotapiException('bad response, no mandatory keys');
        }
        if (!$result['success']) {
            throw new BotapiException($result['message'], $result['status']);
        }
        return Util::parseJson($result['data']);
    }

}
