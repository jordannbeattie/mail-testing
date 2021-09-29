<?php

namespace Jordanbeattie\MailTesting;
use Illuminate\Support\ServiceProvider;
use Jordanbeattie\MailTesting\Commands\TestMail;

class MailTestingServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/Views', 'mail-testing');
    }

    public function boot()
    {
        $this->commands([
            TestMail::class
        ]);
    }

}
