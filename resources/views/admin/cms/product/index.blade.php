@extends('layouts.master')
@section('custom-css')
<link href="{{ URL::asset('css/leads.css') }}" rel="stylesheet" type="text/css" />
<style>
    .inquiry-wrapper{
        border-bottom:1px solid #000;
        margin-top:10px;
    }
    .inquiry-wrapper:first-child {
        margin-top:0px;
    }
    #productTable.dataTable>tbody>tr.child ul.dtr-details>li{
        word-break: break-word;
        white-space: normal;
    }
</style>
@endsection
@section('meta_page_title','Product List | ShriRam')
@section('content')
<div class="container-fluid mt-3">
    <div class="row"> 
    	<div class="col-12 leads-section">
            <div class="card leads-table-card">
                <div class="card-body leads-table-body">
                    <div class="section-title-top">
                        <div class="title-left">
                          <a class="back-btn" href="{{ url()->previous() }}"><i class="mdi mdi-keyboard-backspace"></i>Back</a>
                          <h4 class="header-title">Product List</h4>
                        </div>
                        <div class="title-right">
                            <a href="{{route('admin.product.create.view')}}"  class="btn btn-top btn-primary test-btn btn-cancel mr-2"><i class="mdi mdi-plus-circle-outline mr-1"></i>Add A Product</a>
                        </div>
                    </div>
                    <table id="productTable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Banner</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Sub Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th> 
                            </tr>
                        </thead>                
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('plugin-script')

@endsection
@section('custom-script')
<script>
  var l = false;
  var table_instance;  
  var initialized = false;
	table_instance = $('#productTable').DataTable({
    "lengthChange": false,
    "language": {
        "paginate": {
            "previous": "<i class='mdi mdi-chevron-left'>",
            "next": "<i class='mdi mdi-chevron-right'>"
        },
        "processing": '<div class="table-loader d-flex align-items-center p-2"> <strong>Processing...</strong> <div class="spinner-border ml-auto text-primary" role="status" aria-hidden="true"></div> </div>'
    },
    'drawCallback': function (oSettings) {
        if (!initialized) {
                $('#search_payment.dataTables_filter').each(function () {
                    initialized = true;
                });
            }
        $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
       
    },
    searching: false,    
    processing: true,
    serverSide: true,
    retrieve: true,
    paging: false,
    order: [], //Initial no order.
    ajax: {
        url: "{{ route('admin.product.list') }}",
        method: 'POST',
        complete: function(res) {
          if(l) {
              l.stop();
          }
      }
    },
    columnDefs: [
        { 
            "responsivePriority": 1, 
            "targets": -1 
        },
        { 
            "responsivePriority": 2, 
            "targets": -1 
        }
    ],
    columns: [
        {data:'image',name:'image'},
        {data: 'name', name: 'name'},
        {data:'title',name:'title'},
        {data:'sub_title',name:'sub_title'},
        {data: 'category', name: 'category'},
        {data: 'status', name: 'status'},
		{data: 'action', name: 'action', "searchable": false, "orderable": false, width: '50px', className : "text-center"}
      ]
});
</script>  
@endsection