<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use DB;
use Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $query['cate']= DB::table('category')->get();
        view()->share($query);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         //compose all the views....
    view()->composer('*', function ($view) 
    {
        //...with this variable
        $view->with('test', Auth::check());
        if(Auth::check())
        $view->with('email',Auth::user()->email);

    });
    }
}
