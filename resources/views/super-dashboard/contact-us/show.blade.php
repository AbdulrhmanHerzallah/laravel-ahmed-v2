@extends('super-dashboard.index', ['title' => __('keywords.contact.us')])


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
                            <th scope="col">{{__('keywords.the.user.name')}}</th>
                            <th scope="col">{{__('keywords.email')}}</th>
                            <th scope="col">{{__('keywords.country')}}</th>
                            <th scope="col">{{__('keywords.phone')}}</th>
                            <th scope="col">{{__('keywords.date.send.time')}}</th>
                            <th scope="col">{{__('keywords.show.the.message')}}</th>
                            <th scope="col">{{__('keywords.delete')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contactUs as $i)
                            <tr>
                                <td>{{$i->name}}</td>

                                <td>{{$i->email}}</td>

                                <td>{{$i->country}}</td>

                                <td>{{$i->phone}}</td>

                                <td>{{$i->created_at_edit}}</td>
                                <td>
                                    <button type="button" class="btn btn-success"
                                            data-toggle="modal" data-target="#showMessage"
                                            data-body="{{$i->body}}"
                                            data-name="{{$i->name}}"
                                    >
                                        <i class="far fa-eye"></i>
                                    </button>
                                </td>

                                <td>
                                    <button data-force-delete="{{route('super-dashboard.contactUs.delete', ['id' => $i->id])}}" data-title="{{$i->name}}" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {!! $contactUs->links() !!}
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="showMessage" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bodyTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('keywords.close')}}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="delete" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="routeDelete" method="get">
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
        $('#delete').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget) // Button that triggered the modal
            let routeDelete = button.data('force-delete') // Extract info from data-* attributes
            let title = button.data('title') // Extract info from data-* attributes
            let modal = $(this)
            modal.find('#title').text(title)
            modal.find('#routeDelete').attr('action', routeDelete)
        })

        $('#showMessage').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget) // Button that triggered the modal
            let body = button.data('body') // Extract info from data-* attributes
            let name = button.data('name') // Extract info from data-* attributes
            let modal = $(this)

            modal.find('#bodyTitle').text(name)
            modal.find('#body').text(body)
        })

    </script>
@endsection
