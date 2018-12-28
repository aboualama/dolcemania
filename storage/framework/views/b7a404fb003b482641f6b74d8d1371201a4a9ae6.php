<div class="form-group form-row">
    <div class="col-8 ">
    <input type="hidden" id="id_order" value="<?php echo e($order->id); ?>">
        <label>Client</label>

        <select class="form-control" id="id_client" name="id_client">
            <option id="id_cliented" value="<?php echo e($order->client->id); ?>"><?php echo e($order->client->company_name); ?></option>
            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($client->id); ?>"><?php echo e($client->company_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="col-2 offset-2 form-control" style="margin-top: 25px">
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="recurenceOrder" name="recurenceOrderCheckBox"
         <?php echo e($order->recurrent == 1 ? 'checked' : ''); ?> >
        <label class="custom-control-label" for="recurenceOrder">Recurring </label>
      </div>
    </div> 
    <div class="col-12" id="date"> 
      <label >Order Data </label>
      <input type="date" class="form-control" id="orderdate" value="<?php echo e(date('d-m-Y', strtotime($order->order_date))); ?>" name="orderdate">
    </div> 
</div> 

<div id="productPrice"> 
</div>


<hr>

<div id="form_recurence" style="display: none">
    <div class="form-group form-row">
      <div class="col-6">
          <label class="custom-control" style="padding-left: 0;">Repeat Type</label>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1" value="weekly" name="RadioMonthlyWeekly" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline1">Weekly</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2" value='monthly' name="RadioMonthlyWeekly" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline2">Monthly</label>
          </div>
      </div>
      <div class="col-3 offset-3">
          <label>interval</label>
          <input type="number" class="form-control" 
          value=" <?php echo e($order->recurrent == 0 ? $order->event->events_meta->repeat_interval / 86400 : 1); ?>" 
          id="repeat_interval" name="repeat_interval">
      </div>
  </div>



  <div class="form-group form-row">
      <div class="col-6 ">
          <label>Month</label> 
          <select class="custom-select" id="month">
              <option selected value=''>Select Month</option>
              <option value='1'>Janaury</option>
              <option value='2'>February</option>
              <option value='3'>March</option>
              <option value='4'>April</option>
              <option value='5'>May</option>
              <option value='6'>June</option>
              <option value='7'>July</option>
              <option value='8'>August</option>
              <option value='9'>September</option>
              <option value='10'>October</option>
              <option value='11'>November</option>
              <option value='12'>December</option>
          </select>
      </div>
      <div class="col-6 ">
          <label>Days of week</label>

          <select class="custom-select" id="daysofweek" size="3" multiple>
              <option <?php echo e($order->daysofweek == 'MO' ? 'selected' : ''); ?> value="MO">Monday</option>
              <option <?php echo e($order->daysofweek == 'TU' ? 'selected' : ''); ?> value="TU">Tuesday</option>
              <option <?php echo e($order->daysofweek == 'WE' ? 'selected' : ''); ?> value="WE">Wednesday</option>
              <option <?php echo e($order->daysofweek == 'TH' ? 'selected' : ''); ?> value="TH">Thursday</option>
              <option <?php echo e($order->daysofweek == 'FR' ? 'selected' : ''); ?> value="FR">Friday</option>
              <option <?php echo e($order->daysofweek == 'SA' ? 'selected' : ''); ?> value="SA">Saturday</option>
              <option <?php echo e($order->daysofweek == 'SU' ? 'selected' : ''); ?> value="SU">Sunday</option>
          </select>
      </div>
  </div>
   <hr>
</div>




 

<script>
 jQuery(function () {
    var id = $("#id_order").val();  
    var id_client = $("#id_client").val();  
          $.ajax({
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              type: 'POST',
              url: '/order/getList/',
              data: {
                  'clientId':  id_client, 
                  'id_order':  id, 
              },
              success: function (data) {
                  $('#productPrice').html(data);
              }
          }) ; 
    });

    $('#id_client').change(function () {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            url: '/order/getClientPriceList',
            data: {
                'clientId': $(this).val(),
            },
            success: function (data) {
                $('#productPrice').html(data);
            }
        })
    });


</script>

<div class="form-group form-row">
    <button onclick="updateOrder()" value="Salva" class="btn btn-hero-success">Salva</button>
</div>




 <script>
        jQuery(function () {
            Dashmix.helpers(['datepicker', 'table-tools-checkable']);
        });




    $(function () {
            if ($("#recurenceOrder").prop("checked")) {
                $("#form_recurence").show();
                $("#date").hide();
            } else {
                $('#form_recurence').hide();
                $("#date").show();
            }
        }); 

    $('input[type="checkbox"][name="recurenceOrderCheckBox"]').change(function() {
            if ($("#recurenceOrder").prop("checked")) {
                $("#form_recurence").show();
                $("#date").hide();
            } else {
                $('#form_recurence').hide();
                $("#date").show();
            }
        });

 
   function updateOrder() {
       id_client = $('#id_client').val();
       orderdate = $('#orderdate').val();

       if ($('#recurenceOrder').prop("checked")) {
           var recurence = true;
       }else{
           var recurence = false;
       }
       repeat_interval = $('#repeat_interval').val();
       weeklymonthly   = $('input[name=RadioMonthlyWeekly]:checked').val(); 
       repeat_start    = $('#repeat_start').val();
       repeat_end      = $('#repeat_end').val();
       month           = $('#month').val();
       daysofweek      = $('#daysofweek').val();
       id              = $('#id_order').val();
       map = {};
       $(".selectedProductQuantity").each(function () {
            qt1 = $('.qt1').val();
            qt2 = $('.qt2').val();
            pname = $('.pname',this).text();
            map[$(this).data('pricelistid')] =
               {
                   name: pname,
                   qt1: qt1,
                   qt2: qt2,
               }; 
       }); 
       $.ajax({
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           type: 'POST',
           url: '/order/' + id,
           data: {
               'clientId': id_client,
               'orderdate': orderdate,
               'weeklymonthly': weeklymonthly, 
               'recurence': recurence,
               'repeat_interval': repeat_interval,
               'repeat_start': repeat_start,
               'repeat_end': repeat_end,
               'month': month,
               'daysofweek': daysofweek,
               'prices': map
           },
           success: function (data) {
               console.log(data);
               $('#modal-block-edit').modal('toggle'); 
               console.log(data);
           }
       });
   }







        function deleteProduct(priceListId) {
            console.log($('#priceListId_' + priceListId)[0].outerHTML);
            $('*[data-priceListId="' + priceListId + '"]').closest('tr').remove();
            outerHtml = $('#priceListId_' + priceListId)[0].outerHTML;
            $('#priceListId_' + priceListId).remove();
            $('#productPriceListSelect').append(outerHtml)
        }


  </script>


 
