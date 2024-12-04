<?php

function is_dev()
{
    return app()->environment('local');
}

function is_prod()
{
    return ! is_dev();
}

function cdn($url = '')
{
    return env('CDN_HOST', '') . $url;
}

function scripts($url = '', $cdn = true)
{
    $url = '/scripts/' . $url;

    return $cdn ? cdn($url) : $url;
}

function styles($url = '', $cdn = true)
{
    $url = '/styles/' . $url;

    return $cdn ? cdn($url) : $url;
}

function css($url = '', $cdn = true)
{
    $url = '/css/' . $url;

    return $cdn ? cdn($url) : $url;
}

function js($url = '', $cdn = true)
{
    $url = '/js/' . $url;

    return $cdn ? cdn($url) : $url;
}

function images($url = '', $cdn = true)
{
    $url = '/images/' . $url;

    return $cdn ? cdn($url) : $url;
}

function img($url = '', $cdn = true)
{
    $url = '/img/' . $url;

    return $cdn ? cdn($url) : $url;
}

function fonts($url = '', $cdn = true)
{
    $url = '/fonts/' . $url;

    return $cdn ? cdn($url) : $url;
}

function _c($str, $default = null)
{
    return config($str, $default);
}

function _l(...$params)
{
    $out = '';

    foreach ($params as $param)
    {
        $var_type = gettype($param);

        if( $var_type === 'object' ) $var_type = get_class($param);

        if( is_object($param) )
        {
            if( method_exists($param, 'toArray') ) $param = $param->toArray();

            else $param = get_object_vars($param);
        }

        if( is_array($param) ) $param = print_r($param, true);

        elseif( is_callable($param) ) $param = '(function)';

        elseif ( is_bool($param) ) $param = $param ? 'TRUE' : 'FALSE';

        $out .= "\n\n({$var_type}):\n{$param}\n\n---";
    }

    $out .= "\n";

    logger($out);
}