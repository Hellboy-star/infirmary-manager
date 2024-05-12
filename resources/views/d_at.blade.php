@extends('def.def', ['titre'=>'Régistre Accident de Travail' ])
@section ('contenta')

<div id="content" style="width: 300% ;" class="app-content">




    <div>
        <h1>Régistre d'Accident de Travail</h1>
        <div class="col-xl-12">

            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">

                <div class="panel-heading">
                    <h4 class="panel-title">Régistre d'Accident de Travail</h4>
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


                    <div class="container-fluid">

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
                                    <tr>
                                        <th style="width: 0.5%;" scope="col">N°</th>
                                        <th style="width: 1%;" scope="col">Date</th>
                                        <th style="width: 4%;" colspan="2" style="width: 5%;">Nom et Prénoms</th>
                                        <th style="width: 1%;" scope="col">N°IT</th>
                                        <th style="width: 0.5%;">Sexe</th>
                                        <th style="width: 0.5%;">Age</th>
                                        <th style="width: 2%;">Poste</th>
                                        <th style="width: 2%;">Date et heure de l'accident</th>
                                        <th style="width: 3%;">Lieu de l'accident</th>
                                        <th style="width: 3%;">Cause de l'accident</th>
                                        <th style="width: 3%;">Nature des lésions</th>
                                        <th style="width: 3%;">Localisation des lésions</th>
                                        <th style="width: 1%;">Date de la déclaration à la CNSS</th>
                                        <th colspan="2" style="width: 3%;">Date et avis de la CNSS</th>
                                        <th style="width: 2%;">Nombre de jours d'arrêt de travail</th>
                                        <th style="width: 3%;">Traitement</th>
                                        <th style="width: 3%;">Mesures corectrices</th>
                                        <th style="width: 3%;">Observations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($at as $id)
                                    <tr>
                                        <td> {{$id->id}} </td>
                                        <td> {{$id->DATECONS}}</td>
                                        <td>{{$id->NOMSA}}</td>
                                        <td>{{$id->PRESA}}</td>
                                        <td>{{$id->MATSA}}</td>
                                        <td>{{$id->SEXSA}}</td>
                                        <td>{{$id->AGE}}</td>
                                        <td>{{$id->POSTE}}</td>
                                        <td>{{$id->DATEACID}}</td>
                                        <td>{{$id->LIEU}}</td>
                                        <td>{{$id->CAUSE}}</td>
                                        <td>{{$id->NATURELESI}}</td>
                                        <td>{{$id->LOCALISLESI}}</td>
                                        <td>{{$id->DATE1CNSS}}</td>
                                        <td>{{$id->DATE2CNSS}}</td>
                                        <td style="width: 2%;">{{$id->AVISCNSS}}</td>
                                        <td>{{$id->NBRARRET}}</td>
                                        <td>{{$id->TRAITEMENT}}</td>
                                        <td>{{$id->MESECORRECT}}</td>
                                        <td>{{$id->OBSERVATION}}</td>
                                        <td style="width: 1%;">
                                            <form action="{{route('rat.destroy', $id->id) }}" method="post"
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
                                {{$at->links()}}
                            </table>

                        </div>

                    </div>

                </div>





            </div>
        </div>
    </div>
</div>



