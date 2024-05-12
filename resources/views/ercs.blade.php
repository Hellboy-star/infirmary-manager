@extends('def.def', ['titre'=>'Formulaire Consultation Spontanée' ])
@section('contenta')

<div id="content" class="app-content">

    <div>
        <h1>FORMULAIRE DES CONSULTATIONS SPONTANEES</h1>

        <div class="col-xl-12">
            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">

                <div class="panel-heading">
                    <h4 class="panel-title"> </h4>
                </div>


                <div class="panel-body p-0">


                    <div class="container-fluid">

                        <div class="col-md-12 card-body  table-responsive" id="show_at">
                            <!-- <h3 class="mt-10px">FORMULAIRE D'ENREGISTREMENT DES CONSULTATIONS SPONTANEES</h3> -->
                            <div class="col-md-12 card-body  table-responsive" id="show_cs">
                                <div class="card-body">
                                    <div class="row">
                                        <form method="POST" action="{{route('rcs.store')}}">
                                            @csrf
                                            <div class="row">

                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label"
                                                        for="exampleInputPassword1">Matricule:</label>
                                                    <select id="matsa" name="MATSA" onchange="fetchperso(this.value);"
                                                        class="smatsa-select2 form-control form-control-sm @error('content') is-invalid @enderror " required>
                                                        <?php $p=App\Models\Personnel::all(); foreach($p as $d){ ?>
                                                        <option value=" <?php echo $d->MATSA ?> ">
                                                            <?php echo $d->MATSA; echo '-' ; echo $d->NOMSA; echo ' '; echo $d->PRESA ?>
                                                        </option>
                                                        <?php }; ?>
                                                    </select>
                                                </div>
                                                <!-- <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1"> IT:</label>
                                                    <input style="width: 100%;" type="text" name="IT" id=""
                                                        placeholder="" required class="sit form-control form-control-sm @error('content') is-invalid @enderror "
                                                        readonly />
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">Nom:</label>
                                                    <input style="width:75%" type="text"
                                                        class="snomsa form-control form-control-sm @error('content') is-invalid @enderror " id="NOMSA"
                                                        placeholder="" required readonly />
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label"
                                                        for="exampleInputPassword1">Prénoms:</label>
                                                    <input style="width:75%" type="text"
                                                        class="spresa form-control form-control-sm @error('content') is-invalid @enderror " name="PRESA"
                                                        id="PRESA" placeholder="" required readonly />
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">Sexe:</label>
                                                    <input style="width:75%" type="text"
                                                        class="ssexsa form-control form-control-sm @error('content') is-invalid @enderror " name="SEXSA"
                                                        id="SEXSA" placeholder="" required readonly />
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Poste:</label>
                                                    <input  type="text" name="POSTE" id="POSTE"
                                                        placeholder="" required class="sposte form-control form-control-sm @error('content') is-invalid @enderror "
                                                        readonly />
                                                </div> -->
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1"> Date de
                                                        Consultation:</label>
                                                    <input  type="date" name="DATECS" id=""
                                                        placeholder="" required class="datecs form-control form-control-sm @error('content') is-invalid @enderror " />
                                                </div>
                                                <!-- <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1"> Age:</label>
                                                    <input  type="text" name="AGE" id="AGE"
                                                        placeholder="" required class="sage form-control form-control-sm @error('content') is-invalid @enderror " />
                                                </div> -->
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Poids:</label>
                                                    <input  type="text" name="POIDSCS" id=""
                                                        placeholder="" required class="spoids form-control form-control-sm @error('content') is-invalid @enderror " />
                                                </div>
                                                <!-- <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Taille:</label>
                                                    <input  type="text" name="TAILLECS" id=""
                                                        placeholder="" required class="staille form-control form-control-sm @error('content') is-invalid @enderror " />
                                                </div> -->
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1"> T°:</label>
                                                    <input  type="text" name="TCS" id="" placeholder="" required
                                                        class="st form-control form-control-sm @error('content') is-invalid @enderror " />
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Pouls:</label>
                                                    <input  type="text" name="POULSCS" id=""
                                                        placeholder="" required class="spouls form-control form-control-sm @error('content') is-invalid @enderror " />
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1"> Ta:</label>
                                                    <input  type="text" name="TACS" id=""
                                                        placeholder="" required class="sta form-control form-control-sm @error('content') is-invalid @enderror " />
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Plaintes:</label>
                                                    <textarea  type="text" name="PLAINTESCS" id=""
                                                        placeholder="" required
                                                        class="splaintes form-control form-control-sm @error('content') is-invalid @enderror ">
                                                    </textarea>
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1"> Examen
                                                        Clinique:</label>
                                                    <textarea  type="text" name="EXAMCLICS" id=""
                                                        placeholder="" required
                                                        class="sexamcli form-control form-control-sm @error('content') is-invalid @enderror ">
                                                    </textarea>
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Bilan:</label>
                                                    <textarea  type="text" name="BILAN" id=""
                                                        placeholder="" required
                                                        class="sbilan form-control form-control-sm @error('content') is-invalid @enderror ">
                                                    </textarea>
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Diagnostic:</label>
                                                    <textarea  type="text" name="DIAGNOSTIC" id=""
                                                        placeholder="" required
                                                        class="sdiagnostic form-control form-control-sm @error('content') is-invalid @enderror ">
                                                    </textarea>
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Traitement:</label>
                                                    <textarea  type="text" name="TRAITEMENTCS" id=""
                                                        placeholder="" required
                                                        class="straitement form-control form-control-sm @error('content') is-invalid @enderror ">
                                                    </textarea>
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Observation:</label>
                                                    <textarea  type="text" name="OBSERVATIONCS" id=""
                                                        placeholder="" required
                                                        class="sobservation form-control form-control-sm @error('content') is-invalid @enderror ">
                                                    </textarea>
                                                    
                                                </div>

                                            <div class="col-xxl-6 mb-3">
                                                <textarea type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror "
                                                    name="USERS" id="USERS" placeholder=""  required hidden >
                                                    <?php
                                                        use Illuminate\Support\Facades\Auth;
                                                        $na = Auth::user()->name;
                                                        $i = App\models\personnel::Where('MATSA', $na)->first();
                                                        echo $i->PRESA;
                                                        echo ' ';
                                                        echo $i->NOMSA;
                                                    ?>
                                                </textarea>
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="DELETED" id="DELETED" required value="Valide" hidden >
                                            </div>
                                            
                                                <div class="modal-footer">
                                                    <input type="reset" class="btn btn-danger">
                                                    <button type="submit" id="add" name="add" class="btn btn-primary">Enregistrer</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script></script>
<script></script>

<!-- 
<script>

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
                $('.sage').val(d - data.lm.DNASA);

            }
        });
    }
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
</script> -->

<script>
    $(".smatsa-select2").select2();
</script>
<script>
    $("#masked-input-date").mask("99/99/9999");
    $("#nbr").mask("999");
</script>
<script>
    $("#DATECONS").datepicker({
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

    $("#DATE").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd-mm-yyyy"
    });

</script>

@endsection