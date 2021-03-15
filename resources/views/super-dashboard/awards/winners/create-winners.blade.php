@extends('super-dashboard.index')


@section('content')
{{--    @if(Session::has('inputs'))--}}
{{--        @dd(Session::get('inputs'))--}}
{{--    @endif--}}
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">______</h3>
        </div>
        <form action="{{route('super-dashboard.winner.storeWinner', ['award_id' => $award->id, 'season_id' => $awardSeason->id])}}" method="post" enctype="multipart/form-data" class="form">
            @csrf
            <div class="card-body">
                    <div class="row mt-5">
                        <div class="col-lg-4">
                            <label for="user_id">{{__('keywords.user.name')}}<span class="text-danger">*</span></label>
                            <select name="user_id[]" required class="form-control" id="user_id">
                                @foreach($apps as $app)
                                    @if(in_array($app->user_id, $users_id))
                                    @continue
                                    @endif
                                <option name="user_id[]" value="{{$app->user_id}}">{{$app->user_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-4">
                            <label for="center">{{__('keywords.center')}}<span class="text-danger">*</span></label>
                            <input required name="center[]" id="center" type="text" class="form-control" value="{{old('center.0')}}"/>
                        </div>

                        <div class="col-lg-4">
                            <label for="award_value">{{__('keywords.award.value')}}<span class="text-danger">*</span></label>
                            <input required name="award_value[]" id="award_value" type="text" class="form-control" value="{{old('award_value.0')}}"/>
                        </div>
                    </div>


                <button id="addHtmlRow" type="button" class="btn btn-success my-5">
                    <i class="fas fa-plus"></i>
                </button>

                <div id="pertAddHtml">

                </div>

                <input type="hidden" id="rowCount" name="row_count" value="1">

{{--                @for ($i = 1; $i <= old('row_count'); $i++)--}}
{{--                    <div class="form-row" id="item-{{$i}}">--}}
{{--                        <div class="col">--}}
{{--                            <label for="product_name_{{$i}}">{{__('layout.product_name')}}</label>--}}
{{--                            <input id="product_name_{{$i}}" name="product_name[]" class="form-control mb-3 @error('product_name.'.$i) is-invalid @enderror"--}}
{{--                                   placeholder="" value="{{old('product_name.'.$i)}}">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endfor--}}


            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">{{__('keywords.save')}}</button>
            </div>
        </form>
    </div>
@endsection


@section('script')
    <script>
        let count = 1;
        document.getElementById('addHtmlRow').addEventListener('click', _ => {
            count++
            document.getElementById('rowCount').value = count;
            document.getElementById('pertAddHtml').insertAdjacentHTML('beforeend',
        `
        <div id="row_content_${count}">
        <div class="row my-5">
           <div class="col-lg-4">
                <label for="user_id_${count}">{{__('keywords.user.name')}}<span class="text-danger">*</span></label>
                <select required class="form-control" id="user_id_${count}">
                 @foreach($apps as $app)
                        <option name="user_id[]" value="{{$app->user_id}}">{{$app->user_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-3">
            <label for="center_${count}">{{__('keywords.center')}}<span class="text-danger">*</span></label>
            <input required id="center_${count}" type="text" class="form-control"/>
        </div>

        <div class="col-lg-3">
            <label for="award_value_${count}">{{__('keywords.award.value')}}<span class="text-danger">*</span></label>
            <input id="award_value_${count}" type="text" class="form-control"/>
        </div>
        <div class="col-lg-1 position-relative">
            <button onclick="removeRow(${count})" type="button" class="btn btn-warning position-absolute" style="bottom : 0">
               <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <br/>
    </div>
    `)
 })
        function removeRow(countId)
        {
            document.getElementById(`row_content_${countId}`).remove()
            count--
            document.getElementById('rowCount').value = count;
        }
    </script>
@endsection
