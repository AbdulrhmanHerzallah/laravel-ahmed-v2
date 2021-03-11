@extends('super-dashboard.index',

['title' => __('keywords.award.season', ['award_name' => $awardSeasons->award_name, 'season' => $awardSeasons->season_name])])

@section('head')
    <link href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        td , th{text-align: center}
    </style>
@endsection

@section('content')
    <div class="bg-white rounded p-5">
        <table id="apps">
            <thead>
            <tr>
                <th scope="col">{{__('keywords.the.name')}}</th>
                <th scope="col">الاميل</th>
                <th scope="col">{{__('keywords.cv.file')}}</th>
                <th scope="col">{{__('keywords.cv.file')}}</th>
                <th scope="col">عرض بينات المتسابق</th>
                <th scope="col">الموافقة الاولية</th>
                <th scope="col">عرض الطلب</th>
            </tr>
            </thead>
        </table>
    </div>



@endsection


@section('script')
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#apps').DataTable({
                processing: true,
                serverSide: true,
                search : false,
                ajax: '{!! route('super-dashboard.awards.showAppsDataTable',['id' => $awardSeasons->id]) !!}',
                columns: [
                    {data: 'user_name', name: 'user_name'},
                    {data: 'email', name: 'email'},
                    {data: '{{__('keywords.cv.file')}}', name: '{{__('keywords.cv.file')}}' , orderable: false, searchable: false},
                    {data: 'nomination_status', name: 'nomination_status', orderable: false, searchable: true},
                    {data: 'is_accepted', name: 'is_accepted', orderable: false, searchable: true},
                    // {data: 'updated_at', name: 'updated_at'}
                ]
            });
        } );
    </script>
@endsection
