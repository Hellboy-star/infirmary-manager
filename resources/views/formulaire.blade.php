@extends('def.def')

@section ('contenta')

<link href="../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
<script src="../assets/plugins/select2/dist/js/select2.min.js"></script>

<link href="../assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
<script src="../assets/plugins/select2/dist/js/select2.min.js"></script>


<div id="content" class="app-content">


    <h1 style="text-align: center;" class="page-header mt-10px"><strong> LES FORMULAIRES </strong></h1>

    <div class="row">
        <div class="">

            <div class="">

                <div class="panel-heading p-0">

                    <div class="tab-overflow">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="#nav-pills-tab-1" data-bs-toggle="tab" class="nav-link active">
                                    <span class="d-sm-none">ACCIDENT DE TRAVAIL</span>
                                    <span class="d-sm-block d-none">ACCIDENT DE TRAVAIL</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-2" data-bs-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">CONSULTATION SPECIALISEE</span>
                                    <span class="d-sm-block d-none">CONSULTATION SPECIALISEE</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-3" data-bs-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">MALADIE PROFESSIONNELLE</span>
                                    <span class="d-sm-block d-none">MALADIE PROFESSIONNELLE</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-4" data-bs-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">VISITE MEDICALE SPECIALE</span>
                                    <span class="d-sm-block d-none">VISITE MEDICALE SPECIALE</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-5" data-bs-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">VACCINATION</span>
                                    <span class="d-sm-block d-none">VACCINATION</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-6" data-bs-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">ORDONNANCE MEDICALE</span>
                                    <span class="d-sm-block d-none">ORDONNANCE MEDICALE</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>


                <div class="tab-content p-3 rounded-top panel rounded-0 m-0">

                    <div class="tab-pane fade active show" id="nav-pills-tab-1">
                        <h3 class="mt-10px">FORMULAIRE D'ENREGISTREMENT DES ACCIDENTS DE TRAVAIL</h3>
                        <div class="col-md-12 card-body  table-responsive" id="show_at">
                            <div class="card-body">
                                <form method="POST" action="{{route('rat.store')}}">
                                    @csrf
                                    <div class="row">

                                    <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Matricule:</label>
                                                <select id="matsa" onchange="fetchperso(this.value);"
                                                    class="adefault-select2 form-control">
                                                    <?php $p=App\Models\Personnel::all(); foreach($p as $d){ ?>
                                                    <option value=" <?php echo $d->id ?> ">
                                                        <?php echo $d->MATSA; echo '-' ; echo $d->NOMSA; echo ' '; echo $d->PRESA ?>
                                                    </option>
                                                    <?php }; ?>
                                                </select>
                                            </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label" for="exampleInputPassword1"> IT:</label>
                                            <input style="width: 100%;" type="text" name="IT" id="" placeholder=""
                                                class="sit form-control form-control-sm" readonly />
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Nom:</label>
                                            <input style="width:75%" type="text"
                                                class="snomsa form-control form-control-sm" id="NOMSA" placeholder=""
                                                readonly />
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Prénoms:</label>
                                            <input style="width:75%" type="text"
                                                class="spresa form-control form-control-sm" name="PRESA" id="PRESA"
                                                placeholder="" readonly />
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Sexe:</label>
                                            <input style="width:75%" type="text"
                                                class="ssexsa form-control form-control-sm" name="SEXSA" id="SEXSA"
                                                placeholder="" readonly />
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Age:</label>
                                            <input style="width:50%" type="text"
                                                class="sage form-control form-control-sm" name="AGE" id="AGE"
                                                placeholder="" />
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Date de
                                                consultation:</label>
                                            <input style="width:50%" type="text"
                                                class="sdatecons form-control form-control-sm" data-date-end-date="0d"
                                                name="DATECONS" id="DATECONS" placeholder="" />
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Date et heure de
                                                l'accident:</label>
                                            <input style="width:75%" type="text"
                                                class="sdateacid form-control form-control-sm" data-date-end-date="0d"
                                                name="DATEACID" id="DATEACID" placeholder="" />
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Lieu de
                                                l'accident:</label>
                                            <input style="width:100%" type="text"
                                                class="slieu form-control form-control-sm" name="LIEU" id="LIEU"
                                                placeholder="" />
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Cause de
                                                l'accident:</label>
                                            <input style="width:100%" type="text"
                                                class="scause form-control form-control-sm" name="CAUSE" id="CAUSE"
                                                placeholder="" />
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Nature de
                                                lésions:</label>
                                            <input style="width:100%" type="text"
                                                class="snaturelesi form-control form-control-sm" name="NATURELESI"
                                                id="NATURELESI" placeholder="" />
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Localisation des
                                                lésions:</label>
                                            <input style="width:100%" type="text"
                                                class="slocalislesi form-control form-control-sm" name="LOCALISLESI"
                                                id="LOCALISLESI" placeholder="" />
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Date de déclaration de
                                                la
                                                CNSS:</label>
                                            <input style="width:50%" type="text"
                                                class="sdate1cnss form-control form-control-sm" name="DATE1CNSS"
                                                id="DATE1CNSS" placeholder="" />
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Date d'avis de la
                                                CNSS:</label>
                                            <input style="width:50%" type="text"
                                                class="sdate2cnss form-control form-control-sm" name="DATE2CNSS"
                                                id="DATE2CNSS" placeholder="" />
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Avis de la
                                                CNSS:</label>
                                            <input style="width:100%" type="text"
                                                class="saviscnss form-control form-control-sm" name="AVISCNSS"
                                                id=" AVISCNSS" placeholder="" />
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Nombre de jours
                                                d'arrêt:</label>
                                            <input style="width:50%" type="text"
                                                class="snbrarret form-control form-control-sm" name="NBRARRET"
                                                id="NBRARRET" placeholder="" />
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Traitement:</label>
                                            <input style="width:100%" type="text"
                                                class="straitement form-control form-control-sm" name="TRAITEMENT"
                                                id="TRAITEMENT" placeholder="" />
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Mesure
                                                correctrice:</label>
                                            <textarea style="width:100%" type="text"
                                                class="smesecorrect form-control form-control-sm" name="MESECORRECT"
                                                id="MESECORRECT" placeholder="">

                                    </textarea>
                                        </div>
                                        <div class="col-xl-3 mb-3">
                                            <label class="form-label" for="exampleInputPassword1">Observations:</label>
                                            <textarea style="width: 100%;" type="text"
                                                class="sobservation form-control form-control-sm" name="OBSERVATION"
                                                id="" placeholder="">

                                    </textarea>
                                        </div>

                                        <div class="modal-footer">
                                            <a href="javascript:;" class="btn btn-white"
                                                data-bs-dismiss="modal">Annuler</a>
                                            <button type="submit" id="add_at"
                                                class="add_at btn btn-primary">Enregistrer</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-pills-tab-2">
                        <h3 class="mt-10px">FORMULAIRE D'ENREGISTREMENT DES CONSULTATIONS SPECIALISEES</h3>
                        <div class="col-md-12 card-body  table-responsive" id="show_cs">
                            <div class="card-body">
                                <div class="row">
                                <form method="POST" action="{{route('rcs.store')}}">
                                        @csrf
                                        <div class="row">
                                        
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Matricule:</label>
                                                <select id="matsa" onchange="fetchperso(this.value);"
                                                    class="bdefault-select2 form-control">
                                                    <?php $p=App\Models\Personnel::all(); foreach($p as $d){ ?>
                                                    <option value=" <?php echo $d->id ?> ">
                                                        <?php echo $d->MATSA; echo '-' ; echo $d->NOMSA; echo ' '; echo $d->PRESA ?>
                                                    </option>
                                                    <?php }; ?>
                                                </select>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> IT:</label>
                                                <input style="width: 100%;" type="text" name="IT" id="" placeholder=""
                                                    class="sit form-control form-control-sm" readonly />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Nom:</label>
                                                <input style="width:75%" type="text"
                                                    class="snomsa form-control form-control-sm" id="NOMSA"
                                                    placeholder="" readonly />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Prénoms:</label>
                                                <input style="width:75%" type="text"
                                                    class="spresa form-control form-control-sm" name="PRESA" id="PRESA"
                                                    placeholder="" readonly />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Sexe:</label>
                                                <input style="width:75%" type="text"
                                                    class="ssexsa form-control form-control-sm" name="SEXSA" id="SEXSA"
                                                    placeholder="" readonly />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Poste:</label>
                                                <input style="width: 50%;" type="text" name="POSTE" id="POSTE"
                                                    placeholder="" class="sposte form-control form-control-sm"
                                                    readonly />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Date de
                                                    Consultation:</label>
                                                <input style="width: 50%;" type="text" name="DATECS" id=""
                                                    placeholder="" class="datecs form-control form-control-sm" />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Age:</label>
                                                <input style="width: 50%;" type="text" name="AGE" id="AGE"
                                                    placeholder="" class="sage form-control form-control-sm" />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Poids:</label>
                                                <input style="width: 50%;" type="text" name="POIDS" id="" placeholder=""
                                                    class="spoids form-control form-control-sm" />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Taille:</label>
                                                <input style="width: 50%;" type="text" name="TAILLE" id=""
                                                    placeholder="" class="staille form-control form-control-sm" />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> T°:</label>
                                                <input style="width: 50%;" type="text" name="T" id="" placeholder=""
                                                    class="st form-control form-control-sm" />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Pouls:</label>
                                                <input style="width: 50%;" type="text" name="POULS" id="" placeholder=""
                                                    class="spouls form-control form-control-sm" />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Ta:</label>
                                                <input style="width: 50%;" type="text" name="TA" id="" placeholder=""
                                                    class="sta form-control form-control-sm" />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Plaintes:</label>
                                                <input style="width: 50%;" type="text" name="PLAINTES" id=""
                                                    placeholder="" class="splaintes form-control form-control-sm" />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Examen
                                                    Clinique:</label>
                                                <input style="width: 50%;" type="text" name="EXAMCLI" id=""
                                                    placeholder="" class="sexamcli form-control form-control-sm" />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Bilan:</label>
                                                <input style="width: 50%;" type="text" name="BILAN" id="" placeholder=""
                                                    class="sbilan form-control form-control-sm" />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">
                                                    Diagnostic:</label>
                                                <input style="width: 50%;" type="text" name="DIAGNOSTIC" id=""
                                                    placeholder="" class="sdiagnostic form-control form-control-sm" />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">
                                                    Traitement:</label>
                                                <input style="width: 50%;" type="text" name="TRAITEMENT" id=""
                                                    placeholder="" class="straitement form-control form-control-sm" />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">
                                                    Observation:</label>
                                                <textarea style="width: 50%;" type="text" name="OBSERVATION" id=""
                                                    placeholder="" class="sobservation form-control form-control-sm">

                                                </textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="javascript:;" class="btn btn-white"
                                                    data-bs-dismiss="modal">Annuler</a>
                                                <button type="submit" id="add_cs"
                                                    class="add_cs btn btn-primary">Enregistrer</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-pills-tab-3">
                        <h3 class="mt-10px">FORMULAIRE D'ENREGISTREMENT DES MALADIES PROFESSIONNELES</h3>
                        <div class="col-md-12 card-body  table-responsive" id="show_mp">
                            <div class="card-body">
                                <div class="row">
                                    
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-pills-tab-4">
                        <h3 class="mt-10px">FORMULAIRE D'ENREGISTREMENT DES VISITES MEDICALES SPECIALES</h3>
                        <div class="col-md-12 card-body  table-responsive" id="show_vms">
                            <div class="card-body">
                                <div class="row">
                                    
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-pills-tab-5">
                        <h3 class="mt-10px">FORMULAIRE D'ENREGISTREMENT DES VACCINATIONS</h3>
                        <div class="col-md-12 card-body  table-responsive" id="show_vac">
                            <div class="card-body">
                                <div class="row">
                                    
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-pills-tab-6">
                        <h3 class="mt-10px">FORMULAIRE D'ENREGISTREMENTS DES ORDONNANCES MEDICALES</h3>
                        <div class="col-md-12 card-body  table-responsive" id="show_om">
                            <div class="card-body">
                                
                            </div>
                        </div>
                    </div>

                </div>



            </div>



        </div>

    </div>

