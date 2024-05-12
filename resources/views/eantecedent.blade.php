@extends('def.def', ['titre'=>'ENREGISTREMENT DES ANTECEDENTS' ])
@section('contenta')

<div id="content" class="app-content">




    <div>
        <h1>ENREGISTREMENT DES ANTECEDENTS</h1>
        <div class="col-xl-12">
            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">
                <div class="panel-heading">
                    <h4 class="panel-title"></h4>
                </div>
                <div class="panel-body p-0">
                    <div class="container-fluid">

                        <div class="col-md-12 card-body  table-responsive" id="show_at">
                            <!-- <h3 class="mt-10px">FORMULAIRE D'ENREGISTREMENT DES ANTECEDENTS</h3> -->
                            <div class="col-md-12 card-body  table-responsive" id="show_at">
                                <div class="card-body" style="text-align: center;">
                                    <form method="POST" action="{{route('ante.store')}}">
                                        @csrf
                                        <div class="row">
                                            <div class=" col-md-12 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Matricule:</label>
                                                <select id="matsa" name="MATSA" onchange="fetchperso(this.value);"
                                                    class="smatsa-select2 form-control-sm @error('content') is-invalid @enderror " required>
                                                    <?php $p=App\Models\Personnel::all(); foreach($p as $d){ ?>
                                                    <option value=" <?php echo $d->MATSA ?> ">
                                                        <?php echo $d->MATSA; echo '-' ; echo $d->NOMSA; echo ' '; echo $d->PRESA ?>
                                                    </option>
                                                    <?php }; ?>
                                                </select>
                                            </div>

                                            <div class="col-md-12">
                                                <fieldset>
                                                    <legend>ANTECEDENTS MEDICAUX</legend>
                                                    <div class="row">
                                                                                                
                                                    <div class="col-md-6">
                                                        <fieldset>
                                                            <legend>PERSONNELS</legend>
                                                            <div class="row">
                                                                <div  class="col-md-6 mb-3">
                                                                    <label class="form-label" for="exampleInputPassword1">Hypertension artérielle:</label>
                                                                    <select style="width: 100%;" name="HYPER" id="HYPER" placeholder="" required
                                                                        class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                                        <option value="Non"> Non </option>
                                                                        <option value="Oui"> Oui</option>
                                                                    </select>
                                                                </div>
                                                                                                
                                                                                                
                                                                <div  class="col-md-6 mb-3">
                                                                    <label class="form-label" for="exampleInputPassword1">Hypotension artérielle:</label>
                                                                    <select style="width: 100%;" name="HYPO" id="HYPO" placeholder="" required
                                                                        class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                                        <option value="Non"> Non </option>
                                                                        <option value="Oui"> Oui</option>
                                                                    </select>
                                                                </div>
                                                                                                
                                                                <div  class="col-md-6 mb-3">
                                                                    <label class="form-label" for="exampleInputPassword1">Diabète:</label>
                                                                    <select style="width: 100%;" name="DIABETE" id="DIABETE" placeholder="" required
                                                                        class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                                        <option value="Non"> Non </option>
                                                                        <option value="Oui"> Oui</option>
                                                                    </select>
                                                                </div>
                                                                                                
                                                                <div  class="col-md-6 mb-3">
                                                                    <label class="form-label" for="exampleInputPassword1">Ulcère:</label>
                                                                    <select style="width: 100%;" name="ULCERE" id="ULCERE" placeholder="" required
                                                                        class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                                        <option value="Non"> Non </option>
                                                                        <option value="Oui"> Oui</option>
                                                                    </select>
                                                                </div>
                                                                                                
                                                                <div  class="col-md-6 mb-3">
                                                                    <label class="form-label" for="exampleInputPassword1">Asthme:</label>
                                                                    <select style="width: 100%;" name="ASTHME" id="ASTHME" placeholder="" required
                                                                        class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                                        <option value="Non"> Non </option>
                                                                        <option value="Oui"> Oui</option>
                                                                    </select>
                                                                </div>
                                                                                                
                                                                <div  class="col-md-6 mb-3">
                                                                    <label class="form-label" for="exampleInputPassword1">Sinusite:</label>
                                                                    <select style="width: 100%;" name="SINUSITE" id="SINUSITE" placeholder="" required
                                                                        class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                                        <option value="Non"> Non </option>
                                                                        <option value="Oui"> Oui</option>
                                                                    </select>
                                                                </div>
                                                                                                
                                                                <div  class="col-md-6 mb-3">
                                                                    <label class="form-label" for="exampleInputPassword1">Maladie hémorroïdaire:</label>
                                                                    <select style="width: 100%;" name="HEMOROIDE" id="HEMOROIDE" placeholder="" required
                                                                        class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                                        <option value="Non"> Non </option>
                                                                        <option value="Oui"> Oui</option>
                                                                    </select>
                                                                </div>
                                                                                                
                                                                <div  class="col-md-6 mb-3">
                                                                    <label class="form-label" for="exampleInputPassword1">Epilepsie:</label>
                                                                    <select style="width: 100%;" name="EPILEPSIE" id="EPILEPSIE" placeholder="" required
                                                                        class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                                        <option value="Non"> Non </option>
                                                                        <option value="Oui"> Oui</option>
                                                                    </select>
                                                                </div>
                                                                                                
                                                                <div  class="col-md-6 mb-3">
                                                                    <label class="form-label" for="exampleInputPassword1">Drépanocytose:</label>
                                                                    <select style="width: 100%;" name="DREPANO" id="DREPANO" placeholder="" required
                                                                        class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                                        <option value="Non"> Non </option>
                                                                        <option value="Oui"> Oui</option>
                                                                    </select>
                                                                </div>
                                                                                                
                                                                <div  class="col-md-6 mb-3">
                                                                    <label class="form-label" for="exampleInputPassword1">Hépatite:</label>
                                                                    <select style="width: 100%;" name="HEPATIE" id="HEPATIE" placeholder="" required
                                                                        class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                                        <option value="Non"> Non </option>
                                                                        <option value="Oui"> Oui</option>
                                                                    </select>
                                                                </div>
                                                                                                
                                                                <div  class="col-md-12 mb-3">
                                                                    <label class="form-label" for="exampleInputPassword1">Autres:</label>
                                                                    <textarea class="form-control form-control-sm @error('content') is-invalid @enderror " style="height: auto;"
                                                                        name="AUTRES" id="AUTRES"></textarea>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                                                                
                                                                                                
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                                                                
                                                            <div class="col-md-12">
                                                                <fieldset>
                                                                    <legend>FAMILIAUX</legend>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <fieldset>
                                                                                <legend>Père:</legend>
                                                                                <div class=" mb-3">
                                                                                    <label class="form-label" for="exampleInputPassword1">HTA:</label>
                                                                                    <select style="width: 100%;" name="PHTA" id="PHTA" placeholder="" required
                                                                                        class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                                                        <option value="Non"> Non </option>
                                                                                        <option value="Oui"> Oui</option>
                                                                                    </select>
                                                                                </div>
                                                                                                
                                                                                <div class=" mb-3">
                                                                                    <label class="form-label" for="exampleInputPassword1">Diabète:</label>
                                                                                    <select style="width: 100%;" name="PDIABETE" id="PDIABETE" placeholder="" required
                                                                                        class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                                                        <option value="Non"> Non </option>
                                                                                        <option value="Oui"> Oui</option>
                                                                                    </select>
                                                                                </div>
                                                                                                
                                                                                <div class=" mb-3">
                                                                                    <label class="form-label" for="exampleInputPassword1">Autres:</label>
                                                                                    <!-- <select style="width: 100%;" name="PAUTRE" id="PAUTRE" placeholder="" required
                                                                                        class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                                                        <option value="Non"> Non </option>
                                                                                        <option value="Oui"> Oui</option>
                                                                                    </select> -->
                                                                                    <input type="text" class="stype form-control form-control- sm @error('content') is-invalid @enderror " name="PAUTRE"
                                                                                        id="PAUTRE" placeholder="" required />
                                                                                </div>
                                                                            </fieldset>
                                                                        </div>
                                                                                                
                                                                                                
                                                                        <div class="col-md-6">
                                                                            <fieldset>
                                                                                <legend>Mère:</legend>
                                                                                <div class=" mb-3">
                                                                                    <label class="form-label" for="exampleInputPassword1">HTA:</label>
                                                                                    <select style="width: 100%;" name="MHTA" id="MHTA" placeholder="" required
                                                                                        class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                                                        <option value="Non"> Non </option>
                                                                                        <option value="Oui"> Oui</option>
                                                                                    </select>
                                                                                </div>
                                                                                                
                                                                                <div class=" mb-3">
                                                                                    <label class="form-label" for="exampleInputPassword1">Diabète:</label>
                                                                                    <select style="width: 100%;" name="MDIABETE" id="MDIABETE" placeholder="" required
                                                                                        class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                                                        <option value="Non"> Non </option>
                                                                                        <option value="Oui"> Oui</option>
                                                                                    </select>
                                                                                </div>
                                                                                                
                                                                                <div class=" mb-3">
                                                                                    <label class="form-label" for="exampleInputPassword1">Autres:</label>
                                                                                    <!-- <select style="width: 100%;" name="MAUTRE" id="MAUTRE" placeholder="" required
                                                                                        class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                                                        <option value="Non"> Non </option>
                                                                                        <option value="Oui"> Oui</option>
                                                                                    </select> -->
                                                                                    <input type="text" class="stype form-control form-control- sm @error('content') is-invalid @enderror " name="MAUTRE"
                                                                                        id="MAUTRE" placeholder="" required />
                                                                                </div>
                                                                            </fieldset>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                                                                
                                                            <div class="col-md-6">
                                                                <fieldset>
                                                                    <legend>PROFESSIONNELS</legend>
                                                                    <div class=" mb-3">
                                                                        <label class="form-label" for="exampleInputPassword1">Personnels:</label>
                                                                        <textarea class="form-control form-control-sm @error('content') is-invalid @enderror "
                                                                            style="height: 100px;" name="PEM" id="PEM"></textarea>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                                                                
                                                                                                
                                                            <div class="col-md-6">
                                                                <fieldset>
                                                                    <legend>SOCIAUX</legend>
                                                                    <div class="row">
                                                                        <div class=" mb-3">
                                                                            <label class="form-label" for="exampleInputPassword1">Tabac:</label>
                                                                            <select style="width: 100%;" name="TABAC" id="TABAC" placeholder="" required
                                                                                class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                                                <option value="Non"> Non </option>
                                                                                <option value="Oui"> Oui</option>
                                                                            </select>
                                                                        </div>
                                                                                                
                                                                        <div class=" mb-3">
                                                                            <label class="form-label" for="exampleInputPassword1">Alcool:</label>
                                                                            <select style="width: 100%;" name="ALCOOL" id="ALCOOL" placeholder="" required
                                                                                class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                                                <option value="Non"> Non </option>
                                                                                <option value="Oui"> Oui</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                                                                
                                                    </div>
                                                </fieldset>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                    <fieldset>
                                                        <legend>ANTECEDENTS CHIRURGICAUX</legend>
                                                        <div class="row">
                                                        <div class=" col-md-6 mb-3">
                                                            <label class="form-label" for="exampleInputPassword1">Personnels:</label>
                                                            <textarea class="form-control form-control-sm @error('content') is-invalid @enderror " style="height: 100px;"
                                                                name="PEC" id="PEC"></textarea>
                                                        </div>                                      

                                                        <div class=" col-md-6 mb-3">
                                                            <label class="form-label" for="exampleInputPassword1">Professionnels:</label>
                                                            <textarea class="form-control form-control-sm @error('content') is-invalid @enderror " style="height: 100px;"
                                                                name="PRC" id="PRC"></textarea>
                                                        </div>                                      

                                                        <div class=" col-md-6 mb-3">
                                                            <label class="form-label" for="exampleInputPassword1">Familliaux:</label>
                                                            <textarea class="form-control form-control-sm @error('content') is-invalid @enderror " style="height: 100px;"
                                                                name="FAC" id="FAC"></textarea>
                                                        </div>
                                                        <div class=" col-md-6 mb-3">
                                                            <label class="form-label" for="exampleInputPassword1">SOCIAUX Familiaux:</label>
                                                            <textarea class="form-control form-control-sm @error('content') is-invalid @enderror " style="height: 100px;"
                                                                name="SOF" id="SOF" placeholder="" required></textarea>
                                                        </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
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


<script>
    $(".smatsa-select2").select2();
</script>

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
                $('.sage').val(d - data.lm.DNASA);

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
                    return view('erat');
                    alert('Enrégistrement effectué');
                }
                else {
                    return view('erat');
                    alert('Echec de l\'enregistrement');
                }
            }
        })


    });
</script>

<script>
    $("#DATECONS").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd-mm-yyyy"
    });

    $("#DATEACID").datetimepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd-MM-yyyy hh:mm:ss"
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

    $("#DATE").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd-mm-yyyy"
    });


</script>

<script type="text/javascript">
  $(function() {
    $('#DATEACID').datetimepicker({
      language: 'pt-BR'
    });
  });
</script>

@endsection