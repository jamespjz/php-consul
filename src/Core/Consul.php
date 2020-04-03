<?php
/**
 * consul业务功能底层封装类
 * @package Jamespi\Kong\Controllers
 * @author ZT PHP DEV TEAM PIJIANZHONG(jianzhongpi@163.com)
 * @create 2020年4月2日 17:38
 */

namespace Jamespi\Consul\Core;

use Jamespi\Consul\Core\Base\Consul as BaseConsul;

class Consul extends BaseConsul{

    /**
     * 注册服务
     * @param string $serviceName
     * @return string
     */
    public function registrationService(string $serviceName):string
    {
        $apiStr='/v1/health/checks/'.$serviceName;
        return $this->http->get($this->baseUri, $apiStr);
    }

}