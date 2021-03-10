<?php

namespace App\Helpers;

use App\Models\TabSubject;

use Illuminate\Support\Facades\File;

class TabSubjectHelperModel{

    // use delete_at to deactivate
    public function delete($id)
    {
        TabSubject::withTrashed()->findOrFail($id)->delete();
        return response(['massage' => __('keywords.deactivate.message')], 200);
    }

    // use delete_at to restore
    public function restore($id)
    {
        TabSubject::withTrashed()->findOrFail($id)->restore();
        return response(['massage' => __('keywords.activate.message')], 200);
    }

    public function forceDelete($id)
    {
       $tabSubject = TabSubject::withTrashed()->findOrFail($id);

       if (File::exists(public_path($tabSubject->image)))
       {
           File::delete(public_path($tabSubject->image));
       }
        if (File::exists(public_path($tabSubject->video)))
        {
            File::delete(public_path($tabSubject->video));
       }
        $tabSubject->forceDelete();
        toast(__('keywords.delete.well.done'), 'success');
        return redirect()->back();
    }
}