<div class="align-items-center">
    <div class="modal fade" id="mod">

        <div class="panel-body bg-light">

            <div class="modal-dialog modal-md">
                <h4 class="panel-title">Ajouter un nouvel élément</h4>

            </div>
            <div class="modal-dialog modal-md">
                <h4 class="panel-title">PDF</h4>

            </div>
            <div class="container">
                <div class="row right-content-center">
                    <div class="card-body">
                        <form method="POST" action="{{route('rat.store')}}">
                            @csrf
                            <div class="row">

                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Matricule:</label>
                                    <input style="width:100%" type="number" class="sda form-control form-control-sm"
                                        name="MATSA" id="MATSA" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1"> IT:</label>
                                    <input style="width: 100%;" type="text" name="IT" id="" placeholder="" />
                                </div>

                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Nom:</label>
                                    <input style="width:75%" type="datetime-local"
                                        class="sda form-control form-control-sm" name="NOMSA" id="NOMSA"
                                        placeholder="" />
                                </div>

                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Prénoms:</label>
                                    <input style="width:75%" type="datetime-local"
                                        class="sda form-control form-control-sm" name="PRESA" id="PRESA"
                                        placeholder="" />
                                </div>

                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Sex:</label>
                                    <input style="width:75%" type="datetime-local"
                                        class="sda form-control form-control-sm" name="SEXSA" id="SEXSA"
                                        placeholder="" />
                                </div>

                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Age:</label>
                                    <input style="width:50%" type="number" class="sda form-control form-control-sm"
                                        name="AGE" id="AGE" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Date de consultation:</label>
                                    <input style="width:50%" type="date" class="sda form-control form-control-sm"
                                        name="DATECONS" id="DATECONS" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Date et heure de
                                        l'accident:</label>
                                    <input style="width:75%" type="datetime-local"
                                        class="sda form-control form-control-sm" name="DATEACID" id="DATEACID"
                                        placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Lieu de l'accident:</label>
                                    <input style="width:100%" type="text" class="sda form-control form-control-sm"
                                        name="LIEU" id="LIEU" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Cause de l'accident:</label>
                                    <input style="width:100%" type="text" class="sda form-control form-control-sm"
                                        name="CAUSE" id="CAUSE" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Nature de lésions:</label>
                                    <input style="width:100%" type="text" class="sda form-control form-control-sm"
                                        name="NATURELESI" id="NATURELESI" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Localisation des
                                        lésions:</label>
                                    <input style="width:100%" type="text" class="sda form-control form-control-sm"
                                        name="LOCALISLESI" id="LOCALISLESI" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Date de déclaration de la
                                        CNSS:</label>
                                    <input style="width:50%" type="date" class="sda form-control form-control-sm"
                                        name="DATE1CNSS" id="DATE1CNSS" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Date d'avis de la
                                        CNSS:</label>
                                    <input style="width:50%" type="date" class="sda form-control form-control-sm"
                                        name="DATE2CNSS" id="DATE2CNSS" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Avis de la CNSS:</label>
                                    <input style="width:100%" type="text" class="sda form-control form-control-sm"
                                        name="AVISCNSS" id=" AVISCNSS" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Nombre de jours
                                        d'arrêt:</label>
                                    <input style="width:50%" type="number" class="sda form-control form-control-sm"
                                        name="NBRARRET" id="NBRARRET" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Traitement:</label>
                                    <input style="width:100%" type="text" class="sda form-control form-control-sm"
                                        name="TRAITEMENT" id="TRAITEMENT" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Mesure correctrice:</label>
                                    <textarea style="width:100%" type="text" class="sda form-control form-control-sm"
                                        name="MESECORRECT" id="MESECORRECT" placeholder="">

                                    </textarea>
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Observations:</label>
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


