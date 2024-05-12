@extends('def.def', ['titre'=>'Formulaire Visite Médicale Spéciale' ])
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
                        <!-- <h3 class="mt-10px">FORMULAIRE DE MISE A JOUR</h3> -->
                        <div class="col-md-12 card-body  table-responsive" id="show_vms">
                            <div class="card-body">
                                <div class="row">
                                    <form method="POST" action="{{route('rvms.update', ['id' => $id->id])}}">
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
                                                    name="DATEVMS" id="DATEVMS" required value="{{ $id->DATEVMS }}">
                                            </div>
                                            
                                            <!-- <div class="col-xl-3 mb-3">
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
                                            </div> -->
                                            <!-- <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Age:</label>
                                                <input style="width: 50%;" type="text" name="AGE" id="AGE"
                                                    placeholder="" required value=" {{ $id->datecons }} " class="sage form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div> -->
                                            <!-- <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Taille:</label>
                                                <input style="width: 100%;" type="text" name="TAILLEVMS" id="TAILLEVMS"
                                                    placeholder="" required value=" {{ $id->datecons }} " class="staille form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div> -->
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Poids:</label>
                                                <input style="width: 100%;" type="text" name="POIDSVMS" id="POIDSVMS"
                                                    placeholder="" required value=" {{ $id->POIDSVMS }} " class="spoids form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Type de
                                                    visite:</label>
                                                <select style="width: 100%;" name="TYPVISI" id="TYPVISI" placeholder="" required
                                                    class="stypvisi form-control form-control-sm @error('content') is-invalid @enderror ">
                                                    <option value="D'embauche"> D'embauche </option>
                                                    <option value="Périodique"> Périodique </option>
                                                    <option value="De reprise de Travail"> De reprise de Travail
                                                    </option>
                                                    <option value="A la demande"> A la demande </option>
                                                    <option value="De surveillance spécifique"> De surveillance
                                                        spécifique </option>
                                                    <option value="De fin de contrat"> De fin de contrat </option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Pouls:</label>
                                                <input style="width: 100%;" type="text" name="POULSVMS" id="POULSVMS"
                                                    placeholder="" required value=" {{ $id->POULSVMS }} " class="spouls form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Ta:</label>
                                                <input style="width: 100%;" type="text" name="TAVMS" id="TAVMS" placeholder="" required  value=" {{ $id->TAVMS }} " 
                                                    class="sta form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Pa:</label>
                                                <input style="width: 100%;" type="text" name="PA" id="PA" placeholder="" required  value=" {{ $id->PA }} " 
                                                    class="spa form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Pti:</label>
                                                <input style="width: 100%;" type="text" name="PTI" id="PTI"
                                                    placeholder="" required value=" {{ $id->PTI }} " class="spti form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Pte:</label>
                                                <input style="width: 100%;" type="text" name="PTE" id="PTE"
                                                    placeholder="" required value=" {{ $id->PTE }} " class="spte form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> AV/OD:</label>
                                                <input style="width: 100%;" type="text" name="AVOD" id="AVOD"
                                                    placeholder="" required value=" {{ $id->AVOD }} " class="savod form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> AV/OG:</label>
                                                <input style="width: 100%;" type="text" name="AVOG" id="AVOG"
                                                    placeholder="" required value=" {{ $id->AVOG }} " class="savog form-control form-control-sm @error('content') is-invalid @enderror " />
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Plaintes:</label>
                                                <textarea style="width: 100%;" name="PLAINTESVMS" id="PLAINTESVMS"
                                                    placeholder="" required  rows="4"  class="splaintes form-control form-control-sm @error('content') is-invalid @enderror ">
                                                    {{ $id->PLAINTESVMS }}
                                                </textarea>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Examen
                                                    clinique:</label>
                                                <textarea style="width: 100%;" name="EXAMCLIVMS" id="EXAMCLIVMS"
                                                    placeholder="" required  rows="4"  class="sexamcli form-control form-control-sm @error('content') is-invalid @enderror ">
                                                    {{ $id->EXAMCLIVMS }} 
                                                </textarea>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Bilan:</label>
                                                <textarea style="width: 100%;" name="BILANVMS" id="BILANVMS" placeholder="" required rows="4" 
                                                    class="sbilan form-control form-control-sm @error('content') is-invalid @enderror ">
                                                      {{ $id->BILANVMS }}
                                                </textarea>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Avis
                                                    spécialisé:</label>
                                                <textarea style="width: 100%;" name="AVISP" id="AVISP" placeholder="" required rows="4" 
                                                    class="savisp form-control form-control-sm @error('content') is-invalid @enderror ">
                                                     {{ $id->AVISP }}  
                                                </textarea>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Conclusion
                                                    Médicale:</label>
                                                <textarea style="width: 100%;" name="CONCLMED" id="CONCLMED"
                                                    placeholder="" required  rows="4"  class="sconclmed form-control form-control-sm @error('content') is-invalid @enderror ">
                                                    {{ $id->CONCLMED }}
                                                </textarea>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1"> Aptitude:</label>
                                                <textarea style="width: 100%;" name="APTITUDE" id="APTITUDE"
                                                    placeholder="" required  rows="4"  class="saptitude form-control form-control-sm @error('content') is-invalid @enderror ">
                                                    {{ $id->APTITUDE }}
                                                </textarea>
                                            </div>
                                            <div class="col-xl-3 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">
                                                    Observation:</label>
                                                <textarea style="width: 100%;" type="text" name="OBSERVATIONVMS" id=""
                                                placeholder="" required  rows="4"  class="sobservation form-control form-control-sm @error('content') is-invalid @enderror ">
                                                {{ $id->OBSERVATIONVMS }}
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
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="TABLES" id="TABLES" required value=" Viste médicale spécialisée " hidden >
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="ATABLES" id="ATABLES" required value=" vms " hidden >
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