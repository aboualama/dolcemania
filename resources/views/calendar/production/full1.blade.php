@extends('layouts.backend')

@section('content')
<style>
     .datepicker-inline{
        margin-left: auto !important;
        margin-right: auto !important;
    }
     .datepicker{
         margin-left: auto !important;
         margin-right: auto !important;
     }</style>
    <div class="block block-rounded block-bordered ">
        <div class="block-content ">
            <div class="row">
                <div class="col-12">
                    <div class=" form-group">

                        <div class="panel-heading">Event Calendar</div>

                        <div id="orderdate" class="js-datepicker" data-week-start="1" data-today-highlight="true" data-date-format="dd-mm-yyyy"></div>
                    </div>
                </div>
            </div>
            <div id="orders">

            </div>


        </div>
    </div>





<div class="modal" id="modal-showOrderDetails" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Dettagli ordine</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content" >
                    <div id="showOrderDetails">
                    </div>


                </div>
                <div class="block-content block-content-full text-right bg-light">
                    <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Rifiuta</button>
                    <button type="button" class="btn btn-sm btn-primary" onclick="addorder()" data-dismiss="modal">Conferma</button>
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
            Dashmix.helpers([ 'table-tools-checkable']);
        });
        $('#orderdate').datepicker({
            format: 'dd M yyyy',
            weekStart: 1,
            autoclose: false,
            todayHighlight: true,
            orientation: 'bottom' // Position issue when using BS4, set it to bottom until officially supported

        }).on("changeDate", function (event) {
            var d = new Date(event.date);
           data = d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate();
           console.log(data);

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '/getproduction',
                data: {
                    'orderdate': data,
                },
                success: function (data) {
                    $('#orders').html(data);
                }
            })
        });
 

    </script>


@endsection
