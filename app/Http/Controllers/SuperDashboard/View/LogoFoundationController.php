<?php

namespace App\Http\Controllers\SuperDashboard\View;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\File;


class LogoFoundationController extends Controller
{
    public function show()
    {

        $smallLogo =  Setting::where(['key' => 'small_logo'])->first() ?? null;
        $bigLogo =  Setting::where(['key' => 'big_logo'])->first() ?? null;

        return view('super-dashboard.logo-foundation.show', ['smallLogo' => $smallLogo, 'bigLogo' => $bigLogo]);
    }


    public function edit($key)
    {
        $logo = Setting::where(['key' => $key])->first() ?? null;
        return view('super-dashboard.logo-foundation.edit', ['logo' => $logo]);
    }

    public function update($key, Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

       $setting = Setting::where(['key' => $key])->firstOrFail();

       $fileImage = Carbon::now()->timestamp.'-'.$request->file('image')->getClientOriginalName();
       $request->file('image')->move(public_path('images'), $fileImage);

       if (File::exists(public_path($setting->value)))
       {
           File::delete(public_path($setting->value));
       }

       $setting->value = '/images/'.$fileImage;
       $setting->save();

       toast(__('keywords.update.well.done'), 'success');
       return redirect()->back();
    }
}
