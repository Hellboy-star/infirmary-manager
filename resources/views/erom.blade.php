@extends('def.def', ['titre'=>'Formulaire Ordonnance Médicale' ])
@section('contenta')

<div id="content" class="app-content">




    <div>
        <h1>FORMULAIRE DES ORDONNANCES </h1>
        <div class="col-xl-12">

            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">

                <div class="panel-heading">
                    <h4 class="panel-title"></h4>
                </div>


                <div class="panel-body p-0">


                    <div class="container-fluid">

                        <div class="col-md-12 card-body  table-responsive" id="show_om">
                        <!-- <h3 class="mt-10px">FORMULAIRE D'ENREGISTREMENTS D'ORDONNANCE MEDICALE</h3> -->
                        <div class="col-md-12 card-body  table-responsive" id="show_om">
                            <div class="card-body">
                                <form method="POST" action="{{route('rom.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                    <div class="col-xl-3 mb-3">
                                                <label for="exampleInputPassword1">Matricule:</label>
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
                                            <label for="exampleInputPassword1">Date de
                                                délivrance:</label>
                                            <input type="date"
                                                class="sdate form-control form-control-sm @error('content') is-invalid @enderror " data-date-end-date="0d"
                                                name="DATE" id="DATE" placeholder="" required />
                                        </div>

                                        <div class="col-xl-3 mb-3">
                                            <label for="exampleInputPassword1">Ordonnance scannée:</label>
                                            <input type="file" id="file" name="FILE" class="sdate form-control form-control-sm @error('content') is-invalid @enderror " />
                                                    
                                        </div>

                                        <!-- <div class="">
                                            <label for="exampleInputPassword1">Ordonnance:</label>
                                            <textarea class="textarea form-control" style="background-color: beige;"
                                                id="ordonnance" name="ORDONNANCE" placeholder="Enter text ..." rows="12">
                                        </textarea>
                                        </div> -->

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
<!-- 
<script>


    $("#masked-input-date").mask("99/99/9999");
    $("#nplace").mask("99");
    function fetchperso(id) {
        //alert(id);
        
        const d = new Date();
        
        var p_id = id;
        $('.snomsa').html('');
        $('.spresa').html('');
        $('.ssexsa').html('');
        $('.sposte').html('');
        $('.sit').html('');
        $('.snbrsa').html('');
        $('.sage').html('');
        console.log(p_id);
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

    $("#DATE").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "dd-mm-yyyy"
    });

</script>


<script>
    $('#ordonnance').wysihtml5();
</script>
 -->

@endsection