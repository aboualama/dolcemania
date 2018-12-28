
  <h1 style="text-transform: capitalize;">{{$order->client->company_name}} Order NO: {{$order->id}}</h1>

                <table class="datatable table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome Prodotto</th>
                            <th>Costo</th>
                            <th>Quantita'</th>
                            <th>totale (&euro;)</th>
                            <th class="total2">quantita_2</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index=>$product)
                                <tr>                
                                    <td>{{$index + 1}}</td>
                                    <td>{{ $product->product_title }}</td>
                                    <td>{{ $product->price }}</td> 
                                    <td>{{ $product->qty_1}}</td> 

                                    <td>{{ $product->qty_1 * $product->price  }}</td>
                                    <td class="total2">{{ $product->qty_2}}</td>
                                </tr>
                        @endforeach
                                <tr>             
                                    <th colspan="4">Total</th>
                                    <th>{{$total}} </th> 
                                </tr>
                    </tbody>
                </table>
 



