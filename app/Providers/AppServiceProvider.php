<?php

namespace App\Providers;

use App\Models\Message;
use App\Models\News;
use App\Models\Notice;
use App\Models\Page;
use App\Models\Slider;
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
    public function boot()
    {
        $sliders = Slider::all();
        $principalMessage = Message::where('page', '=', 'principal')->get();
        $viceMessage = Message::where('page', '=', 'vice')->get();
        $pages = Page::all();
        $notices = Notice::orderBy('id', 'DESC')->limit(10)->get();
        $newses = News::select('id', 'title')->orderBy('id', 'DESC')->limit(10)->get();
        View::share([
            'sliders' => $sliders,
            'principalMessage' => $principalMessage,
            'viceMessage' => $viceMessage,
            'pages' => $pages,
            'notices' => $notices,
            'newses' => $newses
        ]);
    }
}
