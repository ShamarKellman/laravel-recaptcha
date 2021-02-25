<?php

namespace ShamarKellman\LaravelRecaptcha;

use Illuminate\Support\Facades\Blade;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelRecaptchaServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-recaptcha')
            ->hasViews()
            ->hasConfigFile();
    }

    public function bootingPackage(): void
    {
        Blade::directive('recaptchaInput', static function () {
            return '<input type="hidden" name="recaptcha_token" id="recaptcha_token">';
        });

        Blade::directive('recaptchaScripts',  static function() {
            return <<<EOT
<script src="https://www.google.com/recaptcha/api.js?render={{ config('recaptcha.public_key') }}"></script>
<script>
grecaptcha.ready(function() {
  grecaptcha.execute('{{ config('recaptcha.public_key') }}').then(function(token) {
   document.getElementById("recaptcha_token").value = token;
 }); });
</script>
EOT;
        });

        Blade::directive('recaptchaBranding', static function() {
            return <<<html
This site is protected by ReCaptcha and the Google
<a href=”https://policies.google.com/privacy">Privacy Policy</a> and
<a href=”https://policies.google.com/terms">Terms of Service</a> apply.
html;
        });
    }
}
