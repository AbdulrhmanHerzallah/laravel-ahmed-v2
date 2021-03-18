@extends('super-dashboard.index', ['title' => __('keywords.permissions')])


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
                {{__('keywords.permissions'). ' | '. __('keywords.edit')}}
            </div>
        </div>
        <div class="card-body">
            <!--begin::Example-->
            <div class="example mb-10">
                <div class="example-preview">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">{{__('keywords.images')}}</th>
                            <th scope="col">{{__('keywords.email')}}</th>
                            <th scope="col">{{__('keywords.the.user.name')}}</th>
                            <th scope="col">{{__('keywords.edit')}}</th>
                            <th scope="col">{{__('keywords.activate/deactivate')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><img src="{{$user->profile_photo_url}}" class="rounded img-fluid" height="100" width="100" alt=""></td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->name}}</td>
                                <td><button class="btn btn-success"><i class="fas fa-user-edit"></i></button></td>
                                <td>
                                <span
                                    class="switch switch-outline switch-icon switch-success d-flex justify-content-center">
									<label>
										<input @if(!$user->deleted_at) checked @endif
                                        data-delete-route="#"
                                               data-restore-route="#"
                                               onclick="toggleActive(event)" type="checkbox" name="select">
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
