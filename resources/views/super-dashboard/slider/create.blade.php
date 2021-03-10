@extends('super-dashboard.index', ['title' => __('keywords.slider.create')])

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{__('keywords.slider.create')}}</h3>
        </div>
        <form action="{{route('super-dashboard.slider.store')}}" method="post" enctype="multipart/form-data" class="form">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    @error('title')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="title">{{__('keywords.title')}}<span class="text-danger">*</span></label>
                    <input value="{{old('title')}}" id="title" name="title" type="text" class="form-control form-control-solid">
                </div>

                <div class="form-group">
                    @error('url')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="url">{{__('keywords.url')}}</label>
                    <input value="{{old('url')}}" id="url" type="url" class="form-control form-control-solid">
                </div>
                <div class="form-group">
                    @error('image')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="image">{{__('keywords.image')}}<span class="text-danger">*</span></label>
                    <div>
                        <input name="image" id="image" type="file">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">{{__('keywords.save')}}</button>
            </div>
        </form>
    </div>
@endsection
