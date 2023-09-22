@extends('layouts.admin')
@section('content')
@section('page-title')
    Physical Card Request
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Physical Card Request</li>
@endsection
@section('title')
    Physical Card Request
@endsection
@push('css-page')
<style>
    .export-btn
    {
        float:right;
    }
    </style>
@endpush
@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-body table-border-style">
            <h5></h5>
            <button class="csv btn btn-sm btn-primary export-btn">{{__('Export')}}</button>
            <div class="table-responsive">
                <table class="table" id="pc-dt-export">
                    <thead>
                        <tr>
                            <th>{{__('Date')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Designation')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Phone')}}</th>
                            <th>{{__('Status')}}</th>
                            <th id="ignore">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($card_request_deatails as $val)
                            <tr>
                                <td>{{ $val->ordered_at }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->designation }}</td>
                                <td>{{ $val->email }}</td>
                                <td>{{ $val->phone }}</td>
                                @php
                                    $status = ($val->status == 1) ? 'Active' : (($val->status == 2) ? 'Pending' : '');

                                @endphp
                                <td><span class="badge bg-warning p-2 px-3 rounded">{{ ucFirst($status) }}</span></td>
                                <div class="row float-end">
                                    <td class="d-flex">
                                         -
                                    </td>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
<script src="https://rawgit.com/unconditional/jquery-table2excel/master/src/jquery.table2excel.js"></script>
<script>
   const table = new simpleDatatables.DataTable("#pc-dt-export", {
        searchable: true,
        fixedheight: true,
        dom: 'Bfrtip',
    });

    $('.csv').on('click', function() {
        $('#ignore').remove();
        $("#pc-dt-export").table2excel({
            filename: "appointmentDetail"
        });
        setTimeout(function() {
            location.reload();
       }, 2000);
    });

</script>
@endpush
