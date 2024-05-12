@extends('def.def', ['titre'=>'Régistre Visite Médicale Spéciale' ])
@section ('contenta')

<div id="content" style="width: 300% ;" class="app-content">

    <h1 class="page-header">Régistre Visite Médicale Spéciale</h1>


    <div class="row">
        <div class="col-xl-12">

            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">

                <div class="panel-heading">
                    <h4 class="panel-title">Régistre Visite Médicale Spéciale</h4>



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

                        <div class="col-md-5 card-body" id="index_vms">

                            <table class="table caption-top table-bordered ">
                                <caption></caption>
                                <thead>
                                    <tr>
                                        <th style="width: 2%;" rowspan="2">N°</th>
                                        <th style="width: 2%;" rowspan="2">Date</th>
                                        <th style="width: 5%;" colspan="2" rowspan="2">Nom et Prénoms</th>
                                        <th style="width: 2%;" rowspan="2">N°IT</th>
                                        <th style="width: 2%;" rowspan="2">Poste</th>
                                        <th style="width: 2%;" rowspan="2">Sexe</th>
                                        <th style="width: 2%;" rowspan="2">Age</th>
                                        <th style="width: 2%;" rowspan="2">Taille</th>
                                        <th style="width: 2%;" rowspan="2">Poids</th>
                                        <th style="width: 2%;" rowspan="2">Type de visite</th>
                                        <th style="width: 2%;" rowspan="2">Plaintes</th>
                                        <th style="width: 2%;" rowspan="2">Pouls</th>
                                        <th style="width: 2%;" rowspan="2">TA</th>
                                        <th style="width: 2%;" rowspan="2">PA</th>
                                        <th style="width: 2%;" rowspan="2">PTI</th>
                                        <th style="width: 2%;" rowspan="2">PTE</th>
                                        <th style="width: 2%;" colspan="2">AV</th>
                                        <th style="width: 10%;" rowspan="2">Examen clinique</th>
                                        <th style="width: 10%;" rowspan="2">Bilan</th>
                                        <th style="width: 10%;">Avis spécialisé</th>
                                        <th style="width: 10%;">Conclusion médicale</th>
                                        <th style="width: 10%;">Aptitude</th>
                                        <th style="width: 10%;" rowspan="2">Observations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th>
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">OD</<th>
                                        <th style="width: 2%;">OG</<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                        <th style="width: 2%;">
                                            </<th>
                                    </tr>
                                    @foreach($vms as $id)
                                    <tr>
                                        <td> {{$id->id}}</td>
                                        <td> {{$id->DATEVMS}}</td>
                                        <td> {{$id->NOMSA }}</td>
                                        <td> {{$id->PRESA}}</td>
                                        <td> {{$id->IT }}</td>
                                        <td> {{$id->POSTE }}</td>
                                        <td> {{$id->SEXSA}}</td>
                                        <td> {{$id->AGE }}</td>
                                        <td> {{$id->TAILLE}}</td>
                                        <td> {{$id->POIDS }}</td>
                                        <td> {{$id->TYPVISI}}</td>
                                        <td> {{$id->PLAINTE}}S</td>
                                        <td> {{$id->POULS}}</td>
                                        <td> {{$id->TA}}</td>
                                        <td> {{$id->PA }}</td>
                                        <td> {{$id->PTI}}</td>
                                        <td> {{$id->PTE}}</td>
                                        <td> {{$id->AVOD}}</td>
                                        <td> {{$id->AVOG}}</td>
                                        <td> {{$id->EXAMCLI}}</td>
                                        <td> {{$id->BILAN}}</td>
                                        <td> {{$id->AVISP}}</td>
                                        <td> {{$id->CONCLMED}}</td>
                                        <td> {{$id->APTITUDE}} </td>
                                        <td> {{$id->OBSERVATION}} </td>
                                        <td>
                                            <form action="{{route('rvms.destroy', $id->id) }}" method="post"
                                                onsubmit="return confirm('Etes-vous sûr ?');">
                                                <a class="btn btn-info" href="{{route('rvms.edit', $id->id) }}">
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
                                {{$vms->links()}}
                            </table>

                        </div>

                    </div>

                </div>





            </div>
        </div>
    </div>
</div>



