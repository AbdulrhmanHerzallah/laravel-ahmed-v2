<?php

namespace App\Http\Controllers\SuperDashboard\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Slider;
use Carbon\Carbon;

class SliderController extends Controller
{

    protected function validateSlider($request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
        ]);
    }

    public function show()
    {
        $sliders = Slider::withTrashed()->orderBy('id', 'DESC')->get();
        return view('super-dashboard.slider.show', ['sliders' => $sliders]);
    }

    public function store(Request $request)
    {

        $this->validateSlider($request);

        $fileName = Carbon::now()->timestamp.'-'.$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $fileName);

        Slider::create(array_merge($request->except(['image']), ['image' => '/images/'.$fileName]));
        toast(__('keywords.slider.message.success'), 'success');

        return redirect()->back();
    }

    public function create()
    {
        return view('super-dashboard.slider.create');
    }


    public function edit($id)
    {
        $slider = Slider::withTrashed()->findOrFail($id);
        return view('super-dashboard.slider.edit', ['slider' => $slider]);
    }


    public function update($id, Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
        ]);

        $slider = Slider::withTrashed()->findOrFail($id);

        $slider->update($request->except(['image']));

        if ($request->hasFile('image'))
        {
            if (File::exists(public_path($slider->image)))
            {
                File::delete(public_path($slider->image));
            }

            $fileName = Carbon::now()->timestamp.'-'.$request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $fileName);

            $slider->image = '/images/'.$fileName;
        }

        $slider->save();
        toast(__('keywords.slider.message.update'), 'success');
        return redirect()->back();
    }


    public function forceDelete($id)
    {
       $slider = Slider::withTrashed()->find($id);

       if (File::exists(public_path($slider->image)))
       {
           File::delete(public_path($slider->image));
       }
       $slider->forceDelete();

        toast(__('keywords.slider.message.forceDelete'), 'success');
        return redirect()->back();
    }

    // use deleted_at to deactivate ajax request
    public function delete($id)
    {
        Slider::withTrashed()->find($id)->delete();
        return response(['success' => __('keywords.deactivate.message')], 200);
    }

    // use deleted_at to activate ajax request
    public function restore($id)
    {
        Slider::withTrashed()->find($id)->restore();
        return response(['success' => __('keywords.activate.message')], 200);
    }

}
