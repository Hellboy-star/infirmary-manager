@extends('def.def', ['titre'=>'FORMULAIRE DE MISE A JOUR CONVOCATION' ])
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
                            <!-- <h3 class="mt-10px">FORMULAIRE DE CONVOCATION</h3> -->
                            <div class="col-md-12 card-body  table-responsive" id="show_at">
                                <div class="card-body">
                                    <form method="POST" action="{{route('convoc.update', ['id' => $id->id])}}">
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
                                                <label class="form-label" for="exampleInputPassword1">Date d'émission:</label>
                                                
                                                <input type="date" class="sdatecons form-control form-control-sm @error('content') is-invalid @enderror" 
                                                    name="DATEEMIS" id="DATEEMIS" required value="{{ $id->DATEEMIS }}">
                                            </div>

                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Date de convocation:</label>
                                                <input type="date" class="sdatecons form-control form-control-sm @error('content') is-invalid @enderror" 
                                                    name="DATECONVOC" id="DATECONVOC" required value="{{ $id->DATECONVOC }}">
                                            </div>

                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label" for="exampleInputPassword1">Date de présentation:</label>
                                                <input type="date" class="sdatecons form-control form-control-sm @error('content') is-invalid @enderror" 
                                                    name="DATEPRES" id="DATEPRES" required value="{{ $id->DATEPRES }}">
                                            </div>

                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label"
                                                    for="exampleInputPassword1">Motif:</label>
                                                <textarea type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror "
                                                    name="MOTIF" id="MOTIF" placeholder="" required>
                                                    {{ $id->MOTIF }} 
                                                </textarea>
                                            </div>

                                            <div class="col-xxl-6 mb-3">
                                                <label class="form-label"
                                                    for="exampleInputPassword1">Observations:</label>
                                                <textarea type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror "
                                                    name="OBSERVATION" id="OBSERVATION" placeholder="" required>
                                                     {{ $id->OBSERVATION }} 
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
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="TABLES" id="TABLES" required value=" Convocation " hidden >
                                                <input type="text" class="sobservation form-control form-control-sm @error('content') is-invalid @enderror " name="ATABLES" id="ATABLES" required value=" convocation " hidden >
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