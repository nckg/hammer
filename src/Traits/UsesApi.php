<?php


namespace Nckg\Hammer\Traits;


use Dotenv\Dotenv;
use Mpociot\Blacksmith\Blacksmith;

trait UsesApi
{

    /**
     * Authenticate and connect to Forge
     *
     * @return Blacksmith
     */
    protected function api()
    {
        (new Dotenv(__DIR__ . '/../../'))->load();

        $api = new Blacksmith(getenv('FORGE_USERNAME'), getenv('FORGE_PASSWORD'));

        return $api;
    }
}