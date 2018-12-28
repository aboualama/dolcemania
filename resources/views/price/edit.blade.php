 
<input type="text" style="display: none" id="Id" value="{{$products[0]->title}}">

<div class="form-group form-row">
    <div class="col-12 ">
        <label>Titolo</label>
        <input type="text" class="form-control" placeholder="" id="title" name="title" value="{{$products[0]->title}}">
    </div>

    <div class="col-12 ">
        <h2 class="content-heading">Prodotti</h2>
        @foreach($products as $product)
            <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="example-hf-email2">{{$product->product->title}}</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control form-control-alt product" id="{{$product->product->id}}"
                           name="{{$product->product_id}}" placeholder="Importo.." value="{{$product->price}}">
                </div>
            </div>
        @endforeach
    </div>
</div>


<script>
function updatePrice() {
            title = '{{$products[0]->title}}';
            newTitle = $('#title').val();
            map = {};
            $("#editContent .product").each(function () {
                map[$(this).attr("id")] = $(this).val();
            });
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                url: '/price/updateByTitle/' + title,
                data: {
                    'newTitle':$('#title').val(),
                    'title': title,
                    'products': map
                },
                success: function (data) {
                    $("#table_title_"+title).text(newTitle);
                    $.notify(data.msg,'success')
                }
            });
        }
</script> 

