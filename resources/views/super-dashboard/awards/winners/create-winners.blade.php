@extends('super-dashboard.index', ['title' =>  'تحديد الفائزين لجائزة '.' | '.$award->name])


@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('super-dashboard.index')}}">{{__('breadcrumbs.dashboard')}}</a></li>
<li class="breadcrumb-item"><a href="{{route('super-dashboard.awards.show')}}">{{__('keywords.awards')}}</a></li>
<li class="breadcrumb-item"><a href="{{route('super-dashboard.awards.showSeasons', ['slug' => $award->slug])}}">{{__('keywords.the.seasons')}}</a></li>
<li class="breadcrumb-item"><a href="{{route('super-dashboard.awards.showApps', ['id' => $awardSeason->id, 'award_name' => $award->slug, 'season_name' => $awardSeason->slug])}}">{{__('keywords.apps')}}</a></li>
<li class="breadcrumb-item active">{{__('keywords.select.the.winners')}}</a></li>
@endsection

@section('content')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">تحديد الفائزين لموسم ({{$awardSeason->season_name}})</h3>
        </div>
        <form id="storeWinner"
              action="{{route('super-dashboard.winner.storeWinner', ['award_id' => $award->id, 'season_id' => $awardSeason->id])}}"
              method="post" enctype="multipart/form-data" class="form">
            @csrf
            <input type="hidden" id="rowCount" name="row_count" value="{{old('row_count', '0')}}">
            <div class="card-body">
                <div class="alert alert-warning my-3">
                    تأكد من عدم تكرار المتسابق عند عملية تسجيل الفائزين.
                </div>
                <div class="row mt-5">

                    <div class="col-lg-4" id="div_user_id_0">

                        <label for="user_id">{{__('keywords.user.name')}}<span class="text-danger">*</span></label>
                        <select name="user_id[]" required class="form-control" id="user_id">
                            @foreach($apps as $app)
                                @if(in_array($app->user_id, $users_id))
                                    @continue
                                @endif
                                <option value="{{$app->user_id}}">{{$app->user_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-4" id="div_center_0">
                        <label for="center">{{__('keywords.center')}}<span class="text-danger">*</span></label>
                        <input required name="center[]" id="center" type="text" class="form-control"
                               value="{{old('center.0') ?? Session::get('inputs')['center'][0] ?? null}}"/>
                    </div>

                    <div class="col-lg-4" id="div_award_value_0">
                        <label for="award_value">{{__('keywords.award.value')}}<span
                                class="text-danger">*</span></label>
                        <input required name="award_value[]" id="award_value" type="text" class="form-control"
                               value="{{old('award_value.0') ?? Session::get('inputs')['award_value'][0] ?? null}}"/>
                    </div>
                </div>
                <button id="addHtmlRow" type="button" class="btn btn-success my-5">
                    <i class="fas fa-plus"></i>
                </button>
                <div id="pertAddHtml">

                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">{{__('keywords.save')}}</button>
                </div>
            </div>
        </form>
    </div>
@endsection


@section('script')
    <script>
        let count = 0;
        document.getElementById('addHtmlRow').addEventListener('click', _ => {
            count++
            document.getElementById('rowCount').value = count;
            document.getElementById('pertAddHtml').insertAdjacentHTML('beforeend',
                `
        <div id="row_content_${count}">
        <div class="row my-5">
           <div class="col-lg-4" id="div_user_id_${count}">
                <label for="user_id_${count}">{{__('keywords.user.name')}}<span class="text-danger">*</span></label>
                <select required name="user_id[]" required class="form-control" id="user_id_${count}">
                 @foreach($apps as $app)
                <option value="{{$app->user_id}}">{{$app->user_name}}</option>
                @endforeach
                </select>
            </div>
            <div class="col-lg-3" id="div_center_${count}">
            <label for="center_${count}">{{__('keywords.center')}}<span class="text-danger">*</span></label>
            <input required name="center[]" required id="center_${count}" type="text" class="form-control"/>
        </div>

        <div class="col-lg-3" id="div_award_value_${count}">
            <label for="award_value_${count}">{{__('keywords.award.value')}}<span class="text-danger">*</span></label>
            <input required name="award_value[]" id="award_value_${count}" type="text" class="form-control"/>
        </div>
        <div class="col-lg-1 position-relative">
            <button onclick="removeRow(${count})" type="button" class="btn btn-primary position-absolute" style="bottom : 0">
               <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <br/>
    </div>
    `)
        })

        function removeRow(countId) {
            document.getElementById(`row_content_${countId}`).remove()
            count--
            document.getElementById('rowCount').value = count;
        }

        document.getElementById('storeWinner').addEventListener('submit', e => {
            e.preventDefault()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                }
            });
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
                url: "{{route('super-dashboard.winner.storeWinner', ['award_id' => $award->id, 'season_id' => $awardSeason->id])}}",
                data: $('#storeWinner').serialize(),
                dataType : 'json',
                success:  (res) => {
                    if (res.success){
                        Swal.fire({
                            icon: 'success',
                            title: res.success,
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                        })
                    }
                },
                error :  (xhr, status, error) =>
                {
                    let err = eval("(" + xhr.responseText + ")");
                    if (err.duplicatedUserErrorMassage)
                    {
                        Swal.fire({
                            title: err.alertWarning,
                            text: err.duplicatedUserErrorMassage,
                            icon: 'warning',
                            confirmButtonText: '{{__('keywords.ok')}}'
                        })
                    }

                    if (err.userInDatabase)
                    {
                        Swal.fire({
                            title: err.alertWarning,
                            text: err.userInDatabase + '('+' '+ err.userData.user_name +' '+')',
                            icon: 'warning',
                            confirmButtonText: '{{__('keywords.ok')}}'
                        })
                    }

                }
            });

        })
    </script>
@endsection
