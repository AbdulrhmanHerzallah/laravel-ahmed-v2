@extends('super-dashboard.index', ['title' => __('keywords.they.said.about.us')])

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
                <a href="{{route('super-dashboard.theySaidAboutUs.create')}}" class="btn btn-success mt-ladda-btn ladda-button" data-style="expand-up">
                    <span class="ladda-label">{{__('keywords.create.new')}}<i class="fas fa-plus mx-2"></i></span>
                    <span class="ladda-spinner"></span></a>
            </div>
        </div>
        <div class="card-body">
            <!--begin::Example-->
            <div class="example mb-10">
                <div class="example-preview">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">{{__('keywords.title')}}</th>
                            <th scope="col">{{__('keywords.edit/delete')}}</th>
                            <th scope="col">{{__('keywords.activate/deactivate')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tab->tabSubjects as $i)
                            <tr>
                                <td>
                                    {{$i->title}}
                                </td>
                                <td>
                                    <a href="{{route('super-dashboard.theySaidAboutUs.edit', ['id' => $i->id])}}" class="btn btn-primary">
                                        <i class="far fa-edit"></i>
                                    </a>

                                    <button data-force-delete="{{route('super-dashboard.theySaidAboutUs.forceDelete', ['id' => $i->id])}}" data-title="{{$i->title}}" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </td>
                                <td>
                            <span class="switch switch-outline switch-icon switch-success d-flex justify-content-center">
									<label>
										<input @if(!$i->deleted_at) checked @endif
                                        data-delete-route="{{route('super-dashboard.theySaidAboutUs.delete', ['id' => $i->id])}}"
                                               data-restore-route="{{route('super-dashboard.theySaidAboutUs.restore', ['id' => $i->id])}}"
                                               onclick="toggleActive(event)" type="checkbox"  name="select">
										<span></span>
									</label>
								</span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
        function toggleActive(e)
        {
            if (!e.target.checked)
            {
                $.ajax({
                    type : 'GET',
                    url : e.target.dataset.deleteRoute,
                    success : function (data)
                    {
                        console.log(data)
                        Swal.fire({
                            icon: 'success',
                            title: data.massage,
                            toast: true,
                            position: 'top-end',
                            timer: 3000,
                            showConfirmButton: false,

                        })
                    }
                })
            }
            else {
                $.ajax({
                    type : 'GET',
                    url : e.target.dataset.restoreRoute,
                    success : function (data)
                    {
                        Swal.fire({
                            icon: 'success',
                            title: data.massage,
                            toast: true,
                            position: 'top-end',
                            timer: 3000,
                            showConfirmButton: false,

                        })
                    }
                })
            }
        }

        $('#delete').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget) // Button that triggered the modal
            let routeDelete = button.data('force-delete') // Extract info from data-* attributes
            let title = button.data('title') // Extract info from data-* attributes
            let modal = $(this)
            modal.find('#title').text(title)
            modal.find('#routeDelete').attr('action', routeDelete)
        })


    </script>
@endsection
