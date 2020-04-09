<?php
/**
 * consul业务功能操作类
 * @package Jamespi\Kong\Controllers
 * @author ZT PHP DEV TEAM PIJIANZHONG(jianzhongpi@163.com)
 * @create 2020年4月2日 17:38
 */

namespace Jamespi\Consul\Controllers;

use Jamespi\Consul\Core\Consul;
use Jamespi\Consul\Common\CheckHelper;

class serviceController {

    protected $Consul;

    public function __construct(Consul $Consul, $ip, $port)
    {
        $Consul->basicParameters = [
            'ip' => $ip,
            'port' => $port,
        ];
        $Consul->baseUri = "http://".$ip.":".$port;
        $this->Consul = $Consul;
        $this->checkPingIP($ip, $port);
    }

    /**
     * 检测ip端口是否正常
     * @param string $ip IP
     * @param string $port 端口
     * @return string
     */
    public function checkPingIP($ip, $port){
        $check = new CheckHelper();
        //检测ip端口是否正常
        if(!$check->ping($ip, $port)){
            return 'this ip port address failed to connect.';
        }
    }

    /**
     *  注册consul服务
     * @param array $body 注册服务详情
     * @return string
     */
    public function registrationService(array $body):string
    {
        return $this->Consul->registrationService($body);
    }
}