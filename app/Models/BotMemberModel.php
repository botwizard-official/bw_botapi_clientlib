<?php

namespace BotapiClient\Models;

use BotapiClient\BotapiException;

class BotMemberModel extends AbstractModel {

    /**
     * 
     * @return array
     */
    public function getMembersList() {
        $res = parent::call('bot.member.list');
        if (empty($res) || !isset($res['members'])) {
            throw new BotapiException('no "members" key');
        }
        return (array) $res['members'];
    }

    /**
     * 
     * @param int $userId
     * @param int $policyFlags
     * @return int
     */
    public function addMember($userId, $policyFlags) {
        $params = [
            'member_user_id' => intval($userId),
            'add_flags' => intval($policyFlags),
        ];
        $res = parent::call('bot.member.add', $params);
        return intval($res['invite_id']);
    }

    /**
     * 
     * @param int $inviteId
     * @return void
     */
    public function acceptInvite($inviteId) {
        $params = [
            'invite_id' => intval($inviteId),
        ];
        return parent::call('bot.member.invite.accept', $params);
    }

    /**
     * 
     * @param int $inviteId
     * @return void
     */
    public function rejectInvite($inviteId) {
        $params = [
            'invite_id' => intval($inviteId),
        ];
        return parent::call('bot.member.invite.reject', $params);
    }

    /**
     * 
     * @param int $userId
     * @param int $addFlags
     * @param int $removeFlags
     * @return void
     */
    public function editPolicyFlags($userId,
            $addFlags = 0, $removeFlags = 0) {
        $params = [
            'member_user_id' => intval($userId),
            'add_flags' => intval($addFlags),
            'remove_flags' => intval($removeFlags),
        ];
        return parent::call('bot.member.edit_policy', $params);
    }

    /**
     * 
     * @param int $userId
     * @return void
     */
    public function removeMember($userId) {
        $params = [
            'member_user_id' => intval($userId),
        ];
        return parent::call('bot.member.remove', $params);
    }

}
