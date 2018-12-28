 
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
                                        <p class="h3"><?php echo e($order->client->company_name); ?></p>
                                        <address>
                                            <?php echo e($order->client->legal_address); ?><br>
                                            <?php echo e($order->client->operative_address); ?><br>
                                            <?php echo e($order->client->p_iva); ?> <br> 
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



                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

                                            <tr>
                                                <td class="text-center"><?php echo e($index + 1); ?></td>
                                                <td>
                                                    <p class="font-w600 mb-1"><?php echo e($product->product_title); ?></p> 
                                                </td>
                                                <td class="text-center">
                                                    <span class="badge badge-pill badge-primary"><?php echo e($product->qty_1); ?></span>
                                                </td>
                                                <td class="text-right"><?php echo e($product->price); ?></td>
                                                <td class="text-right"><?php echo e($product->val_1); ?></td>
                                            </tr>
                                        
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                        
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
                                                <td class="font-w700 text-right bg-body-light"><?php echo e($total); ?></td>
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