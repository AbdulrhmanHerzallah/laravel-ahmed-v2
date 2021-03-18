<?php

namespace App\Helpers;

use App\Models\Tab;
use App\Models\TabSubject;

use Carbon\Carbon;
use Illuminate\Support\Facades\File as FileSystem;
use App\Models\File;

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

       if (FileSystem::exists(public_path($tabSubject->image)))
       {
           FileSystem::delete(public_path($tabSubject->image));
       }
        if (FileSystem::exists(public_path($tabSubject->video)))
        {
            FileSystem::delete(public_path($tabSubject->video));
       }
        $tabSubject->forceDelete();
        toast(__('keywords.delete.well.done'), 'success');
        return redirect()->back();
    }


    public function update($id, $request)
    {


        $tabSubject = TabSubject::withTrashed()->findOrFail($id);

        $files_id = $request->files_id;

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {
                $fileModel = \App\Models\File::find($files_id[$index]);
                if ($fileModel)
                {
                    if (FileSystem::exists(public_path($fileModel->path))) {
                        FileSystem::delete(public_path($fileModel->path));
                    }
                    $fileName = Carbon::now()->timestamp . '-' . $file->getClientOriginalName();
                    if ($fileModel->file_type == 'image') {
                        $file->move(public_path('images'), $fileName);

                        $fileModel->path = '/images/' . $fileName;
                        $fileModel->save();
                    } elseif ($fileModel->file_type == 'video') {
                        $file->move(public_path('videos'), $fileName);
                        $fileModel->path = '/videos/' . $fileName;
                        $fileModel->save();
                    }
                }
            }
        }

        if ($request->has('checkout_delete')) {
            foreach ($request->checkout_delete as $id) {
                $file = File::find($id);
                if ($file) {
                    if (FileSystem::exists(public_path($file->path))) {
                        FileSystem::delete(public_path($file->path));
                    }
                }
                $file->delete();
            }
        }


        if ($request->has('images'))
        {
            foreach ($request->file('images') as $image)
            {
                $fileName = Carbon::now()->timestamp.'-'.$image->getClientOriginalName();
                $image->move(public_path('images'), $fileName);
                File::create(['path' => '/images/'.$fileName, 'file_type' => 'image'])->fileable()->associate($tabSubject)->save();
            }
        }

        if ($request->has('videos'))
        {
            foreach ($request->file('videos') as $video)
            {
                $fileName = Carbon::now()->timestamp.'-'.$video->getClientOriginalName();
                $video->move(public_path('videos'), $fileName);
                File::create(['path' => '/videos/'.$fileName, 'file_type' => 'video'])->fileable()->associate($tabSubject)->save();
            }
        }

        $tabSubject->update($request->except(['files_id', 'files', 'images', 'videos', 'checkout_delete']));
        $tabSubject->save();
        toast(__('keywords.update.well.done'), 'success');
        return redirect()->back();

    }


    public function storeShows($request, $key, $file_dir, $file_type)
    {
        $tab = Tab::where('key', $key)->first();
        $tabSubject = TabSubject::create(['title' => $request->title]);

        $tabSubject->tab()->associate($tab)->save();

        foreach ($request->file($file_dir) as $file) {
            $fileName = Carbon::now()->timestamp . '-' . $file->getClientOriginalName();
            $file->move(public_path($file_dir), $fileName);
            File::create(['path' => '/'.$file_dir.'/' . $fileName, 'file_type' => $file_type])->fileable()->associate($tabSubject)->save();
        }
        toast(__('keywords.create.successfully'), 'success');
        return redirect()->back();

    }

}
