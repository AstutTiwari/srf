@extends('layouts.master')
@section('custom-css')
<link href="{{ URL::asset('css/leads.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('meta_page_title','Card List | Tenantden')
@section('content')
<div class="container-fluid mt-3 manage-table-title">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <a class="back-btn" href="{{ url()->previous() }}"><i class="mdi mdi-keyboard-backspace"></i>Back</a>
              <h4 class="page-title">Cards</h4>
            </div>
            <div class="section-title-top leads-table-card service-card">
                <div class="title-left">
                  <h4 class="header-title">Cards List</h4>
                </div>
                <div class="title-right">
                    <a href="{{route('admin.service.card.create')}}"  class="btn btn-primary btn-top btn-cancel"><i class="mdi mdi-plus-circle-outline mr-1"></i>Add A  Service</a>
                </div>
            </div>
        </div>
    </div> 
    <div class="row"> 
    	<div class="col-12 leads-section">
            <div class="card leads-table-card">
                <div class="card-body leads-table-body">
                    <!-- <div class="section-title-top">
                        <div class="title-left">                          
                        </div>
                    </div> -->
                    <table id="cardTable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Logo Name</th>
                                <th>Title</th>
                                <th>Text</th>
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
	table_instance = $('#cardTable').DataTable({
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
    ajax: {
        url: "{{ route('admin.service.card.list') }}",
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
        {data: 'hover_logo_url', name: 'hover_logo_url'},
        {data: 'title', name: 'title'},
        {data: 'text', name: 'text'},
        {data: 'status', name: 'status'},
		{data: 'action', name: 'action', "searchable": false, "orderable": false, width: '50px', className : "text-center"}
    ]
});
function cardDelete(data,id)
{
    $.confirm({
        title: 'Confirm!',
        content: 'Do you want to delete the selected service card ?',
        buttons: {
            confirm: {
                text: 'Yes',
                btnClass: 'btn btn-success',
                keys: ['enter'],
                action: function() {
                    $.ajax({
                        type: 'POST',
                        url: "{{route('admin.service.card.delete')}}",
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