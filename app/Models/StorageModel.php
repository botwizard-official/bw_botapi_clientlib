<?php

namespace BotapiClient\Models;

class StorageModel extends AbstractModel {

    /**
     * @return array
     */
    public function getQuotaInfo() {
        return parent::call('bot.storage.quota.get');
    }

}
