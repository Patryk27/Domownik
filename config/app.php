<?php

return [
	'name' => 'Domownik',

	'env' => env('APP_ENV', 'production'),
	'debug' => env('APP_DEBUG', false),

	'url' => env('APP_URL', 'http://domownik.dev'),

	'timezone' => 'UTC',
	'locale' => 'pl',
	'fallback_locale' => 'pl',

	'key' => env('APP_KEY'),
	'cipher' => 'AES-256-CBC',

	'log' => env('APP_LOG', 'single'),
	'log_level' => env('APP_LOG_LEVEL', 'debug'),

	'providers' => [
		Illuminate\Auth\AuthServiceProvider::class,
		Illuminate\Broadcasting\BroadcastServiceProvider::class,
		Illuminate\Bus\BusServiceProvider::class,
		Illuminate\Cache\CacheServiceProvider::class,
		Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
		Illuminate\Cookie\CookieServiceProvider::class,
		Illuminate\Database\DatabaseServiceProvider::class,
		Illuminate\Encryption\EncryptionServiceProvider::class,
		Illuminate\Filesystem\FilesystemServiceProvider::class,
		Illuminate\Foundation\Providers\FoundationServiceProvider::class,
		Illuminate\Hashing\HashServiceProvider::class,
		Illuminate\Mail\MailServiceProvider::class,
		Illuminate\Notifications\NotificationServiceProvider::class,
		Illuminate\Pagination\PaginationServiceProvider::class,
		Illuminate\Pipeline\PipelineServiceProvider::class,
		Illuminate\Queue\QueueServiceProvider::class,
		Illuminate\Redis\RedisServiceProvider::class,
		Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
		Illuminate\Session\SessionServiceProvider::class,
		Illuminate\Translation\TranslationServiceProvider::class,
		Illuminate\Validation\ValidationServiceProvider::class,
		Illuminate\View\ViewServiceProvider::class,

		Laravel\Tinker\TinkerServiceProvider::class,
		Laracasts\Flash\FlashServiceProvider::class,
		Orchestra\Parser\XmlServiceProvider::class,

		App\Providers\AppServiceProvider::class,
		App\Providers\LogServiceProvider::class,
		App\Providers\RepositoryServiceProvider::class,

		App\Providers\AuthServiceProvider::class,
		App\Providers\EventServiceProvider::class,
		App\Providers\SupportServiceProvider::class,
		App\Providers\RouteServiceProvider::class,
		App\Providers\ValidatorServiceProvider::class,

		\App\Providers\ModuleServiceProvider::class,

		Barryvdh\Debugbar\ServiceProvider::class,
	],

	'aliases' => [
		'App' => Illuminate\Support\Facades\App::class,
		'Artisan' => Illuminate\Support\Facades\Artisan::class,
		'Auth' => Illuminate\Support\Facades\Auth::class,
		'Blade' => Illuminate\Support\Facades\Blade::class,
		'Breadcrumb' => \App\Support\Facades\Breadcrumb::class,
		'Broadcast' => Illuminate\Support\Facades\Broadcast::class,
		'Bus' => Illuminate\Support\Facades\Bus::class,
		'Cache' => Illuminate\Support\Facades\Cache::class,
		'Calendar' => App\Support\Facades\Calendar::class,
		'Config' => Illuminate\Support\Facades\Config::class,
		'Configuration' => App\Support\Facades\Configuration::class,
		'Controller' => App\Support\Facades\Controller::class,
		'Cookie' => Illuminate\Support\Facades\Cookie::class,
		'Crypt' => Illuminate\Support\Facades\Crypt::class,
		'Currency' => App\Support\Facades\Currency::class,
		'Date' => App\Support\Facades\Date::class,
		'DB' => Illuminate\Support\Facades\DB::class,
		'Eloquent' => Illuminate\Database\Eloquent\Model::class,
		'Event' => Illuminate\Support\Facades\Event::class,
		'File' => Illuminate\Support\Facades\File::class,
		'Form' => App\Support\Facades\Form::class,
		'Gate' => Illuminate\Support\Facades\Gate::class,
		'Hash' => Illuminate\Support\Facades\Hash::class,
		'Lang' => Illuminate\Support\Facades\Lang::class,
		'Log' => Illuminate\Support\Facades\Log::class,
		'Mail' => Illuminate\Support\Facades\Mail::class,
		'Module' => App\Support\Facades\Module::class,
		'MyLog' => App\Support\Facades\MyLog::class,
		'Notification' => Illuminate\Support\Facades\Notification::class,
		'Password' => Illuminate\Support\Facades\Password::class,
		'Queue' => Illuminate\Support\Facades\Queue::class,
		'Redirect' => Illuminate\Support\Facades\Redirect::class,
		'Redis' => Illuminate\Support\Facades\Redis::class,
		'Request' => Illuminate\Support\Facades\Request::class,
		'Response' => Illuminate\Support\Facades\Response::class,
		'Route' => Illuminate\Support\Facades\Route::class,
		'Schema' => Illuminate\Support\Facades\Schema::class,
		'Session' => Illuminate\Support\Facades\Session::class,
		'Storage' => Illuminate\Support\Facades\Storage::class,
		'Translation' => App\Support\Facades\Translation::class,
		'URL' => Illuminate\Support\Facades\URL::class,
		'Utils' => \App\Support\Facades\Utils::class,
		'Validator' => Illuminate\Support\Facades\Validator::class,
		'View' => Illuminate\Support\Facades\View::class,
		'XmlParser' => Orchestra\Parser\Xml\Facade::class,
	],
];
