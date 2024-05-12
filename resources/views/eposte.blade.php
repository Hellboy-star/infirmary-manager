@extends('def.def', ['titre'=>'ENREGISTREMENT DES POSTES' ])
@section('contenta')

<div id="content" class="app-content">
    <div>
        <h1>ENREGISTREMENT DES POSTES OCCUPES</h1>
        <div class="col-xl-12">

            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">

                <div class="panel-heading">
                    <h4 class="panel-title"></h4>
                </div>

                <div class="panel-body p-0">
                    <div class="container-fluid">
                        <div class="col-md-12 card-body" id="">
                        <div class="card-body">
                                    <form method="POST" action="{{route('poste.store')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Matricule:</label><br>
                                                <select id="matsa" onchange="fetchperso(this.value);"
                                                    class="smatsa-select2 form-control form-control-sm @error('content') is-invalid @enderror " placeholder="" required >
                                                    <?php $p=App\Models\Personnel::all(); foreach($p as $d){ ?>
                                                    <option value=" <?php echo $d->MATSA ?> ">
                                                        <?php echo $d->MATSA; echo '-' ; echo $d->NOMSA; echo ' '; echo $d->PRESA ?>
                                                    </option>
                                                    <?php }; ?>
                                                </select>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Poste:</label><br>
                                                <input class="form-control form-control-sm @error('content') is-invalid @enderror " placeholder="" required name="POSTE" id="POSTE" type="text"  />
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Dénomination:</label><br>
                                                <input class="form-control form-control-sm @error('content') is-invalid @enderror " placeholder="" required name="DENOMINATION" id="DENOMINATION" type="text"  />
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Entreprise:</label><br>
                                                <input class="form-control form-control-sm @error('content') is-invalid @enderror " placeholder="" required name="ENTREPRISE" id="ENTREPRISE" type="text"  />
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Période (Du):</label><br>
                                                <input class="form-control form-control-sm @error('content') is-invalid @enderror " placeholder="" required name="PERIODEDU" id="PERIODEDU" type="date"  />
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Période (Au):</label><br>
                                                <input class="form-control form-control-sm @error('content') is-invalid @enderror " placeholder="" required name="PERIODEAU" id="PERIODEAU" type="date"  />
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Rythme de Travail:</label><br>
                                                <input class="form-control form-control-sm @error('content') is-invalid @enderror " placeholder="" required name="RYTMTAF" id="RYTMTAF" type="text"  />
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Métrologie (Date):</label><br>
                                                <input class="form-control form-control-sm @error('content') is-invalid @enderror " placeholder="" required name="METRODATE" id="METRODATE" type="date"  />
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Métrologie (Type):</label><br>
                                                <input class="form-control form-control-sm @error('content') is-invalid @enderror " placeholder="" required name="METROTYPE" id="METROTYPE" type="text"  />
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Métrologie (R):</label><br>
                                                <input class="form-control form-control-sm @error('content') is-invalid @enderror " placeholder="" required name="METROR" id="METROR" type="text"  />
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Tâches:</label><br>
                                                <textarea  class="form-control form-control-sm @error('content') is-invalid @enderror " placeholder="" required style="height: 100px;" name="TACHES" id="TACHES"></textarea>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Facteurs de Nuisance:</label><br>
                                                <textarea  class="form-control form-control-sm @error('content') is-invalid @enderror " placeholder="" required style="height: 100px;" name="FACTEURNUI" id="FACTEURNUI"></textarea>
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