</div>

<script>
  $(".adefault-select2").select2();
  $(".cdefault-select2").select2();
  $(".ddefault-select2").select2();
  $(".edefault-select2").select2();
  $(".fdefault-select2").select2();
</script>

<script>
    $(".bdefault-select2").select2();
</script>
<script></script>
<script></script>
<script></script>

<script>


    $("#masked-input-date").mask("99/99/9999");
    $("#nplace").mask("99");
    function fetchperso(id) {
        //alert(id);
        
        let d = Date.now();
        var p_id = id;
        $('.snomsa').html('');
        $('.spresa').html('');
        $('.ssexsa').html('');
        $('.sposte').html('');
        $('.sit').html('');
        $('.snbrsa').html('');
        $('.sage').html('');
        console.log(p_id);
        //console.log(${data.lm.DNASA});
        $.ajax({
            type: 'GET',
            url: '/fetch-p',
            data: { id: p_id },
            success: function (data) {
                console.log(d);
                $('.smatsa').val(data.lm.MATSA);
                $('.snomsa').val(data.lm.NOMSA);
                $('.spresa').val(data.lm.PRESA);
                $('.ssexsa').val(data.lm.SEXSA);
                $('.sposte').val(data.lm.LEMSA);
                $('.sit').val(data.lm.SECSA);
                $('.snbrsa').val(data.lm.NBRSA);
                $('.sage').val( d - data.lm.DNASA);
                
            }
        });
    }
