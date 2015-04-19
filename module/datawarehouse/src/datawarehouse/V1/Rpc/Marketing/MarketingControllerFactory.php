<?php
namespace datawarehouse\V1\Rpc\Marketing;

class MarketingControllerFactory
{
    public function __invoke($controllers)
    {
        return new MarketingController();
    }
}
