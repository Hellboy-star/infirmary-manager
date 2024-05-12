@extends('def.def', ['titre'=>'Formulaire de demande d\'Absence' ])
@section('contenta')

<div id="content" class="app-content">
    <div>
        <h1>FORMULAIRE DES ABSENCES</h1>
        <div class="col-xl-12">

            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">

                <div class="panel-heading">
                    <h4 class="panel-title"></h4>
                </div>


                <div class="panel-body p-0">


                    <div class="container-fluid">

                        <div class="col-md-12 card-body  table-responsive" id="show_at">
                            <!-- <h3 class="mt-10px">FORMULAIRE D'ENREGISTREMENT DES DEMANDES D'ABSENCE</h3> -->
                            <div class="col-md-12 card-body  table-responsive" id="show_at">
                                <div class="card-body">
                                    <form method="POST" action="{{route('absent.store')}}">
                                        @csrf
                                        <div class="row">

                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Matricule:</label>
                                                <select id="matsa" name="MATSA" onchange="fetchperso(this.value);"
                                                    class="smatsa-select2 form-control" required>
                                                    <?php $p=App\Models\Personnel::all(); foreach($p as $d){ ?>
                                                    <option value=" <?php echo $d->MATSA ?> ">
                                                        <?php echo $d->MATSA; echo '-' ; echo $d->NOMSA; echo ' '; echo $d->PRESA ?>
                                                    </option>
                                                    <?php }; ?>
                                                </select>
                                            </div>

                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label"
                                                    for="exampleInputPassword1">Type:</label>
                                                <input type="text" class="stype form-control form-control- sm @error('content') is-invalid @enderror "
                                                    name="TYPEABS" id="TYPEABS" placeholder="" required />
                                            </div>
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label"
                                                    for="exampleInputPassword1">Cause:</label>
                                                <input type="text" class="scause form-control form-control- sm @error('content') is-invalid @enderror "
                                                    name="CAUSE" id="CAUSE" placeholder="" required />
                                            </div>
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label"
                                                    for="exampleInputPassword1">Debut:</label>
                                                <input type="date" data-date-format="dd-mm-yyyy" class="sdebut form-control form-control- sm @error('content') is-invalid @enderror "
                                                    name="DEBUT" id="DEBUT" placeholder="" required />
                                            </div>
                                            <!-- <div class="col-xxl-6 mb-3">
                                                <label class="form-label"
                                                    for="exampleInputPassword1">Reprise:</label>
                                                <input type="date" data-date-format="dd-mm-yyyy" class="sreprise form-control form-control- sm @error('content') is-invalid @enderror "
                                                    name="REPRISE" id="REPRISE" placeholder="" required readonly />
                                            </div> -->
                                            
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label"
                                                    for="exampleInputPassword1">Nbre de Jours d'Arret:</label>
                                                <input type="text" class="snbrarret form-control form-control- sm @error('content') is-invalid @enderror "
                                                    name="NBRARRET" id="NBRARRET" placeholder="" />
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


<!-- script -->
<script>
  $("#default-daterange").daterangepicker({
    opens: "right",
    format: "MM/DD/YYYY",
    separator: " to ",
    // startDate: moment().subtract("days", 29),
    // endDate: moment(),
    // minDate: "01/01/2021",
    // maxDate: "12/31/2021",
  }, function (start, end) {
    $("#default-daterange input").val(start.format("D - MMMM - YYYY") + " - " + end.format("D - MMMM - YYYY"));
  });
  d= endDate - startDate;
  $("#NBRARRET").val(startDate -  endDate);
  console.log(d);
</script>

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
</script> -->

@endsection