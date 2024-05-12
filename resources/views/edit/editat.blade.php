@extends('def.def', ['titre'=>'Formulaire Accident de Travail' ])
@section('contenta')

<div id="content" class="app-content">
 


 
    <div>
        <!-- <h1>Formulaire Accident de Travail</h1> -->
         <div class="col-xl-12">

            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">
 
                <div class="panel-heading">
                    <h4 class="panel-title"></h4>
                 </div>


                 <div class="panel-body p-0">


                     <div class="container-fluid">

                        <div class="col-md-12 card-body  table-responsive" id="show_at">
                             <h3 class="mt-10px">FORMULAIRE DE MISE A JOUR</h3>
                            <div class="col-md-12 card-body  table-responsive" id="show_at">
                                <div class="card-body">
                                     <form method="POST" action="{{route('rat.update', ['id' => $id->id])}}">
                                        @csrf
                                        @method('PUT')
                                         <div class="row">

                                            
                                             <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Matricule:</label>
                                                <select id="matsa" name="MATSA" onchange="fetchperso(this.value);"
                                                     class="smatsa-select2 form-control form-control-sm @error('content') is-invalid @enderror " required>
                                                    <optgroup label="Ancienne valeur:">
                                                        <option value=" {{$id->MATSA}} "> {{$id->MATSA}}</option>
                                                     </optgroup>

                                                    
 
                                                    <optgroup label="Nouvel valeur possible:">
                                                        <?php $p=App\Models\Personnel::all(); foreach($p as $d){ ?>
                                                      <option value=" <?php echo $d->MATSA ?> ">
                                                        <?php echo $d->MATSA; echo '-' ; echo $d->NOMSA; echo ' '; echo $d->PRESA ?>
                                                      </option>
                                                        <?php }; ?>
                                                      </optgroup>
                                                </select>
                                             </div>

                                            <div class="col-xxl-6 mb-3">
                                                  <label class="form-label" for="exampleInputPassword1">Date de
                                                    consultation:</label>
                                                <input type="date" class="sdatecons form-control form-control-sm @error('content') is-invalid @enderror" 
    name="DATECONS" id="DATECONS" required value="{{ $id->DATECONS }}">

                                            </div>
                  
                          <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Date et heure de
                                                    l'accident:</label>
                      
                          <input type="datetime-local" class="sdateacid form-control form-control-sm @error('content') is-invalid @enderror "
                                                     name="DATEACID" id="DATEACID"
                                                      required value="{{ $id->DATEACID }}">
                      
                          <span class="add-on">
                                                    <i data-time-icon="icon-time" data-text-icon="icon-calendar">
                                                    </i>
                      
                          </span>
                                            </div>
                                            <div class="col-xxl-6 mb-3">
                      
                          <label class="form-label" for="exampleInputPassword1">Lieu de
                                                    l'accident:</label>
                                                <input type="text" class="slieu form-control form-control-sm @error('content') is-invalid @enderror "
                      
                              name="LIEU" id="LIEU"   required value=" {{$id->LIEU}} "/>
                                            </div>
                                            <div class="col-xxl-6 mb-3">
                      
                          <label class="form-label" for="exampleInputPassword1">Cause de
                                                    l'accident:</label>
                                                <input type="text" class="scause form-control form-control-sm @error('content') is-invalid @enderror "
                      
                              name="CAUSEAT" id="CAUSEAT"   required value=" {{$id->CAUSEAT}} "/>
                                            </div>
                                            <div class="col-xxl-6 mb-3">
                      
                          <label class="form-label" for="exampleInputPassword1">Nature de
                                                    lésions:</label>
                                                <input type="text" class="snaturelesi form-control form-control-sm @error('content') is-invalid @enderror "
                      
                              name="NATURELESI" id="NATURELESI"   required value=" {{$id->NATURELESI}} "/>
                                            </div>

                      
                      <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">INCAPACITÉ PERMANENTE PARTIELLE (IPP):</label>
                                                <select style="width: 100%;" name="IPP" id="IPP"   required
                      
                              class="sdose form-control form-control-sm @error('content') is-invalid @enderror ">
                                                    <option value=" {{$id->IPP}} "> Ancienne valeur: {{$id->IPP}} </option>
                                                    <option value="PAS IPP "> PAS IPP</option>
                      
                              <option value="PARTIELLE"> PARTIELLE </option>
                                                    <option value="PERMANENTE">PERMANENTE </option>
                                                </select>
                      
                      </div>
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Localisation des
                      
                              lésions:</label>
                                                <input type="text" class="slocalislesi form-control form-control-sm @error('content') is-invalid @enderror "
                                                    name="LOCALISLESI" id="LOCALISLESI"   required value=" {{$id->LOCALISLESI}} "/>
                      
                      </div>
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Date de
                                                    déclaration de
                                                    la
                                                    CNSS:</label>
                                                <input type="date" class="sdate1cnss form-control form-control-sm @error('content') is-invalid @enderror "
                                                    name="DATE1CNSSAT" id="DATE1CNSSAT"   required value="{{ $id->DATE1CNSSAT }}">
                                            </div>
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Date d'avis de la
                                                    CNSS:</label>
                                                <input type="date" class="sdate2cnss form-control form-control-sm @error('content') is-invalid @enderror "
                                                    name="DATE2CNSSAT" id="DATE2CNSSAT"   required value="{{ $id->DATE2CNSSAT }}">
                                            </div>
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Avis de la
                                                    CNSS:</label>
                                                <input type="text" class="saviscnss form-control form-control-sm @error('content') is-invalid @enderror "
                                                    name="AVISCNSSAT" id=" AVISCNSSAT"   required value=" {{$id->AVISCNSSAT}} "/>
                                            </div>
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Nombre de jours
                                                    d'arrêt:</label>
                                                <input type="text" class="snbrarret form-control form-control-sm @error('content') is-invalid @enderror "
                                                    name="NBRARRETAT" id="NBRARRETAT"   required value=" {{$id->NBRARRETAT}} "/>
                                            </div>
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label"
                                                    for="exampleInputPassword1">Traitement:</label>
                                                    <textarea type="text" class="straitement form-control form-control-sm @error('content') is-invalid @enderror "
                                                    name="TRAITEMENTAT" id="TRAITEMENTAT"   required>
                                                    {{$id->TRAITEMENTAT}}
                                                </textarea>
                                            </div>
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Mesure
                                                    correctrice:</label>
                                                <textarea type="text" class="smesecorrect form-control form-control-sm @error('content') is-invalid @enderror "
                                                    name="MESECORRECT" id="MESECORRECT"   required>
                                                    {{$id->MESECORRECT}}
                                                </textarea>
                                            </div>
                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label"
                                                    for="exampleInputPassword1">Observations:</label>
                                                <textarea type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror "
                                                    name="OBSERVATIONAT" id="OBSERVATIONAT" wrap="soft"  required>
                                                     {{$id->OBSERVATIONAT}} 
                                                </textarea>
                                            </div>

                                            <div class="col-xxl-6 mb-3">
                                                <textarea type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror "
                                                    name="NUSERS" id="NUSERS" placeholder=""  required hidden >
                                                    <?php
                                                        use Illuminate\Support\Facades\Auth;
                                                        $na = Auth::user()->name;
                                                        $i = App\models\personnel::Where('MATSA', $na)->first();
                                                        echo $i->PRESA;
                                                        echo ' ';
                                                        echo $i->NOMSA;
                                                    ?> 
                                                </textarea>
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="USERS" id="USERS" required value="{{$id->USERS}} " hidden >
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="AUSERS" id="AUSERS" required value="{{$id->USERS}} " hidden >
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="TID" id="TID" required value=" {{$id->id}}  " hidden >
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="MATSA" id="MATSA" required value=" {{$id->MATSA}}  " hidden >
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="TABLES" id="TABLES" required value=" Accident de travail " hidden >
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="ATABLES" id="ATABLES" required value=" at " hidden >
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="DELETED" id="DELETED" required value="{{$id->DELETED}} " hidden >
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


@endsection