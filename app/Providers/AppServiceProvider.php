<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        
        View::share('truc', 'value');

        Blade::directive('cutText', function ($text) {
            return 
            "<?php 
            \$text = $text;
            \$length = 70;
            if(strlen(\$text)>\$length){
                while(!preg_match('/[a-z]/', \$text[\$length])){
                    \$length--;
                }
                $text = substr(\$text, 0, \$length) . '...';
            }
            echo $text 
            ?>";
        });

    }
}
