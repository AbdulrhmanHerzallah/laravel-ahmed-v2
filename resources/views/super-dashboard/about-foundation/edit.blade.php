@extends('super-dashboard.index', ['title' => __('keywords.about.foundation')])

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{__('keywords.about.foundation').' | '. __('keywords.edit')}}</h3>
        </div>
        <form id="updateForm" action="{{route('super-dashboard.aboutFoundation.update', ['id' => $tabSubject->id])}}"
              method="post" enctype="multipart/form-data" class="form">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    @error('title')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="title">{{__('keywords.title')}}<span class="text-danger">*</span></label>
                    <input value="{{old('title', $tabSubject->title)}}" id="title" name="title" type="text"
                           class="form-control form-control-solid">
                </div>

                <div class="form-group">
                    @error('body')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="body">{{__('keywords.body')}}<span class="text-danger">*</span></label>
                    <textarea name="body" class="form-control form-control-solid summernote"
                              id="body">{{old('body', $tabSubject->body)}}</textarea>
                </div>

                <div class="form-group">
                    <div class="mb-3 form-check">
                        <input @if(old('deleteImage')) checked @endif name="deleteImage" type="checkbox" class="form-check-input" id="deleteImage">
                        <label class="form-check-label" for="deleteImage">{{__('keywords.delete.image')}}</label>
                    </div>
                </div>

                <div class="form-group">
                    @error('image')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="image">الصور</label>
                    <div class="d-flex justify-content-between">
                        <input name="image" id="image" type="file">
                        @if($tabSubject->image)
                            <img height="100" width="100" class="img-fluid" src="{{$tabSubject->image}}" alt="">
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">حفظ</button>
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
