<?php

namespace N98Hackathon\BlaBla\Api;

/**
 * Interface ConfigInterface
 *
 * @api
 */
interface ConfigInterface
{
    /**
     * Enable / disable slack push notifications
     */
    const XPATH_SLACK_ENABLED = 'n98hackathon_blabla/slack/is_enabled';

    /**
     * Webhook for sending slack messages to
     */
    const XPATH_SLACK_WEBHOOK_URL = 'n98hackathon_blabla/slack/webhook_url';

    /**
     * Enable / disable order purchase event push notifications
     */
    const XPATH_ORDER_PURCHASE_ENABLED = 'n98hackathon_blabla/events/order_purchase_enabled';

    /**
     * Enable / disable customer creation event push notifications
     */
    const XPATH_CUSTOMER_CREATION_ENABLED = 'n98hackathon_blabla/events/customer_creation_enabled';

    /**
     * Enable / disable zero search results event push notifications
     */
    const XPATH_ZERO_SEARCH_RESULTS_ENABLED = 'n98hackathon_blabla/events/zero_search_results_enabled';

    /**
     * @return bool
     */
    public function isSlackEnabled(): bool;

    /**
     * @return null|string
     */
    public function getSlackWebhookUrl();

    /**
     * @return bool
     */
    public function isCustomerCreationEventEnabled(): bool;

    /**
     * @return bool
     */
    public function isOrderPurchaseEventEnabled(): bool;

    /**
     * @return bool
     */
    public function isZeroSearchResultsEventEnabled(): bool;
}