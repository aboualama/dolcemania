 

@extends('layouts.backend')

@section('content')
 
<div class="container">
 
            <div class="panel panel-primary">
 
             <div class="panel-heading">Event Calendar </div>
 
  
            </div>
 
            <div class="panel panel-primary"> 
              <div class="panel-body" >
                  {!! $calendar_details->calendar() !!}
              </div>
            </div>
 
            </div>
@endsection
@section('js_after')
 
 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
 
 
<!-- Scripts -->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
 
{!! $calendar_details->script() !!}

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
 

    </script>


 
@endsection
