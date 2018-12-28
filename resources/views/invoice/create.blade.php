<div class="form-group form-row">
    <div class="col-12 ">
        <label>Client</label>

        <select class="form-control" id="id_client" name="id_client">
            <option value="" data-search="">Tutti</option>
            @foreach ($clients as $client)
                <option value="{{$client->id}}"
                        data-search="{{$client->company_name}}">{{$client->company_name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div id="productPrice">

    @include('invoice.InvoiceDDTTable')

</div>


<div class="form-group form-row">
    <button onclick="invoiceSelected()" value="Salva" class="btn btn-hero-success">Salva</button>
</div>


<script>
    jQuery(function () {
        Dashmix.helpers(['datepicker', 'table-tools-checkable']);
    });

    $('#id_client').change(function () {

        table = $('#DDTTable').DataTable();
        table.search($(this).find(':selected').data('search')).draw();
    });

    function invoiceAll() {
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            url: '/invoice/invoiceAll',
            success: function (data) {
                $('#modal-block-large').modal('toggle');

            }
        });
    }

    function invoiceSelected() {
        id_client = $('#id_client').val();
        map = {};
        $(".selectedProductQuantity").each(function () {
            qt1 = $('.qt1').val();
            qt2 = $('.qt2').val();
            pname = $('.pname').text();
            map[$(this).data('pricelistid')] =
                {
                    name: pname,
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


    function addOrder() {
        id_client = $('#id_client').val();
        map = {};
        $(".selectedProductQuantity").each(function () {
            qt1 = $('.qt1', this).val();
            qt2 = $('.qt2', this).val();
            pname = $('.pname', this).text();
            map[$(this).data('pricelistid')] =
                {
                    name: pname,
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
                /*  t.row.add([
                      '<th class="font-w600 text-xinspire-darker text-center">'+data.data.id+'</th>',
                      '<th class="font-w600 text-xinspire-darker text-center" id ="table_product_"'+data.data.id+'>'+data.data.product_id+'</th>',
                      '<th class="font-w600 text-xinspire-darker text-center" id ="table_title_"'+data.data.id+'>'+data.data.title+'</th>',
                      '<th class="font-w600 text-xinspire-darker text-center" id ="table_price_"'+data.data.id+'>'+data.data.price+'</th>',
                      '<th class="font-w600 text-xinspire-darker text-center" id ="table_temporary_"'+data.data.id+'>'+data.data.temporary+'</th>',
                      setActionButtons(data.data.id)
                  ]).draw();*/
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
