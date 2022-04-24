<?php

namespace BotapiClient;

use BotapiClient\Helpers\ModelSingleton;
use BotapiClient\Models\BotBlocksModel;
use BotapiClient\Models\BotChannelModel;
use BotapiClient\Models\BotFolderModel;
use BotapiClient\Models\BotMemberModel;
use BotapiClient\Models\BotModel;
use BotapiClient\Models\BotProgramModel;
use BotapiClient\Models\BotScriptModel;
use BotapiClient\Models\LeadModel;
use BotapiClient\Models\MessagesModel;
use BotapiClient\Models\PeerModel;
use BotapiClient\Models\RouteModel;
use BotapiClient\Models\StorageModel;
use BotapiClient\Models\SubscriptionsModel;
use BotapiClient\Models\TicketModel;
use BotapiClient\Models\UserModel;
use BotapiClient\Models\UtilModel;
use BotapiClient\Models\WhatsappModel;

class BotapiClient {

    protected const API_URL = 'https://botapi.botwizard.net';
    protected const TIMEOUT = 30;

    /**
     *
     * @var string
     */
    protected $apiUrl;

    /**
     *
     * @var int
     */
    protected $botid;

    /**
     *
     * @var string
     */
    protected $accessToken;

    /**
     *
     * @var int
     */
    protected $timeout;

    /**
     *
     * @var ModelSingleton
     */
    protected $models;

    public function __construct($accessToken = '',
            $timeout = self::TIMEOUT) {

        $this->setBotid(intval(0))
                ->setAccessToken(strval($accessToken))
                ->setTimeout(intval($timeout))
                ->setApiUrl(self::API_URL);

        $this->models = new ModelSingleton($this);
    }

    /**
     * 
     * @return UtilModel
     */
    public function utils() {
        return $this->models->get(UtilModel::class);
    }

    /**
     * 
     * @return UserModel
     */
    public function user() {
        return $this->models->get(UserModel::class);
    }

    /**
     * 
     * @return BotModel
     */
    public function bot() {
        return $this->models->get(BotModel::class);
    }

    /**
     * 
     * @return BotScriptModel
     */
    public function script() {
        return $this->models->get(BotScriptModel::class);
    }

    /**
     * 
     * @return BotBlocksModel
     */
    public function blocks() {
        return $this->models->get(BotBlocksModel::class);
    }

    /**
     * 
     * @return BotMemberModel
     */
    public function members() {
        return $this->models->get(BotMemberModel::class);
    }

    /**
     * 
     * @return PeerModel
     */
    public function peers() {
        return $this->models->get(PeerModel::class);
    }

    /**
     * 
     * @return BotFolderModel
     */
    public function folders() {
        return $this->models->get(BotFolderModel::class);
    }

    /**
     * 
     * @return MessagesModel
     */
    public function messages() {
        return $this->models->get(MessagesModel::class);
    }

    /**
     * 
     * @return StorageModel
     */
    public function storage() {
        return $this->models->get(StorageModel::class);
    }

    /**
     * 
     * @return BotProgramModel
     */
    public function program() {
        return $this->models->get(BotProgramModel::class);
    }

    /**
     * 
     * @return BotChannelModel
     */
    public function channels() {
        return $this->models->get(BotChannelModel::class);
    }

    /**
     * 
     * @return RouteModel
     */
    public function route() {
        return $this->models->get(RouteModel::class);
    }

    /**
     * 
     * @return TicketModel
     */
    public function tickets() {
        return $this->models->get(TicketModel::class);
    }

    /**
     * 
     * @return WhatsappModel
     */
    public function whatsapp() {
        return $this->models->get(WhatsappModel::class);
    }

    /**
     * 
     * @return LeadModel
     */
    public function lead() {
        return $this->models->get(LeadModel::class);
    }

    /**
     * 
     * @return SubscriptionsModel
     */
    public function subscriptions() {
        return $this->models->get(SubscriptionsModel::class);
    }

    public function getBotid() {
        return $this->botid;
    }

    public function getAccessToken() {
        return $this->accessToken;
    }

    public function setBotid($botid) {
        $this->botid = $botid;
        return $this;
    }

    public function setAccessToken($accessToken) {
        $this->accessToken = $accessToken;
        return $this;
    }

    public function getTimeout() {
        return $this->timeout;
    }

    public function setTimeout($timeout) {
        $this->timeout = $timeout;
        return $this;
    }

    public function getApiUrl() {
        return $this->apiUrl;
    }

    public function setApiUrl($apiUrl) {
        $this->apiUrl = $apiUrl;
        return $this;
    }

}
