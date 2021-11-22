<?php

/*
 * This file is part of the mayunfeng/laravel-wechat.
 *
 * (c) mayunfeng <yunfeng0614@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

return [
    /*
     * 默认配置，将会合并到各模块中
     */
    'defaults' => [
        /*
         * 指定 API 调用返回结果的类型：array(default)/collection/object/raw/自定义类名
         */
        'response_type' => 'array',

        /*
         * 使用 Laravel 的缓存系统
         */
        'use_laravel_cache' => true,

        /*
         * 日志配置
         *
         * level: 日志级别，可选为：
         *                 debug/info/notice/warning/error/critical/alert/emergency
         * file：日志文件位置(绝对路径!!!)，要求可写权限
         */
        'log' => [
            'level' => env('FEISHU_LOG_LEVEL', 'debug'),
            'file'  => env('FEISHU_LOG_FILE', storage_path('logs/feishu.log')),
        ],
    ],

    /*
     * 开放平台
     */
    'open_platform' => [
        'default' => [
            'app_id'             => env('FEISHU_OPEN_PLATFORM_APP_ID', ''),
            'app_secret'         => env('FEISHU_OPEN_PLATFORM_APP_SECRET', ''),
            'encrypt_key'        => env('FEISHU_OPEN_PLATFORM_ENCRYPT_KEY', ''),
            'verification_token' => env('FEISHU_OPEN_PLATFORM_VERIFICATION_TOKEN', ''),
        ],
    ],

];
