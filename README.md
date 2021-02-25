# Laravel Recaptch (V3 only)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/shamarkellman/laravel-recaptcha.svg?style=flat-square)](https://packagist.org/packages/shamarkellman/laravel-recaptcha)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/shamarkellman/laravel-recaptcha/run-tests?label=tests)](https://github.com/shamarkellman/laravel-recaptcha/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/shamarkellman/laravel-recaptcha/Check%20&%20fix%20styling?label=code%20style)](https://github.com/shamarkellman/laravel-recaptcha/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/shamarkellman/laravel-recaptcha.svg?style=flat-square)](https://packagist.org/packages/shamarkellman/laravel-recaptcha)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/package-laravel-recaptcha-laravel.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/package-laravel-recaptcha-laravel)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require shamarkellman/laravel-recaptcha
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="ShamarKellman\LaravelRecaptcha\LaravelRecaptchaServiceProvider" --tag="laravel-recaptcha-config"
```

This is the contents of the published config file:

```php
return [
    'public_key' => env('GOOGLE_CAPTCHA_PUBLIC_KEY'),
    'private_key' => env('GOOGLE_CAPTCHA_PRIVATE_KEY'),
    'score_threshold' => 0.5,
];
```

## Usage

First of all you have to create your own API keys [here](https://www.google.com/recaptcha/admin)

Follow the instructions and at the end of the process you will find Site key and Secret key. Keep them close..you will need soon!

In your .env file you need to set the GOOGLE_CAPTCHA_PUBLIC_KEY and GOOGLE_CAPTCHA_PRIVATE_KEY

```dotenv
GOOGLE_CAPTCHA_PUBLIC_KEY=your_site_key
GOOGLE_CAPTCHA_PRIVATE_KEY=your_site_secret_key
```

The package contains blade directives and views. You can use either method to add the ReCaptcha to your site.

Method 1 - Blade Directive
- The input directive should be added to your form
```php
<form>
    @csrf
    @recaptchaInput
    
    ... other form feilds
    
</form>
```
(optional) you can add the Recaptcha branding your site using `@recaptchaBranding`

- add the script directive to the bottom just before the end of the body tag
```php
@recaptchaScripts
```
- Add validation rule in your form request or validation function
```php
use ShamarKellman\LaravelRecaptcha\Rules;

[
    //...other rules,
    'recaptcha_token' => ['required', new  ReCaptchaRule],
];
```
- You can display the error message 
```php 
@error('recaptcha_token')
    {{ $message }}
@enderror
```
## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Shamar Kellman](https://github.com/ShamarKellman)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
