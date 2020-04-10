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
     * @param array $body 注册服务详情
     * @return string
     */
    public function registrationAgentService(array $body):string
    {
        $apiStr='/v1/agent/service/register';
        return $this->http->put($this->baseUri, $body, $apiStr);
    }

    /**
     * 查询consul服务单个支点信息
     * @param string $serviceName 服务支点名称
     * @return string
     */
    public function getAgentServiceInfo(string $serviceName):string
    {
        $apiStr = '/v1/agent/service/'.$serviceName;
        return $this->http->get($this->baseUri, $apiStr);
    }

    /**
     * 删除consul单个服务支点
     * @param string $serviceName 服务支点名称
     * @return string
     */
    public function deleteAgentService(string $serviceName):string
    {
        $apiStr='/v1/agent/service/deregister/'.$serviceName;
        return $this->http->delete($this->baseUri, $apiStr);
    }

    /**
     * 获取服务节点中所有服务支点
     * @return string
     */
    public function getAgentServicesList():string
    {
        $apiStr = '/v1/agent/services/';
        return $this->http->get($this->baseUri, $apiStr);
    }

    /**
     * 对指定服务进行健康检测
     * @param string $serviceName 服务支点名称
     * @return string
     */
    public function checkHealthService(string $serviceName):string
    {
        $apiStr = '/v1/health/checks/'.$serviceName;
        return $this->http->get($this->baseUri, $apiStr);
    }

    /**
     * 对本地节点进行健康检测
     * @return string
     */
    public function checkHealthLocal():string
    {
        $apiStr = '/v1/agent/checks/';
        return $this->http->get($this->baseUri, $apiStr);
    }

    /**
     * 获取目录单个服务支点信息
     * @param string $serviceName 服务支点名称
     * @return string
     */
    public function getCatalogServiceInfo(string $serviceName):string
    {

    }
}