<?php

namespace N98Hackathon\BlaBla\Reports;

use Magento\Customer\Model\ResourceModel\Customer\Collection;
use Magento\Customer\Model\ResourceModel\Customer\CollectionFactory;
use Magento\Framework\Stdlib\DateTime;
use N98Hackathon\BlaBla\Api\ChannelPoolInterface;
use N98Hackathon\BlaBla\Api\ReportServiceInterface;

/**
 * Class CustomersCreatedReportService
 */
class NewAccountsYesterdayReportService implements ReportServiceInterface
{
    /**
     * @var ChannelPoolInterface
     */
    protected $channelPool;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * CustomersCreatedReportService constructor.
     *
     * @param ChannelPoolInterface $channelPool
     * @param CollectionFactory    $collectionFactory
     */
    public function __construct(ChannelPoolInterface $channelPool, CollectionFactory $collectionFactory)
    {
        $this->channelPool = $channelPool;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @return void
     */
    public function execute()
    {
        /** @var Collection $collection */
        $collection = $this->collectionFactory->create();

        $dateTimeStart = new \DateTime();
        $dateTimeEnd = new \DateTime();

        // go to the end of a day
        $dateTimeStart->setTime(0, 0, 0);
        $dateTimeEnd->setTime(23, 59, 59);

        $dateTimeStart->modify('-1 day');
        $dateTimeEnd->modify('-1 day');

        $dateStart = $dateTimeStart->format(DateTime::DATETIME_PHP_FORMAT);
        $dateEnd = $dateTimeEnd->format(DateTime::DATETIME_PHP_FORMAT);

        // subtract one day due to cronjob call on next day

        $collection->addFieldToFilter('created_at', ['gteq' => $dateStart, 'lteq' => $dateEnd]);
        $customerCount = $collection->count();

        foreach ($this->channelPool->getChannels() as $channel) {
            $channel->send(sprintf(__('REPORT - Customers created yesterday: %s'), $customerCount));
        }
    }
}