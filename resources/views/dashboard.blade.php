@extends('layouts.backend')

@section('content')
    <!-- Quick Menu -->
    <div class="bg-body-dark">
        <div class="content">
            <div class="row gutters-tiny push invisible" data-toggle="appear">
               {{-- <div class="col-6 col-md-4 col-xl-2">
                    <a class="block text-center bg-image" style="background-image: url('assets/media/photos/photo15.jpg');" href="javascript:void(0)">
                        <div class="block-content block-content-full bg-gd-fruit-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                            <div>
                                <i class="fa fa-2x fa-home text-white"></i>
                                <div class="font-w600 mt-3 text-uppercase text-white">Home</div>
                            </div>
                        </div>
                    </a>
                </div>--}} 

                <div class="col-6 col-md-4 col-xl-3">
                    <a class="block text-center bg-image" style="background-image: url('assets/media/photos/photo17.jpg');" href="javascript:void(0)" onclick="client()" target="_blank"  data-toggle="modal" data-target="#modal-block-client">
                        <div class="block-content block-content-full bg-gd-aqua-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                            <div>
                                <i class="fa fa-2x fa-user-circle text-white"></i>
                                <div class="font-w600 mt-3 text-uppercase text-white">Nuovo Cliente</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-xl-3">
                    <a class="block text-center bg-image" style="background-image: url('assets/media/photos/photo18.jpg');" href="javascript:void(0)" onclick="order()" target="_blank"  data-toggle="modal" data-target="#modal-block-order">
                        <div class="block-content block-content-full bg-gd-sea-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                            <div>
                                <i class="fa fa-2x fa-box text-white"></i>
                                <div class="font-w600 mt-3 text-uppercase text-white">Nuovo ordine</div>
                            </div>
                        </div>
                    </a>
                </div>
 
                <div class="col-6 col-md-4 col-xl-3">
                    <a class="block text-center bg-image" style="background-image: url('assets/media/photos/photo19.jpg');" href="javascript:void(0)" onclick="Prodotto()" target="_blank"  data-toggle="modal" data-target="#modal-block-prodotto">
                        <div class="block-content block-content-full bg-gd-dusk-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                            <div>
                                <i class="fa fa-2x fa-file-alt text-white"></i>
                                <div class="font-w500 mt-3 text-uppercase text-white">Nuovo Prodotto</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-6 col-md-4 col-xl-3">
                    <a class="block text-center bg-image" style="background-image: url('assets/media/photos/photo16.jpg');" href="javascript:void(0)" onclick="Listino()" target="_blank"  data-toggle="modal" data-target="#modal-block-Listino">
                        <div class="block-content block-content-full bg-gd-sublime-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                            <div>
                                <i class="far fa-2x fa-chart-bar text-white"></i>
                                <div class="font-w600 mt-3 text-uppercase text-white">Nuova Fattura</div>
                            </div>
                        </div>
                    </a>

                </div>
               {{-- <div class="col-6 col-md-4 col-xl-2">
                    <a class="block text-center bg-image" style="background-image: url('assets/media/photos/photo16.jpg');" href="javascript:void(0)">
                        <div class="block-content block-content-full bg-gd-sublime-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                            <div>
                                <i class="fas fa-2x fa-industry text-white"></i>
                                <div class="font-w600 mt-3 text-uppercase text-white">Produzione del giorno</div>
                            </div>
                        </div>
                    </a>
                </div>--}}


                {{--<div class="col-6 col-md-4 col-xl-2">
                    <a class="block text-center bg-image" style="background-image: url('assets/media/photos/photo20.jpg');" href="javascript:void(0)">
                        <div class="block-content block-content-full bg-gd-sun-op aspect-ratio-16-9 d-flex justify-content-center align-items-center">
                            <div>
                                <i class="fa fa-2x fa-sign-out-alt text-white"></i>
                                <div class="font-w600 mt-3 text-uppercase text-white">Logout</div>
                            </div>
                        </div>
                    </a>
                </div>--}}
            </div>
        </div>
    </div>
    <!-- END Quick Menu -->



    <!-- Overview -->
    <div class="row invisible" data-toggle="appear">
        <div class="col-md-4">
            <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="py-4 text-center">
                        <div class="mb-3">
                            <i class="si si-docs fa-3x text-xinspire"></i>
                        </div>
                        <div class="font-size-h4 font-w600">Stampa DDT</div>
                        <div class="text-muted">del giorno</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="py-4 text-center">
                        <div class="mb-3">
                            <i class="fa fa-car -md fa-3x text-xsmooth"></i>
                        </div>
                        <div class="font-size-h4 font-w600">Stampa distribuzione</div>
                        <div class="text-muted">del giorno</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                <div class="block-content block-content-full">
                    <div class="py-4 text-center">
                        <div class="mb-3">
                            <i class="fa fa-industry fa-3x text-info"></i>
                        </div>
                        <div class="font-size-h4 font-w600">Stampa Produzione</div>
                        <div class="text-muted">del giorno</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- END Overview -->

    <!-- Patients -->
    <div class="block block-rounded invisible" data-toggle="appear">
        <div class="block-header block-header-default">
            <h3 class="block-title">Ordini Ricorrenti Da confermare</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option">
                    <i class="si si-wrench"></i>
                </button>
            </div>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive">
                <table class="table table-bordered table-vcenter mb-0">
                    <thead class="thead-light">
                    <tr>
                        <th style="width: 100px;">ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Condition</th>
                        <th>Added</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <a class="font-w600" href="javascript:void(0)">1254</a>
                        </td>
                        <td>
                            <strong>Roy</strong>
                        </td>
                        <td>
                            <strong>Obrien</strong>
                        </td>
                        <td>
                            <span class="badge badge-success">Normal</span>
                        </td>
                        <td>
                            <span class="text-muted font-italic">today</span>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                <i class="fa fa-heartbeat text-danger mr-1"></i> Medical History
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="javascript:void(0)">1253</a>
                        </td>
                        <td>
                            <strong>Bobby</strong>
                        </td>
                        <td>
                            <strong>Lane</strong>
                        </td>
                        <td>
                            <span class="badge badge-info">Stable</span>
                        </td>
                        <td>
                            <span class="text-muted font-italic">today</span>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                <i class="fa fa-heartbeat text-danger mr-1"></i> Medical History
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="javascript:void(0)">1252</a>
                        </td>
                        <td>
                            <strong>Amanda</strong>
                        </td>
                        <td>
                            <strong>Ray</strong>
                        </td>
                        <td>
                            <span class="badge badge-danger">Critical</span>
                        </td>
                        <td>
                            <span class="text-muted font-italic">3 days ago</span>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                <i class="fa fa-heartbeat text-danger mr-1"></i> Medical History
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="javascript:void(0)">1251</a>
                        </td>
                        <td>
                            <strong>Rose</strong>
                        </td>
                        <td>
                            <strong>Alvarado</strong>
                        </td>
                        <td>
                            <span class="badge badge-warning">Pending..</span>
                        </td>
                        <td>
                            <span class="text-muted font-italic">4 days ago</span>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                <i class="fa fa-heartbeat text-danger mr-1"></i> Medical History
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="javascript:void(0)">1250</a>
                        </td>
                        <td>
                            <strong>Jose</strong>
                        </td>
                        <td>
                            <strong>Fowler</strong>
                        </td>
                        <td>
                            <span class="badge badge-info">Stable</span>
                        </td>
                        <td>
                            <span class="text-muted font-italic">5 days ago</span>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-light" href="javascript:void(0)">
                                <i class="fa fa-heartbeat text-danger mr-1"></i> Medical History
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Patients -->

    <!-- Appointments -->
    <div class="block block-rounded invisible" data-toggle="appear">
        <div class="block-header block-header-default">
            <h3 class="block-title">Fatture In attesa di pagamento </h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option">
                    <i class="si si-wrench"></i>
                </button>
            </div>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive">
                <table class="table table-bordered table-vcenter mb-0">
                    <thead class="thead-light">
                    <tr>
                        <th style="width: 100px;">ID</th>
                        <th>Patient</th>
                        <th class="text-center">First time?</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <a class="font-w600" href="javascript:void(0)">98526</a>
                        </td>
                        <td>
                            <a href="javascript:void(0)">Laura Carr</a>
                        </td>
                        <td class="text-center">
                            <i class="fa fa-check-circle text-success"></i>
                        </td>
                        <td>
                            Today at 10:00
                        </td>
                        <td>
                            <a class="btn btn-sm btn-light m-1" href="javascript:void(0)">
                                <i class="fa fa-redo text-dark mr-1"></i> Reschedule
                            </a>
                            <a class="btn btn-sm btn-light m-1" href="javascript:void(0)">
                                <i class="fa fa-times text-danger mr-1"></i> Cancel
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="javascript:void(0)">98525</a>
                        </td>
                        <td>
                            <a href="javascript:void(0)">Amber Harvey</a>
                        </td>
                        <td class="text-center">
                            <i class="fa fa-check-circle text-success"></i>
                        </td>
                        <td>
                            Today at 12:00
                        </td>
                        <td>
                            <a class="btn btn-sm btn-light m-1" href="javascript:void(0)">
                                <i class="fa fa-redo text-dark mr-1"></i> Reschedule
                            </a>
                            <a class="btn btn-sm btn-light m-1" href="javascript:void(0)">
                                <i class="fa fa-times text-danger mr-1"></i> Cancel
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="javascript:void(0)">98524</a>
                        </td>
                        <td>
                            <a href="javascript:void(0)">Amanda Powell</a>
                        </td>
                        <td class="text-center">
                            <i class="fa fa-check-circle text-success"></i>
                        </td>
                        <td>
                            Today at 14:00
                        </td>
                        <td>
                            <a class="btn btn-sm btn-light m-1" href="javascript:void(0)">
                                <i class="fa fa-redo text-dark mr-1"></i> Reschedule
                            </a>
                            <a class="btn btn-sm btn-light m-1" href="javascript:void(0)">
                                <i class="fa fa-times text-danger mr-1"></i> Cancel
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="javascript:void(0)">98523</a>
                        </td>
                        <td>
                            <a href="javascript:void(0)">Alice Moore</a>
                        </td>
                        <td class="text-center">
                            <i class="fa fa-times-circle text-danger"></i>
                        </td>
                        <td>
                            Today at 16:00
                        </td>
                        <td>
                            <a class="btn btn-sm btn-light m-1" href="javascript:void(0)">
                                <i class="fa fa-redo text-dark mr-1"></i> Reschedule
                            </a>
                            <a class="btn btn-sm btn-light m-1" href="javascript:void(0)">
                                <i class="fa fa-times text-danger mr-1"></i> Cancel
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="javascript:void(0)">98522</a>
                        </td>
                        <td>
                            <a href="javascript:void(0)">Barbara Scott</a>
                        </td>
                        <td class="text-center">
                            <i class="fa fa-check-circle text-success"></i>
                        </td>
                        <td>
                            Tomorrow at 08:00
                        </td>
                        <td>
                            <a class="btn btn-sm btn-light m-1" href="javascript:void(0)">
                                <i class="fa fa-redo text-dark mr-1"></i> Reschedule
                            </a>
                            <a class="btn btn-sm btn-light m-1" href="javascript:void(0)">
                                <i class="fa fa-times text-danger mr-1"></i> Cancel
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="javascript:void(0)">98521</a>
                        </td>
                        <td>
                            <a href="javascript:void(0)">Amanda Powell</a>
                        </td>
                        <td class="text-center">
                            <i class="fa fa-times-circle text-danger"></i>
                        </td>
                        <td>
                            Tomorrow at 10:00
                        </td>
                        <td>
                            <a class="btn btn-sm btn-light m-1" href="javascript:void(0)">
                                <i class="fa fa-redo text-dark mr-1"></i> Reschedule
                            </a>
                            <a class="btn btn-sm btn-light m-1" href="javascript:void(0)">
                                <i class="fa fa-times text-danger mr-1"></i> Cancel
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Appointments -->

    <!-- Payments -->
    <div class="block block-rounded invisible" data-toggle="appear">
        <div class="block-header block-header-default">
            <h3 class="block-title">Fatture Da pagare</h3>
            <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option">
                    <i class="si si-wrench"></i>
                </button>
            </div>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive">
                <table class="table table-bordered table-vcenter mb-0">
                    <thead class="thead-light">
                    <tr>
                        <th style="width: 100px;">ID</th>
                        <th>Patient</th>
                        <th>Invoice</th>
                        <th>Due</th>
                        <th>Actions</th>
                        <th class="text-right">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <a class="font-w600" href="javascript:void(0)">005874</a>
                        </td>
                        <td>
                            <a href="javascript:void(0)">Marie Duncan</a>
                        </td>
                        <td>
                            <a href="javascript:void(0)">
                                INV_005874.pdf
                            </a>
                        </td>
                        <td>
                            <span class="badge badge-primary">tomorrow</span>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-light m-1" href="javascript:void(0)">
                                <i class="fa fa-pencil-alt text-info mr-1"></i> Edit
                            </a>
                            <a class="btn btn-sm btn-light m-1" href="javascript:void(0)">
                                <i class="fa fa-times text-danger mr-1"></i> Cancel
                            </a>
                        </td>
                        <td class="text-right">
                            $1.500,00
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="font-w600" href="javascript:void(0)">005873</a>
                        </td>
                        <td>
                            <a href="javascript:void(0)">Laura Carr</a>
                        </td>
                        <td>
                            <a href="javascript:void(0)">
                                INV_005873.pdf
                            </a>
                        </td>
                        <td>
                            <span class="badge badge-primary">tomorrow</span>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-light m-1" href="javascript:void(0)">
                                <i class="fa fa-pencil-alt text-info mr-1"></i> Edit
                            </a>
                            <a class="btn btn-sm btn-light m-1" href="javascript:void(0)">
                                <i class="fa fa-times text-danger mr-1"></i> Cancel
                            </a>
                        </td>
                        <td class="text-right">
                            $1.200,00
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="text-right">
                            <strong class="text-uppercase">Total Due</strong>
                        </td>
                        <td class="text-right">
                            <strong>$2.700,00</strong>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Payments -->

    <div class="modal" id="modal-block-client" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Nuovo Client</h3>
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
                        <button type="button" onclick="addClient()" class="btn btn-sm btn-primary" data-dismiss="modal">
                            Done
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
  

    <div class="modal" id="modal-block-order" tabindex="-1" role="dialog" aria-labelledby="modal-block-order" aria-hidden="true">
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
                        <div id="createContentorder">  
                        </div>


                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        <button type="button" onclick="addorder()" class="btn btn-sm btn-primary" data-dismiss="modal">
                    </div>
                </div>
            </div>
        </div>
    </div>
 

    <div class="modal" id="modal-block-prodotto" tabindex="-1" role="dialog" aria-labelledby="modal-block-prodotto" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Nuovo Prodotto</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content" >
                        <div id="createContentProdotto">  
                        </div>


                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        <button type="button" onclick="addProduct()" class="btn btn-sm btn-primary"
                                data-dismiss="modal">Salva
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
 

    <div class="modal" id="modal-block-Listino" tabindex="-1" role="dialog" aria-labelledby="modal-block-Listino" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Nuovo Listino</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content" >
                        <div id="createContentListino">  
                        </div> 
                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Close</button>
                        <button type="button" onclick="addPrice()" class="btn btn-sm btn-primary" data-dismiss="modal">
                            Listino
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
 

    <!-- END Page Content -->
