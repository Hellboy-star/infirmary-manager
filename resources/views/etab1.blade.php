@extends('def.def', ['titre'=>'Formulaire du Programme d\'Activité du CHS au titre de l\'Année' ])
@section('contenta')

<div id="content" class="app-content">




    <div>
        <h1>Formulaire du Programme d'Activité du CHS au titre d'une Année</h1>
        <div class="col-xl-12">

            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">

                <div class="panel-heading">
                    <h4 class="panel-title"></h4>
                </div>


                <div class="panel-body p-0">


                    <div class="container-fluid">

                        <div class="col-md-12 card-body  table-responsive" id="show_at">
                            <!-- <h3 class="mt-10px">FORMULAIRE D'ENREGISTREMENT DU PROGRAMME D'ACTIVITE DU CHS AU TITRE D'UNE ANNEE</h3> -->
                            <div class="col-md-12 card-body  table-responsive" id="show_at">
                                <div class="card-body">
                                    <form method="POST" action="{{route('formulaire.tab')}}">
                                        @csrf
                                        <div class="row">

                                        <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Année:</label>
                                                <input type="text" class="sdatecons form-control form-control- sm @error('content') is-invalid @enderror " name="ANNEE" id="ANNEE" placeholder="" required  />
                                                
                                            </div>
                                            
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Axes d'Intervention:</label>
                                                <!-- <input type="text" class="sdatecons form-control form-control- sm @error('content') is-invalid @enderror "
                                                     name="AXE" id="AXE"
                                                    placeholder="" required  /> -->
                                                    <select class="sagen form-select form-select- sm @error('content') is-invalid @enderror " name="AXE">

                                                        <option value="HYGIENE">HYGIENE</option>
                                                        <option value="SECURITE">SECURITE</option>
                                                        <option value="ORGANISATION DU TRAVAIL">ORGANISATION DU TRAVAIL</option>
                                                        <option value="SURVEILLANCE MEDICALE DES TRAVAILLEURS">SURVEILLANCE MEDICALE DES TRAVAILLEURS</option>
                                                        
                                                    </select>
                                            </div>
                                            
                                            
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Objectifs Specifiques:</label>
                                                <input type="text" class="sdatecons form-control form-control- sm @error('content') is-invalid @enderror "
                                                     name="OBJECTIF" id="OBJECTIF"
                                                    placeholder="" required  />
                                            </div>
                                            
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Activites:</label>
                                                <input type="text" class="sdatecons form-control form-control- sm @error('content') is-invalid @enderror "
                                                     name="ACTIVITE" id="ACTIVITE"
                                                    placeholder="" required  />
                                            </div>
                                            
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Période d'éxécution:</label>
                                                <!-- <input type="text" class="sdatecons form-control form-control- sm @error('content') is-invalid @enderror "
                                                     name="PERIODE" id="PERIODE"
                                                    placeholder="" required  /> -->
                                                    <div class="input-group" id="PERIODE">
                                                      <input type="text" name="PERIODE" class="form-control" value="" placeholder="click to select the date range" />
                                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                            </div>
                                            
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Indicateurs de suivi:</label>
                                                <input type="text" class="sdatecons form-control form-control- sm @error('content') is-invalid @enderror "
                                                     name="INDICATEUR" id="INDICATEUR"
                                                    placeholder="" required  />
                                            </div>
                                            
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Source de Vérification:</label>
                                                <input type="text" class="sdatecons form-control form-control- sm @error('content') is-invalid @enderror "
                                                     name="SOURCE" id="SOURCE"
                                                    placeholder="" required  />
                                            </div>
                                            
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Cout:</label>
                                                <input type="text" class="sdatecons form-control form-control- sm @error('content') is-invalid @enderror "
                                                     name="COUT" id="COUT"
                                                    placeholder="" required  />
                                            </div>
                                            
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Responsables:</label>
                                                <input type="text" class="sdatecons form-control form-control- sm @error('content') is-invalid @enderror "
                                                     name="RESPONSABLE" id="RESPONSABLE"
                                                    placeholder="" required  />
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
    $(". sm @error('content') is-invalid @enderror atsa-select2").select2();
</script>
<script>
    $("#ANNEE").datepicker({
        todayHighlight: true,
        autoclose: true,
        format: "yyyy"
    });
</script>

<script>
  $("#PERIODE").daterangepicker({
    opens: "right",
    format: "DD/MM/YYYY",
    separator: " à ",
    startDate: moment(),
    endDate: moment().subtract("days", 365),
    minDate: Date.now(),
    maxDate: "12/31/3000",
  }, function (start, end) {
    $("#PERIODE input").val(start.format("DD MMMM YYYY") + " - " + end.format("DD MMMM YYYY"));
  });
</script>

@endsection