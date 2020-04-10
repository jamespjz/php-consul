<?php
/**
 * consul业务功能底层封装抽象类
 * @package Jamespi\Kong\Controllers
 * @author ZT PHP DEV TEAM PIJIANZHONG(jianzhongpi@163.com)
 * @create 2020年4月2日 17:38
 */

namespace Jamespi\Consul\Core\Base;

use Jamespi\Consul\Common\HttpHelper;

abstract class Consul{

    /**
     * 基础参数设置
     * @var array
     */
    public $basicParameters = [
        'ip' => '',
        'port' => '',
    ];

    /**
     * 请求参数设置
     * @var array
     */
    protected $parames = [];

    /**
     * HttpHelper类对象
     * @var HttpHelper
     */
    protected $http;

    /**
     * CheckHelper类对象
     * @var CheckHelper
     */
    protected $check;

    /**
     * 请求路径
     * @var string
     */
    public $baseUri;

    public function __construct()
    {
        $this->http = new HttpHelper();
    }

    /**
     * 注册服务
     * @param array $body 注册服务详情
     * @return mixed
     */
    abstract protected function registrationAgentService(array $body):string ;

    /**
     * 查询consul服务单个支点信息
     * @param string $serviceName 服务支点名称
     * @return string
     */
    abstract protected function getAgentServiceInfo(string $serviceName):string ;

    /**
     * 删除consul单个服务支点
     * @param string $serviceName 服务支点名称
     * @return string
     */
    abstract protected function deleteAgentService(string $serviceName):string ;

    /**
     * 获取服务节点中所有服务支点
     * @return string
     */
    abstract protected function getAgentServicesList():string ;

    /**
     * 对指定服务进行健康检测
     * @param string $serviceName 服务支点名称
     * @return string
     */
    abstract protected function checkHealthService(string $serviceName):string ;

    /**
     * 对本地节点进行健康检测
     * @return string
     */
    abstract protected function checkHealthLocal():string ;
}