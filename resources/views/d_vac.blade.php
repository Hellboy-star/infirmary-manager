@extends('def.def', ['titre'=>'Régistre de Vaccination' ])
@section ('contenta')

<div id="content" style="width: 200% ;" class="app-content">

    <h1 class="page-header">Régistre de Vaccination</h1>


    <div class="row">
        <div class="col-xl-12">

            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">

                <div class="panel-heading">
                    <h4 class="panel-title">Régistre de Vaccination</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i
                                class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i
                                class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i
                                class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i
                                class="fa fa-times"></i></a>
                    </div>
                </div>



                <div class="panel-body">


                    <div class="row">

                    <div style="float: left ;">
                            <div style="float: left ;" class="ms-auto">
                                <a href="#mod" data-bs-toggle="modal"
                                    class="btn btn-success btn-rounded px-4 rounded-pill"><i
                                        class="fa fa-plus fa-lg me-2 ms-n2 text-success-900"></i>Ajouter un nouvel
                                    élément</a>
                            </div>
                        </div>

                        <div class="card-body container-fluid" id="index_vac">
                            <table id="data-table-default" class="table table-striped table-bordered align-middle">
                                <thead>
                                    <thead>
                                        <tr>
                                            <th width="1%">N°</th>
                                            <th>DATE</th>
                                            <th colspan="2">NOM ET PRENOMS</th>
                                            <th>MATRICULE</th>
                                            <th>POSTE</th>
                                            <th> SEXE </th>
                                            <th> VACCIN </th>
                                            <th> LOT </th>
                                            <th> TYPE </th>
                                            <th> DOSE </th>
                                            <th> CENTRE DE VACCINATION </th>
                                            <th> DATE DE LA DOSE </th>
                                            <th> DATE D'EXPIRATION </th>
                                            <th> DATE DE LA PROCHAINE VACCINATION </th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    @foreach($vac as $id)
                                    <tr>
                                        <td> {{$id->id}}</td>
                                        <td> {{$id->DATE}}</td>
                                        <td> {{$id->NOMSA}} </td>
                                        <td> {{$id->PRESA}} </td>
                                        <td> {{$id->MATSA}} </td>
                                        <td> {{$id->POSTE}} </td>
                                        <td> {{$id->SEXSA}} </td>
                                        <td> {{$id->VACCIN}} </td>
                                        <td> {{$id->LOT}} </td>
                                        <td> {{$id->TYPE}} </td>
                                        <td> {{$id->DOSE}} </td>
                                        <td> {{$id->CENTRE}} </td>
                                        <td> {{$id->DATEDOSE}} </td>
                                        <td> {{$id->DATEEXP}} </td>
                                        <td> {{$id->DATEPROCH}} </td>
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
                                {{$vac->links()}}
                            </table>

                        </div>




                    </div>

                </div>

            </div>





        </div>
    </div>
</div>
</div>



<div class="container">
    <div class=" modal fade" id="mod">
        <div class="modal-dialog modal-md">
            <h4 class="panel-title">Ajouter un nouvel élément</h4>

        </div>
        <div class="panel-body bg-light">

            @csrf
            <div class="container">
                <div class="card-body">
                    <form method="POST" action="{{route('vac.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Date d'Enregistrement:</label>
                                <input style="width: 100%;" type="date" name="DATE" id="DATE" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Matricule:</label>
                                <input style="width: 100%;" type="" name="MATSA" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Nom:</label>
                                <input style="width: 100%;" type="" name="NOMSA" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Prénoms:</label>
                                <input style="width: 100%;" type="" name="PRESA" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Sexe:</label>
                                <select style="width: 100%;" name="SEXSA" id="SEXSA">
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                </select>
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Age:</label>
                                <input style="width: 100%;" type="" name="AGE" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Poste:</label>
                                <input style="width: 100%;" type="" name="POSTE" id="POSTE" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Date de la Dose:</label>
                                <input style="width: 100%;" type="date" name="DATEDOSE" id="DATEDOSE" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Date d'Expiration:</label>
                                <input style="width: 100%;" type="date" name="DATEEXP" id="DATEEXP" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Vaccin:</label>
                                <input style="width: 100%;" type="" name="VACCIN" id="VACCIN" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Numéro du Lot:</label>
                                <input style="width: 100%;" type="" name="LOT" id="LOT" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Type de Vaccin:</label>
                                <input style="width: 100%;" type="" name="TYPE" id="TYPE" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Dose:</label>
                                <select style="width: 100%;" name="DOSE" id="DOSE">
                                    <option value="1ère dose"> 1ère dose </option>
                                    <option value="2ième dose"> 2ième dose </option>
                                    <option value="Autre dose"> Autre dose </option>
                                </select>
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Nom du Centre de
                                    Vaccination:</label>
                                <input style="width: 100%;" type="" name="CENTRE" id="CENTRE" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Date de la Prochaine
                                    Vaccination:</label>
                                <input style="width: 100%;" type="date" name="DATEPROCH" id="DATEPROCH" placeholder="" />
                            </div>
                            <div class="modal-footer">
                                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Annuler</a>
                                <button type="submit" id="store_at"
                                    class="store_at btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>

<div class="container">
    <div class=" modal fade" id="moda">

        <div class="panel-body bg-light">


            <div class="container">
                <div class="card-body">
                    <form method="POST" action="{{route('vac.store')}}">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Matricule:</label>
                                <input style="width: 100%;" type="number" name="MATSA" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Nom:</label>
                                <input style="width: 100%;" type="" name="NOMSA" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Prénoms:</label>
                                <input style="width: 100%;" type="" name="PRESA" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Sexe:</label>
                                <input style="width: 100%;" type="" name="SEXSA" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Age:</label>
                                <input style="width: 100%;" type="" name="AGE" id="" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Poste:</label>
                                <input style="width: 100%;" type="" name="POSTE" id="POSTE" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Date de la Dose:</label>
                                <input style="width: 100%;" type="" name="DATEDOSE" id="DATEDOSE" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Date d'Expiration:</label>
                                <input style="width: 100%;" type="" name="DATEEXP" id="DATEEXP" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Vaccin:</label>
                                <input style="width: 100%;" type="" name="VACCIN" id="VACCIN" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Numéro du Lot:</label>
                                <input style="width: 100%;" type="" name="LOT" id="LOT" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Type de Vaccin:</label>
                                <input style="width: 100%;" type="" name="TYPE" id="TYPE" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Dose:</label>
                                <input style="width: 100%;" type="" name="DOSE" id="DOSE" placeholder="" />
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label class="form-label" for="exampleInputPassword1"> Nom du Centre de
                                    Vaccination:</label>
                                <input style="width: 100%;" type="" name="CENTRE" id="CENTRE" placeholder="" />
                            </div>
                            <div class="modal-footer">
                                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Annuler</a>
                                <button type="submit" id="store_at"
                                    class="store_at btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- script -->
<script>
$('#data-table-default').DataTable({
    responsive: true,
    dom: '<"row"<"col-sm-5"B><"col-sm-7"fr>>t<"row"<"col-sm-5"i><"col-sm-7"p>>',
    buttons: [{
            extend: 'copy',
            className: 'btn-sm'
        },
        {
            extend: 'csv',
            className: 'btn-sm'
        },
        {
            extend: 'excel',
            className: 'btn-sm'
        },
        {
            extend: 'pdf',
            className: 'btn-sm'
        },
        {
            extend: 'print',
            className: 'btn-sm'
        }
    ],
});
</script>