</script>


<script>
    $(document).on('click', '.add_at', function (e) {
        e.preventDefault();

        var data = {
            'MATSA': $('.smatsa').val(),
            'IT': $('.sit').val(),
            'NOMSA': $('.snomsa').val(),
            'PRESA': $('.spresa').val(),
            'SEXSA': $('.ssexsa').val(),
            'AGE': $('.sage').val(),
            'DATECONS': $('.sdatecons').val(),
            'DATEACID': $('.sdateacid').val(),
            'LIEU': $('.slieu').val(),
            'CAUSE': $('.scause').val(),
            'NATURELESI': $('.snaturelesi').val(),
            'LOCALISLESI': $('.slocalislesi').val(),
            'DATE1CNSS': $('.sdate1cnss').val(),
            'DATE2CNSS': $('.sdate2cnss').val(),
            'AVISCNSS': $('.saviscnss').val(),
            'NBRARRET': $('.snbrarret').val(),
            'TRAITEMENT': $('.straitement').val(),
            'MESECORRECT': $('.smesecorrect').val(),
            'OBSERVATION': $('.sobservation').val(),
        }
        console.log(data);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "{{route('rat.store')}}",
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response);

                if (response.status == 200) {
                    fetchat();
                    alert('Enrégistrement effectué');
                }
                else {
                    alert('Echec de l\'enregistrement');
                    fetchat();
                }
            }
        })


    });
