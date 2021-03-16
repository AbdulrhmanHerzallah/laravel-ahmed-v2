@extends('super-dashboard.index', ['title' => __('keywords.award.season', ['award_name' => $app->award_name, 'season' => $app->season_name])])

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('super-dashboard.index')}}">{{__('breadcrumbs.dashboard')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('super-dashboard.awards.show')}}">{{__('keywords.awards')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('super-dashboard.awards.showSeasons', ['slug' => $app->season_name_slug])}}">{{__('keywords.the.seasons')}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('super-dashboard.awards.showApps', ['id' => $app->award_season_id, 'award_name' => $app->award_name_slug, 'season_name' => $app->season_name_slug])}}">{{__('keywords.apps')}}</a></li>
    <li class="breadcrumb-item active">{{__('keywords.app')}}</a></li>
@endsection

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{__('keywords.award.season', ['award_name' => $app->award_name, 'season' => $app->season_name])}}</h3>
        </div>
        <form class="form">
            <div class="card-body">
                <div class="form-group">
                    <label for="user_name">{{__('keywords.user.name')}}</label>
                    <input disabled value="{{$app->user->name}}" id="user_name" type="text" class="form-control form-control-solid">
                </div>

                <div class="form-group">
                    <label for="user_name">{{__('keywords.email')}}</label>
                    <input disabled value="{{$app->user->email}}" id="user_name" type="text" class="form-control form-control-solid">
                </div>

                <div class="form-group">
                    <label for="user_name">{{__('keywords.download.file')}}</label>
                    <div>
                        <a class="btn btn-success" href="{{$app->poetAward->doc_file}}" download>
                            <i class="far fa-arrow-alt-circle-down"></i>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
