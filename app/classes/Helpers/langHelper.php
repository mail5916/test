<?php

namespace Helpers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;

class langHelper
{
    static protected $locale;

    static protected $prefix;

    static public function setLocale()
    {
       if(in_array(Request::segment(1),Config::get('app.languages'))){
            App::setLocale(Request::segment(1));
        }
    }

    static public function getLocale()
    {
        if(is_null(static::$locale))
        {
            static::$locale = App::getLocale();
        }

        return static::$locale;
    }

    static public function getPrefix()
    {
        if(is_null(static::$prefix))
        {
            $locale = static::getLocale();
            static::$prefix = ($locale == Config::get('app.default_locale')) ? '' : '/' . $locale;
        }

        return static::$prefix;
    }
}