<?php

namespace N98Hackathon\BlaBla\Channel;

use GuzzleHttp\Client;
use N98Hackathon\BlaBla\Api\ConfigInterface;

class Hipchat
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var ConfigInterface
     */
    protected $config;

    /**
     * Slack constructor.
     *
     * @param Client          $client
     * @param ConfigInterface $config
     */
    public function __construct(Client $client, ConfigInterface $config)
    {
        $this->client = $client;
        $this->config = $config;
    }

    /**
     * @param string $message
     */
    public function send(string $message)
    {
        if (!$this->config->isHipchatEnabled()) {
            return;
        }

        $hipchatIntegrationUrl = $this->config->getHipchatIntegrationUrl();
        $data = [
            'message-format' => 'text',
            'message' => $message,
        ];

        $encodedMessage = json_encode($data);
        $this->client->post(
            $hipchatIntegrationUrl, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'body' => $encodedMessage,
            ]
        );
    }
}