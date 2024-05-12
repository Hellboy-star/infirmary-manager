@extends('def.def', ['titre'=>'Régistre de Consultation Spontanée' ])
@section ('contenta')

<div id="content" style="width: 200% ;" class="app-content">

    <h1 class="page-header">Régistre de Consultations Spontanées</h1>


    <div class="row">
        <div class="col-xl-12">

            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">

                <div class="panel-heading">
                    <h4 class="panel-title">Régistre de Consultations Spontanées</h4>
                    <div class="panel-heading-btn">
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
                    <div class="row">
                        <div style="float: left ;">
                            <div style="float: left ;" class="ms-auto">
                                <a href="#mod" data-bs-toggle="modal"
                                    class="btn btn-success btn-rounded px-4 rounded-pill"><i
                                        class="fa fa-plus fa-lg me-2 ms-n2 text-success-900"></i>Ajouter un nouvel
                                    élément</a>
                            </div>
                        </div>
                        <div class="card-body container-fluid" id="index_at">
                            <table class="table caption-top table-bordered ">
                                <caption></caption>
                                <thead>
                                    <thead>
                                        <tr>
                                            <th width="1%">N°</th>
                                            <th>Date</th>
                                            <th colspan="2">Nom et Prénoms</th>
                                            <th>N°IT</th>
                                            <th>Poste</th>
                                            <th>Sexe</th>
                                            <th>Age</th>
                                            <th>Poids</th>
                                            <th>Taille</th>
                                            <th>T°</th>
                                            <th>Pouls</th>
                                            <th>TA</th>
                                            <th width="30%">Plaintes</th>
                                            <th width="30%">Examen clinique</th>
                                            <th width="30%">Bilan</th>
                                            <th width="30%">Diagnostic</th>
                                            <th width="30%">Traitement</th>
                                            <th width="30%">Observations</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    @foreach($cs as $id)
                                    <tr>
                                        <td> {{$id->id}}</td>
                                        <td> {{$id->DATECS}}</td>
                                        <td> {{$id->NOMSA}} </td>
                                        <td> {{$id->PRESA}} </td>
                                        <td> {{$id->MATSA}} </td>
                                        <td> {{$id->SEXSA}} </td>
                                        <td> {{$id->AGE }}</td>
                                        <td> {{$id->POIDS}} </td>
                                        <td> {{$id->TAILLE}} </td>
                                        <td> {{$id->T }}</td>
                                        <td> {{$id->POULS}} </td>
                                        <td> {{$id->TA }}</td>
                                        <td> {{$id->PLAINTES}} </td>
                                        <td> {{$id->EXAMCLI}} </td>
                                        <td> {{$id->BILAN}} </td>
                                        <td> {{$id->DIAGNOSTIC}} </td>
                                        <td> {{$id->TRAITEMENT}} </td>
                                        <td> {{$id->OBSERVATION}} </td>
                                        <td>
                                            <form action="{{route('rcs.destroy', $id->id) }}" method="post"
                                                onsubmit="return confirm('Etes-vous sûr ?');">
                                                <a class="btn btn-info" href="{{route('rcs.edit', $id->id) }}">
                                                    <i class="fas fa-pencil-alt fa-xs"></i>
                                                </a>
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt fa-xs"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                {{$cs->links()}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<div class="container">
    <div class=" modal fade" id="mod">
        <div class="modal-dialog modal-md">
            <h4 class="panel-title">Ajouter un nouvel élément</h4>

        </div>
        <div class="panel-body bg-light">

            @csrf
            <div class="container">
                <div class="card-body">
                    <form method="POST" action="{{route('rcs.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Matricule:</label>
                                <input style="width: 50%;" type="number" name="MATSA" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> IT:</label>
                                <input style="width: 50%;" type="text" name="IT" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Nom:</label>
                                <input style="width: 50%;" type="" name="NOMSA" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Prénoms:</label>
                                <input style="width: 50%;" type="" name="PRESA" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Sexe:</label>
                                <input style="width: 50%;" type="" name="SEXSA" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Poste:</label>
                                <input style="width: 50%;" type="" name="POSTE" id="POSTE" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Date de Consultation:</label>
                                <input style="width: 50%;" type="date" name="DATECS" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Age:</label>
                                <input style="width: 50%;" type="number" name="AGE" id="AGE" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Poids:</label>
                                <input style="width: 50%;" type="number" name="POIDS" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Taille:</label>
                                <input style="width: 50%;" type="number" name="TAILLE" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> T°:</label>
                                <input style="width: 50%;" type="number" name="T" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Pouls:</label>
                                <input style="width: 50%;" type="number" name="POULS" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Ta:</label>
                                <input style="width: 50%;" type="number" name="TA" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Plaintes:</label>
                                <input style="width: 50%;" type="" name="PLAINTES" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Examen Clinique:</label>
                                <input style="width: 50%;" type="" name="EXAMCLI" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Bilan:</label>
                                <input style="width: 50%;" type="" name="BILAN" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Diagnostic:</label>
                                <input style="width: 50%;" type="" name="DIAGNOSTIC" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Traitement:</label>
                                <input style="width: 50%;" type="" name="TRAITEMENT" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Observation:</label>
                                <textarea style="width: 50%;" type="text" name="OBSERVATION" id="" placeholder="">

                                </textarea>
                            </div>
                            <div class="modal-footer">
                                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Annuler</a>
                                <button type="submit" id="store_at"
                                    class="store_at btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="container">
    <div class=" modal fade" id="moda">

        <div class="panel-body bg-light">


            <div class="container">
                <div class="card-body">
                    <form method="POST" action="{{route('rcs.store')}}">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Matricule:</label>
                                <input style="width: 50%;" type="number" name="MATSA" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Nom:</label>
                                <input style="width: 50%;" type="" name="NOMSA" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Prénoms:</label>
                                <input style="width: 50%;" type="" name="PRESA" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Sexe:</label>
                                <input style="width: 50%;" type="" name="SEXSA" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Poste:</label>
                                <input style="width: 50%;" type="" name="POSTE" id="POSTE" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Date de Consultation:</label>
                                <input style="width: 50%;" type="date" name="DATECS" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Age:</label>
                                <input style="width: 50%;" type="number" name="AGE" id="AGE" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Poids:</label>
                                <input style="width: 50%;" type="number" name="POIDS" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Taille:</label>
                                <input style="width: 50%;" type="number" name="TAILLE" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> T°:</label>
                                <input style="width: 50%;" type="number" name="T" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Pouls:</label>
                                <input style="width: 50%;" type="number" name="POULS" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Ta:</label>
                                <input style="width: 50%;" type="number" name="TA" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Plaintes:</label>
                                <input style="width: 50%;" type="" name="PLAINTES" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Examen Clinique:</label>
                                <input style="width: 50%;" type="" name="EXAMCLI" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Bilan:</label>
                                <input style="width: 50%;" type="" name="BILAN" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Diagnostic:</label>
                                <input style="width: 50%;" type="" name="DIAGNOSTIC" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Traitement:</label>
                                <input style="width: 50%;" type="" name="TRAITEMENT" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Observation:</label>
                                <input style="width: 50%;" type="" name="OBSERVATION" id="" placeholder="" />
                            </div>
                            <div class="modal-footer">
                                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Annuler</a>
                                <button type="submit" id="store_at"
                                    class="store_at btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>


