<?php

namespace BotapiClient\Models;

class BotProgramModel extends AbstractModel {

    /**
     * 
     * @param string $program
     * @return void
     */
    public function registerCustomProgram($program) {
        $params = [
            'program' => strval($program),
        ];
        return parent::call('bot.program.custom.register', $params);
    }

    /**
     * 
     * @param string $program
     * @return void
     */
    public function unregisterCustomProgram($program) {
        $params = [
            'program' => strval($program),
        ];
        return parent::call('bot.program.custom.unregister', $params);
    }

    /**
     * 
     * @return array
     */
    public function getCustomProgramsList() {
        return parent::call('bot.program.custom.list');
    }

}
