<?php
/**
 * Created by PhpStorm.
 * User: tim
 * Date: 23/09/2017
 * Time: 01:22
 */

namespace Tim\Smol;


use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Tim\Smol\Facades\Smol;
use Tim\Smol\Widgets\TestWidget;

class SmolServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton('widgets', function () {
            return new WidgetFactory();
        });
    }

    public function boot()
    {
        $path = dirname(__DIR__);

        /** Custom Views */
        $this->loadViewsFrom($path.'/views', 'smol');

        Blade::directive('smol', function ($expression) {
            return "<?php echo Smol::get({$expression})->render(); ?>";
        });

        Blade::directive('smolgroup', function ($expression) {
            return "<?php echo Smol::group({$expression})->render(); ?>";
        });

        Smol::create('smol.widget.test', TestWidget::class);

    }

}