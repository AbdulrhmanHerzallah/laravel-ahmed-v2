<?php

namespace App\Helpers;


use App\Models\Tab;
use Carbon\Carbon;

class TabHelperModel{


    public static function updateViewImage($request, $key)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $tab = Tab::where('key', $key)->first();

        $imageFile = Carbon::now()->timestamp.'-'.$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images') ,$imageFile);

        $tab->image = '/images/'.$imageFile;
        $tab->save();

        toast(__('keywords.update.well.done'), 'success');
        return redirect()->back();

    }

}
