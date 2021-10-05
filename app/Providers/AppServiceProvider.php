<?php

namespace App\Providers;

use App\Models\District;
use App\Models\Koordinator;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
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
        view()->composer('layouts.backend.master', function($view){
            if (Auth::user()->role_id == '2' || Auth::user()->role_id == '3' || Auth::user()->role_id == '4') {
               $user = Auth::user()->school->full_field;
               if ($user == "0") {
                    $key = "not_complated"; 
                    $school = School::find(Auth::user()->school_id);
                    $districts = District::select('id', 'nama')->get();
                    $koordinators = Koordinator::select('id', 'nama')->get();
                    return $view->with('school', $school)->with('districts', $districts)->with('koordinators', $koordinators)->with('key', $key); 
               }else if($user == "1"){
                    $key = "complated";
                    return $view->with('key', $key); 
               }
            }                 
        });
    }
}
