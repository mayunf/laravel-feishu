<?php


namespace Mayunfeng\LaravelFeishu;

use Illuminate\Support\Facades\Facade as LaravelFacade;

/**
 * @property \EasyFeishu\Contact\Contact $contact
 * @property \EasyFeishu\AccessToken\AccessToken $access_token
 * @property \EasyFeishu\Im\Im $im
 * @see \EasyFeishu\Foundation\Application
 */
class Facade extends LaravelFacade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'feishu.open_platform';
    }


    /**
     * @return \EasyFeishu\Foundation\Application
     */
    public static function openPlatform($name = '')
    {
        return $name ? app('feishu.open_platform.'.$name) : app('feishu.open_platform');
    }

}