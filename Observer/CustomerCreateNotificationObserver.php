<?php

namespace N98Hackathon\BlaBla\Observer;

use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\Event\Observer;
use N98Hackathon\BlaBla\Channel\ChannelPool;

/**
 * Class CustomerCreateNotificationObserver
 */
class CustomerCreateNotificationObserver
{
    /**
     * @var ChannelPool
     */
    protected $channelPool;

    /**
     * CustomerCreateNotificationObserver constructor.
     *
     * @param ChannelPool $channelPool
     */
    public function __construct(ChannelPool $channelPool)
    {
        $this->channelPool = $channelPool;
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
        /** @var CustomerInterface $customer */
        $customer = $observer->getData('customer');
        $customerMail = $customer->getEmail();

        $channels = $this->channelPool->getChannels();

        foreach ($channels as $channel) {
            $channel->send('Created new customer ' . $customerMail);
        }
    }
}
