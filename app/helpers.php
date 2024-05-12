<?php

use Illuminate\Routing\Route;

if (!function_exists('active_route')) {
    function active_route($route)
    {
        return Route::is($route) ? 'active' : '';
    }
}

if (!function_exists('page_titre')) {
    function page_titre($titre)
    {

        $base_titre = "SONEB - Infirmerie";
        if ($titre === '') {
            return $base_titre;
        } else {
            return $titre . ' | ' . $base_titre;
        }
    }
}