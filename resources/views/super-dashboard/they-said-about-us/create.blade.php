@extends('super-dashboard.index', ['title' => __('keywords.they.said.about.us')])

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{__('keywords.they.said.about.us'). ' | '. __('keywords.create')}}</h3>
        </div>
        <form action="{{route('super-dashboard.theySaidAboutUs.store')}}" method="post" enctype="multipart/form-data" class="form">
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
                    @error('body')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="body">{{__('keywords.body')}}</label>
                    <textarea class="form-control summernote" id="body" name="body">{{old('body')}}</textarea>
                </div>

                <div class="form-group">
                    @error('images')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="images">{{__('keywords.images')}}<span class="text-danger">*</span></label>
                    <div>
                        <input multiple name="images[]" id="images" type="file">
                    </div>
                </div>

                <div class="form-group">
                    @error('videos')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="videos">{{__('keywords.videos')}}<span class="text-danger">*</span></label>
                    <div>
                        <input multiple name="videos[]" id="videos" type="file">
                    </div>
                </div>


            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">{{__('keywords.save')}}</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.summernote').summernote();
        });
    </script>
@endsection
