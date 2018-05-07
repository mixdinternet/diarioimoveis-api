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
    public function get(array $params = [])
    {
        $response = $this->httpClient->request('GET', '/api/advertisers/', ['query' => $params]);
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody());
        }// "200"

        throw new Exception('Request erros, code: ' . $response->getStatusCode());
    }

    /**
     * Performs http request to advertisers API, fetches a specific advertiser by id
     *
     * @var array
     * @return string
     */
    public function find($id)
    {
        $response = $this->httpClient->request('GET', '/api/advertisers/' . $id);
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody());
        }// "200"

        throw new Exception('Request erros, code: ' . $response->getStatusCode());
    }
}
