<?php

namespace N98Hackathon\BlaBla\Plugin;

use Magento\Catalog\Model\Layer\Search;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\CatalogSearch\Helper\Data as CatalogSearchData;
use N98Hackathon\BlaBla\Api\ChannelPoolInterface;
use N98Hackathon\BlaBla\Api\ConfigInterface;

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
     * @var ConfigInterface
     */
    protected $config;

    /**
     * SearchNoResultsNotificationPlugin constructor.
     *
     * @param ChannelPoolInterface $channelPool
     * @param CatalogSearchData    $catalogSearchData
     * @param ConfigInterface      $config
     */
    public function __construct(
        ChannelPoolInterface $channelPool,
        CatalogSearchData $catalogSearchData,
        ConfigInterface $config
    ) {
        $this->channelPool = $channelPool;
        $this->catalogSearchData = $catalogSearchData;
        $this->config = $config;
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
        if (!$this->config->isZeroSearchResultsEventEnabled()) {
            return $productCollection;
        }

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
