<?php

namespace BotapiClient\Models;

use BotapiClient\BotapiException;
use BotapiClient\Dto\Userinfo;
use Exception;

class UserModel extends AbstractModel {

    /**
     * 
     * @return Userinfo
     * @throws Exception
     */
    public function info() {
        $result = parent::call('user.info');
        if (!isset($result['userinfo']) || !is_array($result['userinfo'])) {
            throw new BotapiException('no userinfo key');
        }
        return Userinfo::fromArray($result['userinfo']);
    }

    /**
     * 
     * @param string $newPass
     * @return void
     * @throws Exception
     */
    public function setNewPass($newPass) {
        $params = [
            'new_pass' => strval($newPass),
        ];
        parent::call('user.password.change', $params);
    }

    /**
     * 
     * @param string $tel
     * @return void
     * @throws Exception
     */
    public function setTel($tel) {
        $params = [
            'tel' => strval($tel),
        ];
        parent::call('user.tel.set', $params);
    }

}
