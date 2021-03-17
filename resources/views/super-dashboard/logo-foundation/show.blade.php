@extends('super-dashboard.index', ['title' => __('keywords.logo.foundation')])

@section('head')
    <style>
        td, th {
            text-align: center;
            vertical-align: middle !important;
        }
    </style>
@endsection


@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <!--begin::Example-->
            <div class="example mb-10">
                <div class="example-preview">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">{{__('keywords.size')}}</th>
                            <th scope="col">{{__('keywords.images')}}</th>
                            <th scope="col">{{__('keywords.edit')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($bigLogo)
                            <tr>
                                <td>{{__('keywords.big.logo')}}</td>

                                <td><img class="img-fluid img-thumbnail" height="150" width="150" src="{{$bigLogo->value}}" alt=""></td>

                                <td>
                                    <a href="{{route('super-dashboard.logoFoundation.edit', ['key' => $bigLogo->key])}}" class="btn btn-primary">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </td>
                            <tr>
                        @endif

                        @if($smallLogo)
                            <tr>
                                <td>{{__('keywords.small.logo')}}</td>
                                <td><img class="img-fluid img-thumbnail" height="150" width="150" alt="" src="{{$smallLogo->value}}"></td>
                                <td>
                                    <a href="{{route('super-dashboard.logoFoundation.edit', ['key' => $smallLogo->key])}}" class="btn btn-primary">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
