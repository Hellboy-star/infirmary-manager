@extends('def.def', ['titre'=>'Régistre de Maladie Professionnelle' ])
@section ('contenta')

<div id="content" style="width: 300% ;" class="app-content">

    <h1 class="page-header">Régistre de Maladie Professionnelle</h1>


    <div class="row">
        <div class="col-xl-12">

            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">

                <div class="panel-heading">
                    <h4 class="panel-title">Régistre de Maladie Professionnelle</h4>
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


                        <div class="col-md-5 card-body" id="index_mp">
                            <table class="table caption-top table-bordered ">
                                <caption></caption>
                                <thead>
                                    <tr>
                                        <th rowspan=2>N°</th>
                                        <th rowspan=2>Date</th>
                                        <th colspan=2 rowspan=2>Nom et Prénoms</th>
                                        <th rowspan=2>N°IT</th>
                                        <th rowspan=2>Poste</th>
                                        <th rowspan=2>Ancienneté au poste</th>
                                        <th rowspan=2>Sexe</th>
                                        <th rowspan=2>Age</th>
                                        <th colspan=2>Maladie Professionnelle</th>
                                        <th rowspan=2>Maladie à caractère professionnel</th>
                                        <th rowspan=2>Agent pathogène suspecté</th>
                                        <th rowspan=2>Date de la déclaration à la CNSS</th>
                                        <th colspan=2 rowspan=2>Date et avis de la CNSS</th>
                                        <th rowspan=2>Traitement</th>
                                        <th rowspan=2>Observations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>
                                            </<th>
                                        <th>
                                            </<th>
                                        <th>
                                            </<th>
                                        <th>
                                            </<th>
                                        <th>
                                            </<th>
                                        <th>
                                            </<th>
                                        <th>
                                            </<th>
                                        <th>
                                            </<th>
                                        <th>
                                            </<th>
                                        <th>N° tableau</<th>
                                        <th>Désignation</<th>
                                        <th>
                                            </<th>
                                        <th>
                                            </<th>
                                        <th>
                                            </<th>
                                        <th>
                                            </<th>
                                        <th>
                                            </<th>
                                        <th>
                                            </<th>
                                        <th>
                                            </<th>
                                    </tr>
                                    </thead>
                                <tbody>
                                    @foreach($mp as $id)
                                    <tr>
                                        <td> {{$id->id}} </td>
                                        <td> {{$id->DATEMP}} </td>
                                        <td> {{$id->NOMSA }}</td>
                                        <td> {{$id->PRESA }}</td>
                                        <td> {{$id->IT }}</td>
                                        <td> {{$id->POSTE }}</td>
                                        <td> {{$id->NBRSA }}</td>
                                        <td> {{$id->SEXSA }}</td>
                                        <td> {{$id->AGE }}</td>
                                        <td> {{$id->MPNUMTAB}} </td>
                                        <td> {{$id->MPDESIGNATION}} </td>
                                        <td> {{$id->MALCARAPRO}} </td>
                                        <td> {{$id->AGENTPATH}} </td>
                                        <td> {{$id->DATE1CNSS}} </td>
                                        <td> {{$id->DATE2CNSS}} </td>
                                        <td> {{$id->AVISCNSS}} </td>
                                        <td> {{$id->TRAITEMENT}} </td>
                                        <td> {{$id->OBSERVATION}} </td>
                                        <td>
                                            <form action="{{route('rmp.destroy', $id->id) }}" method="post"
                                                onsubmit="return confirm('Etes-vous sûr ?');">
                                                <a class="btn btn-info" href="'#moda', $id->id" data-bs-toggle="modal">

                                                    <i class=" fas fa-pencil-alt fa-xs"></i>
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
                                {{$mp->links()}}
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
                        <form method="POST" action="{{route('rmp.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Date de Consultation:</label>
                                    <input style="width: 100%;" type="date" name="DATEMP" id="" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Matricule:</label>
                                    <input style="width: 100%;" type="number" name="MATSA" id="" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> IT:</label>
                                    <input style="width: 100%;" type="text" name="IT" id="" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Nom:</label>
                                    <input style="width: 100%;" type="text" name="NOMSA" id="" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Prénoms:</label>
                                    <input style="width: 100%;" type="text" name="PRESA" id="" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Sexe:</label>
                                    <input style="width: 100%;" type="text" name="SEXSA" id="" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Age:</label>
                                    <input style="width: 100%;" type="number" name="AGE" id="" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Poste occupé:</label>
                                    <input style="width: 100%;" type="text" name="POSTE" id="" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Ancienneté au poste:</label>
                                    <input style="width: 100%;" type="number" name="NBRSA" id="" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Maladie Professionnelle / N°
                                        Tableau:</label>
                                    <input style="width: 100%;" type="number" name="MPNUMTAB" id="" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Maladie Professionnelle /
                                        Désignation:</label>
                                    <input style="width: 100%;" type="text" name="MPDESIGNATION" id="" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Maladie à caractère
                                        professionnelle:</label>
                                    <input style="width: 100%;" type="text" name="MALCARAPRO" id="" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Agent pathogène
                                        suspecté:</label>
                                    <input style="width: 100%;" type="text" name="AGENTPATH" id="" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Date de déclaration
                                        CNSS:</label>
                                    <input style="width: 100%;" type="date" name="DATE1CNSS" id="" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Date d'avis CNSS:</label>
                                    <input style="width: 100%;" type="date" name="DATE2CNSS" id="" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Avis de la CNSS:</label>
                                    <textarea style="width: 100%;" type="text" name="AVISCNSS" id="" placeholder="">

                                    </textarea>
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> Traitement:</label>
                                    <textarea style="width: 100%;" type="text" name="TRAITEMENT" id="" placeholder="">

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
            url: "{{ url('/fetch-mp')}}",
            method: 'get',
            success: function(response) {

                $("#show_mp").html(response);
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



    $(document).on('click', '.add_rmp', function(e) {
        e.preventDefault();


        var data = {

            'matsa': $('#matsa').val(),
            'nomsa': $('#nomsa').val(),
            'presa': $('#presa').val(),
            'sexsa': $('#sexsa').val(),
            'age': $('#age').val(),
            'datemp': $('#datemp').val(),
            'poste': $('#poste').val(),
            'nbrsa': $('#nbrsa').val(),
            'mpnumtab': $('#mpnumtab').val(),
            'mpdesignation': $('#mpdesignation').val(),
            'malcarapro': $('#malcarapro').val(),
            'agentpath': $('#agentpath').val(),
            'date1cnss': $('#date1cnss').val(),
            'date2cnss': $('#date2cnss').val(),
            'aviscnss': $('#aviscnss').val(),
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
            url: "{{route('rmp.store')}}",
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