<?php

namespace N98Hackathon\BlaBla\Observer;

use Magento\Framework\Event\Observer;
use Magento\Sales\Api\Data\OrderInterface;

/**
 * Class OrderPurchaseNotificationObserver
 */
class OrderPurchaseNotificationObserver
{
    /**
     * Submit notification after success order placement
     *
     * @param Observer $observer
     *
     * @return void
     */
    public function execute(Observer $observer)
    {
        /** @var OrderInterface $order */
        $order = $observer->getData('order');

        // TODO: Add implementation
    }
}