</script>




<script>
    $(document).on('click', '.add_cs', function (e) {
        e.preventDefault();

        var data = {
            'MATSA': $('.smatsa').val(),
            'IT': $('.sit').val(),
            'NOMSA': $('.snomsa').val(),
            'PRESA': $('.spresa').val(),
            'SEXSA': $('.ssexsa').val(),
            'AGE': $('.sage').val(),
            'POSTE': $('.sposte').val(),
            'POIDS': $('.spoids').val(),
            'TAILLE': $('.staille').val(),
            'DATECS': $('.sdatecs').val(),
            'T': $('.st').val(),
            'POULS': $('.spouls').val(),
            'TA': $('.sta').val(),
            'PLAINTES': $('.splaintes').val(),
            'EXAMCLI': $('.sexamcli').val(),
            'BILAN': $('.bilan').val(),
            'DIAGNOSTIC': $('.sdiagnostic').val(),
            'TRAITEMENT': $('.straitement').val(),
            'OBSERVATION': $('.sobservation').val(),
        }
        console.log(data);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "{{route('rcs.store')}}",
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response);

                if (response.status == 200) {
                    fetchcs();
                    alert('Enrégistrement effectué');
                }
                else {
                    alert('Echec de l\'enregistrement');
                    fetchcs();
                }
            }
        })


    });
</script>



<script>
    $(document).on('click', '.add_mp', function (e) {
        e.preventDefault();

        var data = {
            'MATSA': $('.smatsa').val(),
            'IT': $('.sit').val(),
            'NOMSA': $('.snomsa').val(),
            'PRESA': $('.spresa').val(),
            'SEXSA': $('.ssexsa').val(),
            'AGE': $('.sage').val(),
            'POSTE': $('.sposte').val(),
            'NBRSA': $('.snbrsa').val(),
            'DATEMP': $('.sdatemp').val(),
            'MPNUMTAB': $('.smpnumtab').val(),
            'MPDESIGNATION': $('.smpdesignation').val(),
            'MALCARAPRO': $('.smalcarapro').val(),
            'AGENTPATH': $('.sagentpath').val(),
            'DATE1CNSS': $('.sdate1cnss').val(),
            'DATE2CNSS': $('.sdate2cnss').val(),
            'AVISCNSS': $('.saviscnss').val(),
            'TRAITEMENT': $('.straitement').val(),
            'OBSERVATION': $('.sobservation').val(),
        }
        console.log(data);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "{{route('rmp.store')}}",
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response);

                if (response.status == 200) {
                    fetchmp();
                    alert('Enrégistrement effectué');
                }
            }
        })


    });
