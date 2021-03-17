@extends('super-dashboard.index', ['title' => __('keywords.old.stuff')])

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
            <h3 class="card-title">{{__('keywords.old.stuff.create')}}</h3>
        </div>
        <form action="{{route('super-dashboard.lastNews.update', ['id' => $tabSubject->id])}}" method="post" enctype="multipart/form-data" class="form">
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
                    @error('event_date')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="event_date">{{__('keywords.event.data')}}</label>
                    <input value="{{old('date_event', $tabSubject->date_event)}}" id="title" name="date_event" type="date" class="form-control form-control-solid">
                </div>

{{--                <div class="form-group">--}}
{{--                    @error('event_location')--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        {{$message}}--}}
{{--                    </div>--}}
{{--                    @enderror--}}
{{--                    <label for="event_location">{{__('keywords.event.location')}}</label>--}}
{{--                    <input value="{{old('event_location', $tabSubject->location_event)}}" id="title" name="location_event" type="text" class="form-control form-control-solid">--}}
{{--                </div>--}}

                <div class="form-group">
                    @error('body')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="body">{{__('keywords.body')}}</label>
                    <textarea class="form-control summernote" id="body" name="body">{{old('body',$tabSubject->body)}}</textarea>
                </div>
                <div class="alert alert-warning" role="alert">
                    {{__('keywords.note.all.files.delete')}}
                </div>

                <div class="form-group">
                    @error('images')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="images">{{__('keywords.images')}}</label>
                    <div>
                        <input multiple name="images[]" id="images" type="file">
                    </div>
                </div>
                <table class="table">
                    <caption>{{__('keywords.previous.subjects')}}</caption>
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{__('keywords.files')}}</th>
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
                                <input type="checkbox" name="files_id[]" value="{{$file->id}}">
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

@section('script')
    <script>
        $(document).ready(function () {
            $('.summernote').summernote();
        });
    </script>
@endsection
