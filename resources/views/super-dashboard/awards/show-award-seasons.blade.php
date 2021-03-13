@extends('super-dashboard.index', ['title' => __('keywords.seasons').' | '.$award->name])

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
        <div class="card-header">
            <div class="card-title">
                <a href="{{route('super-dashboard.awards.createSeason', ['award_id' => $award->id, 'award_name' => $award->slug])}}" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-up">
                    <span class="ladda-label">{{__('keywords.create.new')}}<i class="fas fa-plus mx-2"></i></span>
                    <span class="ladda-spinner"></span></a>
            </div>
        </div>
        <div class="card-body">
            <div class="example mb-10">
                <div class="example-preview">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">اسم الموسم</th>
                            <th scope="col">تاريخ بدأ الموسم</th>
                            <th scope="col">تاريخ نهاية الموسم</th>
                            <th scope="col">تاريخ اعلان الجائزة</th>
                            <th scope="col">عرض المتقدمين للجائزة</th>
                            <th scope="col">عرض الفائزين</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($award->awardSeasons as $i)
                            <tr>
                                <td>{{$i->season_name}}</td>
                                <td>{{$i->start_date}}</td>
                                <td>{{$i->end_date}}</td>
                                <td>{{$i->advertising_date}}</td>
                                <td>
                                    <a href="{{route('super-dashboard.awards.showApps', ['id' => $i->id, 'award_name' => $award->slug, 'season_name' => $i->slug])}}" class="btn btn-success">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="" class="btn btn-success">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
