@extends('super-dashboard.index', ['title' => __('keywords.old.man.images')])

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{__('keywords.old.man.images')}}</h3>
        </div>
        <form action="{{route('super-dashboard.oldManImages.store')}}" method="post" enctype="multipart/form-data" class="form">
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
                    @error('event_date')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="event_date">{{__('keywords.event.data')}}</label>
                    <input value="{{old('date_event')}}" id="title" name="date_event" type="date" class="form-control form-control-solid">
                </div>

                <div class="form-group">
                    @error('event_location')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="event_location">{{__('keywords.event.location')}}</label>
                    <input value="{{old('location_event')}}" id="title" name="location_event" type="text" class="form-control form-control-solid">
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
