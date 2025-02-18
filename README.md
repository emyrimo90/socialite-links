# Socialite Links Generator
This package provides ready-to-use social login buttons for Laravel projects using Laravel Socialite. It supports Facebook, Google, and Twitter authentication with customizable Blade components.

# Features
- Easy integration with Laravel Socialite.
- Pre-designed social login buttons.
- Configurable via config/services.php.
- Supports Facebook, Google, and Twitter.


# Installation
### Install the package via Composer:
```bash
   composer require eman-elroukh/socialite-links
```
### Publish the configuration file:
```bash
   php artisan vendor:publish --provider="EmanElroukh\SocialiteLinks\SocialiteLinksServiceProvider" --tag=config
```
### Publish the assets (CSS and JS files):
```bash
   php artisan vendor:publish --provider="EmanElroukh\SocialiteLinks\SocialiteLinksServiceProvider" --tag=public
```

### Run the migrations to create the required tables:
```bash
   php artisan migrate
```

### Clear cache and optimize the application:
```bash
   php artisan optimize:clear
```


# Configuration
- Add the following environment variables to your .env file:

```bash
    FACEBOOK_CLIENT_ID=
    FACEBOOK_CLIENT_SECRET=
    FACEBOOK_REDIRECT_URL=
    
    GOOGLE_CLIENT_ID=
    GOOGLE_CLIENT_SECRET=
    GOOGLE_REDIRECT_URL=
    
    TWITTER_CLIENT_ID=
    TWITTER_CLIENT_SECRET=
    TWITTER_REDIRECT_URI=
```

- Add this to your config/services.php file:

```bash
    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => env('FACEBOOK_REDIRECT_URL'),
    ],
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URL'),
    ],
    'twitter' => [
        'client_id' => env('TWITTER_CLIENT_ID'),
        'client_secret' => env('TWITTER_CLIENT_SECRET'),
        'redirect' => env('TWITTER_REDIRECT_URI'),
    ],
```

# How To Use
- Add social login buttons to your blade file. 
- "you can change url if you have custom routes"
```bash
    <x-socialite-button provider="facebook" url=""/>
    <x-socialite-button provider="google" url=""/>
    <x-socialite-button provider="twitter" url=""/>
```
