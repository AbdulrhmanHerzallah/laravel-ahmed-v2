@extends('super-dashboard.index', ['title' => __('keywords.about.ahmad')])


@section('head')
    <style>
        td , th{text-align: center}
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
                            <th scope="col">{{__('keywords.title')}}</th>
                            <th scope="col">{{__('keywords.edit')}}</th>
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
                                    <a href="{{route('super-dashboard.aboutFoundation.edit', ['id' => $i->id])}}" class="btn btn-primary">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </td>

                                <td>
                                <span class="switch switch-outline switch-icon switch-success d-flex justify-content-center">
									<label>
										<input @if(!$i->deleted_at) checked @endif
                                        data-delete-route="{{route('super-dashboard.aboutFoundation.delete', ['id' => $i->id])}}"
                                               data-restore-route="{{route('super-dashboard.aboutFoundation.restore', ['id' => $i->id])}}"
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

    </script>
@endsection
