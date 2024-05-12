@extends('def.def', ['titre'=>'Régistre Convocation' ])
@section ('contenta')

<div id="content" class="app-content">




    <div>
        <h1>REGISTRE DE CONVOCATION</h1>
        <div class="col-xl-12">

            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">

                <div class="panel-heading">
                    <!-- <h4 class="panel-title">Régistre d'Accident de Travail</h4> -->
                    <div class="panel-heading-btn align-items-left">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                                class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                                class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
                                class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                                class="fa fa-times"></i></a>
                    </div>
                </div>


                <div class="panel-body p-0">


                    <div class="container-fluid">

                        <!-- <div style="float: left ;">
                            <div style="float: left ;" class="ms-auto">
                                <a href="#mod" data-bs-toggle="modal"
                                    class="btn btn-success btn-rounded px-4 rounded-pill"><i
                                        class="fa fa-plus fa-lg me-2 ms-n2 text-success-900"></i>Ajouter un nouvel
                                    élément</a>
                            </div>
                        </div> -->

                        <div class="col-md-12 card-body  table-responsive" id="show_convoc">
                            <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                        </div>

                        

                    </div>

                </div>





            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {

    fetchconvoc();

    function fetchconvoc() {
        $.ajax({
            url: "{{ url('/fetch-convoc') }}",
            method: 'get',
            success: function(response) {

                $("#show_convoc").html(response);
                $(".table0").DataTable({
                    order: [0, 'desc'],
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