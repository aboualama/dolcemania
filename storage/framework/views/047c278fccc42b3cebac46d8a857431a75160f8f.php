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
                <?php $__currentLoopData = $EventMeta; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $em): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th class="font-w600 text-xinspire-darker text-center"><?php echo e($em->event->order->id); ?></th>
                        <th class="font-w600 text-xinspire-darker text-center"><?php echo e($em->event->order->client->company_name); ?></th>
                        
                        <td class="font-w600 text-center"><?php echo e($em->event->order->total_1); ?> </td>

                        <td class="text-center" style="width: 50px">
                            <div class="btn-group">
                                <a  onclick="showOrderDetails( <?php echo e($em->event->order->id); ?>)" target="_blank"
                                    data-toggle="modal" data-target="#modal-showOrderDetails">
                                    <button type="button" class="btn btn-sm btn-primary js-tooltip-enabled"
                                            data-toggle="tooltip" title="" data-original-title="show"><i
                                            class="fa fa-eye"></i></button>
                                </a>
                                <?php if(!$inThePast): ?>    <a onclick="approveOrder( <?php echo e($em->event->order->id); ?> , <?php echo e($em->id); ?> , '<?php echo e($date->format('Y-m-d')); ?>')"   disabled="true" >
                                    <button type="button" class="btn btn-sm btn-success js-tooltip-enabled "
                                            data-toggle="tooltip" title="" data-original-title="Edit"><i
                                            class="fa fa-check"></i></button>
                                </a> <?php endif; ?>
                                <a href="#" onclick="destroy('1',this)">
                                    <button type="button" class="btn btn-sm btn-danger js-tooltip-enabled"
                                            data-toggle="tooltip" title="" data-original-title="delete"><i
                                            class="fa fa-trash"></i></button>
                                </a>
                            </div>
                        </td>


                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
