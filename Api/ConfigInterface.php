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
     * Enable / disable slack push notifications
     */
    const XPATH_DISCORD_ENABLED = 'n98hackathon_blabla/discord/is_enabled';

    /**
     * Webhook for sending slack messages to
     */
    const XPATH_DISCORD_WEBHOOK_URL = 'n98hackathon_blabla/discord/webhook_url';

    /**
     * Enable / disable slack push notifications
     */
    const XPATH_HIPCHAT_ENABLED = 'n98hackathon_blabla/discord/is_enabled';

    /**
     * Webhook for sending slack messages to
     */
    const XPATH_HIPCHAT_INTEGRATION_URL = 'n98hackathon_blabla/hipchat/integration_url';

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
    public function isDiscordEnabled(): bool;

    /**
     * @return null|string
     */
    public function getDiscordWebhookUrl();

    /**
     * @return bool
     */
    public function isHipchatEnabled(): bool;

    /**
     * @return null|string
     */
    public function getHipchatIntegrationUrl();

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