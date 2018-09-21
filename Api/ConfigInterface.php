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
     * Webhook for sending slack messages to
     */
    const XPATH_SLACK_WEBHOOK_URL = 'n98hackathon/slack/webhook_url';

    /**
     * Enable / disable slack push notifications
     */
    const XPATH_SLACK_ENABLED = 'n98hackathon/slack/is_enabled';

    /**
     * @return null|string
     */
    public function getSlackWebhookUrl();

    /**
     * @return null|bool
     */
    public function isSlackEnabled();
}