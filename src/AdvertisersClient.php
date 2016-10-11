<?php

namespace DiarioImoveis\ClientApi;

use GuzzleHttp\ClientInterface;

class AdvertisersClient
{
    /**
     * Holds \GuzzleHttp\ClientInterface instance
     *
     * @var \GuzzleHttp\ClientInterface
     */
    protected $httpClient = null;

    /**
     * returns object instance.
     *
     * @return void
     */
    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Performs http request to advertisers API
     *
     * @var array
     * @return string
     */
    public function get(array $params = array())
    {
        $response = $this->httpClient->request('GET', '/api/advertisers/', array('query' => $params));
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody());
        }// "200"

        throw new Exception('Request erros, code: '. $response->getStatusCode());
    }

    /**
     * Performs http request to advertisers API, fetches a specific advertiser by slug
     *
     * @var array
     * @return string
     */
    public function find(string $slug)
    {
        $response = $this->httpClient->request('GET', '/api/advertisers/' . $slug);
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody());
        }// "200"

        throw new Exception('Request erros, code: '. $response->getStatusCode());
    }
}
