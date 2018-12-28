<?php $__env->startSection('content'); ?>

    <div class="block block-rounded block-bordered ">
        <div class="block-header block-header-default"><h3 class="block-title">Cliente</h3>
            <div class="block-options">
                <div class="block-options-item"><code></code></div>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-bordered table-striped table-vcenter  js-dataTable-buttons">
                <thead>
                <a class="btn btn-hero-success btn-rounded center center-block text-white"  data-toggle="modal" data-target="#modal-block-large" onclick="AddNew()"
                   href="#" style="float: right">
                    <span class="click-ripple animate"></span>
                    <i class="si si-plus"></i> nuovo
                </a>
                <tr>

                    <th class="text-center">#</th>
                    <th class="text-center">Regione sociale</th>
                    <th class="text-center">Referente</th>
                    
                    
                    
                    <th class="text-center">Cellulare</th>
                    
                    
                    
                    <th class="text-center">Listino</th>
                    <th class="text-center">Ordini</th>
                    
                   
                    <th class="text-center twoColumns" style="column-span: 2" colspan="2">Action</th>

                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="tr<?php echo e($client->id); ?>"> 
                        <th class="font-w600 text-xinspire-darker"  id ="table_title_<?php echo e($client->id); ?>"><?php echo e($client->id); ?></th> 
                        <th class="font-w600 text-xinspire-darker"  id ="table_company_name_<?php echo e($client->id); ?>"><?php echo e($client->company_name); ?></th> 
                        <th class="font-w600 text-xinspire-darker"  id ="table_reference_name_<?php echo e($client->id); ?>"><?php echo e($client->reference_name); ?></th>
                        <th class="font-w600 text-xinspire-darker"
                            id="table_cell_number_<?php echo e($client->id); ?>"><?php echo e($client->cell_number); ?></th>
                        
                        <th class="font-w600 text-xinspire-darker"  id ="table_product_prices_name_<?php echo e($client->id); ?>">
                            <?php echo e($client->product_prices_name); ?>

                        </th> 
                        
                     <th class="font-w600 text-xinspire-darker"  id ="table_order_<?php echo e($client->id); ?>">
                            <a href="<?php echo e(url('order/client/')); ?>/<?php echo e($client->id); ?>">
                                <?php echo e($client->orders->where('invoice' , false)->count()); ?> Ordini
                            </a> 
                        </th>

 

                        <td class="text-center" style="width: 50px">
                            <div class="btn-group">
                                <a onclick="neworder()" target="_blank"  data-toggle="modal" data-target="#modal-block-neworder" >
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip"
                                            title="delete">Aggiungi ordine</button>
                                     
                                </a> 
                            </div>
                        </td>
 


                        <td class="text-center" style="width: 50px">
                            <div class="btn-group">
                                <a onclick="edit(<?php echo e($client->id); ?>)" target="_blank"  data-toggle="modal" data-target="#modal-block-edit" >
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip"
                                            title="Edit"><i class="fa fa-pencil-alt"></i></button>
                                </a>
                                <a onclick="destroy('<?php echo e($client->id); ?>',this)">
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
                        <h3 class="block-title">Nuovo Product</h3>
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
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        <button type="button" onclick="addClient()" class="btn btn-sm btn-primary" >
                            Salva
                        </button>
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
                        <h3 class="block-title">Modifica Product</h3>
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
                        <button type="button" onclick="updateOrder()" class="btn btn-sm btn-primary" data-dismiss="modal">Salva</button>
                    </div>
                </div>
            </div>
        </div>
    </div>












    <div class="modal" id="modal-block-neworder" tabindex="-1" role="dialog" aria-labelledby="modal-block-neworder"
         aria-hidden="true">
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
                        <div id="createneworder">  
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
                url:"<?php echo e(route('client.create')); ?>",
                method:"GET",
                success:function (resp) {
                    $('#createContent').html(resp);

                }
            });

        }   

        function neworder() {

            $.ajax({
               url:"<?php echo e(route('order.create')); ?>",
                method:"GET",
                success:function (resp) {
                    $('#createneworder').html(resp);

                }
            });

        }

        function edit(id) {

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method:"GET",
                url: '/client/'+id+'/edit',
                success: function (data) {
                    $('#editContent').html(data);

                }
            });

        }
 
 
        
        function updateOrder() {
           var company_name        = $('#company_name').val();
           var reference_name      = $('#reference_name').val();
           var p_iva               = $('#p_iva').val();
           var legal_address       = $('#legal_address').val();
           var operative_address   = $('#operative_address').val();
           var phone_number        = $('#phone_number').val();
           var cell_number         = $('#cell_number').val();
           var web_adress          = $('#web_adress').val();
           var is_customer         = $('#is_customer').val();
           var is_supplier         = $('#is_supplier').val();
           var is_user             = $('#is_user').val();
           var bank_swift          = $('#bank_swift').val();
           var bank_iban           = $('#bank_iban').val();
           var bank_name           = $('#bank_name').val();
           var payment_term        = $('#payment_term').val();
           var payment_method      = $('#payment_method').val();
           var payment_typology    = $('#payment_typology').val();
           var vat                 = $('#vat').val();
           var product_prices_name = $('#product_prices_name').val(); 
           var notes               = $('#notes').val(); 
           var id        = $('#Id').val();
           console.log("id");
            $.ajax({

                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '/client/'+id,
                data:{
                    _method:"PUT",
                  company_name:         company_name,
                  reference_name:       reference_name,
                  p_iva:                p_iva,
                  legal_address:        legal_address,
                  operative_address:    operative_address,
                  phone_number:         phone_number,
                  cell_number:          cell_number,
                  web_adress:           web_adress,
                  is_customer:          is_customer,
                  is_supplier:          is_supplier,
                  is_user:              is_user,
                  bank_swift:           bank_swift,
                  bank_iban:            bank_iban,
                  bank_name:            bank_name,
                  payment_term:         payment_term,
                  payment_method:       payment_method, 
                  payment_typology:     payment_typology,
                  vat:                  vat,
                  product_prices_name:  product_prices_name, 
                  notes:                notes, 
                },
                success: function (data) {
                    $("#table_company_name_"+id).text(company_name); 
                    $("#table_reference_name_"+id).text(reference_name); 
                    $("#table_p_iva_"+id).text(p_iva); 
                    $("#table_legal_address_"+id).text(legal_address); 
                    $("#table_operative_address_"+id).text(operative_address); 
                    $("#table_phone_number_"+id).text(phone_number); 
                    $("#table_cell_number_"+id).text(cell_number); 
                    $("#table_web_adress_"+id).text(web_adress); 
                    $("#table_is_customer_"+id).text(is_customer); 
                    $("#table_is_supplier_"+id).text(is_supplier); 
                    $("#table_is_user_"+id).text(is_user); 
                    $("#table_bank_swift_"+id).text(bank_swift); 
                    $("#table_bank_iban_"+id).text(bank_iban); 
                    $("#table_bank_name_"+id).text(bank_name); 
                    $("#table_payment_term_"+id).text(payment_term); 
                    $("#table_payment_method_"+id).text(payment_method); 
                    $("#table_payment_typology_"+id).text(payment_typology); 
                    $("#table_vat_"+id).text(vat); 
                    $("#table_product_prices_name_"+id).text(product_prices_name); 
                    $("#table_notes_"+id).text(notes);  
                    $.notify('Operazione avvenuta con successo','success')
                }
            });
        }

        function destroy(id,el) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '/client/'+id,
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


        function deleteProduct(priceListId) {
            console.log(priceListId);
            $('tr *[data-priceListId="' + priceListId + '"]').closest('tr').remove();
            outerHtml = $('#priceListId_' + priceListId)[0].outerHTML;
            $('#priceListId_' + priceListId).remove();
            $('#productPriceListSelect').append(outerHtml)
        }
    </script>  

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.backend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>