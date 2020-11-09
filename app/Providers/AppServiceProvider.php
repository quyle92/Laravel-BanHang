<?php

namespace App\Providers;

use App\Cart;
use App\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
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
    public function boot(Request $request)
    {   //cách 2 để show loại sp trên menu (cách 1 ở PageController)
        View::composer('*',function($view){
            $loai_sp = ProductType::all();
            $view->with('loai_sp', $loai_sp);
        });

        //dd(session('cart'));sẽ ra null
         View::composer('*',function($view){
           // dd(session('cart'));//(lấy session)sẽ có kqua
            if(Session::has('cart'))
            $oldCart = null;
            $oldCart = Session::get('cart');//$oldCart = $request->session()->get('cart');
            $cart = new Cart($oldCart);
            $view->with([
                'products_cart' => $cart->items//note #4
            ]);
            //Session::flush('cart');//note #5
        });
       
    }
}
