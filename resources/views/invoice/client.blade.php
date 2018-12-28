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

                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Client</th>
                    <th class="text-center">Total</th>
                    <th class="text-center">invoice</th>
                    <th class="text-center">Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($orders as $index => $order)
                    <tr>
                        <th class="font-w600 text-xinspire-darker text-center"><a
                                href="{{route('order.show',$order->id)}}">{{$index +1}}</a></th>
                        <th class="font-w600 text-xinspire-darker text-center">{{$order->client->company_name}}</th>
                        <td class="font-w600 text-center" id="table_recurrent_{{$order->id}}">{{$order->total}}</td>

                        <th class="text-center">
                            <form method="post" action="{{url('order/invoice/')}}/{{$order->id}}">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-success"><i class="fa fa-print"></i></button>
                            </form>
                        </th>

                        <td class="text-center" style="width: 50px">
                            <div class="btn-group">
                                <a onclick="edit('{{$order->id}}')" target="_blank">
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




@endsection

