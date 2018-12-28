<div class="form-group form-row">
    <div class="col-8 ">
        <label>Client</label>

        <select class="form-control js-s form-control" id="id_client" name="id_client">
            <option value='null'>Seleziona cliente...</option>
            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($client->id); ?>"><?php echo e($client->company_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <div class="col-2 offset-2 form-control" style="margin-top: 25px">
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="recurenceOrder" name="recurenceOrderCheckBox">
        <label class="custom-control-label" for="recurenceOrder">Ricorrente ? </label>
      </div>
    </div> 

    <div class="col-12" id="date"> 
      <label >Order Data </label>
      <input type="text" class="form-control js-datepicker" id="orderdate" name="orderdate" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
    </div> 
</div>


<div id="productPrice">
</div>


<hr>

<div id="form_recurence" style="display: none">
    <div class="form-group form-row">
      <div class="col-6" style="display: none;">
          <label class="custom-control" style="padding-left: 0;">Repeat Type</label>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline1" value="weekly" name="RadioMonthlyWeekly" class="custom-control-input" checked="checked">
            <label class="custom-control-label" for="customRadioInline1">Weekly</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="customRadioInline2" value='monthly' name="RadioMonthlyWeekly" class="custom-control-input">
            <label class="custom-control-label" for="customRadioInline2">Monthly</label>
          </div>
      </div>
      <div class="col-3 offset-3" style="display: none">
          <label>interval</label>
          <input type="number" value="1" class="form-control" id="repeat_interval" name="repeat_interval">
      </div>
  </div>

    <div class="form-group form-row">
      <div class="col-6">
          <label>Inizio evento</label>
          <input type="text" class="form-control js-datepicker" id="repeat_start" name="repeat_start" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
      </div>

      <div class="col-6" style="display: none;">
          <label>repeat end</label>
          <input type="text" class="form-control js-datepicker" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" id="repeat_end" name="repeat_end">
      </div>
  </div>

  <div class="form-group form-row" >
     
      <div class="col-12">
          <label>Giorni della settimana</label>

          <select class="custom-select js-select2 form-control" id="daysofweek" size="3"  style="width: 100%;"  multiple>
              <option value="MO">Lunedi</option>
              <option value="TU">Martedi</option>
              <option value="WE">Mercoledi</option>
              <option value="TH">Giovedi</option>
              <option value="FR">Venerdi</option>
              <option value="SA">Sabato</option>
              <option value="SU">Domenica</option>
          </select>
      </div>
  </div>
   <hr>
</div>

<script>


    $('#id_client').change(function () {
        if ($(this).val() == 'null'){
            return false;
        }
        else {
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
            });
        }
    });


</script>

<div class="form-group form-row">
  
</div>

 

 
 
<script>
        jQuery(function () {
            Dashmix.helpers(['datepicker', 'table-tools-checkable']);
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


 

   function addorder() {
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
           url: '<?php echo e(route('order.store')); ?>',
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
               $('#modal-block-large').modal('toggle');
               $('#modal-block-order').modal('toggle');
               t = $('.js-dataTable-buttons').DataTable(); 
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





    function deleteProduct(priceListId) {
        console.log($('#priceListId_' + priceListId)[0].outerHTML);
        $('*[data-priceListId="' + priceListId + '"]').closest('tr').remove();
        outerHtml = $('#priceListId_' + priceListId)[0].outerHTML;
        $('#priceListId_' + priceListId).remove();
        $('#productPriceListSelect').append(outerHtml)
    }
        jQuery(function(){ Dashmix.helpers(['datepicker', 'select2']); });
</script>
