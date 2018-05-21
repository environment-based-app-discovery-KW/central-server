# central-server

central-server: 主数据管理服务器

主数据管理服务器是一个中心化服务器，用来管理用户数据、APP数据、维护根据地理位置发现APP时需要使用的元数据、管理APP内支付。

开发者把构建好的应用程序包上传到主数据管理服务器，服务器会对它进行解包分析处理。会读取压缩包内的```meta.json```文件，以辨别APP的名称、版本、依赖项信息。随后，服务器会分别对业务代码和依赖库计算哈希并存入文件库，并在数据库中插入相应的实体数据、关联数据。同时，开发者可以设置APP发现的具体参数：在什么经度和纬度、多少米范围内可见该APP、在这个条件下启动该APP所携带的参数。这些数据会被插入到中央应用仓库服务器中，镜像自动同步工具会把这些数据同步到世界上所有别的节点，这样，APP发布就完成了。

主数据管理服务器的另一个作用是APP内支付代扣。为了方便与统一APP内的支付，本架构中不建议开发者自己接入支付服务，而是另外开发了一套基于数字签名的用户支付授权体系。开发者可以在APP内调用一个统一的接口，请求用户支付，用户同意之后开发者会得到一个带有用户数字签名的支付单，需经由自己的后端转发给主服务器。主服务器就担任了验证用户数字签名、支付信息留档、联系银行转款给开发者的角色。

主服务器在现在的架构中，全世界只有一台，由一个机构专门管理。如果真正上线运行，主服务器的负载是会非常大的，好在主服务器的业务都可以横向拓展。真正部署时，需使用多实例、负载均衡的方式部署主服务器。

## 路由

```php
Route::group(['prefix' => 'app'], function () {
    Route::any('ls', 'WebAppController@ls');
    Route::any('discover', 'WebAppController@discover');
    Route::any('lan-discover', 'WebAppController@lanDiscover');
    Route::any('download', 'WebAppController@download');
});

Route::group(['prefix' => 'sync'], function () {
    Route::any('/', 'SyncController@index');
});

Route::group(['prefix' => 'file'], function () {
    Route::any('/download', 'FileController@download');
});
```

## Docker 部署方法

```
docker build -t central_server_image .
docker run -p 0.0.0.0:888:888 -p 0.0.0.0:889:889 --name central_server_container -t central_server_image
```

