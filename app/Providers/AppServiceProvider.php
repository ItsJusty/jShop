<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Override the email notification for verifying email
        // VerifyEmail::toMailUsing(function ($notifiable) {
        //   $verifyURL = URL::temporarySignedRoute(
        //     'verification.verify',
        //     Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
        //     ['id' => $notifiable->getKey()]
        //   );
        //
        //   return new EmailVerification($verifyURL, $notifiable);
        //
        // });
    }
}
