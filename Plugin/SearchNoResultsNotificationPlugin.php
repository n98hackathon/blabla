<?php

namespace N98Hackathon\BlaBla\Plugin;

use Magento\Catalog\Model\Layer\Search;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\CatalogSearch\Helper\Data as CatalogSearchData;
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
     * @var CatalogSearchData
     */
    protected $catalogSearchData;

    /**
     * SearchNoResultsNotificationPlugin constructor.
     *
     * @param ChannelPoolInterface $channelPool
     * @param CatalogSearchData $catalogSearchData
     */
    public function __construct(
        ChannelPoolInterface $channelPool,
        CatalogSearchData $catalogSearchData
    ) {
        $this->channelPool = $channelPool;
        $this->catalogSearchData = $catalogSearchData;
    }

    /**
     * Submit notification when catalog search returns no results
     *
     * @param Search     $subject
     * @param Collection $productCollection
     *
     * @return Collection
     */
    public function afterGetProductCollection(Search $subject, Collection $productCollection)
    {
        $itemsCount = $productCollection->count();

        if (!$itemsCount) {
            $queryText = $this->catalogSearchData->getEscapedQueryText();
            $channels = $this->channelPool->getChannels();

            foreach ($channels as $channel) {
                $channel->send(sprintf('The search returned no results. The query was: "%s".', $queryText));
            }
        }

        return $productCollection;
    }
}
