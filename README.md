# laravel-wechat

飞书 SDK for Laravel 6， 基于 [mayunfeng/easy-feishu](https://github.com/mayunf/easy-feishu)


## 框架要求

Laravel >= 6.0

## 安装

```shell
composer require "mayunfeng/laravel-feishu:^1.0"
```

## 配置

### Laravel 应用

1. 创建配置文件：

```shell
php artisan vendor:publish --provider="Mayunfeng\LaravelFeishu\ServiceProvider"
```

2. 修改应用根目录下的 `config/fefishu.php` 中对应的参数即可。

3. 每个模块基本都支持多账号，默认为 `default`。

### 我们有以下方式获取 SDK 的服务实例

##### 使用Facade

```php
  $app = \Mayunfeng\LaravelFeishu\EasyFeishu::openPlatform();
  
  // 支持传入配置账号名称
  \Mayunfeng\LaravelFeishu\EasyFeishu::openPlatform('foo'); // `foo` 为配置文件中的名称，默认为 `default`
  //...
```

## License

MIT
