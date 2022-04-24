<?php

namespace BotapiClient\Models;

use BotapiClient\Dto\NewHsmTemplateParams;

class WhatsappModel extends AbstractModel {

    /**
     * 
     * @param string $tel
     * @return array
     * [tel,token]
     */
    public function create($tel) {
        $params = [
            'tel' => strval($tel),
        ];
        return parent::call('waba.create', $params);
    }

    /**
     * 
     * @return array
     */
    public function getWabaList() {
        return parent::call('waba.list');
    }

    /**
     * 
     * @param string $tel
     * @return array
     * [tel,token]
     */
    public function regenWabaToken($tel) {
        $params = [
            'tel' => strval($tel),
        ];
        return parent::call('waba.regen_token', $params);
    }

    /**
     * 
     * Initial request $data:
     * - company_name (Your Legal name as it shown in Business Manager)
     * - fb_id (Meta Business Manager ID)
     * - display_name (WhatsApp Display Name)
     * - address (company Legal Address) ! visible inside WhatsApp profile !
     * - city (company Legal Address)
     * - state (company Legal Address)
     * - country (company Legal Address)
     * - zip (company Legal Address)
     * 
     * [Only when WABA approved & activated by OTP code]
     * Business details update (profile):
     * - about (Hi there! I am using WhatsApp.)
     * - description (text visible inside WhatsApp profile page)
     * - site (visible inside WhatsApp profile page)
     * - email (visible inside WhatsApp profile page)
     * 
     * @param string $tel
     * @param string $data
     * @param ApiClientPostFile $newAvatar (only when WABA approved)
     * @return string[]
     */
    public function update($tel,
            array $data = [],
            ApiClientPostFile $newAvatar = null) {
        $params = array_merge($data, [
            'tel' => strval($tel),
        ]);
        if (empty($newAvatar)) {
            $files = [];
        } else {
            $files = [
                'image' => $newAvatar,
            ];
        }
        return parent::call('waba.update', $params, $files);
    }

    /**
     * 
     * @param string $tel
     * @return array
     */
    public function fbAccepted($tel) {
        $params = [
            'tel' => strval($tel),
        ];
        return parent::call('waba.fb_accepted', $params);
    }

    /**
     * 
     * @param string $tel
     * @return array
     */
    public function otpRequestCode($tel) {
        $params = [
            'tel' => strval($tel),
        ];
        return parent::call('waba.otp.request_code', $params);
    }

    /**
     * 
     * @param string $tel
     * @param string $code
     * @return array
     */
    public function otpEnterCode($tel, $code) {
        $params = [
            'code' => strval($code),
            'tel' => strval($tel),
        ];
        return parent::call('waba.otp.enter_code', $params);
    }

    /**
     * 
     * @param string $tel
     * @return array
     */
    public function getHsmList($tel) {
        $params = [
            'tel' => strval($tel),
        ];
        return parent::call('waba.hsm.list', $params);
    }

    /**
     * 
     * @param string $tel
     * @param NewHsmTemplateParams $data
     * @return array
     */
    public function submitHsmTemplate($tel, NewHsmTemplateParams $data) {
        $params = [
            'tel' => $tel,
            'el' => $data->getEl(),
            'lang' => $data->getLang(),
            'text' => $data->getText(),
            'category' => $data->getCategory(),
            'interactive' => $data->getInteractive(),
        ];
        if ($data->getInteractive() === 'QUICK_REPLY') {
            $btnJson = json_encode($data->getQuickReplyButtons());
            $params = array_merge($params, [
                'quick_reply_buttons' => $btnJson,
            ]);
        } elseif ($data->getInteractive() === 'CALL_TO_ACTION') {
            $params = array_merge($params, [
                'site_value' => $data->getSiteValue(),
                'site_label' => $data->getSiteLabel(),
                'tel_value' => $data->getTelValue(),
                'tel_label' => $data->getTelLabel(),
            ]);
        }
        return parent::call('waba.hsm.submit', $params);
    }

}
