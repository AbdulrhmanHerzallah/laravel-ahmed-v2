@extends('super-dashboard.index', ['title' => __('keywords.create.new.season') .' | '. $award->name])

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{__('keywords.create.new.season')}}</h3>
        </div>
        <form action="{{route('super-dashboard.awards.storeSeason', ['award_id' => $award->id])}}" method="post" enctype="multipart/form-data" class="form">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    @error('season_name')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="season_name">{{__('keywords.season.name')}}<span class="text-danger">*</span></label>
                    <input value="{{old('season_name')}}" id="season_name" name="season_name" type="text" class="form-control form-control-solid">
                </div>

                <div class="form-group">
                    @error('start_date')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="start_date">{{__('keywords.season.data.start')}}<span class="text-danger">*</span></label>
                    <input value="{{old('start_date')}}" name="start_date" id="start_date" type="date" class="form-control form-control-solid">
                </div>


                <div class="form-group">
                    @error('end_date')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="end_date">{{__('keywords.season.data.end')}}<span class="text-danger">*</span></label>
                    <input value="{{old('end_date')}}" name="end_date" id="end_date" type="date" class="form-control form-control-solid">
                </div>

                <div class="form-group">
                    @error('end_date')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="advertising_date">{{__('keywords.season.data.advertising.award')}}<span class="text-danger">*</span></label>
                    <input value="{{old('advertising_date')}}" name="advertising_date" id="advertising_date" type="date" class="form-control form-control-solid">
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">{{__('keywords.save')}}</button>
            </div>
        </form>
    </div>
@endsection
