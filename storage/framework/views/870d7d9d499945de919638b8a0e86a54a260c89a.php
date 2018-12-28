        <input type="text" style="display: none" id="Id" value="<?php echo e($client->id); ?>">








<div class="row">

    <div class="col-md-12">
        <div class="block block-themed block-rounded shadow-lg">
            <div class="block-header"><h3 class="block-title">Nuovo Cliente</h3></div>
            <div class="block-content">

                <div class="form-group form-row">
                    <div class="col-4 ">
                        <label>Regione sociale</label>
                        <input type="text" class="form-control" id="company_name" value="<?php echo e($client->company_name); ?>" name="company_name">
                    </div>
                    <div class="col-4">
                        <label>Nome referente</label>
                        <input type="text" class="form-control" id="reference_name" value="<?php echo e($client->reference_name); ?>" name="reference_name">
                    </div>
                    <div class="col-4">
                        <label>Cellulare</label>
                        <input type="text" class="form-control" id="cell_number" value="<?php echo e($client->cell_number); ?>" name="cell_number">
                    </div>
                </div>

                <div class="form-group form-row">
                    <div class="col-4">
                        <label>Partita IVA</label>
                        <input type="text" class="form-control" id="p_iva" value="<?php echo e($client->p_iva); ?>" name="p_iva">
                    </div>
                    <div class="col-4 ">
                        <label>Indirizzo legale</label>
                        <input type="text" class="form-control" id="legal_address" value="<?php echo e($client->legal_address); ?>" name="legal_address">
                    </div>
                    <div class="col-4">
                        <label>Indirizzo operativo</label>
                        <input type="text" class="form-control" id="operative_address" value="<?php echo e($client->operative_address); ?>" name="operative_address">
                    </div>
                </div>


                <div class="form-group form-row" style="display: none;">
                    <div class="col-4">
                        <label>is_customer</label>
                        <input type="text" class="form-control" id="is_customer" value="<?php echo e($client->is_customer); ?>" name="is_customer" value="1">
                    </div>
                    <div class="col-4">
                        <label>is_supplier</label>
                        <input type="text" class="form-control" id="is_supplier" value="<?php echo e($client->is_supplier); ?>" name="is_supplier" value="0">
                    </div>
                    <div class="col-4">
                        <label>is_user</label>
                        <input type="text" class="form-control" id="is_user" value="<?php echo e($client->is_user); ?>" name="is_user" value="0">
                    </div>
                </div>

                <div class="form-group form-row">
                    <div class="col-4">
                        <label>Iban</label>
                        <input type="text" class="form-control" id="bank_iban" value="<?php echo e($client->bank_iban); ?>" name="bank_iban">
                    </div>
                    <div class="col-4 ">
                        <label>Codice swift</label>
                        <input type="text" class="form-control" id="bank_swift" value="<?php echo e($client->bank_swift); ?>" name="bank_swift">
                    </div>
                    <div class="col-4">
                        <label>Nome banca</label>
                        <input type="text" class="form-control" id="bank_name" value="<?php echo e($client->bank_name); ?>" name="bank_name">
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
                            <option value="<?php echo e($client->product_prices_name); ?>" selected> <?php echo e($client->product_prices_name); ?> </option>
                            <?php $__currentLoopData = $p_prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p_price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($p_price->title); ?>"><?php echo e($p_price->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                </div>
                <div class="form-group form-row">
                    <div class="col-6">
                        <label>Termini di pagamento</label>
                        <select type="text" class="form-control" id="payment_term" name="payment_term">
                            <option value="<?php echo e($client->payment_term); ?>" selected> <?php echo e($client->payment_term); ?> </option>
                            <option value="30">30GG</option>
                            <option value="60">60GG</option>
                            <option value="90">90GG</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label>Metodo di pagamento</label>
                        <select type="text" class="form-control" id="payment_method" name="payment_method">
                            <option value="<?php echo e($client->payment_method); ?>" selected> <?php echo e($client->payment_method); ?> </option>
                            <option value="contanti">contanti</option>
                            <option value="bonifico">bonifico</option>
                            <option value="assegno">assegno</option>
                        </select>
                    </div>
                </div>

                <div class="form-group form-row">

                    <div class="col-6 " style="display: none">
                        <label>payment_typology</label>
                        <input type="text" class="form-control" value="<?php echo e($client->payment_typology); ?>" id="payment_typology" name="payment_typology">
                    </div>
                </div>
                <div class="form-group form-row">

                    <div class="col-12">
                        <label>Note</label>
                        <textarea class="form-control" id="notes" style="resize: none;" name="notes"> <?php echo e($client->notes); ?></textarea>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>








