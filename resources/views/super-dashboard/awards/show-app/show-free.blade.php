@extends('super-dashboard.index', ['title' => __('keywords.award.season', ['award_name' => $app->award_name, 'season' => $app->season_name])])

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{__('keywords.award.season', ['award_name' => $app->award_name, 'season' => $app->season_name])}}</h3>
        </div>
        <form action="{{route('super-dashboard.oldManStuff.store')}}" method="post" enctype="multipart/form-data" class="form">
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
                        <a class="btn btn-success" href="{{$app->freeAward->doc_file}}" download>
                            <i class="far fa-arrow-alt-circle-down"></i>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
