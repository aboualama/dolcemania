@extends('layouts.backend')

@section('content')

    <div class="block block-rounded block-bordered ">
        <div class="block-header block-header-default"><h3 class="block-title">Order</h3>
            <div class="block-options">
                <div class="block-options-item"><code></code></div>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                <thead>
                <a class="btn btn-hero-success btn-rounded center center-block text-white"  data-toggle="modal" data-target="#modal-block-large" onclick="AddNew()"
                   href="#" style="float: right">
                    <span class="click-ripple animate"></span>
                    <i class="si si-plus"></i> nuovo
                </a>
                <tr>

                    <th class="text-center">#</th>
                    <th class="text-center">Nome Listino</th>

                    <th class="text-center">Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($prices as $index => $price)
                    <tr>
                        <th class="font-w600 text-xinspire-darker text-center">{{$index +1}}</th>
                        <td class="font-w600 text-center" id="table_title_{{$price->title}}">{{$price->title}}</td>
                        <td class="text-center" style="width: 50px">
                            <div class="btn-group">
                                <a onclick="edit('{{$price->title}}',this)" target="_blank" data-toggle="modal"
                                   data-target="#modal-block-edit">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip"
                                            title="Edit"><i class="fa fa-pencil-alt"></i></button>
                                </a>
                                <a href="#" onclick="destroy('{{$price->title}}',this)">
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



    <div class="modal" id="modal-block-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Nuovo Price</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content" >
                        <div id="createContentListino">  
                        </div>


                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        <button type="button" onclick="addPrice()" class="btn btn-sm btn-primary" data-dismiss="modal">
                            Listino
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="modal" id="modal-block-edit" tabindex="-1" role="dialog" aria-labelledby="modal-block-edit"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Modifica Price</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div id="editContent">  
                            {{-- @include('price.edit') --}}
                        </div>


                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        <button type="button" onclick="updatePrice()" class="btn btn-sm btn-primary" data-dismiss="modal">Salva</button>
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
        function AddNew() {
          //  jQuery('#modal-block-large').modal('show');
            $.ajax({
                url:"{{route('price.create')}}",
                method:"GET",
                success:function (resp) {
                    $('#createContentListino').html(resp);

                }
            });

        } 


        function edit(id) { 
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '/price/getedit/'+id,
                data:{id:id},
                success: function (data) {
                    $('#editContent').html(data); 

                }
            });

        }
  


        function destroy(id,el) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '/price/'+id,
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


    </script>

@endsection

