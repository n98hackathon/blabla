<?php

namespace N98Hackathon\BlaBla\Api;

interface ChannelInterface
{
    /**
     * @param string $message
     */
    public function send(string $message);
}