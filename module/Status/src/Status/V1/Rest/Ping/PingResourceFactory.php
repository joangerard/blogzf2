<?php
namespace Status\V1\Rest\Ping;

class PingResourceFactory
{
    public function __invoke($services)
    {
        return new PingResource();
    }
}
