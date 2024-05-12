@extends('def.def', ['titre'=>'Tableaux Et Documents A Annexer' ])
@section ('contenta')

<div id="content" class="app-content">



    <h2 class="page-header">Tableaux et Documents a Annexer</h2>

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

                        <div style="float: left ;">
                            <div style="float: left ;" class="ms-auto">
                                    <a href="#mod" data-bs-toggle="modal"
                                        class="btn btn-success btn-rounded px-4 rounded-pill"><i
                                            class="fa fa-plus fa-lg me-2 ms-n2 text-success-900"></i>Ajouter un nouvel élément</a>
                                </div>
                            </div>

                            
                            <div class="col-md-12 card-body" id="show_an">
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
    <form method="POST" action="{{route('chs.store')}}" class="" novalidate>
        {{@csrf_field()}}
        <div class="modal-dialog modal-md">
            <div style="background-color: #e2e2e2 ;"  class="modal-content">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">Ajouter un nouvel objectifs général</h4>
                    </div>
                </div>
                <div style="background-color: #e2e2e2 ;" class="modal-body">
                <div class="row">

                    <div class="col-xl-6 mb-3 container">
                        <label class="form-label" for="exampleInputPassword1">Année:</label>
                        <input style="width:100%" type="text" class="sda form-control form-control-sm"
                            name="ANNEE" id="masked-input-date" placeholder="" />
                    </div>
                    <div class="col-xl-6 mb-3">
                        <label class="form-label" for="exampleInputPassword1">Objectif Général:</label>
                        <textarea style="width:100%" type="text" class="sda form-control form-control-sm"
                            name="OBJECGEN" id="OBJECGEN" placeholder=""  rows="3"></textarea>
                    </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Annuler</a>
                    <button class="add_vrepa btn btn-primary" type="submit">Ajouter</button>
                </div>
            </div>
        </div>
    </form>
</div>



<script type="text/javascript">
$(document).ready(function() {

    fetchan();

    function fetchan() {
        $.ajax({
            url: "{{ url('/fetch-an')}}",
            method: 'get',
            success: function(response) {

                $("#show_an").html(response);
                $(".table0").DataTable({
                    order: [0, 'desc'],
                });
            }
        });
    }
});
</script>

<script>
$("#masked-input-date").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy"
    });
</script>

<script>
$("#masked-input-date").mask("9999");
</script>


@endsection