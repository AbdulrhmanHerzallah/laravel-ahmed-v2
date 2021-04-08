@extends('super-dashboard.index',['title' => __('keywords.award.season', ['award_name' => $awardSeasons->award->name ?? '',
'season' => $awardSeasons->season_name ?? ''])])

@section('head')
    <link href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        td , th{text-align: center}
    </style>
@endsection

@section('content')
    <div class="p-5">
        <a href="{{route('super-dashboard.winner.createWinner', ['award_slug' => $awardSeasons->award->slug, 'season_slug' => $awardSeasons->slug])}}" class="btn btn-success">{{__('keywords.select.winners.in.season')}}<i class="mx-2 fas fa-user-plus"></i></a>
        <div class="my-5">
            <a href="{{route('super-dashboard.awards.ApplicationsExport', ['id' => $awardSeasons->id])}}" class="btn btn-primary">تصدير<i class="mx-2 fas fa-file-export"></i></a>

        </div>
    </div>
    <div class="bg-white rounded p-5">
        <table id="apps">
            <thead>
            <tr>
                <th scope="col">{{__('keywords.the.name')}}</th>
                <th scope="col">{{__('keywords.email')}}</th>
                <th scope="col">{{__('keywords.cv.file')}}</th>
                <th scope="col">{{__('keywords.nomination')}}</th>
                @if($awardSeasons->award->steps ?? null == 'two')
                <th scope="col">{{__('keywords.initial.approval.show')}}</th>
                @endif
                <th scope="col">{{__('keywords.show.users.info.racer')}}</th>
                <th scope="col">{{__('keywords.show.app')}}</th>
            </tr>
            </thead>
        </table>
    </div>

    <div class="modal fade" id="user_info" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-lg">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelTitle">{{__('keywords.user.info')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modelBody">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('keywords.close')}}</button>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#apps').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Arabic.json'
                },
                processing: true,
                serverSide: true,
                search : false,
                ajax: '{!! route('super-dashboard.awards.showAppsDataTable',['id' => $awardSeasons->id]) !!}',
                columns: [
                    {data: 'user_name', name: 'user_name'},
                    {data: 'email', name: 'email'},
                    {data: 'cv_file', name: 'cv_file' , orderable: false, searchable: false},
                    {data: 'nomination_status', name: 'nomination_status', orderable: false, searchable: false},
                    @if($awardSeasons->award->steps ?? null == 'two')
                    {data: 'is_accepted', name: 'is_accepted', orderable: false, searchable: false},
                    @endif
                    {data: 'user_info', name: 'user_info', orderable: false, searchable: false},
                    {data: 'show_app', name: 'show_app', orderable: false, searchable: false},
                ]
            });
        } );


        function nomination(e,id)
        {
            if (e.target.checked)
            {
                $.ajax({
                    type: "GET",
                    url: "{{route('super-dashboard.awards.nomination')}}",
                    data: {id : id, nomination_status: 1},
                    success: function (res) {
                        Swal.fire({
                            icon: 'success',
                            title: res.massage,
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        })
                    }
                });
            }
            else {
                $.ajax({
                    type: "GET",
                    url: "{{route('super-dashboard.awards.nomination')}}",
                    data: {id : id, nomination_status: 0},
                    success: function (res) {
                        Swal.fire({
                            icon: 'success',
                            title: res.massage,
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        })
                    }
                });
            }
        }
        @if($awardSeasons->award->steps ?? null == 'two')
        function accepted(e, id) {
            if (e.target.checked) {
                $.ajax({
                    type: "GET",
                    url: "{{route('super-dashboard.awards.accepted')}}",
                    data: {id: id, is_accepted: 1},
                    success: function (res) {
                        Swal.fire({
                            icon: 'success',
                            title: res.massage,
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        })
                    }
                });
            } else {
                $.ajax({
                    type: "GET",
                    url: "{{route('super-dashboard.awards.accepted')}}",
                    data: {id: id, is_accepted: 0},
                    success: function (res) {
                        Swal.fire({
                            icon: 'success',
                            title: res.massage,
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        })
                    }
                });
            }
        }
        @endif
        $('#user_info').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget) // Button that triggered the modal
            let userInfo = button.data('user-info') // Extract info from data-* attributes
            let modal = $(this)
            modal.find('#modelBody').html(
                `
                     <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <td>{{__('keywords.user.name')}}</td>
                            <td>${userInfo.name}</td>
                        </tr>
                             <tr>
                            <td>{{__('keywords.email')}}</td>
                            <td>${userInfo.email}</td>
                        </tr>

                        </tbody>
                    </table>

                `)

        })
    </script>
@endsection
