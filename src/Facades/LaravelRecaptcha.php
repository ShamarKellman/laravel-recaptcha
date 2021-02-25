<?php

namespace ShamarKellman\LaravelRecaptcha;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ShamarKellman\LaravelRecaptcha\LaravelRecaptcha
 */
class LaravelRecaptcha extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-recaptcha';
    }
}
