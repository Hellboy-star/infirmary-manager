@extends('def.def', ['titre'=>'REGISTRES' ])
@section ('contenta')

<div id="content" class="app-content">


    <h1 style="text-align: center;" class="page-header mt-10px"><strong>REGISTRES</strong></h1>

    <div class="row">
        <div class="">

            <div class="">

                <div class="panel-heading p-0">

                    <div class="tab-overflow">
                        <ul class="nav nav-pills mb-2">
                            <li class="nav-item">
                                <a href="#nav-pills-tab-1" data-bs-toggle="tab" class="nav-link active">
                                    <span class="d-sm-none">ACCIDENT DE TRAVAIL </span>
                                    <span class="d-sm-block d-none">ACCIDENT DE TRAVAIL
                                        &nbsp; &nbsp;(<?php
							                $a=App\Models\At::where('deleted', '!=', 'invalide')
							 ->count();
							                echo $a;
						                ?>)
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-2" data-bs-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">CONSULTATION SPONTANEES</span>
                                    <span class="d-sm-block d-none">CONSULTATION SPONTANEES
                                        &nbsp; &nbsp;(<?php
							                $a=App\Models\Cs::where('deleted', '!=', 'invalide')
							 ->count();
							                echo $a;
						                ?>)
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-3" data-bs-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">MALADIE PROFESSIONNELLE</span>
                                    <span class="d-sm-block d-none">MALADIE PROFESSIONNELLE
                                        &nbsp; &nbsp;(<?php
							                $a=App\Models\Mp::where('deleted', '!=', 'invalide')
							 ->count();
							                echo $a;
						                ?>)
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-4" data-bs-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">VISITE MEDICALE SPECIALE</span>
                                    <span class="d-sm-block d-none">VISITE MEDICALE SPECIALE
                                        &nbsp; &nbsp;(<?php
							                $a=App\Models\Vms::where('deleted', '!=', 'invalide')
							 ->count();
							                echo $a;
						                ?>)
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-5" data-bs-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">VACCINATION</span>
                                    <span class="d-sm-block d-none">VACCINATION
                                        &nbsp; &nbsp;(<?php
							                $a=App\Models\Vac::where('deleted', '!=', 'invalide')
							 ->count();
							                echo $a;
						                ?>)
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-6" data-bs-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">ORDONNANCE MEDICALE</span>
                                    <span class="d-sm-block d-none">ORDONNANCE MEDICALE
                                        &nbsp; &nbsp;(<?php
							                $a=App\Models\Om::where('deleted', '!=', 'invalide')
							 ->count();
							                echo $a;
						                ?>)
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-7" data-bs-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">ABSENTEISME</span>
                                    <span class="d-sm-block d-none">ABSENTEISME
                                        &nbsp; &nbsp;(<?php
							                $a=App\Models\Abs::where('deleted', '!=', 'invalide')
							 ->count();
							                echo $a;
						                ?>)
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-8" data-bs-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">CONVOCATIONS</span>
                                    <span class="d-sm-block d-none">CONVOCATIONS
                                        &nbsp; &nbsp;(<?php
							                $a=App\Models\Convocation::where('deleted', '!=', 'invalide')
							 ->count();
							                echo $a;
						                ?>)
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-9" data-bs-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">APTITUDES</span>
                                    <span class="d-sm-block d-none">APTITUDES
                                        &nbsp; &nbsp;(<?php
							                $a=App\Models\Aptitude::where('deleted', '!=', 'invalide')
							 ->count();
							                echo $a;
						                ?>)
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#nav-pills-tab-10" data-bs-toggle="tab" class="nav-link">
                                    <span class="d-sm-none">SOINS DES FAMILLES</span>
                                    <span class="d-sm-block d-none">SOINS DES FAMILLES
                                        &nbsp; &nbsp;(<?php
							                $a=App\Models\Soin::where('deleted', '!=', 'invalide')
							 ->count();
							                echo $a;
						                ?>)
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                </div>


                <div class="tab-content p-3 rounded-top panel rounded-0 m-0">

                    <div class="tab-pane fade active show" id="nav-pills-tab-1">
                        <h3 class="mt-10px">REGISTRE DES ACCIDENTS DE TRAVAILS</h3>
                        <div style="float: left ;">
                            <div style="float: left ;" class="ms-auto">
                                <a href=" {{('/rat')}} " 
                                    class="btn btn-info btn-rounded px-4 rounded-pill"><i
                                        class="fa fa-table-columns fa-lg me-2 ms-n2 text-success-900"></i>Tableau Détaillé</a>
                            </div>
                        </div>
                        <!-- <div class="col-md-12 card-body  table-responsive"  id="show_at">
                        <table id="data-table-default" class="table table-striped table-bordered align-middle">
                                <caption></caption>
                                <thead>
                                    <tr>
                                        <th style="width: 1%;">DATE</th>
                                        <th style="width: 10%;">NOM ET PRENOMS</th>
                                        <th style="width: 3%;">ELEMENT MATERIEL CAUSAL</th>
                                        <th style="width: 3%;">NATURE DES LESIONS</th>
                                        <th style="width: 2%;">POSTE</th>
                                        <th style="width: 1%;">NBRE DE JOURS D'ARRET</th>
                                        <th style="width: 2%;">INCAPACITE PERMANENTE PARTIELLE (IPP)</th>
                                        <th style="width: 2%;">OBSERVATION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($empsa as $id)
                                    <tr>
                                        <td> {{$id->DATECONS}}</td>
                                        <td>{{$id->nom}}</td>
                                        <td>{{$id->CAUSEAT}}</td>
                                        <td>{{$id->NATURELESI}}</td>
                                        <td>{{$id->LEMSA}}</td>
                                        <td>{{$id->NBRARRETAT}}</td>
                                        <td>{{$id->IPP}}</td>
                                        <td>{{$id->OBSERVATIONAT}}</td>
                                        <td style="width: 1%;">
                                            <form action="{{route('rat.destroy', $id->id) }}" method="post"
                                                onsubmit="return confirm('Etes-vous sûr ?');">
                                                <a class="btn btn-info" href="{{route('rat.edit', $id->id) }}">
                                        <i class="fas fa-pencil-alt fa-xs"></i>
                                    </a>
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt fa-xs"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div> -->
                            
                        <div class="col-md-12 card-body  table-responsive" id="show_at">
                            <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-pills-tab-2">
                        <h3 class="mt-10px">REGISTRE DES CONSULTATIONS SPONTANEES</h3>
                        <div style="float: left ;">
                            <div style="float: left ;" class="ms-auto">
                                <a href=" {{('/rcs')}} " 
                                    class="btn btn-info btn-rounded px-4 rounded-pill"><i
                                        class="fa fa-table-columns fa-lg me-2 ms-n2 text-success-900"></i>Tableau Détaillé</a>
                            </div>
                        </div>
                        <!-- <div class="col-md-12 card-body  table-responsive"  id="show_cs">
                        <table id="data-table-default" class="table table-striped table-bordered align-middle">
                                <caption></caption>
                                <thead>
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Matricules</th>
                                            <th>Noms et Prénoms</th>
                                            <th width="30%">Plaintes</th>
                                            <th width="30%">Examen clinique</th>
                                            <th width="30%">Bilan</th>
                                            <th width="30%">Diagnostic</th>
                                            <th width="30%">Traitements</th>
                                            <th width="30%">Observations</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                @foreach($empsa1 as $id)
                                    <tr>
                                        <td> {{$id->DATECS}}</td>
                                        <td>{{$id->MATSA}}</td>
                                        <td>{{$id->nom}}</td>
                                        <td> {{$id->PLAINTESCS}} </td>
                                        <td> {{$id->EXAMCLICS}} </td>
                                        <td> {{$id->BILAN}} </td>
                                        <td> {{$id->DIAGNOSTIC}} </td>
                                        <td> {{$id->TRAITEMENTCS}} </td>
                                        <td> {{$id->OBSERVATIONCS}} </td>
                                        <td style="width: 1%;">
                                            <form action="{{route('rat.destroy', $id->id) }}" method="post"
                                                onsubmit="return confirm('Etes-vous sûr ?');">
                                                <a class="btn btn-info" href="{{route('rcs.edit', $id->id) }}">
                                                    <i class="fas fa-pencil-alt fa-xs"></i>
                                                </a>
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt fa-xs"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> -->
                        
                        <div class="col-md-12 card-body  table-responsive" id="show_cs">
                            <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-pills-tab-3">
                        <h3 class="mt-10px">REGISTRE DES MALADIES PROFESSIONNELLES</h3>
                        <div style="float: left ;">
                            <div style="float: left ;" class="ms-auto">
                                <a href=" {{('/rmp')}} " 
                                    class="btn btn-info btn-rounded px-4 rounded-pill"><i
                                        class="fa fa-table-columns fa-lg me-2 ms-n2 text-success-900"></i>Tableau Détaillé</a>
                            </div>
                        </div>
                        <!-- <div class="col-md-12 card-body  table-responsive"  id="show_mp">
                        <table id="data-table-default" class="table table-striped table-bordered align-middle">
                                <caption></caption>
                                <thead>
                                    <tr>
                                        <th>DATE</th>
                                        <th>NOM ET PRENOMS</th>
                                        <th>MALADIE</th>
                                        <th>N° TABLEAU</th>
                                        <th>AGENT CAUSAL</th>
                                        <th>POSTE</th>
                                        <th>DECISION</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach($empsa2 as $id)
                                    <tr>
                                        <td> {{$id->DATEMP}} </td>
                                        <td> {{$id->nom }}</td>
                                        <td> {{$id->MALCARAPRO }}</td>
                                        <td> {{$id->MPNUMTAB}} </td>
                                        <td> {{$id->AGENTPATH}} </td>
                                        <td> {{$id->LEMSA}} </td>
                                        <td> {{$id->OBSERVATIONMP}} </td>
                                        <td>
                                            <form action="{{route('rmp.destroy', $id->id) }}" method="post"
                                                onsubmit="return confirm('Etes-vous sûr ?');">
                                                <a class="btn btn-info" href="{{route('rmp.edit', $id->id) }}">
                                                    <i class="fas fa-pencil-alt fa-xs"></i>
                                                </a>
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt fa-xs"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div> -->
                            
                        <div class="col-md-12 card-body  table-responsive" id="show_mp">
                            <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-pills-tab-4">
                        <h3 class="mt-10px">REGISTRE DES VISITES MEDICALES SPECIALES</h3>
                        <div style="float: left ;">
                            <div style="float: left ;" class="ms-auto">
                                <a href=" {{('/rvms')}} " 
                                    class="btn btn-info btn-rounded px-4 rounded-pill"><i
                                        class="fa fa-table-columns fa-lg me-2 ms-n2 text-success-900"></i>Tableau Détaillé</a>
                            </div>
                            </div>
                            <!-- <div class="col-md-12 card-body  table-responsive"  id="show_vms">
                            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                                    <caption></caption>
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Nom et Prénoms</th>
                                            <th>Type de visite</th>
                                            <th>Plaintes</th>
                                            <th>Pouls</th>
                                            <th>TA</th>
                                            <th>PA</th>
                                            <th>PTI</th>
                                            <th>PTE</th>
                                            <th>AV:OD</th>
                                            <th>AV:OG</th>
                                            <th>Observations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($empsa3 as $id)
                                        <tr>
                                            <td> {{$id->DATEVMS}}</td>
                                            <td> {{$id->nom }}</td>
                                            <td> {{$id->TYPVISI}}</td>
                                            <td> {{$id->PLAINTESVMS}}</td>
                                            <td> {{$id->POULSVMS}}</td>
                                            <td> {{$id->TAVMS}}</td>
                                            <td> {{$id->PA }}</td>
                                            <td> {{$id->PTI}}</td>
                                            <td> {{$id->PTE}}</td>
                                            <td> {{$id->AVOD}}</td>
                                            <td> {{$id->AVOG}}</td>
                                            <td> {{$id->OBSERVATIONVMS}} </td>
                                            <td>
                                            <form action="{{route('rvms.destroy', $id->id) }}" method="post"
                                                onsubmit="return confirm('Etes-vous sûr ?');">
                                                <a class="btn btn-info" href="{{route('rvms.edit', $id->id) }}">
                                                    <i class="fas fa-pencil-alt fa-xs"></i>
                                                </a>
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt fa-xs"></i>
                                                </button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> -->
                        
                        <div class="col-md-12 card-body  table-responsive" id="show_vms">
                            <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                        </div>
                    </div>

                    
                    <div class="tab-pane fade" id="nav-pills-tab-5">
                        <h3 class="mt-10px">REGISTRE DES VACCINATIONS</h3>
                        <div style="float: left ;">
                            <div style="float: left ;" class="ms-auto">
                                <a href=" {{('/vac')}} " 
                                    class="btn btn-info btn-rounded px-4 rounded-pill"><i
                                        class="fa fa-table-columns fa-lg me-2 ms-n2 text-success-900"></i>Tableau Détaillé</a>
                            </div>
                        </div>
                        <!-- <div class="col-md-12 card-body  table-responsive"  id="show_vac">
                        <table id="data-table-default" class="table table-striped table-bordered align-middle">
                                <thead>
                                    <thead>
                                        <tr>
                                            <th>DATE</th>
                                            <th>NOM ET PRENOMS</th>
                                            <th> VACCIN </th>
                                            <th> LOT </th>
                                            <th> TYPE </th>
                                            <th> DOSE </th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    @foreach($empsa4 as $id)
                                    <tr>
                                        <td> {{$id->DATE}}</td>
                                        <td> {{$id->nom}} </td>
                                        <td> {{$id->VACCIN}} </td>
                                        <td> {{$id->LOT}} </td>
                                        <td> {{$id->TYPE}} </td>
                                        <td> {{$id->DOSE}} </td>
                                        <td>
                                            <form action="{{route('vac.destroy', $id->id) }}" method="post"
                                                onsubmit="return confirm('Etes-vous sûr ?');">
                                                <a class="btn btn-info" href="{{route('vac.edit', $id->id) }}">
                                                    <i class="fas fa-pencil-alt fa-xs"></i>
                                                </a>
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt fa-xs"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> -->
                        
                        <div class="col-md-12 card-body  table-responsive" id="show_vac">
                            <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                        </div>
                    </div>

                    
                    <div class="tab-pane fade" id="nav-pills-tab-6">
                        <h3 class="mt-10px">REGISTRES DES ORDONNANCES MEDICALES</h3>
                        <div style="float: left ;">
                            <div style="float: left ;" class="ms-auto">
                                <!-- <a href=" {{('/rom')}} " 
                                    class="btn btn-info btn-rounded px-4 rounded-pill"><i
                                        class="fa fa-table-columns fa-lg me-2 ms-n2 text-success-900"></i>Tableau Détaillé</a> -->
                            </div>
                        </div>
                        <div class="col-md-12 card-body  table-responsive"  id="show_om">
                            <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                        <!-- <table id="data-table-default" class="table table-striped table-bordered align-middle">
                                <caption></caption>
                                <thead>
                                    <tr>
                                        <th>Matricule</th>
                                        <th>Nom et Prénoms</th>
                                        <th>Ordonnance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($empsa7 as $id)
                                    <tr>
                                        <td> {{$id->MATSA}} </td>
                                        <td> {{$id->nom}} </td>
                                        <td>
                                            <div class="list-inline hstack gap-2 mb-0">
                                                <a href="#ordm" class="btn-view" data-bs-toggle="modal" data-id="{{$id->id}}"><i class="bi-eye h5"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="{{route('rom.destroy', $id->id) }}" method="post"
                                                onsubmit="return confirm('Etes-vous sûr ?');">
                                                <a class="btn btn-info" href="{{route('rom.edit', $id->id) }}">

                                                    <i class=" fas fa-pencil-alt fa-xs"></i>
                                                </a>
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt fa-xs"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table> -->
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-pills-tab-7">
                        <h3 class="mt-10px">REGISTRES DES ABSENTEISMES</h3>
                        <div style="float: left ;">
                            <div style="float: left ;" class="ms-auto">
                                <a href=" {{('/absent')}} " 
                                    class="btn btn-info btn-rounded px-4 rounded-pill"><i
                                        class="fa fa-table-columns fa-lg me-2 ms-n2 text-success-900"></i>Tableau Détaillé</a>
                            </div>
                        </div>
                        <!-- <div class="col-md-12 card-body  table-responsive"  id="show_abs">
                        <table id="data-table-default" class="table table-striped table-bordered align-middle">
                                <caption></caption>
                                <thead>
                                    <tr>
                                        <th>Matricule</th>
                                        <th>Nom et Prénoms</th>
                                        <th>TYPE</th>
                                        <th>CAUSE</th>
                                        <th>DEBUT</th>
                                        <th>REPRISE</th>
                                        <th>NBRE DE JOURS D'ARRET</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($empsa5 as $id)
                                    <tr>
                                        <td> {{$id->MATSA}} </td>
                                        <td> {{$id->nom}} </td>
                                        <td> {{$id->TYPEABS }}</td>
                                        <td> {{$id->CAUSE }}</td>
                                        <td> {{$id->DEBUT}} </td>
                                        <td> {{$id->REPRISE}} </td>
                                        <td> {{$id->NBRARRET}} </td>
                                        <td>
                                            <form action="{{route('rom.destroy', $id->id) }}" method="post"
                                                onsubmit="return confirm('Etes-vous sûr ?');">
                                                <a class="btn btn-info" href="{{route('absent.edit', $id->id) }}">

                                                    <i class=" fas fa-pencil-alt fa-xs"></i>
                                                </a>
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt fa-xs"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> -->
                        
                        <div class="col-md-12 card-body  table-responsive" id="show_abs">
                            <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-pills-tab-8">
                        <h3 class="mt-10px">REGISTRES DES CONVOCATIONS</h3>
                        <div style="float: left ;">
                            <div style="float: left ;" class="ms-auto">
                                <a href=" {{('/convoc')}} " 
                                    class="btn btn-info btn-rounded px-4 rounded-pill"><i
                                        class="fa fa-table-columns fa-lg me-2 ms-n2 text-success-900"></i>Tableau Détaillé</a>
                            </div>
                        </div>
                        <!-- <div class="col-md-12 card-body  table-responsive"  id="show_conv">
                        <table id="data-table-default" class="table table-striped table-bordered align-middle">
                                <caption></caption>
                                <thead>
                                    <tr>
                                        <th>Matricule</th>
                                        <th>Nom et Prénoms</th>
                                        <th>Motif</th>
                                        <th>Date d'émission</th>
                                        <th>Date de convocation</th>
                                        <th>Date de présentation</th>
                                        <th>Observation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($empsa6 as $id)
                                    <tr>
                                        <td> {{$id->MATSA}} </td>
                                        <td> {{$id->nom}} </td>
                                        <td> {{$id->MOTIF }}</td>
                                        <td> {{$id->DATEEMIS }}</td>
                                        <td> {{$id->DATECONVOC }}</td>
                                        <td> {{$id->DATEPRES }}</td>
                                        <td> {{$id->OBSERVATION }}</td>
                                        <td>
                                            <form action="{{route('rom.destroy', $id->id) }}" method="post"
                                                onsubmit="return confirm('Etes-vous sûr ?');">
                                                <a class="btn btn-info" href="{{route('convoc.edit', $id->id) }}">

                                                    <i class=" fas fa-pencil-alt fa-xs"></i>
                                                </a>
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-trash-alt fa-xs"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> -->
                        
                        <div class="col-md-12 card-body  table-responsive" id="show_conv">
                            <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                        </div>
                    </div>

                    
                    <div class="tab-pane fade" id="nav-pills-tab-9">
                        <h3 class="mt-10px">REGISTRE DES APTITUDES</h3>
                        <div style="float: left ;">
                            <!-- <div style="float: left ;" class="ms-auto">
                                <a href=" {{('/aptitude')}} " 
                                    class="btn btn-info btn-rounded px-4 rounded-pill"><i
                                        class="fa fa-table-columns fa-lg me-2 ms-n2 text-success-900"></i>Tableau Détaillé</a>
                            </div> -->
                        </div>
                        <div class="col-md-12 card-body  table-responsive"  id="show_aptitude">
                            <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                        </div>
                    </div>

                    
                    <div class="tab-pane fade" id="nav-pills-tab-10">
                        <h3 class="mt-10px">REGISTRE DE SOINS DES MEMBRES DE FAMILLES</h3>
                        <div style="float: left ;">
                            <div style="float: left ;" class="ms-auto">
                                <a href=" {{('/soinfam')}} " 
                                    class="btn btn-info btn-rounded px-4 rounded-pill"><i
                                        class="fa fa-table-columns fa-lg me-2 ms-n2 text-success-900"></i>Tableau Détaillé</a>
                            </div>
                        </div>
                        <div class="col-md-12 card-body  table-responsive"  id="show_soin">
                            <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                        </div>
                    </div>

                    

                </div>
            </div>
        </div>
    </div>

    <!-- <div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfModalLabel">Visionnage de pdf</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(isset($pdfContent) && !empty($pdfContent))
                        <embed src="data:application/pdf;base64,{{ base64_encode($pdfContent) }}" type="application/pdf" width="100%" height="600">
                    @else
                        <p>Le PDF n'a pas pu être chargé.</p>
                    @endif
                </div>
            </div>
        </div>
    </div> -->



