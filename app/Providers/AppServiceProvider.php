<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('slotor', function (string $slot) {
            if (!$slot) {
                $slot = '$slot';
            }
            return <<<PHP
<?php if(isset($slot) && (!$slot instanceof \Illuminate\View\ComponentSlot || {$slot}->isNotEmpty())): echo $slot; else: ?>
PHP;
        });
        Blade::directive('endslotor', function () {
            return '<?php endif; ?>';
        });

        Schema::defaultStringLength(191);
    }
}