<div class="align-items-center">
    <div class="modal fade" id="moda">

        <div class="panel-body bg-light">

            <div class="modal-dialog modal-md">
                <h4 class="panel-title">Modifications aux éléments</h4>

            </div>
            <div class="container">
                <div class="row right-content-center">
                    <div class="card-body">
                        <form method="POST" action="{{route('rat.update',$id->id)}}">
                            @csrf
                            @method('put')
                            <div class="row">

                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Matricule:</label>
                                    <input style="width:50%" type="number" class="sda form-control form-control-sm"
                                        name="MATSA" id="MATSA" placeholder="" />
                                </div>

                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Nom:</label>
                                    <input style="width:75%" type="text" class="sda form-control form-control-sm"
                                        name="NOMSA" id="NOMSA" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Prénoms:</label>
                                    <input style="width:75%" type="text" class="sda form-control form-control-sm"
                                        name="PRESA" id="PRESA" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Sexe:</label>
                                    <input style="width:75%" type="text" class="sda form-control form-control-sm"
                                        name="SEXSA" id="SEXSA" placeholder="" />
                                </div>

                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Age:</label>
                                    <input style="width:50%" type="number" class="sda form-control form-control-sm"
                                        name="AGE" id="AGE" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Date de consultation:</label>
                                    <input style="width:50%" type="date" class="sda form-control form-control-sm"
                                        name="DATECONS" id="DATECONS" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Date et heure de
                                        l'accident:</label>
                                    <input style="width:75%" type="datetime-local"
                                        class="sda form-control form-control-sm" name="DATEACID" id="DATEACID"
                                        placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Lieu de l'accident:</label>
                                    <input style="width:100%" type="text" class="sda form-control form-control-sm"
                                        name="LIEU" id="LIEU" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Cause de l'accident:</label>
                                    <input style="width:100%" type="text" class="sda form-control form-control-sm"
                                        name="CAUSE" id="CAUSE" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Nature de lésions:</label>
                                    <input style="width:100%" type="text" class="sda form-control form-control-sm"
                                        name="NATURELESI" id="NATURELESI" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Localisation des
                                        lésions:</label>
                                    <input style="width:100%" type="text" class="sda form-control form-control-sm"
                                        name="LOCALISLESI" id="LOCALISLESI" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Date de déclaration de la
                                        CNSS:</label>
                                    <input style="width:50%" type="date" class="sda form-control form-control-sm"
                                        name="DATE1CNSS" id="DATE1CNSS" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Date d'avis de la
                                        CNSS:</label>
                                    <input style="width:50%" type="date" class="sda form-control form-control-sm"
                                        name="DATE2CNSS" id="DATE2CNSS" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Avis de la CNSS:</label>
                                    <input style="width:100%" type="text" class="sda form-control form-control-sm"
                                        name="AVISCNSS" id=" AVISCNSS" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Nombre de jours
                                        d'arrêt:</label>
                                    <input style="width:50%" type="number" class="sda form-control form-control-sm"
                                        name="NBRARRET" id="NBRARRET" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Traitement:</label>
                                    <input style="width:100%" type="text" class="sda form-control form-control-sm"
                                        name="TRAITEMENT" id="TRAITEMENT" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Mesure correctrice:</label>
                                    <input style="width:100%" type="text" class="sda form-control form-control-sm"
                                        name="MESECORRECT" id="MESECORRECT" placeholder="" />
                                </div>
                                <div class="col-xl-3 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Observations:</label>
                                    <input style="width:100%" type="text" class="sda form-control form-control-sm"
                                        name="OBSERVATION" id="OBSERVATION" placeholder="" />
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
    $('.NOMSA').html('');
    $('.PRESA').html('');
    $('.SEXSA').html('');
    $.ajax({
        type: 'GET',
        url: '/fetch-per',
        data: {
            personnel_id: p_id,
        },
        success: function(data) {
            console.log(data.lm.matsa)
            $('.NOMSA').val(data.lm.NOMSA);
            $('.PRESA').val(data.lm.PRESA);
            $('.SEXSA').val(data.lm.SEXSA);
        }

    });
}
</script>

<script type="text/javascript">
$(document).ready(function() {

    fetchat();

    function fetchat() {
        $.ajax({
            url: "{{ url('/fetch-cs')}}",
            method: 'get',
            success: function(response) {

                $("#show_at").html(response);
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









    $(document).on('click', '.add_rat', function(e) {
        e.preventDefault();


        var data = {

            'nomsa': $('#nom').val(),
            'presa': $('#prenom').val(),
            'sexsa': $('#sex').val(),
            'age': $('#age').val(),
            'datecons': $('#datecons').val(),
            'dateacid': $('#dateacid').val(),
            'lieu': $('#lieu').val(),
            'cause': $('#cause').val(),
            'naturelesi': $('#naturelesi').val(),
            'localislesi': $('#localislesi').val(),
            'date1cnss': $('#date1cnss').val(),
            'date2cnss': $('#date2cnss').val(),
            'aviscnss': $('#aviscnss').val(),
            'nbrarret': $('#nbrarret').val(),
            'traitement': $('#traitement').val(),
            'mesecorrec': $('#mesecorrec').val(),
            'observation': $('#observation').val(),
        }
        //  console.log(data);


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: "GET",
            url: "{{route('rat.store')}}",
            data: data,
            dataType: "json",
            success: function(response) {
                console.log(response);

                if (response.status == 200) {

                    fetchrat();

                }

            }

        })
    });
});
</script>