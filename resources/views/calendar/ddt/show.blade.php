 
                    <!-- Invoice -->
                    <div class="block block-fx-shadow">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">#INV01364</h3>
                            <div class="block-options">
                                <!-- Print Page functionality is initialized in Helpers.print() -->
                                <button type="button" class="btn-block-option" onclick="Dashmix.helpers('print');">
                                    <i class="si si-printer mr-1"></i> Print Invoice
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="p-sm-4 p-xl-7">
                                <!-- Invoice Info -->
                                <div class="row mb-5">
                                    <!-- Company Info -->
                                    <div class="col-6">
                                        <p class="h3">Company</p>
                                        <address>
                                            Street Address<br>
                                            State, City<br>
                                            Region, Postal Code<br>
                                            ltd@example.com
                                        </address>
                                    </div>
                                    <!-- END Company Info -->

                                    <!-- Client Info -->
                                    <div class="col-6 text-right">
                                        <p class="h3">{{$order->client->company_name}}</p>
                                        <address>
                                            {{$order->client->legal_address}}<br>
                                            {{$order->client->operative_address}}<br>
                                            {{$order->client->p_iva}} <br> 
                                        </address>
                                    </div>
                                    <!-- END Client Info -->
                                </div>
                                <!-- END Invoice Info -->

                                <!-- Table -->
                                <div class="table-responsive push">
                                    <table class="table table-bordered">
                                        <thead class="bg-body">
                                            <tr>
                                                <th class="text-center" style="width: 60px;"></th>
                                                <th>Product</th>
                                                <th class="text-center" style="width: 90px;">Qnt</th>
                                                <th class="text-right" style="width: 120px;">Unit</th>
                                                <th class="text-right" style="width: 120px;">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                        @foreach($products as $index => $product) 

                                            <tr>
                                                <td class="text-center">{{$index + 1}}</td>
                                                <td>
                                                    <p class="font-w600 mb-1">{{$product->product_title}}</p> 
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-pill badge-primary">{{$product->qty_1}}</span>
                                                </td>
                                                <td class="text-right">{{$product->price}}</td>
                                                <td class="text-right">{{$product->val_1}}</td>
                                            </tr>
                                        
                                        @endforeach 
                                        
                                            <tr>
                                                <td colspan="4" class="font-w600 text-right">Subtotal</td>
                                                <td class="text-right">$25.000,00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="font-w600 text-right">Vat Rate</td>
                                                <td class="text-right">20%</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="font-w600 text-right">Vat Due</td>
                                                <td class="text-right">$5.000,00</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="font-w700 text-uppercase text-right bg-body-light">Total Due</td>
                                                <td class="font-w700 text-right bg-body-light">{{$total}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END Table -->

                                <!-- Footer -->
                                <p class="text-muted text-center my-5">
                                    Thank you for doing business with us.
                                </p>
                                <!-- END Footer -->
                            </div>
                        </div>
                    </div>
                    <!-- END Invoice --> 