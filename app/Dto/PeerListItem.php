<?php

namespace BotapiClient\Dto;

class PeerListItem {

    protected $customer;
    protected $lastMsgTime;
    protected $lastMsgId;
    protected $profileTel;
    protected $profileLogin;
    protected $profileNickname;

    public function getCustomer() {
        return $this->customer;
    }

    public function getLastMsgTime() {
        return $this->lastMsgTime;
    }

    public function getLastMsgId() {
        return $this->lastMsgId;
    }

    public function getProfileLogin() {
        return $this->profileLogin;
    }

    public function getProfileNickname() {
        return $this->profileNickname;
    }

    public function setCustomer($customer) {
        $this->customer = $customer;
        return $this;
    }

    public function setLastMsgTime($lastMsgTime) {
        $this->lastMsgTime = $lastMsgTime;
        return $this;
    }

    public function setLastMsgId($lastMsgId) {
        $this->lastMsgId = $lastMsgId;
        return $this;
    }

    public function setProfileLogin($profileLogin) {
        $this->profileLogin = $profileLogin;
        return $this;
    }

    public function setProfileNickname($profileNickname) {
        $this->profileNickname = $profileNickname;
        return $this;
    }

    public function getProfileTel() {
        return $this->profileTel;
    }

    public function setProfileTel($profileTel) {
        $this->profileTel = $profileTel;
        return $this;
    }

    public static function fromArr(array $arr) {
        $obj = new PeerListItem();
        $obj->setCustomer(strval($arr['customer'] ?? ''));
        $obj->setLastMsgTime(intval($arr['last_msg_time'] ?? ''));
        $obj->setLastMsgId(intval($arr['last_msg_id'] ?? 0));
        $obj->setProfileLogin(strval($arr['profile_login'] ?? ''));
        $obj->setProfileNickname(strval($arr['profile_nickname'] ?? ''));
        $obj->setProfileTel(strval($arr['profile_tel'] ?? ''));
        return $obj;
    }

}
