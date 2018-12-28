
    <div class="block block-rounded block-bordered ">
        <div class="block-header block-header-default"><h3 class="block-title">Order</h3>
            <div class="block-options">
                <div class="block-options-item"><code></code></div>
            </div>
        </div>
        <div class="block-content">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                <thead>
                <a class="btn btn-hero-success btn-rounded center center-block text-white"  data-toggle="modal" data-target="#modal-block-large" onclick="AddNew()"
                   href="#" style="float: right">
                    <span class="click-ripple animate"></span>
                    <i class="si si-plus"></i> nuovo
                </a>
                <tr>

                    <th class="text-center">#</th>
                    <th class="text-center">nome prodotto</th>
                    <th class="text-center">Total pezzi</th>
                    <th class="text-center">N* teglie</th>
                    <th class="text-center">rimanenze</th>

                </tr>
                </thead>
                <tbody>
                @foreach($orders as $index => $order)
                    <tr>
                        <th class="font-w600 text-xinspire-darker text-center"><a href="#">{{$index +1}}</a></th>
                        <th class="font-w600 text-xinspire-darker text-center" >{{$order->product_title}}</th>
                        <td class="font-w600 text-center">{{$order->totalItems }}</td>
                        <td class="font-w600 text-center">{{intval($order->totalItems / $order->quantity_tin) }}</td>
                        <td class="font-w600 text-center">{{$order->totalItems % $order->quantity_tin }}</td>
                        
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>



    <div class="modal" id="modal-block-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Nuovo Order</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content" >
                        <div id="createContent">  
                        </div>


                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <div class="modal" id="modal-block-edit" tabindex="-1" role="dialog" aria-labelledby="modal-block-edit"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Modifica Order</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div id="editContent">  
                            {{-- @include('order.edit') --}}
                        </div>


                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        <button type="button" onclick="updateOrder()" class="btn btn-sm btn-primary" data-dismiss="modal">Salva</button>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <script>

        function AddNew() {
          //  jQuery('#modal-block-large').modal('show');
            $.ajax({
                url:"{{route('order.create')}}",
                method:"GET",
                success:function (resp) {
                    $('#createContent').html(resp);

                }
            });

        }
    </script>



    <script>
        jQuery(function () {
            Dashmix.helpers(['datepicker', 'table-tools-checkable']);
        });


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