</div>

<!-- 
<script>
    $(document).ready(function() {
        $('.btn-view').on('click', function() {
            var id = $(this).data('id');
            var url = "{{ asset('assets') }}/" + id + ".pdf"; // Modifiez l'URL du PDF si nécessaire
            $('#pdf-embed').attr('src', url);
        });
    });
</script> -->



<!-- 
<script>
    // Lorsqu'un bouton "Voir" est cliqué
    $('.btn-view').click(function () {
        // var recordId = $(this).data('id'); // Obtenez l'ID de l'enregistrement
        // var pdfSrc = "/assets/" + recordId; // Construisez le chemin du fichier PDF

        // Mettez à jour l'attribut src de l'élément embed avec le chemin du fichier PDF
        $('#pdf-embed').attr('src', pdfSrc); // Ciblez l'élément avec l'id "pdf-embed"

        // Affichez le modal
        $('#ordm').modal('show');
    });
</script>
 -->

<script type="text/javascript">
$(document).ready(function() {

    fetchom();

    function fetchom() {
        $.ajax({
            url: "{{ url('/fetch-om') }}",
            method: 'get',
            success: function(response) {

                $("#show_om").html(response);
                $(".table0").DataTable({
                    order: [0, 'desc'],
                    dom: 'Bfrtip',
                    buttons: [],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });

    };


});
</script>


<script type="text/javascript">
$(document).ready(function() {

    fetchsoina();

    function fetchsoina() {
        $.ajax({
            url: "{{ url('/fetch-soina') }}",
            method: 'get',
            success: function(response) {

                $("#show_soin").html(response);
                $(".table1").DataTable({
                    order: [0, 'asc'],
                    dom: 'Bfrtip',
                    buttons: [],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });
    };
});
</script>


<script type="text/javascript">
$(document).ready(function() {

    fetchapti();

    function fetchapti() {
        $.ajax({
            url: "{{ url('/fetch-apti') }}",
            method: 'get',
            success: function(response) {

                $("#show_aptitude").html(response);
                $(".table2").DataTable({
                    order: [0, 'asc'],
                    dom: 'Bfrtip',
                    buttons: [],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });
    };
});
</script>



<script type="text/javascript">
$(document).ready(function() {

    fetchabsr();

    function fetchabsr() {
        $.ajax({
            url: "{{ url('/fetch-absr') }}",
            method: 'get',
            success: function(response) {

                $("#show_abs").html(response);
                $(".table3").DataTable({
                    order: [0, 'asc'],
                    dom: 'Bfrtip',
                    buttons: [],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });
    };
});
</script>



<script type="text/javascript">
$(document).ready(function() {

    fetchatr();

    function fetchatr() {
        $.ajax({
            url: "{{ url('/fetch-atr') }}",
            method: 'get',
            success: function(response) {

                $("#show_at").html(response);
                $(".table4").DataTable({
                    order: [0, 'asc'],
                    dom: 'Bfrtip',
                    buttons: [],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });
    };
});
</script>



<script type="text/javascript">
$(document).ready(function() {

    fetchconvr();

    function fetchconvr() {
        $.ajax({
            url: "{{ url('/fetch-convr') }}",
            method: 'get',
            success: function(response) {

                $("#show_conv").html(response);
                $(".table5").DataTable({
                    order: [0, 'asc'],
                    dom: 'Bfrtip',
                    buttons: [],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });
    };
});
</script>



<script type="text/javascript">
$(document).ready(function() {

    fetchcsr();

    function fetchcsr() {
        $.ajax({
            url: "{{ url('/fetch-csr') }}",
            method: 'get',
            success: function(response) {

                $("#show_cs").html(response);
                $(".table6").DataTable({
                    order: [0, 'asc'],
                    dom: 'Bfrtip',
                    buttons: [],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });
    };
});
</script>



<script type="text/javascript">
$(document).ready(function() {

    fetchmpr();

    function fetchmpr() {
        $.ajax({
            url: "{{ url('/fetch-mpr') }}",
            method: 'get',
            success: function(response) {

                $("#show_mp").html(response);
                $(".table7").DataTable({
                    order: [0, 'asc'],
                    dom: 'Bfrtip',
                    buttons: [],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });
    };
});
</script>



<script type="text/javascript">
$(document).ready(function() {

    fetchvmsr();

    function fetchvmsr() {
        $.ajax({
            url: "{{ url('/fetch-vmsr') }}",
            method: 'get',
            success: function(response) {

                $("#show_vms").html(response);
                $(".table9").DataTable({
                    order: [0, 'asc'],
                    dom: 'Bfrtip',
                    buttons: [],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });
    };
});
</script>



<script type="text/javascript">
$(document).ready(function() {

    fetchvacr();

    function fetchvacr() {
        $.ajax({
            url: "{{ url('/fetch-vacr') }}",
            method: 'get',
            success: function(response) {

                $("#show_vac").html(response);
                $(".table8").DataTable({
                    order: [0, 'asc'],
                    dom: 'Bfrtip',
                    buttons: [],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });
    };
});
</script>


@endsection