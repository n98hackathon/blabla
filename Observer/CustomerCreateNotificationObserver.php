<?php

namespace N98Hackathon\BlaBla\Observer;

use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\Event\Observer;

/**
 * Class CustomerCreateNotificationObserver
 */
class CustomerCreateNotificationObserver
{
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

        // TODO: Add implementation
    }
}
