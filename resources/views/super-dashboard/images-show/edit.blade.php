@extends('super-dashboard.index', ['title' => __('keywords.images.show'). ' | '. __('keywords.edit')])

@section('head')
    <style>
        td ,th{
            text-align: center;
            vertical-align: middle !important;
        }
    </style>
@endsection

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{__('keywords.edit')}}</h3>
        </div>
        <form action="{{route('super-dashboard.imagesShow.update', ['id' => $tabSubject->id])}}" method="post" enctype="multipart/form-data" class="form">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    @error('title')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="title">{{__('keywords.title')}}<span class="text-danger">*</span></label>
                    <input value="{{old('title', $tabSubject->title)}}" id="title" name="title" type="text" class="form-control form-control-solid">
                </div>

                <div class="form-group">
                    @error('images')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="images">{{__('keywords.images')}}<span class="text-danger">*</span></label>
                    <div>
                        <input multiple accept=".gif,.jpg,.jpeg,.png" name="images[]" id="images" type="file">
                    </div>
                </div>
                <div class="alert alert-warning">
                    {{__('keywords.first.delete')}}
                </div>
                <table class="table">
                    <caption>{{__('keywords.previous.subjects')}}</caption>
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('keywords.files')}}</th>
                        <th scope="col">{{__('keywords.replacing.file')}}</th>
                        <th scope="col">{{__('keywords.delete')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tabSubject->files as $file)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            @if($file->file_type == 'image')
                                <td><img src="{{$file->path}}" alt="" width="200" height="200" class="img-fluid"></td>
                            @elseif($file->file_type == 'video')
                                <td>
                                    <video width="200" height="200" controls>
                                        <source src="{{$file->path}}" type="video/mp4">
                                    </video>
                                </td>
                            @endif

                            <td>
                                <input type="file" name="files[]"
                                       @if($file->file_type == 'image')
                                       accept=".gif,.jpg,.jpeg,.png"
                                       @elseif($file->file_type == 'video')
                                       accept=".mp4,.ogx,.oga,.ogv,.ogg,.webm"
                                    @endif
                                >
                                <input type="hidden" name="files_id[]" value="{{$file->id}}">
                            </td>

                            <td>
                                <input type="checkbox" name="checkout_delete[]" value="{{$file->id}}">
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">{{__('keywords.save')}}</button>
            </div>
        </form>
    </div>
@endsection
