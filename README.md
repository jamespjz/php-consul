# 皮皮CONSUL插件(pp consul)
php整合consul进行服务治理的一个应用插件。

>使用版本说明：Consul v1.7.2 - PHP v7.4.1 - Composer v1.10

#简要说明：
公司目前正在全面转微服务架构，这个插件是为了让公司phper也能顺利方便使用consul进行服务治理而进行的简单封装，目前为version 0.1-dev。

#功能简介：
* 服务注册
* 服务发现
* 服务删除
* 服务健康检测
* 获取单节点服务列表
*其余特性参考 https://www.consul.io

#部署安装
* github下载
```
git clone https://github.com/jamespjz/php-consul.git
```
已经加入对composer支持，根目录下有个composer.json，请不要随意修改其中内容如果你明白你在做什么操作。
* composer下载
```
composer require jamespi/php-consul-plugin dev-master
```

#使用方式
>调用consul例子
```
use Jamespi\Consul\Controllers\ServiceController;
use Jamespi\Consul\Core\Consul;
$serviceModel = new ServiceController(new Consul(), $config['host'], $config['port']);
$serviceModel->getServiceInfo('test_service');//查询consul服务单个支点信息
```

#联系方式
* wechat：james-pi
* email：jianzhongpi@163.com
