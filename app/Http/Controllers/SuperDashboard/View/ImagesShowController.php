<?php

namespace App\Http\Controllers\SuperDashboard\View;

use App\Http\Controllers\Controller;
use App\Models\Tab;
use Illuminate\Http\Request;

class ImagesShowController extends Controller
{
    public function show()
    {
        $tab = Tab::with(['tabSubjects' => function ($query) {
            $query->withTrashed()->orderBy('id', 'DESC');
        }])->firstOrCreate(['key' => 'images_show'], ['key' => 'images_show']);
        return view('super-dashboard.images-show.show', ['tab' => $tab]);
    }


    public function create()
    {

    }
}
