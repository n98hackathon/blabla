<?php

namespace N98Hackathon\BlaBla\Channel;

use GuzzleHttp\Client;
use N98Hackathon\BlaBla\Api\ConfigInterface;

class Slack
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
        if (!$this->config->isSlackEnabled()) {
            return;
        }

        $slackWebhookUrl = $this->config->getSlackWebhookUrl();
        $data = ['text' => $message];

        $encodedMessage = json_encode($data);
        $response = $this->client->post(
            $slackWebhookUrl, [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => $encodedMessage,
            ]
        );
    }
}