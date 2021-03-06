<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    // protected function mapApiRoutes()
    // {
    //     Route::prefix('api')
    //         ->middleware('api', 'cors')
    //         ->namespace($this->namespace)
    //         ->group(base_path('routes/api.php'));
    // }
    protected function mapApiRoutes()
    {

        Route::group([
            'middleware' => ['api', 'cors'],
            'namespace'  => $this->namespace,
            'prefix'     => 'api',
        ], function ($router) {

            Route::post('/ws/registrarUsuarioApp', 'WS\WSAppUsersController@registrarUsuarioApp');
            Route::post('/ws/loginUsuarioApp', 'WS\WSAppUsersController@loginUserApp');
            Route::get('/ws/allPreguntas', 'WS\WSAppUsersController@allPreguntas');
            Route::get('/ws/pruebaPregunta', 'WS\WSAppUsersController@pruebaPregunta');
            Route::post('/ws/saveResultados', 'WS\WSAppUsersController@saveResultados');
            Route::get('/ws/AllMunicipios', 'WS\WSAppUsersController@AllMunicipios');
            Route::post('/ws/UpdateScoreAppUser', 'WS\WSAppUsersController@UpdateScoreAppUser');
            Route::post('/ws/notificarErrorPregunta', 'WS\WSAppUsersController@notificarErrorPregunta');
            Route::get('/ws/temas', 'WS\WSAppUsersController@temas');
            Route::post('/ws/updatePassword', 'WS\WSAppUsersController@cambiarPass');
        });

    }
}
