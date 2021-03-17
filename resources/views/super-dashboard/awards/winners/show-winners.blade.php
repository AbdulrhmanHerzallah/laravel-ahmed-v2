@extends('super-dashboard.index', ['title' => __('keywords.show.winners')])

@section('head')
    <style>
        td ,th {text-align: center}
    </style>
@endsection

@section('content')

    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                {{__('keywords.the.award'). ' | '. $award->name . ' | ' . __('keywords.season'). ' | '. $awardSeason->season_name}}
            </div>
        </div>
        <div class="card-body">
            <!--begin::Example-->
            <div class="example mb-10">
                <div class="example-preview">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{__('keywords.user.name')}}</th>
                            <th scope="col">{{__('keywords.center')}}</th>
                            <th scope="col">{{__('keywords.award.value')}}</th>
                            <th scope="col">{{__('keywords.creator')}}</th>
{{--                            <th scope="col">{{__('keywords.edit')}}</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($winners as $i)
                            <tr>
                                <td>{{$i->id}}</td>
                                <td>{{$i->user_name}}</td>
                                <td>{{$i->center}}</td>
                                <td>{{$i->award_value}}</td>
                                <td>{{$i->creator}}</td>
{{--                                <td>--}}
{{--                                    <button type="button" class="btn btn-success">--}}
{{--                                        <i class="fas fa-user-edit"></i>--}}
{{--                                    </button>--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {!! $winners->links() !!}
            </div>
        </div>
    </div>
@endsection
