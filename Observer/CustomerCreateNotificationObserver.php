<?php

namespace N98Hackathon\BlaBla\Observer;

use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\Event\Observer;
use N98Hackathon\BlaBla\Api\ChannelPoolInterface;
use N98Hackathon\BlaBla\Api\ConfigInterface;
use N98Hackathon\BlaBla\Channel\ChannelPool;

/**
 * Class CustomerCreateNotificationObserver
 */
class CustomerCreateNotificationObserver
{
    /**
     * @var ChannelPoolInterface
     */
    protected $channelPool;

    /**
     * @var ConfigInterface
     */
    protected $config;

    /**
     * CustomerCreateNotificationObserver constructor.
     *
     * @param ChannelPoolInterface $channelPool
     * @param ConfigInterface      $config
     */
    public function __construct(ChannelPoolInterface $channelPool, ConfigInterface $config)
    {
        $this->channelPool = $channelPool;
        $this->config = $config;
    }

    /**
     * Submit notification after success customer registration
     *
     * @param Observer $observer
     *
     * @return void
     */
    public function execute(Observer $observer)
    {
        if (!$this->config->isCustomerCreationEventEnabled()) {
            return;
        }

        /** @var CustomerInterface $customer */
        $customer = $observer->getData('customer');
        $customerMail = $customer->getEmail();

        $channels = $this->channelPool->getChannels();

        foreach ($channels as $channel) {
            $channel->send('Created new customer ' . $customerMail);
        }
    }
}
