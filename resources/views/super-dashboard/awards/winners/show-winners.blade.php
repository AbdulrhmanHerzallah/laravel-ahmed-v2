@extends('super-dashboard.index', ['title' => 's'])

@section('head')
    <style>
        td ,th {text-align: center}
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
                            <th scope="col">اسم المتقدم</th>
                            <th scope="col">المركز</th>
                            <th scope="col">قيمة الجائزة</th>
                            <th scope="col">تعديل</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($winners as $i)
                            <tr>
                                <td>{{$i->user_name}}</td>
                                <td>{{$i->center}}</td>
                                <td>{{$i->award_value}}</td>
                                <td>
                                    <button type="button" class="btn btn-success">
                                        <i class="fas fa-user-edit"></i>
                                    </button>
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
