<?php

if (!function_exists('menu')) {
    function menu($menuName, $type = null, array $options = [])
    {
        return app('App\Models\Menu')->display($menuName, $type, $options);
    }
}

