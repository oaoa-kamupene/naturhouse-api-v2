<?php


namespace Naturhouse;

use GuzzleHttp\Exception\ClientException;
use Naturhouse\Entities\Branch;
use Naturhouse\Entities\Contact;
use Naturhouse\Entities\ContactTime;
use Naturhouse\Entities\Package;
use Naturhouse\Exceptions\BadResponseException;
use Naturhouse\Exceptions\MissingParameterException;
use Nette\Utils\Json;

class Client
{
    const BRANCHES_FILTER_ALL = 2;
    const BRANCHES_FILTER_POSITIVE_CREDIT = 1;
    const BRANCHES_FILTER_ALL_ACTIVE = 0;


    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var array
     */
    protected $configuration;

    /**
     * Client constructor.
     * @param array $config
     * @throws MissingParameterException
     */
    public function __construct($config)
    {
        $this->configure($config);
    }

    /**
     * @param array $config
     * @throws MissingParameterException
     */
    public function configure(array $config)
    {
        if (empty($config['auth_token'])) {
            throw new MissingParameterException('Missing parameter `auth_token`');
        }
        if (empty($config['hostname'])) {
            throw new MissingParameterException('Missing parameter `hostname`');
        }
        $this->configuration['auth_token'] = $config['auth_token'];
        $this->configuration['hostname'] = $config['hostname'];
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => $config['hostname'],
            'headers' => [
                'X-Auth-Token' => $config['auth_token'],
                'X-API-Client' => 'php-client',
            ],
        ]);
    }

    /**
     * @return array
     * @throws \Nette\Utils\JsonException
     */
    public function getBranches($filter = self::BRANCHES_FILTER_ALL)
    {
        $filter = $this->assertFilterValue($filter);
        $response = $this->client->get('branches/?active=' . $filter);
        if ($response->getStatusCode() == 200 && $response->getBody()->isReadable()) {
            $body = Json::decode($response->getBody()->getContents(), Json::FORCE_ARRAY);
            $result = [];
            foreach ($body['branches'] as $item) {
                $result[] = new Branch($item);
            }
            return $result;
        }
        return [];
    }

    /**
     * @return array
     * @throws \Nette\Utils\JsonException
     */
    public function getContactTimes()
    {
        $response = $this->client->get('contacttimes');
        if ($response->getStatusCode() == 200 && $response->getBody()->isReadable()) {
            $body = Json::decode($response->getBody()->getContents(), Json::FORCE_ARRAY);
            $result = [];
            foreach ($body['times'] as $item) {
                $result[] = (new ContactTime())->setId($item['id'])->setText($item['text']);
            }
            return $result;
        }
        return [];
    }

    /**
     * @return array
     * @throws \Nette\Utils\JsonException
     */
    public function getPackages()
    {
        $response = $this->client->get('packages');
        if ($response->getStatusCode() == 200 && $response->getBody()->isReadable()) {
            $body = Json::decode($response->getBody()->getContents(), Json::FORCE_ARRAY);
            $result = [];
            foreach ($body['packages'] as $item) {
                $result[] = new Package($item);
            }
            return $result;
        }
        return [];
    }

    /**
     * @param Contact $c
     * @return int|null
     * @throws MissingParameterException
     * @throws \Nette\Utils\JsonException
     * @throws BadResponseException
     */
    public function createContact(Contact $c)
    {
        $c = $this->assertContact($c);
        try {
            $response = $this->client->post('contact', ['json' => $c->toArray()]);
            if ($response->getStatusCode() == 200 && $response->getBody()->isReadable()) {
                $body = (array)json_decode($response->getBody()->getContents());
                return $body['contact_id'];
            }
        } catch (ClientException $e) {
            throw new BadResponseException($e->getResponse()->getBody()->getContents());
        }
        return null;
    }

    /**
     * @param $id
     * @return Contact|null
     * @throws \Nette\Utils\JsonException
     */
    public function getContact($id)
    {
        if (!is_numeric($id)) {
            throw new \InvalidArgumentException('ID has to be integer `' . $id . '` given');
        }
        $response = $this->client->get('contact?id=' . $id);
        if ($response->getStatusCode() == 200 && $response->getBody()->isReadable()) {
            $body = Json::decode($response->getBody()->getContents(), Json::FORCE_ARRAY);
            return new Contact($body);
        }
        return null;
    }

    /**
     * @param $filter
     * @return int
     */
    private function assertFilterValue($filter)
    {
        if (!in_array($filter, [self::BRANCHES_FILTER_ALL_ACTIVE, self::BRANCHES_FILTER_POSITIVE_CREDIT, self::BRANCHES_FILTER_ALL])) {
            return self::BRANCHES_FILTER_ALL;
        }
        return $filter;
    }

    /**
     * @param Contact $c
     * @return Contact
     * @throws MissingParameterException
     */
    private function assertContact(Contact $c)
    {
        if (empty($c->getFname())) {
            throw new MissingParameterException('First name is required');
        }
        if (empty($c->getLname())) {
            throw new MissingParameterException('Last name is required');
        }
        if (empty($c->getEmail()) && empty($c->getPhone())) {
            throw new MissingParameterException('At least phone or email is required');
        }
        return $c;
    }

}