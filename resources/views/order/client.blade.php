 

@extends('layouts.backend')

@section('content')

    <div class="block block-rounded block-bordered ">
        <div class="block-header block-header-default"><h3 class="block-title">{{$client->company_name}} Order</h3>
            <div class="block-options">
                <div class="block-options-item"><code></code></div>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                <thead>
                <a class="btn btn-hero-success btn-rounded center center-block text-white" data-toggle="modal"
                   data-target="#modal-block-large" onclick="invoice()"
                   href="#" style="float: right">
                    <span class="click-ripple animate"></span>
                    <i class="fa fa-print"></i> invoice
                </a>
 
                <tr> 
                    <th class="text-center">#</th>
                    <th class="text-center"><input type="checkbox" id="checkAll"></th>
                    <th class="text-center">Client</th>
                    <th class="text-center">Total</th>  
                    <th class="text-center">invoice</th>  
                    <th class="text-center">Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($orders as $index => $order)
                    <tr>
                        <th class="font-w600 text-xinspire-darker text-center"><a href="{{route('order.show',$order->id)}}">{{$index +1}}</a></th>
                        <th class="text-center"><input type="checkbox" class="check" value="{{$order->id}}"></th>
                        <th class="font-w600 text-xinspire-darker text-center" >{{$order->client->company_name}}</th>
                        <td class="font-w600 text-center" id ="table_recurrent_{{$order->id}}">{{$order->total_1}}</td>  

                        <th class="text-center">                   
                            <form method="post" action="{{url('order/invoice/')}}/{{$order->id}}">
                                        {{ csrf_field() }} 
                                    <button type="submit" class="btn btn-success" ><i class="fa fa-print"></i></button> 
                            </form>  
                        </th>  
                    
                        <td class="text-center" style="width: 50px">
                            <div class="btn-group">
                                <a onclick="edit('{{$order->id}}')" target="_blank" data-toggle="modal" data-target="#modal-block-edit" >
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip"
                                            title="Edit"><i class="fa fa-pencil-alt"></i></button>
                                </a>
                                <a href="#" onclick="destroy('{{$order->id}}',this)">
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                            title="delete"><i class="fa fa-trash"></i></button>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

 








    <div class="modal" id="modal-block-edit" tabindex="-1" role="dialog" aria-labelledby="modal-block-edit"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Modifica Order</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div id="editContent">   
                        </div>


                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        <button type="button" onclick="updateOrder()" class="btn btn-sm btn-primary" data-dismiss="modal">Salva</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('js_after')


    <script src="{{ asset('js/plugins/slick-carousel/slick.min.js') }}"></script>

    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/editor/js/dataTables.editor.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.js') }}"></script>
    <script src="https://cdn.datatables.net/select/1.2.4/js/dataTables.select.min.js"></script>
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.js') }}"></script>


    <script src="{{ asset('js/plugins/editor/js/editor.bootstrap4.js') }}"></script>

    <script src="{{ asset('js/plugins/slick-carousel/slick.min.js') }}"></script>

 



    <script>
        jQuery(function () {
            Dashmix.helpers(['datepicker', 'table-tools-checkable']);
        }); 

        function edit(id) {

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: "GET",
                url: '/order/' + id + '/edit',
                success: function (data) {
                    $('#editContent').html(data);

                }
            });

        } 

        function destroy(id,el) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '/order/'+id,
                data:{
                    _method:"DELETE", 
                },
                success: function (data) {
                    $.notify(data.msg, 'success');
                    console.log($(this));
                    el.closest('tr').remove();
                }

            });
        }


        function invoice() {
            var id = $(".check:checked").val(); 
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '/order/invoice/d',
                data:{ 
                   id : id
                },
                success: function (data) { 
                }

            });
        }
 

        $("#checkAll").change(function () {
            $(".check").prop('checked', $(this).prop("checked"));
            // $("input:checkbox").prop('checked', $(this).prop("checked")); same 
        });

        $(".check").change(function () {

          if($(".check").length == $(".check:checked").length)
                $("#checkAll").prop('checked', true);
          else
                $("#checkAll").prop('checked', false);
        });



    </script>


 
@endsection
