@extends('def.def', ['titre'=>'Formulaire des soins des familles' ])
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
                            <!-- <h3 class="mt-10px">FORMULAIRE D'ENREGISTREMENT DES SOINS DES FAMILLES</h3> -->
                            <div class="col-md-12 card-body  table-responsive" id="show_cs">
                                <div class="card-body">
                                    <div class="row">
                                        <form method="POST" action="{{route('soinfam.update', ['id' => $id->id])}}">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">

                                                <div class="col-xxl-4 mb-3">
                                                    <label class="form-label"
                                                        for="exampleInputPassword1">Nom et Prénoms:</label>
                                                    <select id="matsa" name="NOMPRE" onchange="fetchperso(this.value);"
                                                        class="snom-select2 form-control form-control-sm @error('content') is-invalid @enderror " required>
                                                        <?php $p=App\Models\Personnelfam::all(); foreach($p as $d){ ?>
                                                        <option value=" <?php echo $d->NOMFA; echo ' '; echo $d->PREFA ?> ">
                                                            <?php echo $d->NOMFA; echo ' '; echo $d->PREFA ?>
                                                        </option>
                                                        <?php }; ?>
                                                    </select>
                                                </div>

                                                <!-- <div class="col-xxl-2 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1"> Date de
                                                        Consultation:</label>
                                                    <input  type="date" name="DATESOIN" id=""
                                                        placeholder="" required class="datecs form-control form-control-sm @error('content') is-invalid @enderror " />
                                                </div> -->

                                                <div class="col-xxl-2 mb-3">
                                                <label class="form-label"
                                                    for="exampleInputPassword1">Date de
                                                        Consultation:</label>
                                                <input type="date" class="sdatecons form-control form-control-sm @error('content') is-invalid @enderror" 
                                                    name="DATESOIN" id="DATESOIN" required value="{{ $id->DATESOIN }}">
                                            </div>
                                                
                                                <div class="col-xxl-2 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Température:</label>
                                                    <input  type="text" name="TEMPSOIN" id=""
                                                        placeholder="" required class="stempsoin form-control form-control-sm @error('content') is-invalid @enderror " value="{{$id->TEMPSOIN}} "/>
                                                </div>
                                                <div class="col-xxl-2 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Poids:</label>
                                                    <input  type="text" name="POIDSOIN" id=""
                                                        placeholder="" required class="spoids form-control form-control-sm @error('content') is-invalid @enderror " value="{{$id->POIDSOIN}} "/>
                                                </div>
                                                
                                                <div class="col-xxl-2 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Pouls:</label>
                                                    <input  type="text" name="POULSOIN" id=""
                                                        placeholder="" required class="spouls form-control form-control-sm @error('content') is-invalid @enderror " value="{{$id->POULSOIN}} "/>
                                                </div>
                                                
                                                <div class="col-xxl-6 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Plaintes:</label>
                                                    <textarea  type="text" name="PLAINTESOIN" id=""
                                                        placeholder="" required
                                                        class="splaintes form-control form-control-sm @error('content') is-invalid @enderror ">{{$id->PLAINTESOIN}}
                                                    </textarea>
                                                </div>
                                                <div class="col-xxl-6 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1"> Examen
                                                        Clinique:</label>
                                                    <textarea  type="text" name="EXAMSOIN" id=""
                                                        placeholder="" required
                                                        class="sexamcli form-control form-control-sm @error('content') is-invalid @enderror ">{{$id->EXAMSOIN}}
                                                    </textarea>
                                                </div>
                                                <div class="col-xxl-6 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Bilan:</label>
                                                    <textarea  type="text" name="BILANSOIN" id=""
                                                        placeholder="" required
                                                        class="sbilan form-control form-control-sm @error('content') is-invalid @enderror ">{{$id->BILANSOIN}}
                                                    </textarea>
                                                </div>
                                                <div class="col-xxl-6 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Diagnostic:</label>
                                                    <textarea  type="text" name="DIAGNOSTICSOIN" id=""
                                                        placeholder="" required
                                                        class="sdiagnostic form-control form-control-sm @error('content') is-invalid @enderror ">{{$id->DIAGNOSTICSOIN}}
                                                    </textarea>
                                                </div>
                                                <div class="col-xxl-6 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Traitement:</label>
                                                    <textarea  type="text" name="TRAITEMENTSOIN" id=""
                                                        placeholder="" required
                                                        class="straitement form-control form-control-sm @error('content') is-invalid @enderror ">{{$id->TRAITEMENTSOIN}}
                                                    </textarea>
                                                </div>
                                                <div class="col-xxl-6 mb-3">
                                                    <label class="form-label" for="exampleInputPassword1">
                                                        Observation:</label>
                                                    <textarea  type="text" name="OBSERVATIONSOIN" id=""
                                                        placeholder="" required
                                                        class="sobservation form-control form-control-sm @error('content') is-invalid @enderror ">{{$id->OBSERVATIONSOIN}}
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
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="TABLES" id="TABLES" required value=" Soin " hidden >
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="ATABLES" id="ATABLES" required value=" Soin " hidden >
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




<script></script>
<script></script>

<script>
    $(".snom-select2").select2();
</script>
<script>
    $("#masked-input-date").mask("99/99/9999");
    $("#nbr").mask("999");
</script>

@endsection