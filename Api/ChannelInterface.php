<?php

namespace N98Hackathon\BlaBla\Api;

/**
 * Interface ChannelInterface
 */
interface ChannelInterface
{
    /**
     * @param string $message
     */
    public function send(string $message);
}