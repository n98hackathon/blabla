<?php

namespace N98Hackathon\BlaBla\Api;

/**
 * Interface ChannelPoolInterface
 *
 * @api
 */
interface ChannelPoolInterface
{
    /**
     * @return ChannelInterface[]
     */
    public function getChannels(): array;
}