@endsection
@section('js_after')


    <script src="{{ asset('js/plugins/slick-carousel/slick.min.js') }}"></script>

    <script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/editor/js/dataTables.editor.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/dataTables.buttons.js') }}"></script>
    {{-- <script src="https://cdn.datatables.net/select/1.2.4/js/dataTables.select.min.js"></script> --}}
    <script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/plugins/datatables/buttons/buttons.colVis.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.html5.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons/buttons.print.js') }}"></script>
    <script src="{{ asset('js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/plugins/datatables/buttons/buttons.flash.js') }}"></script>


    <script src="{{ asset('js/plugins/editor/js/editor.bootstrap4.js') }}"></script>

    <script src="{{ asset('js/plugins/slick-carousel/slick.min.js') }}"></script>

 


    <script>
        jQuery(function () {
            Dashmix.helpers(['datepicker', 'table-tools-checkable']);
        });

        function client() { 
            $.ajax({
                url:"{{route('client.create')}}",
                method:"GET",
                success:function (resp) {
                    $('#createContent').html(resp); 
                }
            }); 
        }    

        function order() {  
            $.ajax({
               url:"{{route('order.create')}}",
                method:"GET",
                success:function (resp) {
                    $('#createContentorder').html(resp); 
                }
            }); 
        }

        function Prodotto() {  
            $.ajax({
               url:"{{route('product.create')}}",
                method:"GET",
                success:function (resp) {
                    $('#createContentProdotto').html(resp); 
                }
            }); 
        }

        function Listino() {  
            $.ajax({
               url:"{{route('price.create')}}",
                method:"GET",
                success:function (resp) {
                    $('#createContentListino').html(resp); 
                }
            }); 
        }
 
    </script>  
  
@endsection