<div class="col-xl-12">
    <div class=" modal fade" id="mod">
        <div class="modal-dialog modal-md">
            <h4 class="panel-title">Ajouter un nouvel élément</h4>

        </div>
        <div class="panel-body bg-light">

            <div class="container">
                <div class="row right-content-center">
                    <div class="card-body">
                        <form method="POST" action="{{route('rvms.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Date de Consultation:</label>
                                    <input style="width: 100%;" type="date" name="DATEVMS" id="DATEVMS" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Matricule:</label>
                                    <input style="width: 100%;" type="text" name="MATSA" id="MATSA" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> IT:</label>
                                    <input style="width: 100%;" type="text" name="IT" id="" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Nom:</label>
                                    <input style="width: 100%;" type="text" name="NOMSA" id="NOMSA" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Prénoms:</label>
                                    <input style="width: 100%;" type="text" name="PRESA" id="PRESA" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Sexe:</label>
                                    <input style="width: 100%;" type="text" name="SEXSA" id="SEXSA" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Age:</label>
                                    <input style="width: 100%;" type="number" name="AGE" id="AGE" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Poste:</label>
                                    <input style="width: 100%;" type="text" name="POSTE" id="POSTE" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Taille:</label>
                                    <input style="width: 100%;" type="number" name="TAILLE" id="TAILLE" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Poids:</label>
                                    <input style="width: 100%;" type="number" name="POIDS" id="POIDS" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Type de visite:</label>
                                    <select style="width: 100%;" name="TYPVISI" id="TYPVISI">
                                        <option value="D'embauche"> D'embauche </option>
                                        <option value="Périodique"> Périodique </option>
                                        <option value="De reprise de Travail"> De reprise de Travail </option>
                                        <option value="A la demande"> A la demande </option>
                                        <option value="De surveillance spécifique"> De surveillance spécifique </option>
                                        <option value="De fin de contrat"> De fin de contrat </option>
                                    </select>
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Plaintes:</label>
                                    <textarea style="width: 100%;" name="PLAINTES" id="PLAINTES">

                                    </textarea>
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Pouls:</label>
                                    <input style="width: 100%;" type="number" name="POULS" id="POULS" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Ta:</label>
                                    <input style="width: 100%;" type="number" name="TA" id="TA" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Pa:</label>
                                    <input style="width: 100%;" type="number" name="PA" id="PA" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Pti:</label>
                                    <input style="width: 100%;" type="number" name="PTI" id="PTI" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Pte:</label>
                                    <input style="width: 100%;" type="number" name="PTE" id="PTE" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> AVAVOD/OD:</label>
                                    <input style="width: 100%;" type="number" name="AVOD" id="AVOD" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> AV/OG:</label>
                                    <textarea style="width: 100%;" name="AVOG" id="AVOG">

                                    </textarea>
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Examen clinique:</label>
                                    <textarea style="width: 100%;" name="EXAMCLI" id="EXAMCLI">

                                    </textarea>
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Bilan:</label>
                                    <textarea style="width: 100%;" name="BILAN" id="BILAN">

                                    </textarea>
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Avis spécialisé:</label>
                                    <textarea style="width: 100%;" name="AVISP" id="AVISP">

                                    </textarea>
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Conclusion Médicale:</label>
                                    <textarea style="width: 100%;" name="CONCLMED" id="CONCLMED">

                                    </textarea>
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Aptitude:</label>
                                    <textarea style="width: 100%;" name="APTITUDE" id="APTITUDE">

                                    </textarea>
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Observation:</label>
                                    <textarea style="width: 100%;" type="text" name="OBSERVATION" id="" placeholder="">
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
</div>


<script>
function fetchper(id) {
    //alert(id);
    var p_id = id;
    $('.sper').html('');
    $('.sidper').html('');
    $.ajax({
        type: 'GET',
        url: '/fetch-per',
        data: {
            personnel_id: p_id,
        },
        success: function(data) {
            console.log(data.lm.LIBPER)
            $('.sper').val(data.lm.LIBPER);
            $('.sidper').val(data.lm.per_id);
        }

    });
}
</script>

<script type="text/javascript">
$(document).ready(function() {

    fetchat();

    function fetchcs() {
        $.ajax({
            url: "{{ url('/fetch-vms')}}",
            method: 'get',
            success: function(response) {

                $("#show_vms").html(response);
                $(".table1").DataTable({
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

                    $('.nomsa').append('<option value=' + item.nomsa + '> ' + item.LIBPER +
                        ' </option> '

                    );

                })

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


                $('.presa').html("");
                $.each(response.lper, function(key, item) {

                    $('.presa').append('<option value=' + item.presa + '> ' + item.LIBPER +
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

                    $('.sexsa').append('<option value=' + item.sexsa + '> ' + item.LIBPER +
                        ' </option> '

                    );

                });

            }
        });
    }









    $(document).on('click', '.add_rvms', function(e) {
        e.preventDefault();


        var data = {

            'matsa': $('matsa').val(),
            'nomsa': $('#nom').val(),
            'presa': $('#prenom').val(),
            'sexsa': $('#sex').val(),
            'age': $('#age').val(),
            'poste': $('#poste').val(),
            'taille': $('#taille').val(),
            'poids': $('#poids').val(),
            'datevms': $('#datevms').val(),
            'typvisi': $('#typvisi').val(),
            'plaintes': $('#plaintes').val(),
            'pouls': $('#pouls').val(),
            'ta': $('#ta').val(),
            'pa': $('#pa').val(),
            'pti': $('#pti').val(),
            'pte': $('#pte').val(),
            'avod': $('#avod').val(),
            'avog': $('#avog').val(),
            'examcli': $('#examcli').val(),
            'bilan': $('#bilan').val(),
            'avisp': $('#avisp').val(),
            'conclmed': $('#conclmed').val(),
            'aptitude': $('#patitude').val(),
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
            url: "{{route('rvms.store')}}",
            data: data,
            dataType: "json",
            success: function(response) {
                console.log(response);

                if (response.status == 200) {

                    fetchrvms();

                }

            }

        })
    });
});
</script>