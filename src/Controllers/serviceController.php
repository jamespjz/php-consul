<?php
/**
 * consul业务功能操作类
 * @package Jamespi\Kong\Controllers
 * @author ZT PHP DEV TEAM PIJIANZHONG(jianzhongpi@163.com)
 * @create 2020年4月2日 17:38
 */

namespace Jamespi\Consul\Controller;

use Jamespi\Consul\Core\Consul;

class serviceController {

    protected $Consul;

    public function __construct(Consul $Consul)
    {
        $this->Consul = $Consul;
        $config = require_once(dirname(dirname(__DIR__)).'/config/config.php');
        $Consul::$basicParameters = [
            'ip' => $config['server']['ip'],
            'port' => $config['server']['port']
        ];
    }

    /**
     *  注册consul服务
     * @param string $serviceName
     * @return string
     */
    public function registrationService(string $serviceName):string
    {
        return $this->Consul->registrationService($serviceName);
    }
}