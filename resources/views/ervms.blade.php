@extends('def.def', ['titre'=>'Formulaire Visite Médicale Spéciale' ])
@section('contenta')

<div id="content" class="app-content">




    <div>
        <h1>FORMULAIRE D'ENREGISTREMENT DES VISITES MEDICALES SPECIALES</h1>
        <div class="col-xl-12">

            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">
            <div class="panel-heading">
                    <h4 class="panel-title"> </h4>
                </div>
                <div class="panel-body p-0">
                    <div class="container-fluid">
                        <div class="col-md-12 card-body  table-responsive" id="show_at">
                        <h3 class="mt-10px"></h3>
                        <div class="col-md-12 card-body  table-responsive" id="show_vms">
                            <div class="card-body">
                                <div class="row">
                                    <form method="POST" action="{{route('rvms.store')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Matricule:</label>
                                                <select id="matsa" name="MATSA" onchange="fetchperso(this.value);"
                                                    class="smatsa-select2 form-control form-control-sm @error('content') is-invalid @enderror " required>
                                                    <?php $p=App\Models\Personnel::all(); foreach($p as $d){ ?>
                                                    <option value=" <?php echo $d->MATSA ?> ">
                                                        <?php echo $d->MATSA; echo '-' ; echo $d->NOMSA; echo ' '; echo $d->PRESA ?>
                                                    </option>
                                                    <?php }; ?>
                                                </select>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Date de
                                                    Consultation:</label>
                                                <input style="width: 100%;" type="date" name="DATEVMS" id="DATEVMS"
                                                    placeholder="" required class="saviscnss form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            
                                            <!-- <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Nom:</label>
                                                <input style="width:75%" type="text"
                                                    class="snomsa form-control form-control-sm @error('content') is-invalid @enderror " id="NOMSA"
                                                    placeholder="" required readonly />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Prénoms:</label>
                                                <input style="width:75%" type="text"
                                                    class="spresa form-control form-control-sm @error('content') is-invalid @enderror " name="PRESA" id="PRESA"
                                                    placeholder="" required readonly />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Sexe:</label>
                                                <input style="width:75%" type="text"
                                                    class="ssexsa form-control form-control-sm @error('content') is-invalid @enderror " name="SEXSA" id="SEXSA"
                                                    placeholder="" required readonly />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Poste:</label>
                                                <input style="width: 50%;" type="text" name="POSTE" id="POSTE"
                                                    placeholder="" required class="sposte form-control form-control-sm @error('content') is-invalid @enderror "
                                                    readonly />
                                            </div> -->
                                            <!-- <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Age:</label>
                                                <input style="width: 50%;" type="text" name="AGE" id="AGE"
                                                    placeholder="" required class="sage form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div> -->
                                            <!-- <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Taille:</label>
                                                <input style="width: 100%;" type="text" name="TAILLEVMS" id="TAILLEVMS"
                                                    placeholder="" required class="staille form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div> -->
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Poids:</label>
                                                <input style="width: 100%;" type="text" name="POIDSVMS" id="POIDSVMS"
                                                    placeholder="" required class="spoids form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Type de
                                                    visite:</label>
                                                <select style="width: 100%;" name="TYPVISI" id="TYPVISI" placeholder="" required
                                                    class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                    <option value="D'embauche"> D'embauche </option>
                                                    <option value="Périodique"> Périodique </option>
                                                    <option value="De reprise de Travail"> De reprise de Travail
                                                    </option>
                                                    <option value="A la demande"> A la demande </option>
                                                    <option value="De surveillance spécifique"> De surveillance
                                                        spécifique </option>
                                                    <option value="De fin de contrat"> De fin de contrat </option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Pouls:</label>
                                                <input style="width: 100%;" type="text" name="POULSVMS" id="POULSVMS"
                                                    placeholder="" required class="spouls form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Ta:</label>
                                                <input style="width: 100%;" type="text" name="TAVMS" id="TAVMS" placeholder="" required
                                                    class="sta form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Pa:</label>
                                                <input style="width: 100%;" type="text" name="PA" id="PA" placeholder="" required
                                                    class="spa form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Pti:</label>
                                                <input style="width: 100%;" type="text" name="PTI" id="PTI"
                                                    placeholder="" required class="spti form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Pte:</label>
                                                <input style="width: 100%;" type="text" name="PTE" id="PTE"
                                                    placeholder="" required class="spte form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> AV/OD:</label>
                                                <input style="width: 100%;" type="text" name="AVOD" id="AVOD"
                                                    placeholder="" required class="savod form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> AV/OG:</label>
                                                <input style="width: 100%;" type="text" name="AVOG" id="AVOG"
                                                    placeholder="" required class="savog form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Plaintes:</label>
                                                <textarea style="width: 100%;" name="PLAINTESVMS" id="PLAINTESVMS"
                                                    placeholder="" required class="splaintes form-control form-control-sm @error('content') is-invalid @enderror ">
                                                </textarea>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Examen
                                                    clinique:</label>
                                                <textarea style="width: 100%;" name="EXAMCLIVMS" id="EXAMCLIVMS"
                                                    placeholder="" required class="sexamcli form-control form-control-sm @error('content') is-invalid @enderror ">
                                                </textarea>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Bilan:</label>
                                                <textarea style="width: 100%;" name="BILANVMS" id="BILANVMS" placeholder="" required
                                                    class="sbilan form-control form-control-sm @error('content') is-invalid @enderror ">
                                                </textarea>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Avis
                                                    spécialisé:</label>
                                                <textarea style="width: 100%;" name="AVISP" id="AVISP" placeholder="" required
                                                    class="savisp form-control form-control-sm @error('content') is-invalid @enderror ">
                                                </textarea>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Conclusion
                                                    Médicale:</label>
                                                <textarea style="width: 100%;" name="CONCLMED" id="CONCLMED"
                                                    placeholder="" required class="sconclmed form-control form-control-sm @error('content') is-invalid @enderror ">
                                                </textarea>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Aptitude:</label>
                                                <textarea style="width: 100%;" name="APTITUDE" id="APTITUDE"
                                                    placeholder="" required class="saptitude form-control form-control-sm @error('content') is-invalid @enderror ">
                                                </textarea>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">
                                                    Observation:</label>
                                                <textarea style="width: 100%;" type="text" name="OBSERVATIONVMS" id=""
                                                placeholder="" required class="sobservation form-control form-control-sm @error('content') is-invalid @enderror ">
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


<script>
  $(".smatsa-select2").select2();
</script>
<!-- 
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
    $('#ordonnance').wysihtml5();
</script>
 -->
@endsection