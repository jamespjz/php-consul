<?php
/**
 * consul业务功能操作接口类
 * @package Jamespi\Kong\Controllers
 * @author ZT PHP DEV TEAM PIJIANZHONG(jianzhongpi@163.com)
 * @create 2020年4月2日 17:38
 */

namespace Jamespi\Consul\Api;

interface httpInterFace{

    /**
     * 发起post请求
     * @param string $baseUri 请求URI
     * @param array $body 请求实体参数
     * @param string $apiStr 请求路径
     * @return string
     */
    public function post(string $baseUri, array $body, string $apiStr):string ;

    /**
     * 发起get请求
     * @param string $baseUri 请求URI
     * @param string $apiStr 请求路径
     * @return string
     */
    public function get(string $baseUri, string $apiStr):string ;

    /**
     * 发起更新PATCH操作
     * @param string $baseUri 请求URI
     * @param array $body 更新实体数据
     * @param string $apiStr 请求路径/参数
     * @return string
     */
    public function path(string $baseUri, array $body, string $apiStr):string ;

    /**
     * 添加/更新PUT操作
     * @param string $baseUri 请求URI
     * @param array $body 添加/更新实体数据
     * @param string $apiStr 请求路径/参数
     * @return string
     */
    public function put(string $baseUri, array $body, string $apiStr):string ;

    /**
     * 删除DELETE操作
     * @param string $baseUri 请求URI
     * @param string $apiStr 请求路径/参数
     * @return string
     */
    public function delete(string $baseUri, string $apiStr):string ;

}