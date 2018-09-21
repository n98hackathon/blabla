<?php

namespace N98Hackathon\BlaBla\Observer;

use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Framework\Event\Observer;
use N98Hackathon\BlaBla\Channel\Slack;

/**
 * Class CustomerCreateNotificationObserver
 */
class CustomerCreateNotificationObserver
{
    /**
     * @var Slack
     */
    protected $slack;

    /**
     * CustomerCreateNotificationObserver constructor.
     *
     * @param Slack $slack
     */
    public function __construct(Slack $slack)
    {
        $this->slack = $slack;
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

        $this->slack->send('Created new customer ' . $customerMail);
    }
}
