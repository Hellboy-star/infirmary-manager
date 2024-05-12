@extends('def.def' , ['titre'=>'Paramètre' ])

@section ('contenta')

<div id="content" class="app-content">



    <h2 class="page-header">Paramètres <small> </small></h2>


    <div class="row">
        <div class="col-xl-12">

            <div class="panel panel-inverse panel-with-tabs" data-sortable-id="ui-unlimited-tabs-1">

                <div class="panel-heading p-0">

                    <div class="tab-overflow">
                        <ul class="nav nav-tabs nav-tabs-inverse">
                            <li class="nav-item prev-button"><a href="javascript:;" data-click="prev-tab"
                                    class="nav-link text-primary"><i class="bi bi-arrow-left"></i></a></li>
                            <li class="nav-item"><a href="#nav-tab-1" data-bs-toggle="tab"
                                    class="nav-link active">Carburant</a></li>
                            <li class="nav-item"><a href="#nav-tab-2" data-bs-toggle="tab" class="nav-link">Type de
                                    véhicule</a></li>
                            <li class="nav-item"><a href="#nav-tab-3" data-bs-toggle="tab"
                                    class="nav-link">Transmission</a></li>
                            <li class="nav-item"><a href="#nav-tab-4" data-bs-toggle="tab" class="nav-link">Marque</a>
                            </li>
                            <li class="nav-item"><a href="#nav-tab-5" data-bs-toggle="tab" class="nav-link">Modèle</a>
                            </li>
                            <li class="nav-item"><a href="#nav-tab-6" data-bs-toggle="tab" class="nav-link">Statut</a>
                            </li>
                            <li class="nav-item"><a href="#nav-tab-7" data-bs-toggle="tab"
                                    class="nav-link">Etablissement (Garage)</a></li>
                            <li class="nav-item next-button"><a href="javascript:;" data-click="next-tab"
                                    class="nav-link text-primary"><i class="bi bi-arrow-right"></i></a></li>

                        </ul>
                    </div>
                    <div class="panel-heading-btn me-2 ms-2 d-flex">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-secondary"
                            data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
                    </div>
                </div>


                <div class="panel-body tab-content">

                    <div class="tab-pane fade active show" id="nav-tab-1">

                        <div class="row">

                            <div class="col-md-7 card-body" id="show_carb">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>

                            <div class="col-md-5 card-body" id="">

                                <div class="panel panel-inverse" data-sortable-id="index-2">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Ajouter un nouveau type de carburant</h4>

                                    </div>
                                    <div class="panel-body bg-light">

                                        @csrf
                                        <div class="chats" data-scrollbar="true" data-height="115px">
                                            <div class="chats-item start">


                                                <label class="form-label">Designation</label>

                                                <input id="libcarb" class="form-control form-control-sm" type="text"
                                                    require />


                                            </div>


                                            <div class="chats-item start">
                                                <button type="submit" id="add_carb"
                                                    class="btn btn-primary">Enregistrer</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="tab-pane fade" id="nav-tab-2">

                        <div class="row">

                            <div class="col-md-7 card-body" id="show_tv">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>

                            <div class="col-md-5 card-body" id="">

                                <div class="panel panel-inverse" data-sortable-id="index-2">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Ajouter un nouveau type de véhicule</h4>

                                    </div>
                                    <div class="panel-body bg-light">

                                        @csrf
                                        <div class="chats" data-scrollbar="true" data-height="115px">
                                            <div class="chats-item start">


                                                <label class="form-label">Désignation</label>

                                                <input id="libty" class="form-control form-control-sm" type="text"
                                                    require />


                                            </div>


                                            <div class="chats-item start">
                                                <button type="submit" id="add_tv"
                                                    class="btn btn-primary">Enregistrer</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="tab-pane fade" id="nav-tab-3">
                        <div class="row">

                            <div class="col-md-7 card-body" id="show_tran">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>

                            <div class="col-md-5 card-body" id="">

                                <div class="panel panel-inverse" data-sortable-id="index-2">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Ajouter un nouveau type de transmission</h4>

                                    </div>
                                    <div class="panel-body bg-light">

                                        @csrf
                                        <div class="chats" data-scrollbar="true" data-height="115px">
                                            <div class="chats-item start">


                                                <label class="form-label">Designation</label>

                                                <input id="libtran" class="form-control form-control-sm" type="text"
                                                    require />


                                            </div>


                                            <div class="chats-item start">
                                                <button type="submit" id="add_tran"
                                                    class="btn btn-primary">Enregistrer</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>





                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-tab-4">
                        <div class="row">

                            <div class="col-md-7 card-body" id="show_marq">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>

                            <div class="col-md-5 card-body" id="">

                                <div class="panel panel-inverse" data-sortable-id="index-2">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Ajouter une nouvelle marque</h4>

                                    </div>
                                    <div class="panel-body bg-light">

                                        @csrf
                                        <div class="chats" data-scrollbar="true" data-height="115px">
                                            <div class="chats-item start">


                                                <label class="form-label">Designation</label>

                                                <input id="libmarq" class="form-control form-control-sm" type="text"
                                                    require />


                                            </div>


                                            <div class="chats-item start">
                                                <button type="submit" id="add_marq"
                                                    class="btn btn-primary">Enregistrer</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-tab-5">
                        <div class="row">

                            <div class="col-md-7 card-body" id="show_model">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>

                            <div class="col-md-5 card-body" id="">

                                <div class="panel panel-inverse" data-sortable-id="index-2">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Ajouter un nouveau modèle de marque</h4>

                                    </div>
                                    <div class="panel-body bg-light">

                                        @csrf
                                        <div class="chats" data-scrollbar="true" data-height="215px">

                                            <div class="chats-item start">


                                                <label class="form-label">Marque</label>

                                                <select id="marq" class="smarq form-select form-select-sm">

                                                </select>


                                            </div>

                                            <div class="chats-item start">


                                                <label class="form-label">Modèle</label>

                                                <input id="libmodel" class="form-control form-control-sm" type="text"
                                                    require />


                                            </div>


                                            <div class="chats-item start">
                                                <button type="submit" id="add_model"
                                                    class="btn btn-primary">Enregistrer</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-tab-6">
                        <div class="row">

                            <div class="col-md-7 card-body" id="show_stat">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>

                            <div class="col-md-5 card-body" id="">

                                <div class="panel panel-inverse" data-sortable-id="index-2">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Ajouter un nouveau statut</h4>

                                    </div>
                                    <div class="panel-body bg-light">

                                        @csrf
                                        <div class="chats" data-scrollbar="true" data-height="115px">
                                            <div class="chats-item start">


                                                <label class="form-label">Designation</label>

                                                <input id="libstat" class="form-control form-control-sm" type="text"
                                                    require />


                                            </div>


                                            <div class="chats-item start">
                                                <button type="submit" id="add_stat"
                                                    class="btn btn-primary">Enregistrer</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-tab-7">
                        <div class="row">

                            <div class="col-md-7 card-body" id="show_set">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>

                            <div class="col-md-5 card-body" id="">

                                <div class="panel panel-inverse" data-sortable-id="index-2">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Ajouter un nouveau garage</h4>

                                    </div>
                                    <div class="panel-body bg-light">

                                        @csrf
                                        <div class="chats" data-scrollbar="true" data-height="235px">
                                            <div class="row">

                                                <div class="col-xl-8 mb-3">
                                                    <label class="form-label" for="exampleInputEmail1">Nom
                                                        prestaire</label>
                                                    <input type="text" class="net form-control form-control-sm" id="net"
                                                        placeholder="" />

                                                </div>

                                                <div class="col-xl-4 mb-3">
                                                    <label class="form-label" for="exampleInputEmail1">Contact</label>

                                                    <input type="text" class="cet form-control form-control-sm" id="cet"
                                                        placeholder="" />

                                                </div>
                                            </div>

                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Adresse</label>

                                                <input type="text" class="aet form-control form-control-sm" id="aet"
                                                    placeholder="" />

                                            </div>


                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label" for="exampleInputEmail1">Observations</label>
                                                <div class="input-group" id="default-daterange">
                                                    <textarea class="oet form-control form-control-sm" id="oet"
                                                        placeholder=""> </textarea>
                                                </div>
                                            </div>



                                        </div>


                                        <div class="chats-item start">
                                            <button type="submit" id="add_set"
                                                class="btn btn-primary">Enregistrer</button>
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

