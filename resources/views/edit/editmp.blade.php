@extends('def.def', ['titre'=>'Formulaire Maladie Professionnelle' ])
@section('contenta')

<div id="content" class="app-content">




    <div>
        <h1>FORMULAIRE DE MISE A JOUR</h1>
        <div class="col-xl-12">

            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">

                <div class="panel-heading">
                    <h4 class="panel-title"></h4>
                </div>


                <div class="panel-body p-0">


                    <div class="container-fluid">

                        <div class="col-md-12 card-body  table-responsive" id="show_at">
                        <!-- <h3 class="mt-10px">FORMULAIRE D'ENREGISTREMENT DES MALADIES PROFESSIONNELLES</h3> -->
                        <div class="col-md-12 card-body  table-responsive" id="show_mp">
                            <div class="card-body">
                                <div class="row">
                                    <form method="POST" action="{{route('rmp.update', ['id' => $id->id])}}">
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
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Date de
                                                    Consultation:</label>
                                                <input type="date" class="sdatecons form-control form-control-sm @error('content') is-invalid @enderror" 
                                                        name="DATEMP" id="DATEMP" required value="{{ $id->DATEMP }}">
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
                                                    placeholder="" required value=" {{ $id->datecons }} " readonly />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Prénoms:</label>
                                                <input style="width:75%" type="text"
                                                    class="spresa form-control form-control-sm @error('content') is-invalid @enderror " name="PRESA" id="PRESA"
                                                    placeholder="" required value=" {{ $id->datecons }} " readonly />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Sexe:</label>
                                                <input style="width:75%" type="text"
                                                    class="ssexsa form-control form-control-sm @error('content') is-invalid @enderror " name="SEXSA" id="SEXSA"
                                                    placeholder="" required value=" {{ $id->datecons }} " readonly />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Poste:</label>
                                                <input style="width: 50%;" type="text" name="POSTE" id="POSTE"
                                                    placeholder="" required value=" {{ $id->datecons }} " class="sposte form-control form-control-sm @error('content') is-invalid @enderror "
                                                    readonly />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Ancienneté au
                                                    poste:</label>
                                                <input style="width: 100%;" type="text" name="NBRSA" id=""
                                                    placeholder="" required value=" {{ $id->datecons }} " class="snbrsa form-control form-control-sm @error('content') is-invalid @enderror "
                                                    readonly />
                                            </div> -->
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Maladie
                                                    Professionnelle / N°
                                                    Tableau:</label>
                                                <input style="width: 100%;" type="text" name="MPNUMTAB" id=""
                                                    placeholder="" required value=" {{ $id->MPNUMTAB }} " class="smpnumtab form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Maladie
                                                    Professionnelle /
                                                    Désignation:</label>
                                                <input style="width: 100%;" type="text" name="MPDESIGNATION" id=""
                                                    placeholder="" required value=" {{ $id->MPDESIGNATION }} "
                                                    class="smpdesignation form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Maladie à
                                                    caractère
                                                    professionnelle:</label>
                                                <input style="width: 100%;" type="text" name="MALCARAPRO" id=""
                                                    placeholder="" required value=" {{ $id->MALCARAPRO }} " class="smalcarapro form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Agent pathogène
                                                    suspecté:</label>
                                                <input style="width: 100%;" type="text" name="AGENTPATH" id=""
                                                    placeholder="" required value=" {{ $id->AGENTPATH }} " class="sagentpath form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Date de
                                                    déclaration
                                                    CNSS:</label>
                                                <input type="date" class="sdatecons form-control form-control-sm @error('content') is-invalid @enderror" 
                                                    name="DATE1CNSSMP" id="DATE1CNSSMP" required value="{{ $id->DATE1CNSSMP }}">
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Date d'avis
                                                    CNSS:</label>
                                                <input type="date" class="sdatecons form-control form-control-sm @error('content') is-invalid @enderror" 
                                                    name="DATE2CNSSMP" id="DATE2CNSSMP" required value="{{ $id->DATE2CNSSMP }}">
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Avis de la
                                                    CNSS:</label>
                                                <textarea style="width: 100%;" type="text" name="AVISCNSSMP" id=""
                                                    placeholder="" required rows="4"   class="saviscnss form-control form-control-sm @error('content') is-invalid @enderror ">
                                                    {{ $id->AVISCNSSMP }}
                                                </textarea>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">
                                                    Traitement:</label>
                                                <textarea style="width: 100%;" type="text" name="TRAITEMENTMP" id=""
                                                    placeholder="" required rows="4"   class="straitement form-control form-control-sm @error('content') is-invalid @enderror ">
                                                    {{ $id->TRAITEMENTMP }}
                                                </textarea>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">
                                                    Observation:</label>
                                                <textarea style="width: 100%;" type="text" name="OBSERVATIONMP" id=""
                                                    placeholder="" required rows="4"  class="sobservation form-control form-control-sm @error('content') is-invalid @enderror ">
                                                    {{ $id->OBSERVATIONMP }}
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
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="TABLES" id="TABLES" required value=" Maladie professionnelle " hidden >
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="ATABLES" id="ATABLES" required value=" mp " hidden >
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
</div>



<script>
  $(".smatsa-select2").select2();
</script>

<script>
    $(".bdefault-select2").select2();
</script>

@endsection