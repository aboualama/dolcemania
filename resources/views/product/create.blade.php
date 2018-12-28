<div class="form-group form-row">

    <div class="col-6 ">
        <label>Nome prodotto</label>
        <input type="text" class="form-control" placeholder=""
               id="producttitle" name="producttitle">
    </div>
    <div class="col-6">
        <label>Prezzo </label>
        <input type="number" class="form-control" placeholder=""
               id="default_price" name="default_price">
    </div>


</div>
<div class="form-group form-row">
    <div class="col-6">
        <label>Iva</label>
        <select type="text" class="form-control " placeholder=""
                id="vat" name="vat">
            <option value="10">10</option>
            <option value="4">4</option>
        </select>
    </div>
    <div class="col-6 ">
        <label>N x teglia</label>
        <input type="number" class="form-control" placeholder=""
               id="quantity_tin" name="quantity_tin">
    </div>
</div>

<div class="form-group form-row">
    <div class="col-12">
        <select class="js-select2" id="categories" name="categories" multiple="multiple" style="width: 100%" multiple>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->title}}</option>
            @endforeach
        </select>
    </div>
</div>
</div>


<script>
    jQuery(function(){ Dashmix.helpers(['datepicker', 'select2']); });
</script>

<div class="block-content block-content-full  bg-light"> 
    <label>Nome category</label>
    <div class=" row ">
        <div class="col-6 float-left ">
            <input type="text" class="form-control" placeholder="" id="category" name="title">
        </div>  
        <div class="col-6 float-right"> 
            <button type="button" onclick="addCategory()" class="btn btn-md btn-success">Salva</button>
        </div>  
    </div> 
</div>
 

<hr>

<div class="form-group form-row">
    @foreach ($pricelist as $list)
        @if($list->title != 'Default' )
    <div class="col-3 ">
        <label>{{$list->title}}%</label> 
        <input type="number" class="form-control PriceListTitle" id="{{$list->title}}" name="pricelist"> 
    </div>
        @endif
@endforeach
</div> 
 
<script> 
        jQuery(function () {
            Dashmix.helpers(['datepicker', 'table-tools-checkable']);
        }); 

  
        function addCategory() {
            var category = $('#category').val();
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '{{route('category.store')}}',
                data: {

                    'title': category
                },
                success: function (data) {
                    $.notify(data.msg,"success"); 
                    $.each(data, function(k, v) {
                        $('<option>').val(v.id).text(v.title).appendTo('#categories');
                    }); 
                }
            });
        }

 
   function addProduct() {
            var producttitle = $('#producttitle').val();
            var default_price = $('#default_price').val();
            var vat = $('#vat').val();
            var quantity_tin = $('#quantity_tin').val();
            var categories = $('#categories').val();  
            map = {}; 
            $(".PriceListTitle").each(function () {
                        title = $(this).attr('id');
                        price = $(this).val(); 
                        map[title] =
                            {
                               price : price
                            }; }); 

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '{{route('product.store')}}',
                data: { 
                    'producttitle': producttitle,
                    'default_price': default_price,
                    'vat': vat,
                    'quantity_tin': quantity_tin,
                    'categories': categories, 
                    'price': map
                },

                success: function (data) {
                    $('#modal-block-large').modal('toggle');

                    t = $('.js-dataTable-buttons').DataTable();
                    t.row.add([
                        '<th class="font-w600 text-xinspire-darker text-center" id ="table_id">' + data.data.id + '</th>',
                        '<th class="font-w600 text-xinspire-darker text-center" id ="table_title_"' + data.data.id + '>' + data.data.title + '</th>',
                        '<th class="font-w600 text-xinspire-darker text-center" id ="table_vat_"' + data.data.id + '>' + data.data.vat + '</th>',
                        '<th class="font-w600 text-xinspire-darker text-center" id ="table_quantity_tin_"' + data.data.id + '>' + data.data.quantity_tin + '</th>',
                        '<th class="font-w600 text-xinspire-darker text-center" id ="table_categories_"' + data.data.id + '>' + data.data.categories + '</th>',
                        setActionButtons(data.data.id)
                    ]).draw();
                    resetInputs();
                    notifySuccess(data);
                }
            });
        }
 
</script>
