
@extends('layouts.backend')

@section('content')


    {{ $dataTable->table(['id'=>'users','class'=>'    js-table-checkable table table-hover table-vcenter']) }}

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
        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });

            var editor = new $.fn.dataTable.Editor({
                ajax: "/users",
                table: "#users",
               // display: "bootstrap",

                    fields: [
                    {label: "name:", name: "name"},
                    {label: "email:", name: "email"}
                ]
            });

            $('#users').on('click', 'tbody td:not(:first-child)', function (e) {
                editor.inline(this);
            });

            {{$dataTable->generateScripts()}}


            $('#check-all').on('click', function(){

                var rows = LaravelDataTables["users"].rows({ 'search': 'applied' }).nodes();
                var activeCount = LaravelDataTables["users"].rows('.table-active').count();
                if ( activeCount === 0){
                    LaravelDataTables["users"].rows().select();
                    console.log("LaravelDataTables['users'].rows().select()");
                    $('input[type="checkbox"]', rows).prop('checked', this.checked);
                    $('input[type="checkbox"]', rows).prop('checked', this.checked);
                    return;

                }

                if (LaravelDataTables["users"].rows().count() >= activeCount && activeCount !== 0) {
                    LaravelDataTables["users"].rows().deselect();
                    $('input[type="checkbox"]', rows).prop('checked', this.checked);
                    return;
                }
               /* LaravelDataTables["users"].rows().select(); */

            });

            $('#users tbody').on('change', 'input[type="checkbox"]', function(){

                if(!this.checked){
                    var el = $('#check-all').get(0);
                    if(el && el.checked && ('indeterminate' in el)){
                        el.indeterminate = true;
                    }
                }
            });



        })

    </script>


    @endsection

