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
                            <th scope="col">{{__('keywords.season.name')}}</th>
                            <th scope="col">{{__('keywords.season.data.start')}}</th>
                            <th scope="col">{{__('keywords.season.data.end')}}</th>
                            <th scope="col">{{__('keywords.season.data.advertising.award')}}</th>
                            <th scope="col">{{__('keywords.view.applicants.for.the.award')}}</th>
                            <th scope="col">{{__('keywords.edit.data.season')}}</th>
                            <th scope="col">{{__('keywords.show.winners')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($award->awardSeasons as $i)
                            <tr>
                                <td>{{$i->season_name}}</td>
                                <td>{{$i->start_date_edit}}</td>
                                <td>{{$i->end_date_edit}}</td>
                                <td>{{$i->advertising_date_edit}}</td>
                                <td>
                                    <a href="{{route('super-dashboard.awards.showApps', ['id' => $i->id, 'award_name' => $award->slug, 'season_name' => $i->slug])}}" class="btn btn-success">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning"
                                            data-toggle="modal" data-data="{{$i}}"
                                            data-update-route="{{route('super-dashboard.awards.updateSeason', ['id' => $i->id])}}"
                                            data-delete-route="{{route('super-dashboard.awards.deleteSeason', ['id' => $i->id])}}"
                                            data-target="#edit">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </td>
                                <td>
                                    <a href="{{route('super-dashboard.winner.showWinners', ['award_slug' => $award->slug, 'season_slug' => $i->slug])}}" class="btn btn-success">
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

        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="season_name_title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="updateSeason">
                            @csrf
                            <div class="form-group">
                                <label for="season_name">{{__('keywords.season.name')}}</label>
                                <input required type="text" class="form-control" id="season_name" name="season_name">
                            </div>

                            <div class="form-group">
                                <label for="start_date">{{__('keywords.season.data.start')}}</label>
                                <input required type="date" name="start_date" class="form-control" id="start_date">
                            </div>

                            <div class="form-group">
                                <label for="end_date">{{__('keywords.season.data.end')}}</label>
                                <input required type="date" name="end_date" class="form-control" id="end_date">
                            </div>

                            <div class="form-group">
                                <label for="advertising_date">{{__('keywords.season.data.advertising.award')}}</label>
                                <input required type="date" name="advertising_date" class="form-control" id="advertising_date">
                            </div>

                            <div class="my-5">
                                <div>
                                    <div class="my-2">{{__('keywords.delete.season')}}</div>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" id="deleteRoute" data-delete-route="" data-target="#delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('keywords.cancel')}}</button>
                                <button type="submit" class="btn btn-primary">{{__('keywords.save')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" id="deleteUrl" method="get">
                    <div class="modal-body">
                        {{__('keywords.do.you.want.to.delete')}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('keywords.cancel')}}</button>
                        <button type="submit" class="btn btn-danger">{{__('keywords.delete')}}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

@endsection

@section('script')
<script>

    $('#edit').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let data = button.data('data')
        let updateRoute = button.data('update-route')
        let deleteRoute = button.data('delete-route')
        let modal = $(this)
        modal.find('#season_name_title').text(data.season_name)
        modal.find('#season_name').val(data.season_name)
        modal.find('#start_date').val(data.start_date)
        modal.find('#end_date').val(data.end_date)
        modal.find('#advertising_date').val(data.advertising_date)
        modal.find('#updateSeason').attr('action', updateRoute)
        modal.find('#deleteRoute').attr('data-delete-route', deleteRoute)
    })


    $('#delete').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget)
        let deleteRoute = button.data('delete-route')
        let modal = $(this)
        modal.find('#deleteUrl').attr('action', deleteRoute)
    })

</script>
@endsection
