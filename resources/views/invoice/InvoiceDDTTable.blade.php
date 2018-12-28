<div class="block block-rounded block-bordered ">
    <div class="block-header block-header-default"><h3 class="block-title">DDT</h3>
        <div class="block-options">
            <div class="block-options-item"><code></code></div>
        </div>
    </div>
    <div class="block-content">
        <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons js-table-checkable"
               id="DDTTable">
            <thead>
            <a class="btn btn-hero-success btn-rounded center center-block text-white" data-toggle="modal"
               data-target="#modal-block-large" onclick="invoiceAll()"
               href="#" style="float: right">
                <span class="click-ripple animate"></span>
                <i class="si si-printer"></i> Fattura tutto
            </a><a class="btn btn-hero-success btn-rounded center center-block text-white" data-toggle="modal"
                   data-target="#modal-block-large" onclick="invoiceSelected()"
                   href="#" style="float: right">
                <span class="click-ripple animate"></span>
                <i class="si si-printer"></i> Fattura selezionato
            </a>
            <tr>

                <th class="text-center" style="width: 70px;">
                    <div class="custom-control custom-checkbox custom-control-primary d-inline-block">
                        <input type="checkbox" class="custom-control-input" id="check-all" name="check-all">
                        <label class="custom-control-label" for="check-all"></label>
                    </div>
                </th>
                <th class="text-center">#</th>
                <th class="text-center">Nome cliente</th>
                <th class="text-center">Data</th>
                <th class="text-center">Totale</th>

                <th class="text-center">Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($orders as $index => $order)
                <tr>
                    <td class="text-center">
                        <div class="custom-control custom-checkbox custom-control-primary d-inline-block">
                            <input type="checkbox" class="custom-control-input" id="{{$order->id}}" name="row_1">
                            <label class="custom-control-label" for="row_1"></label>
                        </div>
                    </td>
                    <th class="font-w600 text-xinspire-darker text-center"><a
                            href="{{route('order.show',$order->id)}}">{{$index +1}}</a></th>
                    <th class="font-w600 text-xinspire-darker text-center">{{$order->client->company_name}}</th>
                    <th class="font-w600 text-xinspire-darker text-center">06/12/2018 10:30</th>
                    <td class="font-w600 text-center" id="table_recurrent_{{$order->id}}">
                        &euro; {{$order->total_1}}</td>


                    <td class="text-center" style="width: 50px">
                        <div class="btn-group">
                            <a onclick="edit('{{$order->id}}')" target="_blank" data-toggle="modal"
                               data-target="#modal-block-edit">
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip"
                                        title="Edit"><i class="fa fa-print"></i></button>
                            </a>

                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