</script>



<script>
    $(document).on('click', '.add_vms', function (e) {
        e.preventDefault();

        var data = {
            'MATSA': $('.smatsa').val(),
            'IT': $('.sit').val(),
            'NOMSA': $('.snomsa').val(),
            'PRESA': $('.spresa').val(),
            'SEXSA': $('.ssexsa').val(),
            'AGE': $('.sage').val(),
            'POSTE': $('.sposte').val(),
            'POIDS': $('.spoids').val(),
            'TAILLE': $('.staille').val(),
            'DATEVMS': $('.sdatevms').val(),
            'TYPVISI': $('.stypvisi').val(),
            'POULS': $('.spouls').val(),
            'PLAINTES': $('.splaintes').val(),
            'TA': $('.sta').val(),
            'PA': $('.spa').val(),
            'PTI': $('.spti').val(),
            'PTE': $('.spte').val(),
            'AVOD': $('.savod').val(),
            'AVOG': $('.savog').val(),
            'EXAMCLI': $('.sexamcli').val(),
            'BILAN': $('.sbilan').val(),
            'AVISP': $('.savisp').val(),
            'CONCLMED': $('.sconclmed').val(),
            'APTITUDE': $('.saptitude').val(),
            'OBSERVATION': $('.sobservation').val(),
        }
        console.log(data);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "{{route('rvms.store')}}",
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response);

                if (response.status == 200) {
                    fetchvms();
                    alert('Enrégistrement effectué');
                }
                else {
                    alert('Echec de l\'enregistrement');
                    fetchvms();
                }
            }
        })


    });
</script>



<script>
    $(document).on('click', '.add_vac', function (e) {
        e.preventDefault();

        var data = {
            'MATSA': $('.smatsa').val(),
            'NOMSA': $('.snomsa').val(),
            'PRESA': $('.spresa').val(),
            'SEXSA': $('.ssexsa').val(),
            'AGE': $('.sage').val(),
            'POSTE': $('.sposte').val(),
            'DATEDOSE': $('.sdatedose').val(),
            'DATEEXP': $('.sdateexp').val(),
            'VACCIN': $('.svaccin').val(),
            'LOT': $('.slot').val(),
            'TYPE': $('.stype').val(),
            'DOSE': $('.sdose').val(),
            'CENTRE': $('.scentre').val(),
            'DATE': $('.sdate').val(),
        }
        console.log(data);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "{{route('vac.store')}}",
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response);

                if (response.status == 200) {
                    fetchvac();
                    alert('Enrégistrement effectué');
                }
                else {
                    alert('Echec de l\'enregistrement');
                    fetchvac();
                }
            }
        })


    });
</script>



<script>
    $(document).on('click', '.add_om', function (e) {
        e.preventDefault();

        var data = {
            'MATSA': $('.smatsa').val(),
            'NOMSA': $('.snomsa').val(),
            'PRESA': $('.spresa').val(),
            'DATE': $('.sdate').val(),
            'ORDONNANCE': $('.sordonnance').val(),

        }
        console.log(data);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "{{route('rom.store')}}",
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response);

                if (response.status == 200) {
                    fetchom();
                    alert('Enrégistrement effectué');
                }
                else {
                    alert('Echec de l\'enregistrement');
                    fetchom();
                }
            }
        })


    });
</script>





<script>
    $("#DATECONS").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd"
    });

    $("#DATEACID").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd-mm-yyyy"
    });

    $("#DATE1CNSS").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd-mm-yyyy"
    });

    $("#DATE2CNSS").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd-mm-yyyy"
    });

    $("#DATECS").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd-mm-yyyy"
    });

    $("#DATEMP").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd-mm-yyyy"
    });

    $("#DATE").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd-mm-yyyy"
    });

    $("#DATEDOSE").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd-mm-yyyy"
    });

    $("#DATEEXP").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd-mm-yyyy"
    });

    $("#DATEVMS").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd-mm-yyyy"
    });


</script>


<script>
    $('#ordonnance').wysihtml5();
</script>

@endsection