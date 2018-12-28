<div id="ProductsOfPriceList">
    <label>Seleziona prodotto</label>
    <select id="productPriceListSelect" class="form-control form-control-sm">
        <option value="">Seleziona Prodotto..</option>
        <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="1" class="" id="priceListId_<?php echo e($list->id); ?>"
                    data-priceValue="<?php echo e($list->price); ?>"
                    data-productId="<?php echo e($list->id); ?>"
                    data-priceListId="<?php echo e($list->id); ?>"
                    data-productName="<?php echo e($list->product->title); ?>"><?php echo e($list->product->title); ?></option>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

</div>


<div class="col-md-12">
    <div class="block block-rounded block-bordered block-link-shadow">
        <div class="block-content">
            <table class="table table-borderless table-striped" id="productDiv">
                <tbody>


                </tbody>
            </table>
        </div>
    </div>
</div>

<div style="display: none" id="selectedProductDisplayNone">

</div>


<script>


    $('#productPriceListSelect').change(function () {

        priceListId = $(this).find(":selected").data("pricelistid");
        productname = $(this).find(":selected").data('productname');
        pricevalue = $(this).find(":selected").data('pricevalue');

        $('#selectedProductDisplayNone').append($(this).find(":selected")[0].outerHTML)
        $(this).find(":selected").remove();
        // $('#productPriceListSelect').first().val("");
        var html = '<tr class="js-animation-object animated zoomIn selectedProductQuantity" data-priceListId="' + priceListId + '">\n' +
            '                            <td class="font-size-h4 text-default pname" style="width: 20%">' + productname + '</td>\n' +
            '                            <td style="width:20%">\n' +
            '                                <i class="fa fa-fw fa-euro-sign mr-1 text-info"></i> <span id="clientName">' + pricevalue +
            '                                               </span></td>\n' +
            '                            <td class="font-size-h4 text-default" style="width: 20%"> <input type="number" class="form-control form-control-sm product qt1" id="qt1_' + priceListId + '" > </td>\n' +
            '\n' +
            '                            <td style="width:20%"> <input type="number" class="form-control form-control-sm product qt2" id="qt2_' + priceListId + '" >' +
            '                            </td>\n' +
            '<td style="20%">  <a href="#" onclick="deleteProduct(' + priceListId + ')">\n' +
            '                                    <button type="button" class="btn btn-sm btn-danger js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="delete"><i class="fa fa-trash"></i></button>\n' +
            '                                </a></td>'


        ;
        $('#productDiv > tbody:last-child').append(html);

    });


</script>
