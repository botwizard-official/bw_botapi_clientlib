<?php

namespace BotapiClient\Helpers;

use BotapiClient\Dto\Userinfo;

class MemberPolicyFlag {

    const FLAG_OWNER = 1 << 0;
    const FLAG_ADMIN = 1 << 1;
    const FLAG_DEVELOPER = 1 << 2;
    const FLAG_CHAT_ACCESS = 1 << 3;
    const FLAG_LEADS_ACCESS = 1 << 4;
    const FLAG_WRITE_FIRST = 1 << 5;
    const FLAG_SEE_ALL_DIALOGS = 1 << 6;
    const FLAG_ALLOW_BAN_PEERS = 1 << 7;

    public static function hasFlag(Userinfo $userinfo, $flag) {
        return ($userinfo->getMemberPolicyFlags() & $flag) !== 0;
    }

}
