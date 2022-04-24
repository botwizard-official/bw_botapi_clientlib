<?php

namespace BotapiClient\Models;

class LeadModel extends AbstractModel {

    /**
     * 
     * @param array $data
     * @return int
     */
    public function add(array $data) {
        return parent::call('bot.lead.add', $data);
    }

    /**
     * 
     * @param int $pageNum
     * @param int $perPage
     * @return array
     */
    public function getLeadsList($pageNum, $perPage = 25) {
        $params = [
            'page_num' => $pageNum,
            'per_page' => $perPage,
        ];
        return parent::call('bot.lead.list', $params);
    }

    /**
     * 
     * @return array
     * [lead_count,contact_count]
     */
    public function getCounts() {
        return parent::call('bot.lead.counts');
    }

    /**
     * 
     * @param string $target
     * @return string
     */
    public function export($target) {
        $params = [
            'target' => $target,
        ];
        return parent::call('bot.lead.export', $params);
    }

    /**
     * 
     * @param int $leadId
     * @return void
     */
    public function delete($leadId) {
        $params = [
            'id' => $leadId,
        ];
        return parent::call('bot.lead.delete', $params);
    }

    /**
     * 
     * @return void
     */
    public function deleteAll($leadId) {
        return parent::call('bot.lead.delete.all');
    }

}
