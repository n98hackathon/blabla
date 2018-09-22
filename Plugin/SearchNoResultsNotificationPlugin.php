<?php

namespace N98Hackathon\BlaBla\Observer;

use Magento\Catalog\Model\Layer;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
use N98Hackathon\BlaBla\Api\ChannelPoolInterface;

/**
 * Class SearchNoResultsNotificationPlugin
 */
class SearchNoResultsNotificationPlugin
{
    /**
     * @var ChannelPoolInterface
     */
    protected $channelPool;

    /**
     * SearchNoResultsNotificationPlugin constructor.
     *
     * @param ChannelPoolInterface $channelPool
     */
    public function __construct(ChannelPoolInterface $channelPool)
    {
        $this->channelPool = $channelPool;
    }

    /**
     * Submit notification when catalog search returns no results
     *
     * @param Layer      $subject
     * @param Collection $productCollection
     *
     * @return Collection
     */
    public function afterGetProductCollection(Layer $subject, Collection $productCollection)
    {
        $itemsCount = $productCollection->count();

        if (!$itemsCount) {
            // TODO: Add implementation
        }

        return $productCollection;
    }
}
