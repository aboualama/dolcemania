<?php $__env->startSection('content'); ?>

    <div class="block block-rounded block-bordered ">
        <div class="block-header block-header-default"><h3 class="block-title">Order</h3>
            <div class="block-options">
                <div class="block-options-item"><code></code></div>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                <thead>
                <a class="btn btn-hero-success btn-rounded center center-block text-white"  data-toggle="modal" data-target="#modal-block-large" onclick="AddNew()"
                   href="#" style="float: right">
                    <span class="click-ripple animate"></span>
                    <i class="si si-plus"></i> nuovo
                </a>
                <tr>

                    <th class="text-center">#</th>
                    <th class="text-center">Client</th>
                    <th class="text-center">Tot. ordine (&euro;)</th>
                    <th class="text-center total2">Tot.2 imponibile (&euro;)</th>
                    <th class="text-center ">Data ordine</th>
                    <th class="text-center ">Id Ricorrnte</th>
                    <th class="text-center">Action</th>

                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th class="font-w600 text-xinspire-darker text-center"><a href="<?php echo e(route('order.show',$order->id)); ?>"><?php echo e($order->id); ?></a></th>
                        <th class="font-w600 text-xinspire-darker text-center" ><?php echo e($order->client->company_name); ?></th>
                        <td class="font-w600 text-center" id ="table_recurrent_<?php echo e($order->id); ?>"><?php echo e($order->total_1); ?></td>
                        <td class="font-w600 text-center total2" id ="table_recurrent_<?php echo e($order->id); ?>"><?php echo e($order->total_2); ?></td>

                       <td class="font-w600 text-center"><?php echo e(date('d-m-Y', strtotime($order->order_date))); ?></td>
                       <td class="font-w600 text-center">
                           <?php if($order->recurrent): ?>
                               <a href="#"> <?php echo e($order->recurrent_id); ?> </a>


                           <?php else: ?>
                           Cor.
                                                             <?php endif; ?>
                       </td>

                        <td class="text-center" style="width: 50px">
                            <div class="btn-group">
                                <a onclick="edit('<?php echo e($order->id); ?>')" target="_blank"  data-toggle="modal" data-target="#modal-block-edit" >
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip"
                                            title="Edit"><i class="fa fa-pencil-alt"></i></button>
                                </a>
                                <a href="#" onclick="destroy('<?php echo e($order->id); ?>',this)">
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                            title="delete"><i class="fa fa-trash"></i></button>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>



    <div class="modal" id="modal-block-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Nuovo Order</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content" >
                        <div id="createContent">  
                        </div>


                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Annulla</button>
                         <button type="button" class="btn btn-sm btn-primary" onclick="addorder()" data-dismiss="modal">Salva</button>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="modal" id="modal-block-edit" tabindex="-1" role="dialog" aria-labelledby="modal-block-edit"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Modifica Order</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div id="editContent">   
                        </div>


                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>








<?php $__env->stopSection(); ?>
<?php $__env->startSection('js_after'); ?>


    <script src="<?php echo e(asset('js/plugins/slick-carousel/slick.min.js')); ?>"></script>

    <script src="<?php echo e(asset('js/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/plugins/editor/js/dataTables.editor.js')); ?>"></script>
    <script src="<?php echo e(asset('js/plugins/datatables/buttons/dataTables.buttons.js')); ?>"></script>
    <script src="https://cdn.datatables.net/select/1.2.4/js/dataTables.select.min.js"></script>
    <script src="<?php echo e(asset('js/plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>

    <script src="<?php echo e(asset('js/plugins/datatables/buttons/buttons.colVis.js')); ?>"></script>
    <script src="<?php echo e(asset('js/plugins/datatables/buttons/buttons.html5.js')); ?>"></script>
    <script src="<?php echo e(asset('js/plugins/datatables/buttons/buttons.print.js')); ?>"></script>
    <script src="<?php echo e(asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.js')); ?>"></script>

    <script src="<?php echo e(asset('js/plugins/datatables/buttons/buttons.flash.js')); ?>"></script>


    <script src="<?php echo e(asset('js/plugins/editor/js/editor.bootstrap4.js')); ?>"></script>

    <script src="<?php echo e(asset('js/plugins/slick-carousel/slick.min.js')); ?>"></script>

 

    <script>
        jQuery(function () {
            Dashmix.helpers(['datepicker', 'table-tools-checkable']);
        });
        function AddNew() {
          //  jQuery('#modal-block-large').modal('show');
            $.ajax({
                url:"<?php echo e(route('order.create')); ?>",
                method:"GET",
                success:function (resp) {
                    $('#createContent').html(resp);

                }
            });

        }
    </script>



    <script>
        jQuery(function () {
            Dashmix.helpers(['datepicker', 'table-tools-checkable']);
        }); 

        function edit(id) {

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: "GET",
                url: '/order/' + id + '/edit',
                success: function (data) {
                    $('#editContent').html(data);

                }
            });

        } 


        function destroy(id,el) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '/order/'+id,
                data:{
                    _method:"DELETE", 
                },
                success: function (data) {
                    $.notify(data.msg, 'success');
                    console.log($(this));
                    el.closest('tr').remove();
                }

            });
        }

        t = $('.js-dataTable-buttons').DataTable();
    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>