<script>
function fetchper(id) {
    //alert(id);
    var p_id = id;
    $('.nomsa').html('');
    $('.presa').html('');
    $('sexsa').html('');
    $.ajax({
        type: 'GET',
        url: '/fetch-per',
        data: {
            personnel_id: p_id,
        },
        success: function(data) {
            console.log(data.lm.matsa)
            $('.nomsa').val(data.lm.nomsa);
            $('.presa').val(data.lm.presa);
            $('.sexsa').val(data.lm.sexsa);
        }

    });
}
</script>

<script type="text/javascript">
$(document).ready(function() {

    fetchmp();

    function fetchmp() {
        $.ajax({
            url: "{{ url('/fetch-cs')}}",
            method: 'get',
            success: function(response) {

                $("#show_cs").html(response);
                $(".table").DataTable({
                    order: [0, 'desc'],
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excelHtml5', 'print'],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });

    }

    fetchper();

    function fetchper() {

        $.ajax({
            type: "GET",
            url: "/fetch-per",
            dataType: "json",

            success: function(response) {


                $('.nomsa').html("");
                $.each(response.ltv, function(key, item) {

                    $('.nomsa').append('<option value=' + item.nomsa + '> ' + item.nomsa +
                        ' </option> '

                    );

                })

            }
        });
    }

    fetchper();

    function fetchper() {

        $.ajax({
            type: "GET",
            url: "/fetch-per",
            dataType: "json",

            success: function(response) {


                $('.presa').html("");
                $.each(response.lper, function(key, item) {

                    $('.presa').append('<option value=' + item.presa + '> ' + item.presa +
                        ' </option> '

                    );

                });

            }
        });
    }

    fetchsper();

    function fetchper() {

        $.ajax({
            type: "GET",
            url: "/fetch-per",
            dataType: "json",

            success: function(response) {


                $('.sexsa').html("");
                $.each(response.lper, function(key, item) {

                    $('.sexsa').append('<option value=' + item.sexsa + '> ' + item.sexsa +
                        ' </option> '

                    );

                });

            }
        });
    }









    $(document).on('click', '.add_rcs', function(e) {
        e.preventDefault();


        var data = {

            'matsa': $('#matsa').val(),
            'nomsa': $('#nom').val(),
            'presa': $('#prenom').val(),
            'sexsa': $('#sex').val(),
            'age': $('#age').val(),
            'poste': $('#poste').val(),
            'poids': $('#poids').val(),
            'taille': $('#taille').val(),
            'datecs': $('#datecs').val(),
            't': $('#t').val(),
            'pouls': $('#pouls').val(),
            'ta': $('#ta').val(),
            'plaintes': $('#plaintes').val(),
            'examcli': $('#examcli').val(),
            'bilan': $('#bilan').val(),
            'diagnostic': $('#diagnostic').val(),
            'traitement': $('#traitement').val(),
            'observation': $('#observation').val(),
        }
        //  console.log(data);


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: "get",
            url: "{{route('rcs.store')}}",
            data: data,
            dataType: "json",
            success: function(response) {
                console.log(response);

                if (response.status == 200) {

                    fetchmp();

                }

            }

        })
    });
});
</script>