<?php

namespace N98Hackathon\BlaBla\Observer;

use Magento\Framework\Event\Observer;
use Magento\Sales\Api\Data\OrderInterface;
use N98Hackathon\BlaBla\Api\ChannelPoolInterface;
use N98Hackathon\BlaBla\Api\ConfigInterface;

/**
 * Class OrderPurchaseNotificationObserver
 */
class OrderPurchaseNotificationObserver
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
     * OrderPurchaseNotificationObserver constructor.
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
     * Submit notification after success order placement
     *
     * @param Observer $observer
     *
     * @return void
     */
    public function execute(Observer $observer)
    {
        if (!$this->config->isOrderPurchaseEventEnabled()) {
            return;
        }

        /** @var OrderInterface $order */
        $order = $observer->getData('order');
        $total = $order->getGrandTotal();

        $channels = $this->channelPool->getChannels();

        foreach ($channels as $channel) {
            $channel->send('New order placed: ' . $total);
        }
    }
}
