 @extends('layouts.master')
@section('custom-css')
<link href="{{ URL::asset('css/leads.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('meta_page_title','Testimonial List | Tenantden')
@section('content')
<div class="container-fluid mt-3">
    <div class="row"> 
    	<div class="col-12 leads-section">
            <div class="card leads-table-card">
                <div class="card-body leads-table-body">
                    <div class="section-title-top">
                        <div class="title-left">
                          <h4 class="header-title">Testimonial List</h4>
                        </div>
                        <div class="title-right">
                            <button id="filterBtn" class="btn btn-top btn-primary waves-effect waves-light float-right">
                            <i class="mdi mdi-filter-outline mr-1"></i>Show Filters
                            </button>
                            <a href="{{route('admin.cms.testimonial.create')}}"  class="btn btn-top btn-primary test-btn btn-cancel mr-2"><i class="mdi mdi-plus-circle-outline mr-1"></i>Add A Testimonial</a>
                        </div>
                    </div>
                    <div class="filter-section rent-filter" style="display: none;">
                        {!! Form::open(array('method'=>'POST','id'=>'search_testimonial')) !!}
                        <div class="row">
                            <div class="col-sm-6 form-group mb-2 col-md-4">
                                {!! Form::select('status', ['0'=>'Inactive','1'=>'Active'], '', ['id'=>'status', 'class' => 'form-control selectpicker',  'title' => 'Select Status', 'placeholder'=>'Select Status']); !!}
                            </div>
                            <div class="col-sm-6 form-group mb-2 col-md-3">
                                {!! Form::text('name', '', ['id'=>'name','class' => 'form-control','title' => 'Search by name','placeholder'=>'Search by name']); !!}
                            </div>
                            <div class="col-sm-6 form-group mb-2 col-md-2">
                                <button class="btn btn-primary search-button" data-style="slide-down" onclick="return searchDesign('search-button')">Search</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>  
                    <table id="testimonialTable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Text</th>
                                <th>Rating</th>
                                <th>Status</th>
                                <th>Created At</th>
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
  var name = '';
  var status;
  var table_instance;  
  var initialized = false;
	table_instance = $('#testimonialTable').DataTable({
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
                $('#search_testimonial.dataTables_filter').each(function () {
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
        url: "{{ route('admin.cms.testimonial.list') }}",
        method: 'POST',
         data:function(d)
         {
            d.status = status;
            d.name = name;
         },
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
        {data: 'name', name: 'testimonials.name'}, 
        {data: 'text', name: 'testimonials.text'},
        {data: 'rating', name: 'testimonials.rating'},
        {data: 'status', name: 'testimonials.status'},
        {data: 'created_at', name: 'testimonials.created_at'},
		{data: 'action', name: 'action', "searchable": false, "orderable": false, width: '50px', className : "text-center"}
    ]
});
$(document).ready(function(){
    $("#filterBtn").click(function(){
        $(".filter-section").toggle();
    });
});
function searchDesign(button) 
{
    l = Ladda.create( document.querySelector( '#search_testimonial .search-button' ) );
    l.start();
    status = $('#status').val();
    name = $('#name').val();
    table_instance.ajax.reload(null,true);
    return false;
}
function testimonialDelete(data=null,id=null)
{
    $.confirm({
        title: 'Confirm!',
        content: 'Do you want to delete the selected testimonial ?',
        buttons: {
            confirm: {
                text: 'Yes',
                btnClass: 'btn btn-success',
                keys: ['enter'],
                action: function() {
                    $.ajax({
                        type: 'POST',
                        url: "{{route('admin.cms.testimonial.delete')}}",
                        data: {
                            'id': id,
                        },
                        dataType: "json",
                        success: function(resultData) {
                            if (resultData.success) {
                                $.toast({
                                    heading: 'Success',
                                    text: resultData.message,
                                    icon: 'success',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    loader: false,
                                });
                                table_instance.ajax.reload(null,true);
                            }
                            else if (!resultData.success) {
                                $.toast({
                                    heading: 'Error',
                                    text: resultData.error,
                                    icon: 'error',
                                    position: 'top-right',
                                    hideAfter: 5000,
                                    loader: false,
                                })
                            }
                        },
                        error: function (jqXHR, exception) {
                            var msg = '';
                            if (jqXHR.status === 0) {
                                msg = 'Not connect.\n Verify Network.';
                            } else if (jqXHR.status == 404) {
                                msg = 'Requested page not found. [404]';
                            } else if (jqXHR.status == 500) {
                                msg = 'Internal Server Error [500].';
                            } else if (exception === 'parsererror') {
                                msg = 'Requested JSON parse failed.';
                            } else if (exception === 'timeout') {
                                msg = 'Time out error.';
                            } else if (exception === 'abort') {
                                msg = 'Ajax request aborted.';
                            } else {
                                msg = 'Uncaught Error.\n' + jqXHR.responseText;
                            }
                            $.toast({
                                heading: 'Error',
                                text: msg,
                                icon: 'error',
                                position: 'top-right',
                                hideAfter: 5000,
                                loader: false,
                            })
                        }
                    });
                }
            },
            cancel: function() {
                return true;
            }
        }
    });
}
</script>  
@endsection