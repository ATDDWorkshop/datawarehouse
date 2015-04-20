<?php
namespace datawarehouse\V1\Rpc\Marketing;

use Zend\Db\Adapter\Adapter;
use Zend\Loader\ModuleAutoloader;
use Zend\Mvc\Controller\AbstractActionController;
use ZF\ContentNegotiation\ViewModel;

class MarketingController extends AbstractActionController
{
    protected $campaignTable;

    protected function getCampaignTable(){
        if(!$this->campaignTable){
            $config=$this->getServiceLocator()->get('config');
            $this->campaignTable = new CampaignTable(new Adapter($config["db"]["adapters"]["ATDD"]));
        }
        return $this->campaignTable;
    }

    public function marketingAction()
    {
        return new ViewModel(array(
            'campaigns' => $this->getCampaignTable()->fetchAll()
        ));

    }
}