</div>

</div>
<div class="modal fade" id="smcarb">
    <div class="modal-dialog">
        <div class="modal-content">

            {{@csrf_field()}}
            <div class="modal-header">
                <h4 class="modal-title">Enregistement type de carburant</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <input id="carb_id" type="text" class="carb_id form-control" readonly hidden />

                    <label class="form-label">Designation</label>

                    <input id="ed_carb" class="form-control form-control-sm" type="text" required />
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Annuler</a>
                <a href="javascript:;" class="edi_carb btn btn-primary">Modifier</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="smtv">
    <div class="modal-dialog">
        <div class="modal-content">

            {{@csrf_field()}}
            <div class="modal-header">
                <h4 class="modal-title">Enregistement type de véhicule</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <input id="tv_id" type="text" class="tv_id form-control" readonly hidden />

                    <label class="form-label">Désignation</label>

                    <input id="ed_tv" class="form-control form-control-sm" type="text" required />
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Annuler</a>
                <a href="javascript:;" class="edi_tv btn btn-primary">Modifier</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="smtran">
    <div class="modal-dialog">
        <div class="modal-content">

            {{@csrf_field()}}
            <div class="modal-header">
                <h4 class="modal-title">Enregistement type de transmission</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <input id="tran_id" type="text" class="tran_id form-control" readonly hidden />

                    <label class="form-label">Designation</label>

                    <input id="ed_tran" class="form-control form-control-sm" type="text" required />
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Annuler</a>
                <a href="javascript:;" class="edi_tran btn btn-primary">Modifier</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="smmarq">
    <div class="modal-dialog">
        <div class="modal-content">

            {{@csrf_field()}}
            <div class="modal-header">
                <h4 class="modal-title">Enregistement type de transmission</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <input id="marq_id" type="text" class="marq_id form-control" readonly hidden />

                    <label class="form-label">Designation</label>

                    <input id="ed_marq" class="form-control form-control-sm" type="text" required />
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Annuler</a>
                <a href="javascript:;" class="edi_marq btn btn-primary">Modifier</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="smstat">
    <div class="modal-dialog">
        <div class="modal-content">

            {{@csrf_field()}}
            <div class="modal-header">
                <h4 class="modal-title">Enregistement d'un nouveau statut</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <input id="stat_id" type="text" class="stat_id form-control" readonly hidden />

                    <label class="form-label">Designation</label>

                    <input id="ed_stat" class="form-control form-control-sm" type="text" required />
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Annuler</a>
                <a href="javascript:;" class="edi_stat btn btn-primary">Modifier</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="smmodel">
    <div class="modal-dialog">
        <div class="modal-content">

            {{@csrf_field()}}
            <div class="modal-header">
                <h4 class="modal-title">Enregistement d'un nouveau modele</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">

                    <label class="form-label">Marque</label>

                    <select id="esmarq" class="szmarq form-select form-select-sm">

                    </select>
                </div>

                <div class="mb-3">
                    <input id="model_id" type="text" class="model_id form-control" readonly hidden />

                    <label class="form-label">Designation</label>

                    <input id="ed_model" class="form-control form-control-sm" type="text" required />
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Annuler</a>
                <a href="javascript:;" class="edi_model btn btn-primary">Modifier</a>
            </div>
        </div>
    </div>
</div>








@endsection