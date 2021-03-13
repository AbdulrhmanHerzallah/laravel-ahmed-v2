@extends('super-dashboard.index', ['title' => __('keywords.edit') .' | '. $award->name])

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{$award->name}}</h3>
        </div>
        <form action="{{route('super-dashboard.awards.updateAward', ['award_id' => $award->id])}}" method="post" enctype="multipart/form-data" class="form">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    @error('title')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="award_name">{{__('keywords.award.name')}}</label>
                    <input disabled value="{{$award->name}}" id="award_name" type="text" class="form-control form-control-solid">
                </div>

                <div class="form-group">
                    @error('desc')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="desc">{{__('keywords.desc')}}</label>
                    <textarea class="form-control summernote" id="desc" name="desc">{{old('desc', $award->desc)}}</textarea>
                </div>


                <div class="form-group">
                    @error('filtering_mechanism_desc')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="filtering_mechanism_desc">{{__('keywords.filtering_mechanism_desc')}}</label>
                    <textarea class="form-control summernote" id="filtering_mechanism_desc" name="filtering_mechanism_desc">{{old('filtering_mechanism_desc', $award->desc)}}</textarea>
                </div>

                <div class="form-group">
                    @error('subject_desc')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="subject_desc">{{__('keywords.subject_desc')}}</label>
                    <textarea class="form-control summernote" id="subject_desc" name="subject_desc">{{old('subject_desc', $award->subject_desc)}}</textarea>
                </div>

                <div class="form-group">
                    @error('winner_desc')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="winner_desc">{{__('keywords.winner_desc')}}</label>
                    <textarea class="form-control summernote" id="winner_desc" name="winner_desc">{{old('winner_desc', $award->winner_desc)}}</textarea>
                </div>


                <div class="form-group">
                    @error('registration_date_desc')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="registration_date_desc">{{__('keywords.registration_date_desc')}}</label>
                    <textarea class="form-control summernote" id="registration_date_desc" name="registration_date_desc">{{old('registration_date_desc', $award->registration_date_desc)}}</textarea>
                </div>

                <div class="form-group">
                    @error('image')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="images">{{__('keywords.image')}}</label>
                    <div class="d-flex justify-content-between">
                        <div>
                            <input name="image" id="image" type="file">
                        </div>
                        <div>
                            @if($award->img)
                            <img src="{{$award->img}}" alt="" height="200" width="200">
                            @endif
                        </div>

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
