<div class="row">

    <div class="col-md-12">
        <div class="block block-themed block-rounded shadow-lg">
            <div class="block-header"><h3 class="block-title">Nuovo Cliente</h3></div>
            <div class="block-content">

                <div class="form-group form-row">
                    <div class="col-4 ">
                        <label>Regione sociale</label>
                        <input type="text" class="form-control" id="company_name"
                               name="company_name">
                    </div>
                    <div class="col-4">
                        <label>Nome referente</label>
                        <input type="text" class="form-control" id="reference_name"
                               name="reference_name">
                    </div>
                    <div class="col-4">
                        <label>Cellulare</label>
                        <input type="text" class="form-control" id="cell_number"
                               name="cell_number">
                    </div>
                </div>

                <div class="form-group form-row">
                    <div class="col-6">
                        <label>Partita IVA</label>
                        <input type="text" class="form-control" id="p_iva"
                               name="p_iva">
                    </div>
                    <div class="col-6">
                        <label>Indirizzo mail</label>
                        <input type="email" class="form-control" id="mail"
                               name="mail">
                    </div>
                </div>
                <div class="form-group form-row">
                    <div class="col-6 ">
                        <label>Indirizzo legale</label>
                        <input type="text" class="form-control" id="legal_address" name="legal_address">
                    </div>
                    <div class="col-6">
                        <label>Indirizzo operativo</label>
                        <input type="text" class="form-control" id="operative_address"
                               name="operative_address">
                    </div>
                </div>


                <div class="form-group form-row" style="display: none;">
                    <div class="col-4">
                        <label>is_customer</label>
                        <input type="text" class="form-control" id="is_customer"
                               name="is_customer" value="1">
                    </div>
                    <div class="col-4">
                        <label>is_supplier</label>
                        <input type="text" class="form-control" id="is_supplier"
                               name="is_supplier" value="0">
                    </div>
                    <div class="col-4">
                        <label>is_user</label>
                        <input type="text" class="form-control" id="is_user"
                               name="is_user" value="0">
                    </div>
                </div>

                <div class="form-group form-row">
                    <div class="col-4">
                        <label>Iban</label>
                        <input type="text" class="form-control" id="bank_iban"
                               name="bank_iban">
                    </div>
                    <div class="col-4 ">
                        <label>Codice swift</label>
                        <input type="text" class="form-control" id="bank_swift" name="bank_swift">
                    </div>
                    <div class="col-4">
                        <label>Nome banca</label>
                        <input type="text" class="form-control" id="bank_name"
                               name="bank_name">
                    </div>
                </div>

                <div class="form-group form-row">
                    <div class="col-6">
                        <label>IVA</label>
                        <select type="text" class="form-control" id="vat"
                                name="vat">
                            <option value="0">esente iva</option>
                            <option value="4">4%</option>
                            <option value="5">5%</option>
                            <option value="10">10%</option>
                            <option value="22">22%</option>
                        </select>
                        </select>
                    </div>
                    <div class="col-6">
                        <label>Listino</label>
                        <select class="form-control" id="product_prices_name" name="product_prices_name">
                            <?php $__currentLoopData = $p_prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($p_price->title); ?>"><?php echo e($p_price->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                </div>
                <div class="form-group form-row">
                    <div class="col-6">
                        <label>Termini di pagamento</label>
                        <select type="text" class="form-control" id="payment_term"
                                name="payment_term">
                            <option value="30">30GG</option>
                            <option value="60">60GG</option>
                            <option value="90">90GG</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label>Metodo di pagamento</label>
                        <select type="text" class="form-control" id="payment_method"
                                name="payment_method">
                            <option value="contanti">contanti</option>
                            <option value="bonifico">bonifico</option>
                            <option value="assegno">assegno</option>
                        </select>
                    </div>
                </div>

                <div class="form-group form-row">

                    <div class="col-6 " style="display: none">
                        <label>payment_typology</label>
                        <input type="text" class="form-control" id="payment_typology" name="payment_typology">
                    </div>
                </div>
                <div class="form-group form-row">

                    <div class="col-12">
                        <label>Note</label>
                        <textarea class="form-control" id="notes" style="resize: none;"
                                  name="notes"></textarea>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>


