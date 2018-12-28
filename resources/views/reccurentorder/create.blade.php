<div class="form-group form-row">
                <div class="col-8 ">
                    <label>Client</label>
                    <select class="form-control" id="id_client" name="id_client"  >
                        <option value="">Seleziona cliente...</option>
                        @foreach ($clients as $client) 
                            <option value="{{$client->id}}">{{$client->company_name}}</option> 
                        @endforeach
                    </select>  
                </div>   
            </div>

<div id="productPrice">
</div>
            <script>
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
    <button onclick="addOrder()" value="Salva" class="btn btn-hero-success">Salva</button>
</div>

</div>

  
 
 <script> 

   function addOrder() {
       id_client = $('#id_client').val();
       map = {};
       $(".selectedProductQuantity").each(function () {
            qt1 = $('.qt1').val();
            qt2 = $('.qt2').val();
            name = $('.pname').text();
            map[$(this).data('pricelistid')] =
               {
                   name: name,
                   qt1: qt1,
                   qt2: qt2
               };

       });


       $.ajax({
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           type: 'POST',
           url: '{{route('order.store')}}',
           data: {
               'clientId': id_client,
               'prices': map
           },
           success: function (data) {
               console.log(data);
               $('#modal-block-large').modal('toggle');
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

 </script>
 