<?php
/**
 * Created by PhpStorm.
 * User: gregor
 * Date: 18.04.15
 * Time: 09:38
 */

namespace datawarehouse\V1\Rpc\Marketing;

use Zend\Db\Sql\Sql;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Expression;

class CampaignTable {

    protected $campaigns;
    protected $dbAdapter;


    public function __construct(Adapter $dbAdapter){
        $this->dbAdapter=$dbAdapter;
    }

    public function fetchAll(){
        if(!$this->campaigns){

            $this->campaigns=array();
            $dbAdapter = $this->dbAdapter;

            $sql = new Sql($dbAdapter);
            $select = $sql->select();
            $select->columns(array('campaign',"regs"=>new Expression('COUNT(id)'),"revenue"=>new Expression('SUM(revenue)')));
            $select->from('User');
            $select->group('User.campaign');
            $statement = $sql->prepareStatementForSqlObject($select);
            $results = $statement->execute();
            foreach($results as $campaign){
                array_push($this->campaigns,$campaign);
            }
        }
        return $this->campaigns;
    }



}