@extends('layouts.backend')

@section('content')

    <div class="block block-rounded block-bordered ">
        <div class="block-header block-header-default"><h3 class="block-title">Categoria</h3>
            <div class="block-options">
                <div class="block-options-item"><code></code></div>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                <thead>
                <a class="btn btn-hero-success btn-rounded center center-block text-white" data-toggle="modal"
                   data-target="#modal-block-large"
                   href="#" style="float: right">
                    <span class="click-ripple animate"></span>
                    <i class="si si-plus"></i> nuovo
                </a>
                <tr>

                    <th class="text-center" width="100px">#</th>
                    <th class="text-center">Titolo</th>
                    <th class="text-center" width="50px">Action</th>

                </tr>
                </thead>
                <tbody>l
                @foreach($categories as $index => $c)
                    <tr>
                        <th class="font-w600 text-xinspire-darker text-center">{{$c->id}}</th>
                        <th class="font-w600 text-xinspire-darker text-center" id ="table_title_{{$c->id}}">{{$c->title}}</th>

                        <td class="text-center" style="width: 50px">
                            <div class="btn-group">
                                <a onclick="edit('{{$c->id}}')" target="_blank">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip"
                                            title="Edit"><i class="fa fa-pencil-alt"></i></button>
                                </a>
                                <a href="#" onclick="destroy('{{$c->id}}',this)">
                                    <button href="#" type="button" class="btn btn-sm btn-danger" data-toggle="tooltip"
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
                        <h3 class="block-title">Nuovo Categoria</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div id="createContent">
                            @include('category.create')
                        </div>


                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        <button type="button" onclick="addCategory()" class="btn btn-sm btn-primary" data-dismiss="modal">Salva</button>
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
                        <h3 class="block-title">Modifica Categoria</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div id="createContent">
                            <div class="form-group form-row">

                                <div class="col-6 ">
                                    <label>Nome category</label>
                                    <input type="text" style="display: none" id="catId" value="">
                                    <input type="text" class="form-control" placeholder=""
                                           id="editTitle" name="title">
                                </div>

                            </div>
                        </div>


                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        <button type="button" onclick="updateCategory()" class="btn btn-sm btn-primary" data-dismiss="modal">Salva</button>
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

        function edit(id) {

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'GET',
                url: '/category/'+id+'/edit',
                success: function (data) {
                    $('#modal-block-edit').modal('toggle');
                    $('#catId').val(data.id);
                    $('#editTitle').val(data.title);

                }
            });

        }



        
        function updateCategory() {
           var modifiedValue = $('#editTitle').val()
            var id = $('#catId').val();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '/category/'+id,
                data:{
                    _method:"PUT",
                  title:  modifiedValue
                },
                success: function (data) {
                    $("#table_title_"+id).text(modifiedValue);
                    console.log(data);
                    $.notify(data.msg, 'success');
                }
            });
        }

        function addCategory() {
            var category = $('#category').val();
            var slug = $('#slug').val();

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '{{route('category.store')}}',
                data: {
                    'title': category,
                    'slug': slug
                },
                success: function (data) {
                    $('#modal-block-large').modal('toggle');
                    $("input[type=text], textarea").val("");
                    $.notify(data.msg,"success");
                    t = $('.js-dataTable-buttons').DataTable();
                    t.row.add([
                        '<th class="font-w600 text-xinspire-darker text-center">'+data.data.id+'</th>',
                        '<th class="font-w600 text-xinspire-darker text-center" id ="table_title_"'+data.data.id+'>'+data.data.title+'</th>',
                        setActionButtons(data.data.id)

                    ]).draw();

                }
            });
        }

        function destroy(id,el) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '/category/'+id,
                data:{
                    _method:"DELETE",
                    title:  $('#editTitle').val()
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




    <script>
        jQuery(function () {
            Dashmix.helpers(['datepicker', 'table-tools-checkable']);
        });

        function edit(id) {

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'GET',
                url: '/zzzz/'+id+'/zzzzzzzzz',
                success: function (data) {
                    $('#modal-block-a').modal('toggle'); 

                }
            }); 
        } 
    </script>
