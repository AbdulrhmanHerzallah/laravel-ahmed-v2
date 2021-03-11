@extends('super-dashboard.index', ['title' => __('keywords.about.ahmad.edit')])

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{__('keywords.about.ahmad')}}</h3>
        </div>
        <form id="updateForm" action="{{route('super-dashboard.aboutAhmed.update', ['id' => $tabSubject->id])}}" method="post" enctype="multipart/form-data" class="form">
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
                    @error('body')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="body">الموضوع<span class="text-danger">*</span></label>
                    <textarea name="body" class="form-control form-control-solid summernote" id="body">{{old('body', $tabSubject->body)}}</textarea>
                </div>
                <div class="form-group">
                    @error('image')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="image">{{__('keywords.image')}}<span class="text-danger">*</span></label>
                    <div class="d-flex justify-content-between">
                        <input name="image" id="image" type="file">
                        @if($tabSubject->image)
                        <img height="100" width="100" class="img-fluid" src="{{$tabSubject->image}}" alt="">
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    @error('video')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="video">{{__('keywords.video')}}<span class="text-danger">*</span></label>
                    <div class="d-flex justify-content-between">
                        <input name="video" id="video" type="file">
                        @if($tabSubject->video)
                        <video width="300" height="200" controls>
                            <source src="{{$tabSubject->video}}" type="video/mp4">
                        </video>
                        @endif
                    </div>

{{--                    <div class="progress mt-5">--}}
{{--                        <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                    </div>--}}

                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">{{__('keywords.save')}}</button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('.summernote').summernote();
        });
    </script>


@endsection
