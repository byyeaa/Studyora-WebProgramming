<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Quiz_result;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
            $totalPoints = (int) Quiz_result::sum('score') * 10;
            view()->share('totalPoints', $totalPoints);
    }

}
