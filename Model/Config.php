<?php
/**
 * @copyright Copyright (c) 1999-2018 netz98 GmbH (http://www.netz98.de)
 *
 * @see       PROJECT_LICENSE.txt
 */

namespace N98Hackathon\BlaBla\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use N98Hackathon\BlaBla\Api\ConfigInterface;

/**
 * Class Config
 */
class Config implements ConfigInterface
{
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Config constructor.
     *
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return null|string
     */
    public function getSlackWebhookUrl()
    {
        $value = $this->scopeConfig->getValue(self::XPATH_SLACK_WEBHOOK_URL, ScopeInterface::SCOPE_STORE);

        return $value;
    }

    /**
     * @return bool
     */
    public function isSlackEnabled()
    {
        $value = $this->scopeConfig->getValue(self::XPATH_SLACK_ENABLED, ScopeInterface::SCOPE_STORE);

        return (bool)$value;
    }
}