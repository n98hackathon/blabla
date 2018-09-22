<?php

namespace N98Hackathon\BlaBla\Channel;

use N98Hackathon\BlaBla\Api\ChannelInterface;
use N98Hackathon\BlaBla\Api\ChannelPoolInterface;

/**
 * Class ChannelPool
 */
class ChannelPool implements ChannelPoolInterface
{
    /**
     * @var ChannelInterface[]
     */
    protected $channels;

    /**
     * Pool constructor.
     *
     * @param ChannelInterface $channels
     */
    public function __construct(ChannelInterface $channels)
    {
        $this->channels = $channels;
    }

    /**
     * @return ChannelInterface[]
     */
    public function getChannels(): array
    {
        return $this->channels;
    }
}