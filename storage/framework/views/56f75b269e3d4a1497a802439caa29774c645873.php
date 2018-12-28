

    <div class="block block-rounded block-bordered ">
        <div class="block-header block-header-default"><h3 class="block-title">Order</h3>
            <div class="block-options">
                <div class="block-options-item"><code></code></div>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons js-table-checkable">
                <thead>
                <a class="btn btn-hero-success btn-rounded center center-block text-white"  data-toggle="modal" data-target="#modal-block-large" onclick="AddNew()"
                   href="#" style="float: right">
                    <span class="click-ripple animate"></span>
                    <i class="si si-printer"></i> Stampa dist
                </a><a class="btn btn-hero-success btn-rounded center center-block text-white"  data-toggle="modal" data-target="#modal-block-large" onclick="AddNew()"
                   href="#" style="float: right">
                    <span class="click-ripple animate"></span>
                    <i class="si si-printer"></i> Stampa
                </a>
                <tr>

                    <th class="text-center" style="width: 70px;">
                        <div class="custom-control custom-checkbox custom-control-primary d-inline-block">
                            <input type="checkbox" class="custom-control-input" id="check-all" name="check-all">
                            <label class="custom-control-label" for="check-all"></label>
                        </div>
                    </th>
                    <th class="text-center">#</th>
                    <th class="text-center">Nome cliente</th>
                    <th class="text-center">Data </th>
                    <th class="text-center">Totale</th>

                    <th class="text-center">Action</th>

                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center">
                            <div class="custom-control custom-checkbox custom-control-primary d-inline-block">
                                <input type="checkbox" class="custom-control-input" id="row_1" name="row_1">
                                <label class="custom-control-label" for="row_1"></label>
                            </div>
                        </td>
                        <th class="font-w600 text-xinspire-darker text-center"><a href="<?php echo e(route('order.show',$order->id)); ?>"><?php echo e($index +1); ?></a></th>
                        <th class="font-w600 text-xinspire-darker text-center" ><?php echo e($order->client->company_name); ?></th>
                        <th class="font-w600 text-xinspire-darker text-center" ><?php echo e($order->order_date); ?></th>
                        <td class="font-w600 text-center" id ="table_recurrent_<?php echo e($order->id); ?>">&euro; <?php echo e($order->total_1); ?></td>


                        <td class="text-center" style="width: 50px">
                            <div class="btn-group">
                                <a onclick="view('<?php echo e($order->id); ?>')" target="_blank"  data-toggle="modal" data-target="#modal-block-view" >
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip"
                                            title="View"><i class="fa fa-eye"></i></button>
                                </a>
                                <a onclick="edit('<?php echo e($order->id); ?>')" target="_blank"  data-toggle="modal" data-target="#modal-block-edit" >
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip"
                                            title="Edit"><i class="fa fa-print"></i></button>
                                </a>
                                <a onclick="show('<?php echo e($order->id); ?>')" target="_blank"  data-toggle="modal" data-target="#modal-block-show" >
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip"
                                            title="Edit"><i class="fa fa-eye"></i></button>
                                </a>


                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>











    <script>
        jQuery(function () {
            Dashmix.helpers(['datepicker', 'table-tools-checkable']);
        });


        function view(id) {

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: "GET",
                url: '/order/' + id ,
                success: function (data) {
                    $('#viewContent').html(data);

                }
            });

        }


        function show(id) {

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: "GET",
                url: '/ordershow/' + id ,
                success: function (data) {
                    $('#showContent').html(data);

                }
            });

        }

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
        
        function updateOrder() {
           var id_user   = $('#id_user').val();
           var recurrent = $('#recurrent').val();
           var quanity_1 = $('#quanity_1').val();
           var quanity_2 = $('#quanity_2').val();
           var date      = $('#date').val();
           var id        = $('#Id').val();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '/order/'+id,
                data:{
                    _method:"PUT",
                  id_user:    id_user,
                  recurrent:  recurrent,
                  quanity_1:  quanity_1,
                  quanity_2:  quanity_2,
                  date:       date
                },
                success: function (data) {
                    $("#table_id_user_"+id).text(id_user);
                    $("#table_recurrentr_"+id).text(recurrent);
                    $("#table_quanity_1_"+id).text(quanity_1);
                    $("#table_quanity_2_"+id).text(quanity_2);
                    $("#table_date_"+id).text(date);
                    console.log(data); 
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


    </script>
