<?php

namespace N98Hackathon\BlaBla\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use N98Hackathon\BlaBla\Api\ChannelPoolInterface;
use N98Hackathon\BlaBla\Api\ConfigInterface;

/**
 * Class ContactUsNotificationObserver
 */
class ContactUsNotificationObserver implements ObserverInterface
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
     * ContactUsNotificationObserver constructor.
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
        if (!$this->config->isContactUsEventEnabled()) {
            return;
        }

        $channels = $this->channelPool->getChannels();

        foreach ($channels as $channel) {
            $channel->send('You received new message from customer. Please check your email.');
        }
    }
}
