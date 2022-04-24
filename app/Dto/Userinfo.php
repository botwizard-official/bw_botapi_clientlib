<?php

namespace BotapiClient\Dto;

use Exception;

class Userinfo {

    protected $userId;
    protected $username;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $tel;
    protected $lang;
    protected $ownedBots;
    protected $memberOfBots;
    protected $memberPolicyFlags;

    public function getUserId() {
        return $this->userId;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getOwnedBots() {
        return $this->ownedBots;
    }

    public function getMemberOfBots() {
        return $this->memberOfBots;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
        return $this;
    }

    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setTel($tel) {
        $this->tel = $tel;
        return $this;
    }

    public function setOwnedBots($ownedBots) {
        $this->ownedBots = $ownedBots;
        return $this;
    }

    public function setMemberOfBots($memberOfBots) {
        $this->memberOfBots = $memberOfBots;
        return $this;
    }

    public function getMemberPolicyFlags() {
        return $this->memberPolicyFlags;
    }

    public function setMemberPolicyFlags($memberPolicyFlags) {
        $this->memberPolicyFlags = $memberPolicyFlags;
        return $this;
    }

    public function getLang() {
        return $this->lang;
    }

    public function setLang($lang) {
        $this->lang = $lang;
        return $this;
    }

    public static function fromArray($arr) {
        $obj = new Userinfo();
        if (!isset($arr['user_id'])) {
            throw new Exception('no "user_id" key');
        } else {
            $obj->setUserId(intval($arr['user_id']));
        }
        if (!isset($arr['username'])) {
            throw new Exception('no "username" key');
        } else {
            $obj->setUsername(strval($arr['username']));
        }
        if (!isset($arr['first_name'])) {
            throw new Exception('no "first_name" key');
        } else {
            $obj->setFirstName(strval($arr['first_name']));
        }
        if (!isset($arr['last_name'])) {
            throw new Exception('no "last_name" key');
        } else {
            $obj->setLastName(strval($arr['last_name']));
        }
        if (isset($arr['email'])) {
            $obj->setEmail(strval($arr['email']));
        }
        if (isset($arr['tel'])) {
            $obj->setTel(strval($arr['tel']));
        }
        if (isset($arr['lang'])) {
            $obj->setTel(strval($arr['lang']));
        }
        if (!isset($arr['owned_bots'])) {
            throw new Exception('no "owned_bots" key');
        } else {
            $obj->setOwnedBots((array) $arr['owned_bots']);
        }
        if (!isset($arr['member_of_bots'])) {
            throw new Exception('no "member_of_bots" key');
        } else {
            $obj->setMemberOfBots((array) $arr['member_of_bots']);
        }
        if (!isset($arr['member_policy_flags'])) {
            throw new Exception('no "member_policy_flags" key');
        } else {
            $obj->setMemberPolicyFlags(intval($arr['member_policy_flags']));
        }
        return $obj;
    }

}
