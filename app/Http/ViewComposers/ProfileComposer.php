<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class ProfileComposer
{
    public function compose(View $view)
    {
        $users =  Cache::remember('user-most-active', '60', function () {
            return User::find(Auth::user()->id);
        });
        $view->with('users', $users);
    }
}
