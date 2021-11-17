<?php


namespace Mayunfeng\LaravelFeishu;

use Illuminate\Foundation\Application as LaravelApplication;
use EasyFeishu\Foundation\Application as OpenPlatform;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Boot the provider.
     */
    public function boot()
    {
    }

    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/config.php');

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('feishu.php')], 'laravel-feishu');
        }

        $this->mergeConfigFrom($source, 'feishu');
    }

    /**
     * Register the provider.
     */
    public function register()
    {
        $this->setupConfig();

        $apps = [
            'open_platform' => OpenPlatform::class,
        ];

        foreach ($apps as $name => $class) {
            if (empty(config('feishu.'.$name))) {
                continue;
            }


            if (!empty(config('feishu.'.$name.'.app_id')) || !empty(config('feishu.'.$name.'.corp_id'))) {
                $accounts = [
                    'default' => config('feishu.'.$name),
                ];
                config(['feishu.'.$name.'.default' => $accounts['default']]);
            } else {
                $accounts = config('feishu.'.$name);
            }

            foreach ($accounts as $account => $config) {
                $this->app->singleton("feishu.{$name}.{$account}", function ($laravelApp) use ($name, $account, $config, $class) {
                    $app = new $class(array_merge(config('feishu.defaults', []), $config));
                    if (config('feishu.defaults.use_laravel_cache')) {
                        $app['cache'] = $laravelApp['cache.store'];
                    }
                    $app['request'] = $laravelApp['request'];

                    return $app;
                });
            }
            $this->app->alias("feishu.{$name}.default", 'feishu.'.$name);
            $this->app->alias("feishu.{$name}.default", 'easyfeishu.'.$name);

            $this->app->alias('feishu.'.$name, $class);
            $this->app->alias('easyfeishu.'.$name, $class);
        }
    }

}