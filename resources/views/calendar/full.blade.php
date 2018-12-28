<div class="panel panel-primary">
    <div class="panel-body">

        <div class="block-content">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                <thead>

                <tr>
                    <th class="text-center">#Ordine</th>
                    <th class="text-center">Regione sociale</th>
                    <th class="text-center">Totale Imponibile(&euro;)</th>
                    <th class="text-center">Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($EventMeta as $index => $em)
                    <tr>
                        <th class="font-w600 text-xinspire-darker text-center">{{ $em->event->order->id}}</th>
                        <th class="font-w600 text-xinspire-darker text-center">{{$em->event->order->client->company_name}}</th>
                        {{--  <th class="font-w600 text-xinspire-darker text-center" >
                              <a href="{{route('order.show',$em->event->order->id)}}">Details</a>
                          </th>--}}
                        <td class="font-w600 text-center">{{$em->event->order->total_1 }} </td>

                        <td class="text-center" style="width: 50px">
                            <div class="btn-group">
                                <a  onclick="showOrderDetails( {{ $em->event->order->id }})" target="_blank"
                                    data-toggle="modal" data-target="#modal-showOrderDetails">
                                    <button type="button" class="btn btn-sm btn-primary js-tooltip-enabled"
                                            data-toggle="tooltip" title="" data-original-title="show"><i
                                            class="fa fa-eye"></i></button>
                                </a>
                                @if(!$inThePast)    <a onclick="approveOrder( {{$em->event->order->id}} , {{$em->id}} , '{{$date->format('Y-m-d')}}')"   disabled="true" >
                                    <button type="button" class="btn btn-sm btn-success js-tooltip-enabled "
                                            data-toggle="tooltip" title="" data-original-title="Edit"><i
                                            class="fa fa-check"></i></button>
                                </a> @endif
                                <a href="#" onclick="destroy('1',this)">
                                    <button type="button" class="btn btn-sm btn-danger js-tooltip-enabled"
                                            data-toggle="tooltip" title="" data-original-title="delete"><i
                                            class="fa fa-trash"></i></button>
                                </a>
                            </div>
                        </td>


                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
