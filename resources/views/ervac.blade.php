@extends('def.def', ['titre'=>'Formulaire Vaccination' ])
@section('contenta')

<div id="content" class="app-content">




    <div>
        <h1>FORMULAIRE DE VACCINATION</h1>
        <div class="col-xl-12">

            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">

                <div class="panel-heading">
                    <h4 class="panel-title"></h4>
                </div>
                <div class="panel-body p-0">
                    <div class="container-fluid">
                        <div class="col-md-12 card-body  table-responsive" id="show_at">
                        <!-- <h3 class="mt-10px">FORMULAIRE D'ENREGISTREMENT DES VACCINATIONS</h3> -->
                        <div class="col-md-12 card-body  table-responsive" id="show_vac">
                            <div class="card-body">
                                <div class="row">
                                    <form method="POST" action="{{route('vac.store')}}">
                                        @csrf
                                        <div class="row">
                                            <!-- <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Date
                                                    d'Enregistrement:</label>
                                                <input style="width: 100%;" type="text" name="DATE" id="DATE"
                                                    placeholder="" required class="sdate form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div> -->
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
                                            <!-- <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> IT:</label>
                                                <input style="width: 100%;" type="text" name="IT" id="" placeholder="" required
                                                    class="sit form-control form-control-sm @error('content') is-invalid @enderror " readonly />
                                            </div>
                                            <div class="col-xl-3 mb-3">
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
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Age:</label>
                                                <input style="width: 100%;" type="text" name="AGE" id="" placeholder="" required
                                                    class="sage form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div> -->
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Date de la
                                                    Dose:</label>
                                                <input style="width: 100%;" type="date" name="DATEDOSE" id="DATEDOSE"
                                                    placeholder="" required class="sdatedose form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Date
                                                    d'Expiration:</label>
                                                <input style="width: 100%;" type="date" name="DATEEXP" id="DATEEXP"
                                                    placeholder="" required class="sdateexp form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Date de la
                                                    Prochaine Vaccination:</label>
                                                <input style="width: 100%;" type="date" name="DATE" id="DATE"
                                                    placeholder="" required class="sdateproch form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Vaccin:</label>
                                                <input style="width: 100%;" type="text" name="VACCIN" id="VACCIN"
                                                    placeholder="" required class="svaccin form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Numéro du
                                                    Lot:</label>
                                                <input style="width: 100%;" type="text" name="LOT" id="LOT"
                                                    placeholder="" required class="slot form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Type de
                                                    Vaccin:</label>
                                                <input style="width: 100%;" type="text" name="TYPE" id="TYPE"
                                                    placeholder="" required class="stype form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Dose:</label>
                                                <select style="width: 100%;" name="DOSE" id="DOSE" placeholder="" required
                                                    class="sdose form-control form-control-sm @error('content') is-invalid @enderror ">
                                                    <option value="1ère dose"> 1ère dose </option>
                                                    <option value="2ième dose"> 2ième dose </option>
                                                    <option value="Autre dose"> Autre dose </option>
                                                </select>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Nom du Centre de
                                                    Vaccination:</label>
                                                <input style="width: 100%;" type="text" name="CENTRE" id="CENTRE"
                                                    placeholder="" required class="scentre form-control form-control-sm @error('content') is-invalid @enderror " />
                                                    
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
    $("#DATECONS").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy-mm-dd"
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

    $("#DATEPROCH").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd-mm-yyyy"
    });

</script> -->

@endsection