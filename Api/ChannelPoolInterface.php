<?php

namespace N98Hackathon\BlaBla\Api;

/**
 * Interface ChannelPoolInterface
 */
interface ChannelPoolInterface
{
    /**
     * @return ChannelInterface[]
     */
    public function getChannels(): array;
}