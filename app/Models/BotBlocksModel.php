<?php

namespace BotapiClient\Models;

class BotBlocksModel extends AbstractModel {

    /**
     * 
     * @return array
     */
    public function getSchema() {
        return parent::call('bot.block.schema.get');
    }

    /**
     * 
     * @return array
     */
    public function getCustomBlocksList() {
        return parent::call('bot.block.custom.list');
    }

    /**
     * 
     * @param array $params
     * [
     * code = string
     * handler_url = URL string
     * fields_schema = JSON string
     * outputs_schema = JSON string
     * use_external_settings_page = Y|N
     * ]
     * 
     * @return array [block_token]
     */
    public function registerCustomBlock(array $params) {
        return parent::call('bot.block.custom.register', $params);
    }

    /**
     * 
     * @param string $code
     * @param string $blockToken
     */
    public function unregisterCustomBlock($code, $blockToken) {
        $params = [
            'code' => strval($code),
            'block_token' => strval($blockToken),
        ];
        return parent::call('bot.block.custom.unregister', $params);
    }

    /**
     * 
     * @param string $code
     * @param string $blockToken
     * @param int $node
     * @param array $settings
     */
    public function putCustomBlockSettings($code,
            $blockToken,
            $node,
            array $settings) {
        $params = [
            'code' => strval($code),
            'block_token' => strval($blockToken),
            'node' => intval($node),
            'settings' => json_encode($settings),
        ];
        return parent::call('bot.block.custom.settings.put', $params);
    }

    /**
     * 
     * @param string $code
     * @param string $blockToken
     * @param int $node
     * @return array
     */
    public function getCustomBlockSettings($code, $blockToken, $node) {
        $params = [
            'code' => strval($code),
            'block_token' => strval($blockToken),
            'node' => intval($node),
        ];
        return parent::call('bot.block.custom.settings.get', $params);
    }

}
