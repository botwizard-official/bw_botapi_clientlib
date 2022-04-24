<?php

namespace BotapiClient\Models;

class SubscriptionsModel extends AbstractModel {

    /**
     * 
     * @param string $customer
     * @param array $hubNames
     */
    public function subscribe($customer, array $hubNames) {
        $params = [
            'customer' => strval($customer),
            'hubs' => implode(',', $hubNames),
        ];
        return parent::call('bot.subscriptions.subscribe', $params);
    }

    /**
     * 
     * @param string $customer
     * @param array $hubNames
     */
    public function unsubscribe($customer, array $hubNames) {
        $params = [
            'customer' => strval($customer),
            'hubs' => implode(',', $hubNames),
        ];
        return parent::call('bot.subscriptions.unsubscribe', $params);
    }

    /**
     * 
     * @return array
     */
    public function getBotSubscribersList() {
        return parent::call('bot.subscriptions.get_bot_subscribers_list');
    }

    /**
     * 
     * @return array
     */
    public function getBotHubs() {
        return parent::call('bot.subscriptions.hub.get_bot_hubs');
    }

    /**
     * 
     * @return array
     */
    public function getHubSubscribersList() {
        return parent::call('bot.subscriptions.hub.get_bot_hubs');
    }

    /**
     * 
     * @param string $customer
     * @return array
     */
    public function getPeerSubscriptionsList($customer) {
        $params = [
            'customer' => strval($customer),
        ];
        return parent::call('bot.subscriptions.hub.get_hub_subscribers_list',
                        $params);
    }

}
