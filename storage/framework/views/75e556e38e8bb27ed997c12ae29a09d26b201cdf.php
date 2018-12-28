<div class="form-group form-row">
    <div class="col-12 ">
        <label>Titolo</label>
        <input type="text" class="form-control" placeholder=""
               id="title" name="title">
    </div>

    <div class="col-12 ">
        <h2 class="content-heading">Prodotti</h2>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="example-hf-email2"><?php echo e($product->title); ?></label>
                <div class="col-sm-8">
                    <input type="number" class="form-control form-control-alt product" id="<?php echo e($product->id); ?>"
                           name="<?php echo e($product->id); ?>" placeholder="Importo.." value="<?php echo e($product->default_price); ?>">
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>


<script>

        jQuery(function () {
            Dashmix.helpers(['datepicker', 'table-tools-checkable']);
        }); 

        function addPrice() {
            title = $('#title').val();
            map = {};
            $("#createContentListino .product").each(function () {
                map[$(this).attr("name")] = $(this).val();
            });

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '<?php echo e(route('price.store')); ?>',
                data: {
                    'title': title,
                    'products': map
                },
                success: function (data) {
                    $('#modal-block-large').modal('toggle');
                    $.notify(data.msg, 'success');
                    t = $('.js-dataTable-buttons').DataTable();
                    t.row.add([ 
                        '<th class="font-w600 text-xinspire-darker text-center" id ="table_title_"'+title+'>'+data.data.id+'</th>',
                        '<th class="font-w600 text-xinspire-darker text-center" id ="table_title_"'+title+'>'+title+'</th>', 
                        setActionButtons(data.data.id)

                    ]).draw();

                }
            });
        }

</script>
