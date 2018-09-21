<?php

namespace N98Hackathon\BlaBla\Observer;

use Magento\Framework\Event\Observer;
use Magento\Sales\Api\Data\OrderInterface;
use N98Hackathon\BlaBla\Channel\Slack;

/**
 * Class OrderPurchaseNotificationObserver
 */
class OrderPurchaseNotificationObserver
{
    /**
     * @var Slack
     */
    protected $slack;

    /**
     * OrderPurchaseNotificationObserver constructor.
     *
     * @param Slack $slack
     */
    public function __construct(Slack $slack)
    {
        $this->slack = $slack;
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
        /** @var OrderInterface $order */
        $order = $observer->getData('order');
        $total = $order->getGrandTotal();

        $this->slack->send('New order placed: ' . $total);
    }
}
