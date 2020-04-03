<?php
/**
 * consul业务功能底层封装抽象类
 * @package Jamespi\Kong\Controllers
 * @author ZT PHP DEV TEAM PIJIANZHONG(jianzhongpi@163.com)
 * @create 2020年4月2日 17:38
 */

namespace Jamespi\Consul\Core\Base;

abstract class Consul{

    /**
     * 基础参数设置
     * @var array
     */
    public static $basicParameters = [
        'ip' => '',
        'port' => '',
    ];

    /**
     * 请求参数设置
     * @var array
     */
    protected $parames = [];

    /**
     * 注册服务
     * @param string $serviceName
     * @return mixed
     */
    abstract protected function registrationService(string $serviceName):string ;

}