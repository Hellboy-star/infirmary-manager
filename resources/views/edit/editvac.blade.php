@extends('def.def', ['titre'=>'Formulaire Vaccination' ])
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
                        <!-- <h3 class="mt-10px">FORMULAIRE DE MISE A JOUR</h3> -->
                        <div class="col-md-12 card-body  table-responsive" id="show_vac">
                            <div class="card-body">
                                <div class="row">
                                    <form method="POST" action="{{route('vac.update', ['id' => $id->id])}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <!-- <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Date
                                                    d'Enregistrement:</label>
                                                <input style="width: 100%;" type="text" name="DATE" id="DATE"
                                                    placeholder="" required value=" {{ $id->datecons }} " class="sdate form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div> -->
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
                                                <label class="form-label" for="exampleInputPassword1"> Age:</label>
                                                <input style="width: 100%;" type="text" name="AGE" id="" placeholder="" required
                                                    class="sage form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div> -->
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Date de la
                                                    Dose:</label>
                                                <input type="date" class="sdatecons form-control form-control-sm @error('content') is-invalid @enderror" 
                                                    name="DATEDOSE" id="DATEDOSE" required  value="{{ $id->DATEDOSE }}">
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Date
                                                    d'Expiration:</label>
                                                <input type="date" class="sdatecons form-control form-control-sm @error('content') is-invalid @enderror" 
                                                    name="DATEEXP" id="DATEEXP" required  value="{{ $id->DATEEXP }}">
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Date de la
                                                    Prochaine Vaccination:</label>
                                                <input type="date" class="sdatecons form-control form-control-sm @error('content') is-invalid @enderror" 
                                                    name="DATE" id="DATE" required  value="{{ $id->DATE }}">
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Vaccin:</label>
                                                <input style="width: 100%;" type="text" name="VACCIN" id="VACCIN"
                                                    placeholder="" required value=" {{ $id->VACCIN }} " class="svaccin form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Numéro du
                                                    Lot:</label>
                                                <input style="width: 100%;" type="text" name="LOT" id="LOT"
                                                    placeholder="" required value=" {{ $id->LOT }} " class="slot form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Type de
                                                    Vaccin:</label>
                                                <input style="width: 100%;" type="text" name="TYPE" id="TYPE"
                                                    placeholder="" required value=" {{ $id->TYPE }} " class="stype form-control form-control-sm @error('content') is-invalid @enderror " />
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
                                                    placeholder="" required value=" {{ $id->CENTRE }} " class="scentre form-control form-control-sm @error('content') is-invalid @enderror " />
                                                    
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
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="TABLES" id="TABLES" required value=" Vaccination " hidden >
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="ATABLES" id="ATABLES" required value=" vac " hidden >
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