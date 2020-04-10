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

class ServiceController {

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
        return $this->Consul->registrationAgentService($body);
    }

    /**
     * 查询consul服务单个支点信息
     * @param string $serviceName 服务支点名称
     * @return string
     */
    public function getServiceInfo(string $serviceName):string
    {
        return $this->Consul->getAgentServiceInfo($serviceName);
    }

    /**
     * 删除consul单个服务支点
     * @param string $serviceName 服务支点名称
     * @return string
     */
    public function deleteService(string $serviceName):string
    {
        return $this->Consul->deleteAgentService($serviceName);
    }

    /**
     * 获取服务节点中所有服务支点
     * @return string
     */
    public function getServicesList():string
    {
        return $this->Consul->getAgentServicesList();
    }

    /**
     * 对指定服务进行健康检测
     * @param string $serviceName 服务支点名称
     * @return string
     */
    public function checkHealthService(string $serviceName):string
    {
        return $this->Consul->checkHealthService($serviceName);
    }

    /**
     * 对本地节点进行健康检测
     * @return string
     */
    public function checkHealthLocal():string
    {
        return $this->Consul->checkHealthLocal();
    }
}