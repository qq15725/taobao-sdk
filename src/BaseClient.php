<?php

namespace Taobao;

use SDK\Kernel\BaseClient as KernelBaseClient;

class BaseClient extends KernelBaseClient
{
    /**
     * @param string $url
     * @param array $data
     *
     * @return array
     */
    protected function httpPostWithSession(string $url, array $data = [])
    {
        return $this->request($url, 'POST', ['form_params' => $data], false, true);
    }

    /**
     * @param string $url
     * @param string $method
     * @param array $options
     * @param bool $returnRaw
     * @param bool $withSession
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \SDK\Kernel\Exceptions\InvalidConfigException
     */
    protected function request(string $url, string $method = 'GET', array $options = [], $returnRaw = false, $withSession = false)
    {
        if ($withSession) {
            $session = $this->app->config->get('session');
            $url = "?method={$url}&session={$session}";
        } else {
            $url = "?method={$url}";
        }
        return parent::request($url, $method, $options, $returnRaw);
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     *
     * @return array|mixed|null|object|\Psr\Http\Message\ResponseInterface|string|\SDK\Kernel\Support\Collection
     * @throws \SDK\Kernel\Exceptions\InvalidConfigException
     */
    protected function unwrapResponse(\Psr\Http\Message\ResponseInterface $response)
    {
        $res = parent::unwrapResponse($response);

        if ($error = $res['error_response'] ?? null) {
            return $error;
        }

        return current($res);
    }

    /**
     * @param string $session
     */
    public function setSession(string $session)
    {
        $this->app->config->set('session', $session);
    }

    /**
     * @param string $session
     *
     * @return static
     */
    public function withSession(string $session)
    {
        $client = (clone $this);

        $client->setSession($session);

        return $client;
    }
}