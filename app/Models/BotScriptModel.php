<?php

namespace BotapiClient\Models;

use BotapiClient\Dto\Botscript;

class BotScriptModel extends AbstractModel {

    /**
     * 
     * @return Botscript
     */
    public function readScript() {
        $contents = parent::call('bot.script.read');
        return new Botscript(strval($contents));
    }

    /**
     * 
     * @return array
     * [perf,runs]
     */
    public function report() {
        return parent::call('bot.script.report');
    }

    /**
     * 
     * @param Botscript $script
     */
    public function writeScript(Botscript $script) {
        $contents = $script->getContents();
        parent::call('bot.script.write', [
            'contents' => strval($contents),
        ]);
    }

    /**
     * 
     * @param string $type image|audio|video|file
     * @return array
     * [upload_id, upload_hash, url, field]
     */
    public function beginBotscriptFileUpload($type) {
        $params = [
            'type' => strval($type),
        ];
        return parent::call('bot.script.file.begin_upload', $params);
    }

    /**
     * 
     * @param int $uploadId
     * @param string $acceptHash
     * @return array
     */
    public function acceptBotscriptFile($uploadId, $acceptHash) {
        $params = [
            'upload_id' => intval($uploadId),
            'accept_hash' => strval($acceptHash),
        ];
        return parent::call('bot.script.file.accept', $params);
    }

    /**
     * 
     * @param int $id
     * @param string $deltoken
     * @return array
     */
    public function deleteBotscriptFile($id, $deltoken) {
        $params = [
            'id' => intval($id),
            'deltoken' => strval($deltoken),
        ];
        return parent::call('bot.script.file.delete', $params);
    }

}
