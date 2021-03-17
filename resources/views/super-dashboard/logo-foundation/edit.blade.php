@extends('super-dashboard.index', ['title' => __('keywords.logo.foundation')])

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
            <h3 class="card-title">{{__('keywords.logo.foundation') .' | ' . __('keywords.edit')}}</h3>
        </div>
        <form action="{{route('super-dashboard.logoFoundation.update', ['key' => $logo->key])}}" method="post" enctype="multipart/form-data" class="form">
            <div class="card-body">
                @csrf

                <div class="form-group">
                    @error('image')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="d-flex justify-content-between">
                        <div>
                            <label for="image">{{__('keywords.image')}}</label>
                            <div>
                                <input  name="image" id="image" type="file">
                            </div>
                        </div>

                        <div>
                            <img class="img-fluid" src="{{$logo->value}}" height="150" width="150" alt="">
                            @if($logo->big_logo)
                                {{__('keywords.big.logo')}}
                            @else
                                {{__('keywords.small.logo')}}
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
