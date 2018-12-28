<input type="text" style="display: none" id="Id" value="{{$product->id}}">

<div class="form-group form-row">

    <div class="col-6 ">
        <label>Nome prodotto</label>
        <input type="text" class="form-control" placeholder=""
               id="producttitle" name="title" value="{{$product->title}}">
    </div>
    <div class="col-6">
        <label>Prezzo </label>
        <input type="number" class="form-control" placeholder=""
               id="default_price" name="default_price" value="{{$product->default_price}}">
    </div>


</div>
<div class="form-group form-row">
    <div class="col-6">
        <label>Iva</label>
        <select type="text" class="form-control " placeholder=""
                id="vat" name="vat" value="{{$product->vat}}">
            <option value="10">10</option>
            <option value="4">4</option>
        </select>
    </div>
    <div class="col-6 ">
        <label>N x teglia</label>
        <input type="number" class="form-control" placeholder=""
               id="quantity_tin" name="quantity_tin" value="{{$product->quantity_tin}}">
    </div>
</div>

<div class="form-group form-row">
    <div class="col-12">
        <select class="js-select2" id="categories" id="categories" name="categories" multiple="multiple"
                value="{{$product->categories}}" style="width: 100%">
            @foreach($categories as $category)

                <option value="{{$category->id}}">{{$category->title}}</option>

            @endforeach
        </select>
    </div>

</div>


<div class="form-group form-row">
    @foreach ($product->productPrice as $list)
        @if($list->title != "Default" )
    <div class="col-3 ">
        <label>{{$list->title}} </label>
        <input type="number" class="form-control PriceListTitle" id="{{$list->title}}" name="pricelist" value="{{$list->price}}"> 
    </div>
        @endif
@endforeach 
</div>
<script>
jQuery(function(){ Dashmix.helpers(['datepicker', 'select2']); });
</script>
