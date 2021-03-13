@extends('super-dashboard.index', ['title' => __('keywords.award.season', ['award_name' => $app->award_name, 'season' => $app->season_name])])

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">{{__('keywords.award.season', ['award_name' => $app->award_name, 'season' => $app->season_name])}}</h3>
        </div>
        <form class="form">
            <div class="card-body">
                <div class="form-group">
                    <label for="work_type">{{__('keywords.user.name')}}</label>
                    <input type="text" class="form-control" value="{{$app->user->name}}" disabled id="work_type">
                </div>
                <div class="form-group">
                    <label for="work_type">{{__('keywords.work.type')}}</label>
                    <input disabled type="text" class="form-control"
                           value="@if($app->writerAward->writer_type == 'company') {{__('keywords.company')}}  @else {{__('keywords.personally')}}  @endif" id="work_type">
                </div>
                @if($app->writerAward->writer_type == 'company')
                    <div class="form-group">
                        <label for="found_name">{{__('keywords.found.name')}}</label>
                        <input id="found_name" disabled type="text" class="form-control"
                               value="{{$app->writerAward->found_name}}">
                    </div>
                    <div class="form-group">
                        <label for="found_work_business">{{__('keywords.found.work.business')}}</label>
                        <input id="found_work_business" disabled type="text" class="form-control"
                               value="{{$app->writerAward->found_work_business}}">
                    </div>
                    <div class="form-group">
                        <label for="found_administrator_name">{{__('keywords.found.administrator.name')}}</label>
                        <input id="found_administrator_name" disabled type="text" class="form-control"
                               value="{{$app->writerAward->found_administrator_name}}">
                    </div>
                    <div class="form-group">
                        <label for="found_location">{{__('keywords.found.location')}}</label>
                        <input id="found_location" disabled type="text" class="form-control"
                               value="{{$app->writerAward->found_location}}">
                    </div>
                    <div class="form-group">
                        <label for="found_phone">{{__('keywords.found.phone')}}</label>
                        <input id="found_phone" disabled type="text" class="form-control"
                               value="{{$app->writerAward->found_phone}}">
                    </div>
                    <div class="form-group">
                        <label for="found_tel">{{__('keywords.found.tel')}}</label>
                        <input id="found_tel" disabled type="text" class="form-control"
                               value="{{$app->writerAward->found_tel}}">
                    </div>
                @endif
                <div class="mb-3">
                    <label for="title" class="form-label">{{__('keywords.book.name')}}</label>
                    <input disabled type="text" class="form-control" id="title" name="title"
                           value="{{$app->writerAward->title}}">
                </div>
                <div class="mb-3">
                    <label for="lang" class="form-label">{{__('keywords.book.lang')}}</label>
                    <input disabled type="text" class="form-control" id="lang" name="lang"
                           value="{{$app->writerAward->lang}}">
                </div>
                <div class="@if($app->writerAward->writer_type != 'company') d-none @endif" id="company">
                    <div class="mb-3">
                        <label for="found_name" class="form-label">{{__('keywords.found.name')}}</label>
                        <input disabled type="text" class="form-control" id="found_name" name="found_name"
                               value="{{$app->writerAward->found_name}}">
                    </div>
                    <div class="mb-3">
                        <label for="field" class="form-label">{{__('keywords.found.field')}}</label>
                        <input disabled id="field" class="form-control input-background" value="{{$app->writerAward->field}}">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="book_important">{{__('keywords.book.important')}}</label>
                        <textarea disabled class="form-control" name="book_important" id="book_important"
                                  rows="3">{{$app->writerAward->book_important}}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="book_add_value">{{__('keywords.add.value.book')}}</label>
                        <textarea disabled class="form-control" name="book_add_value" id="book_add_value"
                                  rows="3">{{$app->writerAward->book_add_value}}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="date_writing_book">{{__('keywords.date.witter.book')}}</label>
                        <input disabled type="date" class="form-control" id="date_writing_book" name="date_writing_book"
                               value="{{$app->writerAward->date_writing_book}}">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="date_writing_last_book">{{__('keywords.date.witter.book.last.book')}}</label>
                        <input disabled type="date" class="form-control" id="date_writing_last_book"
                               name="date_writing_last_book"
                               value="{{$app->writerAward->date_writing_last_book}}">
                    </div>


                    <div class="form-group mb-3">
                        <label class="form-label" for="book_count">{{__('keywords.pages.book')}}</label>
                        <input disabled type="number" name="book_count" class="form-control" id="book_count"
                               value="{{$app->writerAward->book_count}}">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="deposit_number">{{__('keywords.deposit.number')}}</label>
                        <input disabled type="text" name="deposit_number" class="form-control" id="deposit_number"
                               value="{{$app->writerAward->deposit_number}}">
                    </div>


                    <div class="form-group mb-3">
                        <label class="form-label" for="publishing_house">{{__('keywords.publishing.house')}}</label>
                        <input disabled type="text" class="form-control" id="publishing_house" name="publishing_house"
                               value="{{$app->writerAward->publishing_house}}">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="book_summary">{{__('keywords.book.summary')}}</label>
                        <textarea disabled class="form-control" name="book_summary" id="book_summary"
                                  rows="3">{{$app->writerAward->book_summary}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="book_file" class="form-label">{{__('keywords.download.book')}}</label>
                        <div>
                            <a href="{{$app->writerAward->pdf}}" class="btn btn-success" download><i
                                    class="fas fa-arrow-down"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
