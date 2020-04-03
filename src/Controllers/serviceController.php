<?php
/**
 * consul业务功能操作类
 * @package Jamespi\Kong\Controllers
 * @author ZT PHP DEV TEAM PIJIANZHONG(jianzhongpi@163.com)
 * @create 2020年4月2日 17:38
 */

namespace Jamespi\Consul\Controller;

use Jamespi\Consul\Core\Consul;
use Jamespi\Consul\Common\CheckHelper;

class serviceController {

    protected $Consul;

    public function __construct(Consul $Consul, $ip, $port)
    {
        $this->Consul = $Consul;
        $config = require_once(dirname(dirname(__DIR__)).'/config/config.php');

    }

    /**
     * 检测ip端口是否正常
     * @return string
     */
    public function checkPingIP(){
        $check = new CheckHelper();
        //检测ip端口是否正常
        if(!$check->ping($this->Consul::basicParameters['ip'], $this->Consul::basicParameters['port'])){
            return 'this ip port address failed to connect.';
        }
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