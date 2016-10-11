<?php

namespace DiarioImoveis\ClientApi;

use GuzzleHttp\Client as HttpClient;

class ClientFactory
{
    /**
     * @param array $config
     * returns API client configured.
     * @return \DiarioImoveis\ApiClient\AdvertisersClient
     */
    public static function getAdvertisersClient(array $config)
    {
        $httpClient = self::getClient($config);
        return new AdvertisersClient($httpClient);
    }

    /**
     * @param array $config
     * returns API client configured.
     * @return \DiarioImoveis\ApiClient\PropertiesClient
     */
    public static function getPropertiesClient(array $config)
    {
        $httpClient = self::getClient($config);
        return new PropertiesClient($httpClient);
    }

    /**
     * @param array $config
     *
     * returns API client configured.
     * @var \GuzzleHttp\ClientInterface
     * @return \GuzzleHttp\ClientInterface
     */
    protected static function getClient(array $config = array())
    {
        if (!isset($config['api-url'])) {
            $config['api-url'] = 'diarioimoveis.com/api/';
        }

        if (!isset($config['timeout'])) {
            $config['timeout'] = 2.0;
        }

        return new HttpClient([
            'base_uri' => $config['api-url'],
            'timeout'  => $config['timeout'],
        ]);
    }
}