<script>
        jQuery(function () {
            Dashmix.helpers(['datepicker', 'table-tools-checkable']);
        }); 

        function errorFormValidation(id,msg = "Questo campo e' obligatorio") {
            $(id).focus();
            $(id).notify(msg,'error');

        }

    function addClient() {
        var company_name = $('#company_name').val();
        if (!company_name){
            errorFormValidation('#company_name');
            return false;
        }
        var reference_name = $('#reference_name').val();
        var p_iva = $('#p_iva').val();
        if (!p_iva){
            errorFormValidation('#company_name');
            return false;
        }
        var legal_address = $('#legal_address').val();
        if (!legal_address){
            errorFormValidation('#company_name');
            return false;
        }
        var operative_address = $('#operative_address').val();
        var phone_number = $('#phone_number').val();
        var cell_number = $('#cell_number').val();
        var web_adress = $('#web_adress').val();
        var is_customer = $('#is_customer').val();
        var is_supplier = $('#is_supplier').val();
        var is_user = $('#is_user').val();
        var bank_swift = $('#bank_swift').val();
        var bank_iban = $('#bank_iban').val();
        var bank_name = $('#bank_name').val();
        var payment_term = $('#payment_term').val();
        var payment_method = $('#payment_method').val();
        var payment_typology = $('#payment_typology').val();
        var vat = $('#vat').val();
        var product_prices_name = $('#product_prices_name').val();
        var notes = $('#notes').val();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            url: '<?php echo e(route('client.store')); ?>',
            data: {
                'company_name': company_name,
                'reference_name': reference_name,
                'p_iva': p_iva,
                'legal_address': legal_address,
                'operative_address': operative_address,
                'phone_number': phone_number,
                'cell_number': cell_number,
                'web_adress': web_adress,
                'is_customer': is_customer,
                'is_supplier': is_supplier,
                'is_user': is_user,
                'bank_swift': bank_swift,
                'bank_iban': bank_iban,
                'bank_name': bank_name,
                'payment_term': payment_term,
                'payment_method': payment_method,
                'payment_typology': payment_typology,
                '                  vat': vat,
                'product_prices_name': product_prices_name,
                'notes': notes,
            },
            success: function (data) {
                $('#modal-block-large').modal('toggle');
                t = $('.js-dataTable-buttons').DataTable();
                t.row.add([
                    '<th class="font-w600 text-xinspire-darker text-center" id ="table_title_"' + data.data.id + '>' + data.data.id + '</th>',
                    '<th class="font-w600 text-xinspire-darker text-center" id ="table_company_name_"' + data.data.id + '>' + data.data.company_name + '</th>',
                    '<th class="font-w600 text-xinspire-darker text-center" id ="table_reference_name_"' + data.data.id + '>' + data.data.reference_name + '</th>',
                    /* '<th class="font-w600 text-xinspire-darker text-center" id ="table_p_iva_"' + data.data.id + '>' + data.data.p_iva + '</th>',
                     '<th class="font-w600 text-xinspire-darker text-center" id ="table_legal_address_"' + data.data.id + '>' + data.data.legal_address + '</th>',
                     '<th class="font-w600 text-xinspire-darker text-center" id ="table_operative_address_"' + data.data.id + '>' + data.data.operative_address + '</th>',
                     '<th class="font-w600 text-xinspire-darker text-center" id ="table_phone_number_"' + data.data.id + '>' + data.data.phone_number + '</th>',*/
                    '<th class="font-w600 text-xinspire-darker text-center" id ="table_cell_number_"' + data.data.id + '>' + data.data.cell_number + '</th>',
                    /*'<th class="font-w600 text-xinspire-darker text-center" id ="table_web_adress_"' + data.data.id + '>' + data.data.web_adress + '</th>',
                    '<th class="font-w600 text-xinspire-darker text-center" id ="table_is_customer_"' + data.data.id + '>' + data.data.is_customer + '</th>',
                    '<th class="font-w600 text-xinspire-darker text-center" id ="table_is_supplier_"' + data.data.id + '>' + data.data.is_supplier + '</th>',
                    '<th class="font-w600 text-xinspire-darker text-center" id ="table_is_user_"' + data.data.id + '>' + data.data.is_user + '</th>',
                    '<th class="font-w600 text-xinspire-darker text-center" id ="table_bank_swift_"' + data.data.id + '>' + data.data.bank_swift + '</th>',
                    '<th class="font-w600 text-xinspire-darker text-center" id ="table_bank_iban_"' + data.data.id + '>' + data.data.bank_iban + '</th>',
                    '<th class="font-w600 text-xinspire-darker text-center" id ="table_bank_name_"' + data.data.id + '>' + data.data.bank_name + '</th>',
                    '<th class="font-w600 text-xinspire-darker text-center" id ="table_payment_term_"' + data.data.id + '>' + data.data.payment_term + '</th>',
                    '<th class="font-w600 text-xinspire-darker text-center" id ="table_payment_method_"' + data.data.id + '>' + data.data.payment_method + '</th>',
                    '<th class="font-w600 text-xinspire-darker text-center" id ="table_payment_typology_"' + data.data.id + '>' + data.data.payment_typology + '</th>',
                    '<th class="font-w600 text-xinspire-darker text-center" id ="table_vat_"' + data.data.id + '>' + data.data.vat + '</th>',*/
                    '<th class="font-w600 text-xinspire-darker text-center" id ="table_product_prices_name_"' + data.data.id + '>' + data.data.product_prices_name + '</th>',
                    /*   '<th class="font-w600 text-xinspire-darker text-center" id ="table_notes_"' + data.data.id + '>' + data.data.notes + '</th>',*/
                    setActionButtons(data.data.id)

                ]).draw();
                console.log(data);
            }
        });
    }

</script>
