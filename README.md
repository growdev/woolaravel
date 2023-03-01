# Woo <> Laravel
This is a simple proof of concept [Laravel](https://github.com/laravel/laravel) app to connect to and pull data from sites running [WooCommerce](https://woocommerce.com/).

This app uses the TALL Stack with the [Jetstream](https://jetstream.laravel.com) starter kit. 


# Installation

To run this locally follow these steps.

1. Clone the repository and create a `.env` file.
2. Add a database settings.
3. Add APP_URL setting.
4. Run the following:

```
cd woolaravel
composer install
npm install
npm run build
php artisan migrate
```

## Development

The project uses [Vite](https://laravel.com/docs/10.x/vite) for asset bundling and live reload. This works well with Laravel Valet. You only need to run `npm run dev` to have the 

If you are not running Laravel Valet you can run these commands in separate terminals to get the live reload and web server running:

Vite
```
npm run dev
```

Server
```
php artisan serve
```

# Working with local sites

If you set up a Laravel site with Valet's default TLD (Example:  https://woolaravel.valet), that URL will be used as the OAUTH callback.
WooCommerce's code in  `WC_Auth::post_consumer_data()` uses `wp_safe_remote_post()` to send the data. This function does not consider `.valet` to be a safe TLD causing an exception will be thrown on the WooCommerce side.

You can change your Valet's TLD to one considered safe by WordPress, or in file `wp-includes/http.php` comment out line 87 of function `wp_safe_remote_post()`:
```php
function wp_safe_remote_post( $url, $args = array() ) {
	//$args['reject_unsafe_urls'] = true;
	$http                       = _wp_http_get_object();
	return $http->post( $url, $args );
}
```
