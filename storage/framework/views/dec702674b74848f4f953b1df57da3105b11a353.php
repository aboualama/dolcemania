
  <h1 style="text-transform: capitalize;"><?php echo e($order->client->company_name); ?> Order NO: <?php echo e($order->id); ?></h1>

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
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>                
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($product->product_title); ?></td>
                                    <td><?php echo e($product->price); ?></td> 
                                    <td><?php echo e($product->qty_1); ?></td> 

                                    <td><?php echo e($product->qty_1 * $product->price); ?></td>
                                    <td class="total2"><?php echo e($product->qty_2); ?></td>
                                </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>             
                                    <th colspan="4">Total</th>
                                    <th><?php echo e($total); ?> </th> 
                                </tr>
                    </tbody>
                </table>
 



