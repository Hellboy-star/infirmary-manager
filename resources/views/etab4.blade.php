@extends('def.def', ['titre'=>'Formulaire du Chronogramme d\'Exécution du Programme d\'Activité du CHS au titre de l\'Année' ])
@section('contenta')

<div id="content" class="app-content">




    <div>
        <h1>Formulaire du Chronogramme d'Exécution du Programme d'Activité du CHS au titre de l'Année</h1>
        <div class="col-xl-12">

            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">

                <div class="panel-heading">
                    <h4 class="panel-title">Formulaire du Chronogramme d'Exécution du Programme d'Activités du CHS au titre de l'Année</h4>
                </div>


                <div class="panel-body p-0">


                    <div class="container-fluid">

                        <div class="col-md-12 card-body  table-responsive" id="show_at">
                            <h3 class="mt-10px">FORMULAIRE D'ENREGISTREMENT DU CHRONOGRAMME D'EXECUTION DU PROGRAMME D'ACTIVITES DU CHS AU TITRE DE L'ANNEE</h3>
                            <div class="col-md-12 card-body  table-responsive" id="show_at">
                                <div class="card-body">
                                    <form method="POST" action="{{route('formulaire.tab1')}}">
                                        @csrf
                                        <div class="row">

                                        <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Année:</label>
                                                <input type="text" class="sdatecons form-control form-control-sm @error('content') is-invallid @enderror "
                                                     name="ANNEE" id="ANNEE" placeholder="" />
                                            </div>
                                            
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Activites:</label>
                                                <input type="text" class="sdatecons form-control form-control-sm @error('content') is-invallid @enderror "
                                                     name="ACTIVITE" id="ACTIVITE" placeholder="" />
                                            </div>
                                            
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Période d'éxécution:</label>
                                                <input type="text" class="sdatecons form-control form-control-sm @error('content') is-invallid @enderror "
                                                     name="PERIODE" id="PERIODE" placeholder="" />
                                                     
                                            </div>
                                                                                        
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Responsables:</label>
                                                <input type="text" class="sdatecons form-control form-control-sm @error('content') is-invallid @enderror "
                                                     name="RESPONSABLE" id="RESPONSABLE" placeholder="" />
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

                                                <button type="submit" id="add_at"
                                                    class="add_at btn btn-primary">Enregistrer</button>
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
    $("#ANNEE").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy"
    });
</script>

@endsection