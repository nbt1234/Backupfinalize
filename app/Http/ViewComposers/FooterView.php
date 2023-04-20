<?php
namespace App\Http\ViewComposers;
use Illuminate\Support\Facades\DB;

class FooterView{
    public function compose($view)
    {
            $footer = DB::table(SOCIAL_USER)->get();
            $view->with(compact('footer'));   
    }
}