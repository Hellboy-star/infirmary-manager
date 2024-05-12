@extends('def.def', ['titre'=>'Formulaire Consultation Spontanée' ])
@section('contenta')

<div id="content" class="app-content">

    <div>
        <h1>FORMULAIRE DE MISE A JOUR</h1>
        <div class="col-xl-12">
            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">

                <div class="panel-heading">
                    <h4 class="panel-title"> </h4>
                </div>


                <div class="panel-body p-0">


                    <div class="container-fluid">

                        <div class="col-md-12 card-body  table-responsive" id="show_at">
                            <!-- <h3 class="mt-10px">FORMULAIRE D'ENREGISTREMENT DES CONSULTATIONS SPONTANEES</h3> -->
                            <div class="col-md-12 card-body  table-responsive" id="show_cs">
                                <div class="card-body">
                                    <div class="row">
                                        <form method="POST" action="{{route('rcs.update', ['id' => $id->id])}}">
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
                                                <!-- <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1"> IT:</label>
                                                    <input style="width: 100%;" type="text" name="IT" id=""
                                                        placeholder="" required value=" {{ $id->datecons }} " class="sit form-control form-control-sm @error('content') is-invalid @enderror "
                                                        readonly />
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">Nom:</label>
                                                    <input style="width:75%" type="text"
                                                        class="snomsa form-control form-control-sm @error('content') is-invalid @enderror " id="NOMSA"
                                                        placeholder="" required value=" {{ $id->datecons }} " readonly />
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label"
                                                        for="exampleInputPassword1">Prénoms:</label>
                                                    <input style="width:75%" type="text"
                                                        class="spresa form-control form-control-sm @error('content') is-invalid @enderror " name="PRESA"
                                                        id="PRESA" placeholder="" required value=" {{ $id->datecons }} " readonly />
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">Sexe:</label>
                                                    <input style="width:75%" type="text"
                                                        class="ssexsa form-control form-control-sm @error('content') is-invalid @enderror " name="SEXSA"
                                                        id="SEXSA" placeholder="" required value=" {{ $id->datecons }} " readonly />
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Poste:</label>
                                                    <input  type="text" name="POSTE" id="POSTE"
                                                        placeholder="" required value=" {{ $id->datecons }} " class="sposte form-control form-control-sm @error('content') is-invalid @enderror "
                                                        readonly />
                                                </div> -->
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1"> Date de
                                                        Consultation:</label>
                                                    <input type="date" class="sdatecons form-control form-control-sm @error('content') is-invalid @enderror" 
                                                        name="DATECS" id="DATECS" required value="{{ $id->DATECS }}">
                                                </div>
                                                <!-- <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1"> Age:</label>
                                                    <input  type="text" name="AGE" id="AGE"
                                                        placeholder="" required value=" {{ $id->datecons }} " class="sage form-control form-control-sm @error('content') is-invalid @enderror " />
                                                </div> -->
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Poids:</label>
                                                    <input  type="text" name="POIDSCS" id=""
                                                        placeholder="" required value=" {{ $id->POIDSCS }} " class="spoids form-control form-control-sm @error('content') is-invalid @enderror " />
                                                </div>
                                                <!-- <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Taille:</label>
                                                    <input  type="text" name="TAILLECS" id=""
                                                        placeholder="" required value=" {{ $id->datecons }} " class="staille form-control form-control-sm @error('content') is-invalid @enderror " />
                                                </div> -->
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1"> T°:</label>
                                                    <input  type="text" name="TCS" id="" placeholder="" required value=" {{ $id->TCS }} " 
                                                        class="st form-control form-control-sm @error('content') is-invalid @enderror " />
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Pouls:</label>
                                                    <input  type="text" name="POULSCS" id=""
                                                        placeholder="" required value=" {{ $id->POULSCS }} " class="spouls form-control form-control-sm @error('content') is-invalid @enderror " />
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1"> Ta:</label>
                                                    <input  type="text" name="TACS" id=""
                                                        placeholder="" required value=" {{ $id->TACS }} " class="sta form-control form-control-sm @error('content') is-invalid @enderror " />
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Plaintes:</label>
                                                    <textarea  type="text" name="PLAINTESCS" id=""
                                                        placeholder="" required rows="3"
                                                        class="splaintes form-control form-control-sm @error('content') is-invalid @enderror ">
                                                        {{ $id->PLAINTESCS }}
                                                    </textarea>
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1"> Examen
                                                        Clinique:</label>
                                                    <textarea  type="text" name="EXAMCLICS" id=""
                                                        placeholder="" required rows="3"
                                                        class="sexamcli form-control form-control-sm @error('content') is-invalid @enderror ">
                                                        {{ $id->EXAMCLICS }}
                                                    </textarea>
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Bilan:</label>
                                                    <textarea  type="text" name="BILAN" id=""
                                                        placeholder="" required rows="3"
                                                        class="sbilan form-control form-control-sm @error('content') is-invalid @enderror ">
                                                        {{ $id->BILAN }}
                                                    </textarea>
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Diagnostic:</label>
                                                    <textarea  type="text" name="DIAGNOSTIC" id=""
                                                        placeholder="" required rows="3"
                                                        class="sdiagnostic form-control form-control-sm @error('content') is-invalid @enderror ">
                                                        {{ $id->DIAGNOSTIC }}
                                                    </textarea>
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Traitement:</label>
                                                    <textarea  type="text" name="TRAITEMENTCS" id=""
                                                        placeholder="" required rows="3"
                                                        class="straitement form-control form-control-sm @error('content') is-invalid @enderror ">
                                                        {{ $id->TRAITEMENTCS }}
                                                    </textarea>
                                                </div>
                                                <div class="col-xl-3 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Observation:</label>
                                                    <textarea  type="text" name="OBSERVATIONCS" id=""
                                                        placeholder="" required rows="3"
                                                        class="sobservation form-control form-control-sm @error('content') is-invalid @enderror ">
                                                        {{ $id->OBSERVATIONCS }}
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
                                                </textarea>
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="AUSERS" id="AUSERS" required value="{{$id->USERS}} " hidden >
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="TID" id="TID" required value=" {{$id->id}}  " hidden >
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="MATSA" id="MATSA" required value=" {{$id->MATSA}}  " hidden >
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="TABLES" id="TABLES" required value=" Consultation spontanée " hidden >
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="ATABLES" id="ATABLES" required value=" cs " hidden >
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

@endsection