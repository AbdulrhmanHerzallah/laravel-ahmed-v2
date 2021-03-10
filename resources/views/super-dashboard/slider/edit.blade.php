@extends('super-dashboard.index', ['title' => __('keywords.slider.edit')])

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{__('keywords.slider.edit')}}</h3>
        </div>
        <form action="{{route('super-dashboard.slider.update', ['id' => $slider->id])}}" method="post" enctype="multipart/form-data" class="form">
            <div class="card-body">
                @csrf
                @method('patch')
                <div class="form-group">
                    @error('title')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="title">العنوان<span class="text-danger">*</span></label>
                    <input value="{{old('title', $slider->title)}}" id="title" name="title" type="text" class="form-control form-control-solid">
                </div>

                <div class="form-group">
                    @error('url')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="url">الرابط</label>
                    <input value="{{old('url', $slider->url)}}" id="url" type="url" class="form-control form-control-solid">
                </div>
                <div class="form-group">
                    @error('image')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="image">الصور<span class="text-danger">*</span></label>
                    <div class="d-flex justify-content-between">
                        <input name="image" id="image" type="file">
                        <img height="100" width="100" class="img-fluid" src="{{$slider->image}}" alt="">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">حفظ</button>
            </div>
        </form>
    </div>
@endsection
