@extends('def.def', ['titre'=>'Personnel' ])

@section ('contenta')

<div id="content" class="app-content">



    <h2 class="page-header">Liste du Personnel</h2>

    <div class="row">
        <div class="col-xl-12">

            <div class="panel panel-inverse panel-with-tabs" data-sortable-id="ui-unlimited-tabs-1">

                <div class="bg-blue-400 panel-heading p-0">

                    <div class="tab-overflow">
                        <ul class="bg-blue-400 nav nav-tabs nav-tabs-inverse">
                            <li class="nav-item prev-button"><a href="javascript:;" data-click="prev-tab"
                                    class="nav-link text-primary"><i class="bi bi-arrow-left"></i></a></li>
                        </ul>
                    </div>

                    <div class="panel-heading-btn me-2 ms-2 d-flex">
                    </div>
                </div>


                <div class="panel-body tab-content">

                    <div class="tab-pane fade active show" id="nav-tab-1">

                        <div class="row">

                        <div class="col-xxl-6" style="float: left ;">
                                <div style="float: left ;" class="ms-auto">
                                        <a href="#mod" data-bs-toggle="modal"
                                            class="btn btn-success btn-rounded px-4 rounded-pill"><i
                                                class="fa fa-plus fa-lg me-2 ms-n2 text-success-900"></i>Actualiser 
                                            personnel</a>
                                    </div>
                            </div>

                            <!-- <div class="col-xxl-6" style="float: right ;">
                                <div style="float: right ;" class="ms-auto">
                                        <a href="#moda" data-bs-toggle="modal"
                                            class="btn btn-success btn-rounded px-4 rounded-pill"><i
                                                class="fa fa-plus fa-lg me-2 ms-n2 text-success-900"></i>Mise à jour
                                            personnel</a>
                                    </div>
                            </div> -->

                            <div class="col-md-12 card-body" id="show_per">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class=" modal fade" id="mod">
    <form method="post" enctype="multipart/form-data" action ="{{url('import_excel/importp')}}" class="" novalidate>
        {{@csrf_field()}}
        <div class="modal-dialog modal-md">
            <div style="background-color: #e2e2e2 ;"  class="modal-content">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">Importer fichier du personnel</h4>
                    </div>
                </div>
                <div style="background-color: #e2e2e2 ;" class="modal-body">
                <div class="row">

                        <div class="col-xl-12 mb-3">
                            <input type="file" name="select_file" class=" form-control form-control-sm" id="" placeholder="" />
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Annuler</a>
                    <button class="add_vrepa btn btn-primary" type="submit">Importation</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- <div class=" modal fade" id="moda">
    <form method="post" enctype="multipart/form-data" action ="{{url('import_excel/importa')}}" class="" novalidate>
        {{@csrf_field()}}
        <div class="modal-dialog modal-md">
            <div style="background-color: #e2e2e2 ;"  class="modal-content">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">Importer fichier du personnel</h4>
                    </div>
                </div>
                <div style="background-color: #e2e2e2 ;" class="modal-body">
                <div class="row">

                        <div class="col-xl-12 mb-3">
                            <input type="file" name="select_file" class=" form-control form-control-sm" id="" placeholder="" />
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Annuler</a>
                    <button class="add_vrepa btn btn-primary" type="submit">Importation</button>
                </div>
            </div>
        </div>
    </form>
</div> -->

<script type="text/javascript">
$(document).ready(function() {

    fetchper();

    function fetchper() {
        $.ajax({
            url: "{{ url('/fetch-per') }}",
            method: 'get',
            success: function(response) {

                $("#show_per").html(response);
                $(".table0").DataTable({
                    order: [0, 'asc'],
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excelHtml5', 'print'],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });

    };


});
</script>


@endsection