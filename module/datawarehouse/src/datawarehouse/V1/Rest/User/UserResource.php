<?php
/**
 * Created by PhpStorm.
 * User: gmeyenberg
 * Date: 17.04.2015
 * Time: 18:02
 */

namespace datawarehouse\V1\Rest\User;


use ZF\Apigility\DbConnectedResource;
use Zend\Paginator\Adapter\DbTableGateway as TableGatewayPaginator;

class UserResource extends DbConnectedResource{
    public function fetchAll($data = array())
    {
        $where = '';
        if($data->name)
        {
            $where .= "name='".$data->name."'";
        }

        if($data->password)
        {
            $where .= " AND password='".$data->password."'";
        }



        $adapter = new TableGatewayPaginator($this->table,$where);
        return new $this->collectionClass($adapter);
    }
}