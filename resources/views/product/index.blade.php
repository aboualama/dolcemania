@extends('layouts.backend')

@section('content')

    <div class="block block-rounded block-bordered ">
        <div class="block-header block-header-default"><h3 class="block-title">Prodotti</h3>
            <div class="block-options">
                <div class="block-options-item"><code></code></div>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                <thead>
                <a class="btn btn-hero-success btn-rounded center center-block text-white" data-toggle="modal"
                   data-target="#modal-block-large" onclick="AddNew()"
                   href="#" style="float: right">
                    <span class="click-ripple animate"></span>
                    <i class="si si-plus"></i> nuovo
                </a>
                <tr>

                    <th class="text-center">#</th>
                    <th class="text-center">Prodotto</th>
                    <th class="text-center">Prezzo</th>
                    <th class="text-center">Teglia</th>
                    <th class="text-center">Categoria</th>
                    <th class="text-center">Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($products as $p)
                    <tr class="tr{{$p->id}}">


                        <th class="font-w600 text-xinspire-darker" id="table_id_{{$p->id}}">{{$p->id}}</th>
                        <th class="font-w600 text-xinspire-darker" id="table_title_{{$p->id}}">{{$p->title}}</th>
                        <td class="font-w600" id="table_default_price_{{$p->id}}">{{$p->default_price}} &euro;</td>
                        <td class="d-none d-sm-table-cell"><span
                                class="font-w600" id="table_quantity_tin_{{$p->id}}">{{$p->quantity_tin}}</span></td>
                        <td class="d-none  d-sm-table-cell" id="table_categories_{{$p->id}}">
                            <span class="font-w600">
                                @foreach($p->categories as $category)
                                    {{$category->title}} ,
                                @endforeach 
                            </span>
                        </td>

                        <td class="text-center" style="width: 50px">
                            <div class="btn-group">
                                <a onclick="edit('{{$p->id}}')" target="_blank" data-toggle="modal"
                                   data-target="#modal-block-edit">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip"
                                            title="Edit"><i class="fa fa-pencil-alt"></i></button>
                                </a>
                                <a onclick="destroy('{{$p->id}}',this)">
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


    <div class="modal" id="modal-block-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-large"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Nuovo Product</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div id="createContent">

                        </div>


                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Annulla</button>
                        <button type="button" onclick="addProduct()" class="btn btn-sm btn-primary"
                                data-dismiss="modal">Salva
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
                        <h3 class="block-title">Modifica Product</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div id="editContent">
                            {{-- @include('product.edit') --}}
                        </div>


                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        <button type="button" onclick="updateProduct()" class="btn btn-sm btn-primary"
                                data-dismiss="modal">Salva
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js_after')

    <script>
        jQuery(function () {
            Dashmix.helpers(['datepicker', 'table-tools-checkable']);
        });

        function AddNew() {
            //  jQuery('#modal-block-large').modal('show');
            $.ajax({
                url: "{{route('product.create')}}",
                method: "GET",
                success: function (resp) {
                    $('#createContent').html(resp);

                }
            });

        }

 

        function edit(id) {

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: "GET",
                url: '/product/' + id + '/edit',
                success: function (data) {
                    $('#editContent').html(data);

                }
            });

        }


        //TODO 1- fix categories to be auto selected.
        //TODO: 2- Fix when catergories are empties

        function updateProduct() {
            var producttitle = $('#producttitle').val();
            var default_price = $('#default_price').val();
            var vat = $('#vat').val();
            var quantity_tin = $('#quantity_tin').val();
            var categories = $('#categories').val();
            var id = $('#Id').val();
            map = {}; 
            $(".PriceListTitle").each(function () {
                        title = $(this).attr('id');
                        price = $(this).val(); 
                        map[title] =
                            {
                               price : price
                            }; }); 
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '/product/' + id,
                data: {
                    _method: "PUT",
                    'producttitle': producttitle,
                    'default_price': default_price,
                    'vat': vat,
                    'quantity_tin': quantity_tin,
                    'categories': categories,
                    'price': map
                },
                success: function (data) {
                    // $('#modal-block-edit').modal('toggle');
                    $("#table_title_" + id).text(data.data.title);
                    $("#table_default_price_" + id).text(data.data.default_price); 
                    $("#table_quantity_tin_" + id).text(data.data.quantity_tin);
                    $("#table_categories_" + id).text(data.data.categories);
                    notifySuccess(data);
                }
            });
        }


        function destroy(id, el) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '/product/' + id,
                data: {
                    _method: "DELETE",
                },
                success: function (data) {
                    notifySuccess(data);
                    el.closest('tr').remove();
                }

            });
        }
    </script>

@endsection

