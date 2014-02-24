<?php
namespace phpDocumentor\Plugin\Search\Engine\Configuration;

use Guzzle\Http\Client;

class ElasticSearch
{
    protected $http_client;
    protected $uri;
    protected $index = 'documentation';
    protected $type  = 'api';

    public function __construct(Client $http_client, $uri = 'http://localhost:9200')
    {
        $this->setHttpClient($http_client);
        $this->setUri($uri);
    }

    public function setIndex($index)
    {
        $this->index = $index;
    }

    public function getIndex()
    {
        return $this->index;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    protected function setUri($uri)
    {
        $this->uri = $uri;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function setHttpClient(Client $http_client)
    {
        $this->http_client = $http_client;
    }

    /**
     * @return Client
     */
    public function getHttpClient()
    {
        return $this->http_client;
    }
}