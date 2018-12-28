<div class="form-group form-row">
    <div class="col-12 ">
        <label>Client</label>
        <select class="form-control" id="id_client" name="id_client">
            <option value="{{$order->id_client}}">{{$order->client->company_name}}</option>
            @foreach ($clients as $client)
                <option value="{{$client->id}}">{{$client->company_name}}</option>
            @endforeach
        </select>
    </div>
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
            }
        })
    });
</script>




@foreach ($products as $product)
    <div class="form-group form-row">
        <div class="col-5">

            <label>{{$product->product_title}}</label>
            <input style="display: none" type="text" class="form-control form-control-sm product"
                   value="{{$product->title}}">
            <input type="hidden" value=" " id="product" name="product[]">
        </div>
        <div class="col-1 offset-1">
            <label>Price</label>
            <input type="number" class="form-control form-control-sm product" value="{{$product->price}}" id="price"
                   name="price[]" disabled="off">
        </div>
        <div class="col-2  offset-1">
            <label>Quanity_1</label>
            <input type="number" class="form-control form-control-sm product" value="{{$product->qty_1}}" id="qty_1 "
                   name="qty_1[]">
        </div>
        <div class="col-2 ">
            <label>Quanity_2</label>
            <input type="number" class="form-control form-control-sm product" value="{{$product->qty_2}}" id="qty_2 "
                   name="qty_2[]">
        </div>
    </div>
@endforeach



<div class="form-group form-row">
    <button onclick="addOrder()" value="Salva" class="btn btn-hero-success">Salva</button>
</div>

</div>




