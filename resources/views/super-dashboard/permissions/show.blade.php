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
                <div class="example-preview table-responsive">
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
                                <td><button class="btn btn-success" id="editModel_{{$user->id}}" data-user-id="{{$user->id}}" data-toggle="modal" data-target="#edit_{{$user->id}}"><i class="fas fa-user-edit"></i></button></td>
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




    @foreach($users as $user)
    <div class="modal fade" id="edit_{{$user->id}}" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$user->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('super-dashboard.UsersPermission.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div>
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            @foreach($allPer as $role)
                                <div class="form-group">
                                    <input value="{{$role->name}}" name="{{$role->name}}" @if($user->hasRole($role->name)) checked @endif id="{{$role->name.'_'.$user->id}}" type="checkbox" class="form-check-input">
                                    <label for="{{$role->name.'_'.$user->id}}" class="form-check-label">{{__('keywords.'.$role->name)}}</label>
                                </div>
                                <div class="d-flex flex-wrap justify-content-between">
                                    @foreach($role->permissions as $per)
                                        <div>
                                            <input value="{{$per->name}}"  @if($user->hasPermissionTo($per->name)) checked @endif name="{{$per->name}}" id="{{$per->name.'_'.$user->id}}" type="checkbox" class="form-check-input">
                                            <label for="{{$per->name.'_'.$user->id}}" class="form-check-label">{{__('keywords.'.$per->name)}}</label>
                                        </div>
                                    @endforeach
                                </div>

                                @if($loop->index == 0)
                                    <hr class="my-5">
                                @endif

                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('keywords.cancel')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('keywords.save')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
@endsection
