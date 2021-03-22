@extends('super-dashboard.index', ['title' => __('keywords.awards')])

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
                {{__('keywords.awards')}}
            </div>
        </div>
        <div class="card-body">
            <!--begin::Example-->
            <div class="example mb-10">
                <div class="example-preview">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">{{__('keywords.award.name')}}</th>
                            <th scope="col">عرض المواسم</th>
                            <th scope="col">تعديل محتويات الجائزة</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($awards as $i)
                                @if(auth()->user()->hasRole(['superAdmin', 'award']) ||  auth()->user()->can($i->award_type))
                               <tr>
                                <td>
                                    {{$i->name}}
                                </td>
                                <td>
                                    <a href="{{route('super-dashboard.awards.showSeasons', ['slug' => $i->slug])}}" class="btn btn-success">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('super-dashboard.awards.editAward', ['award_id' => $i->id, 'award_name' => $i->slug])}}" class="btn btn-primary">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @endif
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
