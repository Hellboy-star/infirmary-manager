@extends('def.defaut')

@section ('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="profile-foreground position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg">
                    <img src="assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
                </div>
            </div>
            <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">

                <div class="row g-4">

                    <div class="col">
                        <div class="p-2">
                            <h3 class="text-white mb-1">{{$pers->nom}}</h3>
                            <p class="text-white-75">{{$pers->POSPE}}</p>
                            <div class="hstack text-white-50 gap-1">
                                <div class="me-2"><i
                                        class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>{{$pers->LIBRE}}
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-12 col-lg-auto order-last order-lg-0">
                        <div class="row text text-white-50 text-center">
                            <div class="col-lg-6 col-4">
                                <div class="p-2">
                                    <h4 class="text-white mb-1">{{$pers->anciennete}} Ans</h4>
                                    <p class="fs-14 mb-0">Anciennete</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-4">
                                <div class="p-2">
                                    <h4 class="text-white mb-1">{{$pers->nbre_cong}} Jrs</h4>
                                    <p class="fs-14 mb-0">Congé</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->

                </div>
                <!--end row-->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="d-flex">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1"
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab"
                                        role="tab">
                                        <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                            class="d-none d-md-inline-block">Absence</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-14" data-bs-toggle="tab" href="#activities" role="tab">
                                        <i class="ri-list-unordered d-inline-block d-md-none"></i> <span
                                            class="d-none d-md-inline-block">Congé</span>
                                    </a>
                                </li>



                            </ul>

                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content pt-4 text-muted">
                            <div class="tab-pane active" id="overview-tab" role="tabpanel">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card" id="leadsList">
                                            <div class="card-header border-0">

                                                <div class="row g-4 align-items-center">
                                                    <div id="success" class="col-md-6" role="alert"> </div>
                                                    <div class="col-sm-auto ms-auto">
                                                        <div class="hstack gap-2">
                                                            <button type="button" class="btn btn-success add-btn"
                                                                data-bs-toggle="modal" id="create-btn"
                                                                data-bs-target="#showModalabs"><i
                                                                    class="ri-add-line align-bottom me-1"></i>
                                                                Ajouter</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <div class="table-responsive table-card">
                                                        <table class="table align-middle" id="customerTable">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th scope="col" style="width: 50px;">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" id="checkAll"
                                                                                value="option">
                                                                        </div>
                                                                    </th>

                                                                    <th class="sort" data-sort="date">ANNEE</th>
                                                                    <th class="sort" data-sort="date">Date Absence</th>
                                                                    <th class="sort" data-sort="customer_name">
                                                                        Observation</th>
                                                                    <th class="sort" data-sort="action">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="sas list form-check-all">

                                                            </tbody>
                                                        </table>
                                                        <div class="noresult" style="display: none">
                                                            <div class="text-center">
                                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json"
                                                                    trigger="loop"
                                                                    colors="primary:#121331,secondary:#08a88a"
                                                                    style="width:75px;height:75px">
                                                                </lord-icon>
                                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                                                <p class="text-muted mb-0">We've searched more than 150+
                                                                    leads We did not find any leads for you search.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end mt-3">
                                                        <div class="pagination-wrap hstack gap-2">
                                                            <a class="page-item pagination-prev disabled" href="#">
                                                                Previous
                                                            </a>
                                                            <ul class="pagination listjs-pagination mb-0"></ul>
                                                            <a class="page-item pagination-next" href="#">
                                                                Next
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="activities" role="tabpanel">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card" id="leadsList">
                                            <div class="card-header border-0">

                                                <div class="row g-4 align-items-center">
                                                    <div id="successc" class="" role="alert">
                                                        <i id="za" class=""></i><strong id="zz"></strong>


                                                    </div>
                                                    <div class="col-sm-auto ms-auto">
                                                        <div class="hstack gap-2">
                                                            <button type="button" class="btn btn-success add-btn"
                                                                data-bs-toggle="modal" id="create-btn"
                                                                data-bs-target="#showModalcong"><i
                                                                    class="ri-add-line align-bottom me-1"></i>
                                                                Ajouter</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <div class="table-responsive table-card">
                                                        <table class="table align-middle" id="customerTable">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th scope="col" style="width: 50px;">
                                                                        <div class="form-check">
                                                                            <input class="form-check-input"
                                                                                type="checkbox" id="checkAll"
                                                                                value="option">
                                                                        </div>
                                                                    </th>

                                                                    <th class="sort" data-sort="date">Année</th>
                                                                    <th class="sort" data-sort="date">Date début</th>
                                                                    <th class="sort" data-sort="date">Date de fin </th>
                                                                    <th class="sort" data-sort="date">Date de reprise
                                                                    </th>
                                                                    <th class="sort" data-sort="date">Jour(s) Férié(s)
                                                                    </th>
                                                                    <th class="sort" data-sort="action">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="scon list form-check-all">

                                                            </tbody>
                                                        </table>
                                                        <div class="noresult" style="display: none">
                                                            <div class="text-center">
                                                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json"
                                                                    trigger="loop"
                                                                    colors="primary:#121331,secondary:#08a88a"
                                                                    style="width:75px;height:75px">
                                                                </lord-icon>
                                                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                                                <p class="text-muted mb-0">We've searched more than 150+
                                                                    leads We did not find any leads for you search.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-end mt-3">
                                                        <div class="pagination-wrap hstack gap-2">
                                                            <a class="page-item pagination-prev disabled" href="#">
                                                                Previous
                                                            </a>
                                                            <ul class="pagination listjs-pagination mb-0"></ul>
                                                            <a class="page-item pagination-next" href="#">
                                                                Next
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!--end tab-pane-->
                        </div>
                        <!--end tab-content-->
                    </div>
                </div>
                <!--end col-->
            </div>
            <div class="modal fade zoomIn" id="showModalcong" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0">
                        <div class="modal-header p-3 bg-soft-info">
                            <h5 class="modal-title" id="exampleModalLabel">Enregistrement des congés</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="close-modal"></button>
                        </div>

                        {{@csrf_field()}}
                        <div class="modal-body">
                            <div class="row g-3">
                                <input style="display:none" name="idd" type="text" class="idd form-control"
                                    value="{{$pers->MATPE}}" readonly />

                                <div class="col-lg-8">
                                    <div>
                                        <label for="tasksTitle-field" class="form-label">Nom & Prénoms</label>
                                        <input type="text" class="form-control" value="{{$pers->nom}}" readonly />
                                    </div>
                                </div>




                                <div class="col-lg-4">
                                    <label for="date-field" class="form-label">Date débat en congé</label>
                                    <input name="c" type="date" id="date-field" class="dat_con form-control"
                                        data-provider="flatpickr" data-date-format="Y-m-d" value="" required />
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" href=""
                                    data-bs-toggle="modal">Annuler</button>
                                <button type="button" class="btn btn-success add_con" id="add-btn">Enregistrer </button>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>
        <!-- container-fluid -->
    </div>

    <div class="modal fade zoomIn" id="showModalcong" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-info">
                    <h5 class="modal-title" id="exampleModalLabel">Enregistrement des congés</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>

                {{@csrf_field()}}
                <div class="modal-body">
                    <div class="row g-3">
                        <input style="display:none" name="idd" type="text" class="idd form-control"
                            value="{{$pers->MATPE}}" readonly />

                        <div class="col-lg-8">
                            <div>
                                <label for="tasksTitle-field" class="form-label">Nom & Prénoms</label>
                                <input type="text" class="form-control" value="{{$pers->nom}}" readonly />
                            </div>
                        </div>




                        <div class="col-lg-4">
                            <label for="date-field" class="form-label">Date débat en congé</label>
                            <input name="c" type="date" id="date-field" class="dat_con form-control"
                                data-provider="flatpickr" data-date-format="Y-m-d" value="" required />
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" href="" data-bs-toggle="modal">Annuler</button>
                        <button type="button" class="btn btn-success add_con" id="add-btn">Enregistrer </button>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- End Page-content -->
    <div class="modal fade zoomIn" id="showModalecong" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-info">
                    <h5 class="modal-title" id="exampleModalLabel">Enregistrement des congés</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>

                {{@csrf_field()}}
                <div class="modal-body">
                    <div class="row g-3">
                        <input style="display:none" name="idd" type="text" class="idd form-control"
                            value="{{$pers->MATPE}}" readonly />

                        <div class="col-lg-8">
                            <div>
                                <label for="tasksTitle-field" class="form-label">Nom & Prénoms</label>
                                <input type="text" class="form-control" value="{{$pers->nom}}" readonly />
                                <input id="cong_id" type="text" class="idd form-control" readonly />

                            </div>
                        </div>




                        <div class="col-lg-4">
                            <label for="date-field" class="form-label">Date débat en congé</label>
                            <input name="c" type="date" id="econg" class="dat_con form-control"
                                data-provider="flatpickr" data-date-format="Y-m-d" value="" required />
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" href="" data-bs-toggle="modal">Annuler</button>
                        <button type="button" class="btn btn-success edi_cong" id="add-btn">Modifier </button>
                    </div>
                </div>

            </div>
        </div>


    </div>

    <div class="modal fade" id="showModalabs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        {{@csrf_field()}}
                        <div class="col-lg-8">
                            <div>
                                <label for="tasksTitle-field" class="form-label">Nom & Prénoms</label>
                                <input name="" type="text" class="form-control" value="{{$pers->nom}}" readonly />
                                <input name="idd" type="text" class="idd form-control" value="{{$pers->MATPE}}"
                                    style="display:none" readonly />
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <label for="date-field" class="form-label">Date abscence</label>
                            <input name="abss" type="date" id="date-field" class="abss form-control"
                                data-provider="flatpickr" data-date-format="Y-m-d" value="" required />
                        </div>

                        <div class="col-lg-12">
                            <div>
                                <label for="" class="form-label">Observation</label>
                                <input type="text" name="observe" class="observe form-control" value="" />
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" href="" data-bs-toggle="modal">Annuler</button>
                        <button type="button" class="btn btn-success add_abs" id="add-btn">Ajouter</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="showModaleabs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        {{@csrf_field()}}
                        <div class="col-lg-8">
                            <div>
                                <label for="tasksTitle-field" class="form-label">Nom & Prénoms</label>
                                <input name="" type="text" class="form-control" value="{{$pers->nom}}" readonly />
                                <input id="abs_id" type="text" class="idd form-control" readonly hidden />
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <label for="date-field" class="form-label">Date abscence</label>
                            <input name="abss" type="date" id="eabss" class="abss form-control"
                                data-provider="flatpickr" data-date-format="Y-m-d" value="" required />
                        </div>

                        <div class="col-lg-12">
                            <div>
                                <label for="" class="form-label">Observation</label>
                                <input type="text" id="eobserve" class="observe form-control" value="" />
                            </div>
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" href="" data-bs-toggle="modal">Annuler</button>
                        <button type="button" class="btn btn-success edi_abs" id="add-btn">Modifier</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade zoomIn" id="deleteRecordModalabs" tabindex="-1" aria-labelledby="deleteRecordLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="btn-close"></button>
                </div>
                <div class="modal-body p-5 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                        colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                    <div class="mt-4 text-center">
                        <input type="text" id="dabs" hidden>
                        <h4 class="fs-semibold">Etes vous sûr de vouloir supprimé cet enregistrement ?</h4>
                        <p class="text-muted fs-14 mb-4 pt-1"></p>
                        <div class="hstack gap-2 justify-content-center remove">
                            <button class="btn btn-link link-success fw-medium text-decoration-none"
                                data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>
                                Annuler</button>
                            <button class="dabs btn btn-danger" id="delete-record">Oui,
                                supprimer !!!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                    document.write(new Date().getFullYear())
                    </script> © Velzon.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>

<script>
$(document).ready(function() {

    fetchabs();

    function fetchabs() {

        $.ajax({
            type: "GET",
            url: "/fetch-abs/" + '{{$pers->MATPE}}',
            dataType: "json",
            success: function(response) {


                $('.sas').html("");
                $.each(response.labs, function(key, item) {

                    $('.sas').append('<tr>\
                            <th scope="row">  <div class="form-check"> <input class="form-check-input" type="checkbox" name="checkAll" value="option1"> </div></th>\
                            <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>\
                            <td class="">' + item.ANNAB + '</td>\
                            <td class="date">' + item.DA1AB + '</td>\
                            <td class="customer_name">' + item.OBSAB +
                        '</td>\
                            <td><ul class="list-inline hstack gap-2 mb-0"> <li> <button type="button" style="border:none; background-color:#FFFF" value="' +
                        item.id + '" class="eabs"> <i class="ri-pencil-fill align-bottom text-muted"></i></button>\
                            </li><li> <button type="button" style="border:none; background-color:#FFFF" value="' + item
                        .id + '" class="deabs">\
                            <i class="ri-delete-bin-fill align-bottom text-muted"></i></a></li></ul></td>\
                            </tr>'

                    );

                })

            }
        });
    }



    $(document).on('click', '.eabs', function(e) {
        e.preventDefault();
        var abs_id = $(this).val();
        //console.log(abs_id);
        $('#showModaleabs').modal('show');

        $.ajax({
            type: "GET",
            url: "/e-abs/" + abs_id,
            success: function(response) {

                if (response.status == 200) {
                    //console.log(response.abss.MATPE);

                    $('#eabss').val(response.abss.DA1AB);
                    $('#eobserve').val(response.abss.OBSAB);
                    $('#abs_id').val(abs_id);

                }
            }

        });

    });

    $(document).on('click', '.deabs', function(e) {
        e.preventDefault();
        var dabs = $(this).val();
        //console.log(abs_id);
        $('#dabs').val(dabs);
        $('#deleteRecordModalabs').modal('show');

    });

    $(document).on('click', '.dabs', function(e) {
        e.preventDefault();
        var dabs = $('#dabs').val();
        //console.log(dabs);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: "DELETE",
            url: "/d-abs/" + dabs,
            success: function(response) {

                if (response.status == 200) {
                    //console.log(response.abss.MATPE);

                    $('#success').addClass('alert alert-success');
                    $('#success').text(response.message);
                    $('#deleteRecordModalabs').modal('hide');
                    fetchabs();

                }
            }

        });

    });


    $(document).on('click', '.edi_abs', function(e) {
        e.preventDefault();


        var abs_idp = $('#abs_id').val();
        var data = {
            'DA1AB': $('#eabss').val(),
            'OBSAB': $('#eobserve').val(),

        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: "PUT",
            url: "/up-abs/" + abs_idp,
            data: data,
            dataType: "json",
            success: function(response) {
                console.log(response);

                if (response.status == 200) {

                    $('#success').addClass('alert alert-success');
                    $('#success').text(response.message)
                    $('#showModaleabs').modal('hide');
                    $('#showModaleabs').find('input').val("");
                    fetchabs();
                }
            }

        })
    });





    $(document).on('click', '.add_abs', function(e) {
        e.preventDefault();


        var data = {
            'MATPE': $('.idd').val(),
            'DA1AB': $('.abss').val(),
            'OBSAB': $('.observe').val()
        }
        // console.log(data);


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: "POST",
            url: "{{route('absence.store')}}",
            data: data,
            dataType: "json",
            success: function(response) {
                //console.log(response);

                if (response.status == 200) {

                    $('#success').addClass('alert alert-success');
                    $('#success').text(response.message)
                    $('#showModalabs').modal('hide');
                    $('#showModalabs').find('input').val("");
                    fetchabs();
                }
            }

        })
    });

    fetchcon();

    function fetchcon() {

        $.ajax({
            type: "GET",
            url: "/fetch-con/" + '{{$pers->MATPE}}',
            dataType: "json",
            success: function(response) {
                $('.scon').html("");
                $.each(response.lcon, function(key, item) {

                    $('.scon').append('<tr>\
                            <th scope="row">  <div class="form-check"> <input class="form-check-input" type="checkbox" name="checkAll" value="option1"> </div></th>\
                            <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a></td>\
                            <td class="customer_name">' + item.ANNCG + ' </td>\
                            <td class="customer_name">' + item.datedeb + ' </td>\
                            <td class="customer_name">' + item.datefin + ' </td>\
                            <td class="customer_name">' + item.datereprise + '  </td>\
                            <td class="customer_name">' + item.feri +
                        ' </td>\
                            <td><ul class="list-inline hstack gap-2 mb-0"> <li> <button type="button" style="border:none; background-color:#FFFF" value="' +
                        item.idc + '" class="econge"> <i class="ri-pencil-fill align-bottom text-muted"></i></button>\
                            </li><li> <button type="button" style="border:none; background-color:#FFFF" value="' + item
                        .idc + '" class="decong">\
                            <i class="ri-delete-bin-fill align-bottom text-muted"></i></a></li></ul></td>\
                            </tr>');

                })

            }
        })
    }

    $(document).on('click', '.econge', function(e) {
        e.preventDefault();
        var cong_id = $(this).val();
        //console.log(cong_id);
        $('#showModalecong').modal('show');

        $.ajax({
            type: "GET",
            url: "/e-cong/" + cong_id,
            success: function(response) {

                if (response.status == 200) {
                    //console.log(response.cong.MATPE);

                    $('#econg').val(response.cong.DADCG);
                    $('#cong_id').val(cong_id);

                }
            }

        });

    });

    $(document).on('click', '.decong', function(e) {
        e.preventDefault();
        var dcong = $(this).val();
        //console.log(abs_id);
        $('#dabs').val(dcong);
        $('#deleteRecordModalabs').modal('show');

    });

    $(document).on('click', '.dabs', function(e) {
        e.preventDefault();
        var dcong = $('#dabs').val();
        //console.log(dabs);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: "DELETE",
            url: "/d-cong/" + dcong,
            success: function(response) {

                if (response.status == 200) {
                    //console.log(response.abss.MATPE);

                    $('#successc').addClass('alert alert-success');
                    $('#successc').text(response.message);
                    $('#deleteRecordModalabs').modal('hide');
                    fetchcon();

                }
            }

        });

    });


    $(document).on('click', '.edi_cong', function(e) {
        e.preventDefault();


        var cong_idp = $('#cong_id').val();
        var data = {
            'DADCG': $('#econg').val(),

        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: "PUT",
            url: "/up-cong/" + cong_idp,
            data: data,
            dataType: "json",
            success: function(response) {
                console.log(response);

                if (response.status == 200) {

                    $('#successc').addClass('alert alert-success');
                    $('#successc').text(response.message)
                    $('#showModalecong').modal('hide');
                    $('#showModalecong').find('input').val("");
                    fetchcon();
                }
            }

        })
    });

    $(document).on('click', '.add_con', function(e) {
        e.preventDefault();


        var data = {
            'MATPE': $('.idd').val(),
            'DADCG': $('.dat_con').val(),

        }
        // console.log(data);


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type: "POST",
            url: "{{route('conge.store')}}",
            data: data,
            dataType: "json",
            success: function(response) {
                //console.log(response);

                if (response.status == 200) {

                    $('#successc').text(response.message);
                    $('#showModalcong').modal('hide');
                    $('#showModalcong').find('dat_con').val("");
                    fetchcon();
                }
                if (response.status == 206) {

                    $('#zz').text(response.message);
                    $('#successc').addClass(
                        'alert alert-success alert-border-left alert-dismissible fade show'
                        );
                    $('#za').addClass(' ri-notification-off-line me-3 align-middle fs-16');
                    $('#showModalcong').modal('hide');
                    $('#showModalcong').find('dat_con').val("");
                    //fetchcon();

                }

            }

        })
    });
});
</script>
<!-- end main content-->
@endsection



<!-- <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<head>
  <meta charset="utf-8" />
  <title>{{page_titre($titre ?? '')}}</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="{{asset('assets/img/logo/soneb.ico')}}" rel="shortcut icon" />
  <script src="https://kit.fontawesome.com/c11bf85a09.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="{{asset('assets/css/vendor.min.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/css/default/app.min.css')}}" rel="stylesheet" />
  <script src="{{asset('assets/js/aj.min.js')}}"></script>
  <script src="{{asset('assets/plugins/chart.js/dist/Chart.min.js')}}"></script>
  <link href="{{asset('assets/plugins/bootstrap-icons/font/bootstrap-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/plugins/bootstrap-social/bootstrap-social.css')}}" rel="stylesheet" />


  <link href="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
  <script src="{{asset('assets/plugins/moment/min/moment.min.js')}}"></script>
  <script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <link href="{{asset('assets/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" />
  <script src="{{asset('assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js')}}"></script>
  <link href="{{asset('assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css')}}" rel="stylesheet" />
  <script src="{{asset('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
  <link href="{{asset('assets/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
  <script src="{{asset('assets/plugins/select2/dist/js/select2.min.js')}}"></script>

  <link href="{{asset('assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
  <link href="{{asset('assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}"
    rel="stylesheet" />
  <link href="{{asset('assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" />


  <?php

use Illuminate\Support\Facades\Auth;

    header("refresh:300");
  ?>

</head>

<body>

  <div id="loader" class="app-loader">
    <span class="spinner"></span>
  </div>

  <divid="app" class="app app-header-fixed app-sidebar-fixed">

    <div id="header" class="app-header">

      <div class="navbar-header">
        <a href=" {{ request()-> is('home') ? 'active': '/' }} " class="navbar-brand"><span> <img style="height: 25px;"
              src="{{asset('assets/img/logo/soneb.jpg')}}" class="media-object" alt="" />
          </span><b>INFIRMERIE SONEB</b></a>
        <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>


      <div class="navbar-nav">
        <div class="navbar-item navbar-form">
          <form action="#" method="POST" name="search">

          </form>
        </div>
        <div class="navbar-item dropdown">
          <a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon">
            <i class="bi bi-bell"></i>
            <span class="badge">5</span>
          </a>
          <div class="dropdown-menu media-list dropdown-menu-end">
            <div class="dropdown-header">NOTIFICATIONS (5)</div>
            <a href="javascript:;" class="dropdown-item media">
              <div class="media-left">
                <i class="bi bi-bug media-object bg-gray-500"></i>
              </div>
              <div class="media-body">
                <h6 class="media-heading">Server Error Reports <i class="bi bi-exclamation-circle text-danger"></i></h6>
                <div class="text-muted fs-10px">3 minutes ago</div>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item media">
              <div class="media-left">
                <img src="{{asset('assets/img/user/user-1.jpg')}}" class="media-object" alt="" />
                <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
              </div>
              <div class="media-body">
                <h6 class="media-heading">John Smith</h6>
                <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                <div class="text-muted fs-10px">25 minutes ago</div>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item media">
              <div class="media-left">
                <img src="{{asset('assets/img/user/user-2.jpg')}}" class="media-object" alt="" />
                <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
              </div>
              <div class="media-body">
                <h6 class="media-heading">Olivia</h6>
                <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                <div class="text-muted fs-10px">35 minutes ago</div>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item media">
              <div class="media-left">
                <i class="bi bi-plus media-object bg-gray-500"></i>
              </div>
              <div class="media-body">
                <h6 class="media-heading"> New User Registered</h6>
                <div class="text-muted fs-10px">1 hour ago</div>
              </div>
            </a>
            <a href="javascript:;" class="dropdown-item media">
              <div class="media-left">
                <i class="bi bi-envelope media-object bg-gray-500"></i>
                <i class="fab fa-google text-warning media-object-icon fs-14px"></i>
              </div>
              <div class="media-body">
                <h6 class="media-heading"> New Email From John</h6>
                <div class="text-muted fs-10px">2 hour ago</div>
              </div>
            </a>
            <div class="dropdown-footer text-center">
              <a href="javascript:;" class="text-decoration-none">View more</a>
            </div>
          </div>
        </div>
        @guest

        @else

        <div class="navbar-item navbar-user dropdown">
          <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
            <img src="{{asset('assets/img/user/user-13.png')}}" alt="" />
            <span>
              <span class="d-none d-md-inline">

                <?php
                  $na = Auth::user()->name;
                  $i = App\models\personnel::Where('MATSA', $na)->first();
                  echo $i->PRESA;
                  echo ' ';
                  echo $i->NOMSA;
                ?>

              </span>
              <b class="caret"></b>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-end me-1">
          
            <a href="#pass" data-bs-toggle="modal" class="dropdown-item">Changer Mot de passe</a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Se deconnecter') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>

        </div>

        @endguest
      </div>

    </div>

    <div id="sidebar" class="app-sidebar app-sidebar-transparent">

      <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

        <div class="menu">
          <div class="menu-profile">
            <!-- <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile"
              data-target="#appSidebarProfileMenu"> -->
              <div class="menu-profile-cover with-shadow"></div>
              
              <div class="menu-profile-info">
                <div class="d-flex align-items-center">
                  <div class="flex-grow-1">
                    <h3 class="align-items-center">CENTRE HOSPITALIER DE SANTE DE LA SONEB</h3>

                    <!-- <a href=" {{ request()-> is('home') ? 'active': '/' }} "> </a> -->

                    <h6>
                      <?php
                      
                      ?> 
                    </h6>
                  </div>
                  <div class="menu-caret ms-auto"></div>
                </div>
                <small>
                  <?php
                  
                  ?>
                </small>
              </div>
            </a>
          </div>
          <div class="menu-header">Navigation</div>
          <div class="menu-item #">
            <a href=" {{('/personnel')}} " class="menu-link">
              <div class="menu-icon">
                <i class="fa fa-table"></i>
              </div>
              <div class="menu-text">Liste du Personnel </div>
            </a>
          </div>

          <div class="menu-item #">
            <a href=" {{('/personfam')}} " class="menu-link">
              <div class="menu-icon">
                <i class="fa fa-table"></i>
              </div>
              <div class="menu-text">Liste des Familles (Personnel) </div>
            </a>
          </div>

          <div class="menu-item #">
            <a href=" {{('/registres')}} " class=" menu-link">
              <div class="menu-icon">
                <i class="fa fa-table"></i>
              </div>
              <div class="menu-text">Régistres </div>
            </a>
          </div>

          <!-- <div class="menu-item #">
              <a href=" {{ request()-> is('rat') ? 'active': '/rat' }} " class="menu-link">
                  <div class="menu-icon">
                      <i class="fa fa-table"></i>
                  </div>
                  <div class="menu-text">Régistre d'Accident de Travail </div>
              </a>
          </div>
          <div class="menu-item #">
              <a href=" {{ request()-> is('rcs') ? 'active': '/rcs' }} " class="menu-link">
                  <div class="menu-icon">
                      <i class="fa fa-table"></i>
                  </div>
                  <div class="menu-text">Régistre de Consultation Spécialisée </div>
              </a>
          </div>
          <div class="menu-item #">
              <a href=" {{ request()-> is('rmp') ? 'active': '/rmp' }} " class="menu-link">
                  <div class="menu-icon">
                      <i class="fa fa-table"></i>
                  </div>
                  <div class="menu-text">Régistre des Maladies Professionnelles </div>
              </a>
          </div>

          <div class="menu-item #">
              <a href=" {{ request()-> is('rvms') ? 'active': '/rvms' }} " class="menu-link">
                  <div class="menu-icon">
                      <i class="fa fa-table"></i>
                  </div>
                  <div class="menu-text">Régistre des Visite Médicale Spéciale </div>
              </a>
          </div>

          <div class="menu-item #">
              <a href=" {{ request()-> is('rom') ? 'active': '/rom' }} " class="menu-link">
                  <div class="menu-icon">
                      <i class="fa fa-table"></i>
                  </div>
                  <div class="menu-text">Ordonnance Médicale </div>
              </a>
          </div>

          <div class="menu-item #">
              <a href=" {{ request()-> is('vac') ? 'active': '/vac' }} " class="menu-link">
                  <div class="menu-icon">
                      <i class="fa fa-table"></i>
                  </div>
                  <div class="menu-text">Régistre de Vaccination </div>
              </a>
          </div> -->

          <div class="menu-item #">
            <a href=" {{('/chs')}}} " class=" menu-link">
              <div class="menu-icon">
                <i class="fa fa-table"></i>
              </div>
              <div class="menu-text">Rapport Annuel CHS </div>
            </a>
          </div>

          <div class="menu-item #">
            <a href=" {{('/annee')}} " class=" menu-link">
              <div class="menu-icon">
                <i class="fa fa-table"></i>
              </div>
              <div class="menu-text">Tableaux Annexes </div>
            </a>
          </div>

          <div class="menu-item has-sub">
            <a href="javascript:;" class="menu-link">
              <div class="menu-icon">
                <i class="fa fa-sitemap"></i>
              </div>
              <div class="menu-text">Formulaires</div>
              <div class="menu-caret"></div>
            </a>
            <div class="menu-submenu">
              <div class="menu-item">
                <a href=" {{('/formrat')}} " class="menu-link">
                  <div class="menu-text"> Accident de Travail </div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formrcs')}} " class="menu-link">
                  <div class="menu-text"> Consultation Spontanée </div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formrmp')}} " class="menu-link">
                  <div class="menu-text">Maladie Professionnelle</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formrvms')}} " class="menu-link">
                  <div class="menu-text">Visite Médicale Spécialisé</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formrvac')}} " class="menu-link">
                  <div class="menu-text">Vaccination</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formrom')}} " class="menu-link">
                  <div class="menu-text">Ordonnance Médicale</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formabs')}} " class="menu-link">
                  <div class="menu-text">Absentéisme</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formconvoc')}} " class="menu-link">
                  <div class="menu-text">Convocation</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/formante')}} " class="menu-link">
                  <div class="menu-text">Antecedents</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/poste')}} " class="menu-link">
                  <div class="menu-text">Postes</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/etab1')}} " class="menu-link">
                  <div class="menu-text">Tableau 01 et 02</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{('/etab3')}} " class="menu-link">
                  <div class="menu-text">Tableau 03</div>
                </a>
              </div>
              <!-- <div class="menu-item">
                <a href=" {{ request()-> is('etab4') ? 'active': '/etab4' }} " class="menu-link">
                  <div class="menu-text">Tableau 04</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{ request()-> is('etab5') ? 'active': '/etab5' }} " class="menu-link">
                  <div class="menu-text">Tableau 05</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{ request()-> is('etab6') ? 'active': '/etab6' }} " class="menu-link">
                  <div class="menu-text">Tableau 06</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{ request()-> is('etab7') ? 'active': '/etab7' }} " class="menu-link">
                  <div class="menu-text">Tableau 07</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{ request()-> is('etab8') ? 'active': '/etab8' }} " class="menu-link">
                  <div class="menu-text">Tableau 08</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{ request()-> is('etab9') ? 'active': '/etab9' }} " class="menu-link">
                  <div class="menu-text">Tableau 09</div>
                </a>
              </div>
              <div class="menu-item">
                <a href=" {{ request()-> is('etab10') ? 'active': '/etab10' }} " class="menu-link">
                  <div class="menu-text">Tableau 10</div>
                </a>
              </div> -->
            </div>
          </div>


          <div class=""></div>

          @can('manager-users')
                <div class="menu-item has-sub {{active_route('register')}}">
                    <a href="{{route('register')}}" class="menu-link">
                        <div class="menu-icon">
                            <i class="fa fa-id-card"></i>
                        </div>
                        <div class="menu-text">Utilisateur</div>

                    </a>

                </div>
                @endcan


          

          <div class="menu-item d-flex">
            <a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i
                class="fa fa-angle-double-left"></i></a>
          </div>

        </div>

      </div>

    </div>
    </div>

    <div class="app-sidebar-bg"></div>
    <div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a>
    </div>
    <div class="app-sidebar-bg"></div>
    <div class="app-sidebar-mobile-backdrop">
      <a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a>
    </div>

    <div class="main">
      
        <br><br>
      
        
            <div id="content" class="app-content">
            <div>
                <div class="invoice-content">


                <div class="invoice-company">
                    <span class="float-end hidden-print">
                    <a href=" {{ route('generatePDF', ['id' => $empsaa0->id]) }} " class="btn btn-sm btn-white mb-10px"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a>
                    <a href="javascript:;" onclick="if (!window.__cfRLUnblockHandlers) return false; window.print()" class="btn btn-sm btn-white mb-10px" data-cf-modified-7e50cd0cbefb22ffc16a0859-=""><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
                    </span>
                </div>


                    <div class="card-body container-fluid" id="container">
                    <div class="row">


                        <div class="card-body container-fluid"  style="font-size: large;">
                            <h2 style="text-align: center;">I- FICHE D'IDENTIFICATION</h2>
                            <div class="row">
                                    NOM :  {{$empsaa0->NOMSA}} <br><br>
                                    PRENOMS :  {{$empsaa0->PRESA}} <br><br>
                                    DATE DE NAISSANCE LIEU :  {{$empsaa0->ANCSA}} <br><br>
                                    SEXE : {{$empsaa0->SEXSA}}  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; NATIONALITE : {{$empsaa0->NATSA}}  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; TAILLE : <br><br>
                                    GROUPE SANGUIN-RHESUS : <br><br>
                                    ELECTROPHORESE DE L'HEMOGLOBINE : <br><br>
                                    SITUATION MATRIMONIALE :{{$empsaa0->SITSA}} <br><br>
                                    NOMBRE D'ENFANTS A CHARGE : {{$empsaa0->CHASA}}  <br><br>
                                    ADRESSE PERSONNELLE :   <br><br>
                                    N° D'AFFILIATION A LA CNSS : {{$empsaa0->SECSA}}  <br><br>
                                    PERSONNES A PREVENIR EN CAS D'ACCIDENT (NOMS, LIEN ET TELEPHONES) : <br><br>
                                    DATE D'EMBAUCHE : {{$empsaa0->DNASA}}  <br><br>
                                    DATE DE DEPART DE L'ENTREPRISE : <br><br>
                                    MOTIF DU DEPART : <br><br>
                                    QUALIFICATION : {{$empsaa0->LEMSA}}  <br><br>
                                </div>
                        </div>
                        <div style="page-break-after: always;" ></div>


                        <div class="card-body container-fluid" id="index_at">
                            <h2 style="text-align: center;"> II- FICHE ANTECEDENTS</h2>
                        <table class="table caption-top table-bordered ">
                            <caption></caption>
                            <thead>
                                <tr>
                                    <th> </th>
                                    <th scope="col">MEDICAUX</th>
                                    <th scope="col">CHIRURGICAUX</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empsaa00 as $empsaa00)
                                <tr>
                                
                                    <td> PERSONNELS </td>
                                    <td>
                                        Hypertension artérielle :  {{$empsaa00->HYPER}}<br>
                                        Hypotension  artérielle : {{$empsaa00->HYPO}}<br>
                                        Diabète : {{$empsaa00->DIABETE}}<br>
                                        Ulcère : {{$empsaa00->ULCERE}}<br>
                                        Asthme : {{$empsaa00->ASTHME}}<br>
                                        Sinusite : {{$empsaa00->SINUSITE}}<br>
                                        Maladie hémorroïdaire : {{$empsaa00->HEMOROIDE}}<br>
                                        Epilepsie : {{$empsaa00->EPILEPSIE}}<br>
                                        Drépanocytose : {{$empsaa00->DREPANO}}<br>
                                        Hépatite : {{$empsaa00->HEPATIE}}<br>
                                        Autres : {{$empsaa00->AUTRES}}<br>
                                    </td>
                                    <td> {{$empsaa00->PEC}}</td>
                            
                                </tr>
                                @endforeach
                                @foreach ($empsaa000 as $empsaa000)
                                <tr>
                                
                                    <td> PROFESSIONNELS</td>
                                    <td> {{$empsaa000->PRM}}</td>
                                    <td> {{$empsaa000->PRC}}</td>
                                
                                </tr>
            @endforeach
            @foreach ($empsaa0000 as $empsaa0000)
                                <tr>
                                
                                    <td> FAMILIAUX </td>
                                    <td>
                                        Père: HTA:{{$empsaa0000->PHTA}}<br>
                                            Diabète:{{$empsaa0000->PDIABETE}}<br>
                                            Autres:{{$empsaa0000->PAUTRE}}<br>
                                        Mère: HTA: {{$empsaa0000->MHTA}}<br>
                                            Diabète: {{$empsaa0000->MDIABETE}}<br>
                                            Autres: {{$empsaa0000->MAUTRE}}<br>
                                    </td>
                                    <td> {{$empsaa0000->FAC}}</td>
                                
                                </tr>
            @endforeach
            @foreach ($empsaa00000 as $empsaa00000)
                                <tr>
                                
                                    <td> SOCIAUX </td>
                                    <td>
                                        PERSONNELS<br>
                                        Tabac: {{$empsaa00000->TABAC}}<br>
                                        Alcool: {{$empsaa00000->ALCOOL}}
                                    </td>
                                    <td> {{$empsaa00000->SOF}}</td>
                                
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div style="page-break-after: always;" ></div>



                    <div class="card-body container-fluid">
                    <h2 style="text-align: center;"> III- FICHE POSTE</h2>
                    <h4 style="text-align: center;">1.POSTES DE TRAVAIL OCCUPES ANTERIEUREMENT</h4>
                                <div class="card-body container-fluid" id="index_at">
                                    <table class="table caption-top table-bordered ">
                                        <caption></caption>
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>DENOMINATION</th>
                                                <th>ENTREPRISE</th>
                                                <th>PERIODE</th>
                                                <th>FACTEURS DE NUISANCE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($empsaa1 as $empsaa1)
                                            <tr>
                                                <td>
                                                </td>
                                                <td> {{$empsaa1->DENOMINATION}}</td>
                                                <td>{{$empsaa1->ENTREPRISE}}</td>
                                                <td>
                                                    {{$empsaa1->PERIODEDU}}
                                                    {{$empsaa1->PERIODEAU}}
                                                </td>
                                                <td>{{$empsaa1->FACTEURNUI}}</td>
                                            
                                </tr>
                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div style="page-break-after: always;" ></div>
                                <br><br>
                                <h4 style="text-align: center;">2. POSTES OCCUPES ACTUELLEMENT</h4>
                                <div class="card-body container-fluid" id="index_at">
                                    <table class="table caption-top table-bordered ">
                                        <caption></caption>
                                        <thead>
                                            <tr>
                                                <th>PERIODE</th>
                                                <th>POSTE</th>
                                                <th>TACHES</th>
                                                <th>RYTHME DE TRAVAIL</th>
                                                <th>FACTEURS DE NUISANCE</th>
                                                <th>METROLOGIE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($empsaa1 as $empsaa1)
                                            <tr>
                                
                                                <td>
                                                    DU {{$empsaa1->PERIODEDU}}<br>
                                                    AU {{$empsaa1->PERIODEAU}}
                                                </td>
                                                <td> {{$empsaa1->LEMSA}} </td>
                                                <td> {{$empsaa1->TACHES}}</td>
                                                <td>{{$empsaa1->RYTMTAF}}</td>
                                                <td>{{$empsaa1->FACTEURNUI}}</td>
                                                <td>
                                                    DATE: {{$empsaa1->METRODATE}}<br>
                                                    TYPE: {{$empsaa1->METROTYPE}}<br>
                                                    R: {{$empsaa1->METROR}}
                                                </td>
                                            
                                </tr>
                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                    <div style="page-break-after: always;" ></div>


                    <div class="card-body container-fluid">
                    <h2 style="text-align: center;">IV- FICHE VACCINATION</h2>
                    <div class="card-body container-fluid" id="index_at">
                                    <table class="table caption-top table-bordered ">
                                        <caption></caption>
                                        <thead>
                                            <tr>
                                                <th>DATE</th>
                                                <th>VACCIN</th>
                                                <th>LOT</th>
                                                <th>TYPE</th>
                                                <th>DOSE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($empsaa2 as $empsaa2)
                                            <tr>
                                                <td> {{$empsaa2->DATE}} </td>
                                                <td> {{$empsaa2->VACCIN}}</td>
                                                <td>{{$empsaa2->LOT}}</td>
                                                <td>{{$empsaa2->TYPE}}</td>
                                                <td>{{$empsaa2->DOSE}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                    <div style="page-break-after: always;" ></div>



                    <div class="card-body container-fluid">
                    <h2 style="text-align: center;"> V- FICHE ABSENTEISME</h2>
                    <div class="card-body container-fluid" id="index_at">
                                    <table class="table caption-top table-bordered ">
                                        <caption></caption>
                                        <thead>
                                            <tr>
                                                <th>TYPE</th>
                                                <th style="width: 25%;">CAUSE</th>
                                                <th>DEBUT</th>
                                                <th>REPRISE</th>
                                                <th style="width: 15%;">NBRE DE JOURS D'ARRET</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($empsaa3 as $empsaa3)
                                            <tr>
                                                <td>{{$empsaa3->TYPEABS}} </td>
                                                <td>{{$empsaa3->CAUSE}}</td>
                                                <td>{{$empsaa3->DEBUT}}</td>
                                                <td>{{$empsaa3->REPRISE}}</td>
                                                <td>{{$empsaa3->NBRARRET}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                    <div style="page-break-after: always;" ></div>

                    <div class="card-body container-fluid">
                    <h2 style="text-align: center;">VI- FICHE ACCIDENT DU TRAVAIL</h2>
                    <div class="card-body container-fluid" id="index_at">
                                    <table class="table caption-top table-bordered ">
                                        <caption></caption>
                                        <thead>
                                            <tr>
                                                <th>DATE</th>
                                                <th>ELEMENT MATERIEL CAUSAL</th>
                                                <th>NATURE DES LESIONS</th>
                                                <th>POSTE</th>
                                                <th>NBRE DE JOURS D'ARRET</th>
                                                <th>INCAPACITE PERMANENTE PARTIELLE (IPP)</th>
                                                <th>OBSERVATION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($empsaa4 as $empsaa4)
                                            <tr>
                                                <td>{{$empsaa4->DATECONS}}</td>
                                                <td>{{$empsaa4->CAUSEAT}}</td>
                                                <td>{{$empsaa4->NATURELESI}}</td>
                                                <td>{{$empsaa4->LEMSA}}</td>
                                                <td>{{$empsaa4->NBRARRETAT}}</td>
                                                <td>{{$empsaa4->SEXSA}}</td>
                                                <td>{{$empsaa4->OBSERVATIONAT}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                    <div style="page-break-after: always;" ></div>




                    <div class="card-body container-fluid">
                    <h2 style="text-align: center;"> VII- FICHE MALADIE PROFESSIONNELLE</h2>
                    <div class="card-body container-fluid" id="index_at">
                                    <table class="table caption-top table-bordered ">
                                        <caption></caption>
                                        <thead>
                                            <tr>
                                                <th>DATE</th>
                                                <th>MALADIE</th>
                                                <th>N°TABLEAU</th>
                                                <th>AGENT CAUSAL</th>
                                                <th>POSTE</th>
                                                <th>DECISION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($empsaa5 as $empsaa5)
                                            <tr>
                                                <td> {{$empsaa5->DATEMP}} </td>
                                                <td> {{$empsaa5->MPDESIGNATION}}</td>
                                                <td>{{$empsaa5->MPNUMTAB}}</td>
                                                <td>{{$empsaa5->AGENTPATH}}</td>
                                                <td>{{$empsaa5->LEMSA}}</td>
                                                <td>{{$empsaa5->OBSERVATIONMP}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                    <div style="page-break-after: always;" ></div>


                    <div class="card-body container-fluid">
                    <h2 style="text-align: center;"> VIII- FICHE CONVOCATION</h2>
                    <div class="card-body container-fluid" id="index_at">
                                    <table class="table caption-top table-bordered ">
                                        <caption></caption>
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>Motif</th>
                                                <th>Date d'émission</th>
                                                <th>Date de convocation</th>
                                                <th>Date de présentation</th>
                                                <th>Observation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($empsaa6 as $empsaa6)
                                            <tr>
                                                <td> {{$empsaa6->id}} </td>
                                                <td> {{$empsaa6->MOTIF}}</td>
                                                <td>{{$empsaa6->DATEEMIS}}</td>
                                                <td>{{$empsaa6->DATECONVOC}}</td>
                                                <td>{{$empsaa6->DATEPRES}}</td>
                                                <td>{{$empsaa6->OBSERVATION}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                    <div style="page-break-after: always;" ></div>


                    
                    <div class="card-body container-fluid">
                    <h2 style="text-align: center;"> IX- FICHE CONSULTATION</h2>
                    <div class="card-body container-fluid" id="index_at">
                                    <table class="table caption-top table-bordered ">
                                        <caption></caption>
                                        <thead>
                                            <tr>
                                                <th>N°</th>
                                                <th>DATE</th>
                                                <th>PLAINTES</th>
                                                <th>CONSTANTES</th>
                                                <th>EXAMEN CLINIQUE</th>
                                                <th>DIAGNOSTIC</th>
                                                <th>BILAN</th>
                                                <th>TRAITEMENTS</th>
                                                <th>OBSERVATIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($empsaa7 as $empsaa7)
                                            <tr>
                                                <td> {{$empsaa7->id}} </td>
                                                <td> {{$empsaa7->DATECS}}</td>
                                                <td>{{$empsaa7->PLAINTESCS}}</td>
                                                <td>{{$empsaa7->POULSCS}}</td>
                                                <td>{{$empsaa7->EXAMCLICS}}</td>
                                                <td>{{$empsaa7->DIAGNOSTIC}}</td>
                                                <td>{{$empsaa7->BILAN}}</td>
                                                <td>{{$empsaa7->TRAITEMENTCS}}</td>
                                                <td>{{$empsaa7->OBSERVATIONCS}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                    </div>
                    <div style="page-break-after: always;" ></div>

                <!-- VMS -->

                <div class="card-body container-fluid" style="font-size: large;">
                                    <div >N° FICHE ..........
                                        <div  style="text-align: right;">IT N°  <br><br>
                                            .............., le ......................................
                                        </div>
                                    </div>
                                    <h4 style="text-align: center;">VISITE MEDICALE  </h4>
                                    <div>Noms:</div>
                                    <div>Prénoms:</div>
                                    <div>Sexe:</div>
                                    <div>Postre de travail:</div>
                                    <br><br>

                                    <h4 style="font-weight: bold; text-decoration:solid;">I- Clinique</h4>
                                    <div>Plaintes:</div>
                                    <div>Mensurations:
                                        <div class="">
                                            Poids:  kg &nbsp;&nbsp;&nbsp;&nbsp; Taille:  m  &nbsp;&nbsp;&nbsp;&nbsp; TA:  / mmHg<br>
                                            PTI:  cm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PTE:  cm &nbsp;&nbsp;&nbsp;&nbsp; PA :  cm <br>
                                            Pouls:  pls/mm &nbsp;&nbsp;&nbsp;&nbsp; AV:OD:  /10 &nbsp;&nbsp;&nbsp;&nbsp; OG:  /10
                                        </div>
                                    </div>
                                    <div>Examen clinique:</div><br><br>

                                    <h4 style="font-weight: bold; text-decoration:solid;">II- Examens complémentaires</h4>
                                    <div>
                                        Biologie: 
                                            -Urines:  Glucosurie:  Albuminurie:<br>
                                            -Sang:
                                    </div>
                                    <div>Electocardiogramme:</div>
                                    <div>Audiométrie:</div>
                                    <div>Spirométrie:</div>
                                    <div>Rx pulmonaire:</div><br><br>

                                    <h4 style="font-weight: bold; text-decoration:solid;">III- Conduite à tenir</h4>
                                    <div>-</div>
                                    <div>-</div>
                                    <div>-Ordonnance médicale: </div><br><br>

                                    <h4 style="font-weight: bold; text-decoration:solid";>IV- Aptitude:</h4>
                                </div>


                    </div>
                    <div style="page-break-after: always;" ></div>
                    </div>
                </div>
            </div>
            </div>


            <script>
            document.getElementById('content').getContext('2d');
            </script>

            
    </div>


    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i
        class="bi bi-angle-up"></i></a>

    </div>

    <div class=" modal fade" id="pass">
            <div class="modal-dialog modal-md">
                <div style="background-color: #e2e2e2 ;" class="modal-content">

                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <h4 class="panel-title">Changer son mot de passe</h4>

                        </div>
                    </div>
                    <div style="background-color: #e2e2e2 ;" class="modal-body">

                        @csrf

                        <div class="row"> 

                        

                        <div class="col-xl-5 mb-3">
                            <label class="form-label" for="exampleInputEmail1">Matricule</label>
                            <input type="text" class="form-control-sm" value="" readonly>
                        </div>
                        <div class="col-xl-7 mb-3">
                            <label class="form-label" for="exampleInputPassword1">Email</label>
                            <input readonly type="email" class="mail form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email" />

                        </div>

                       
                        <div class="col-xl-6 mb-3">
                            <label class="form-label" for="exampleInputPassword1">Ancien mot de passe</label>
                            <input  type="text" class="old form-control form-control-sm @error('old') is-invalid @enderror" id="old"  name="old" value="" required autocomplete="old" />

                        </div>

                        <div class="col-xl-6 mb-3">
                            <label class="form-label" for="exampleInputPassword1">Nouveau mot de passe</label>
                            <input  type="password" class="mail form-control form-control-sm @error('pas') is-invalid @enderror" id="pas" name="pas" value="" required autocomplete="pas" />

                        </div>

                        </div>


                    </div>

                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Annuler</a>
                        <a id="" class="up_pas btn btn-primary" type="submit">Changer mon mot de passe</a>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script type="text/javascript">
        $(document).ready( function () {

    $(document).on('click','.up_pas', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            var $old = $('#old').val();
            var $pas = $('#pas').val();
            //let pas = $(this).attr('id');
        
        console.log(id);
        let csrf = '{{ csrf_token() }}';
           
            var data = {
             
                'password' : $('#pas').val(),
                'old' : $old,
                'pas' : $pas,
                

            }
            console.log(data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
               
            
            $.ajax({
                type:"PUT",
                url:"/up-pass/"+id,
                data:data,
                dataType:"json",
                success: function(response){
                 console.log(response);

                    if(response.status==200){
                        $.gritter.add({
                            title: 'Notification',
                            text: 'Modification effectuée avec succès',
                            time: 4000,
                            class_name: 'my-sticky-class gritter-light',
                            style_name: 'background-color:red',
                            before_open: function(){ },
                            after_open: function(e){ },
                            before_close: function(manual_close) { },
                            after_close: function(manual_close){ } 
                        });


                        $('#pass').modal('hide');
                        $('#pass').find('input').val("");
                        fetchtv();
                    }else{

                        $.gritter.add({
                            title: 'Notification',
                            text: 'Cette information existe déja !!!',
                            time: 4000,
                            class_name: 'my-sticky-class gritter-light',
                            style_name: 'background-color:red',
                            before_open: function(){ },
                            after_open: function(e){ },
                            before_close: function(manual_close) { },
                            after_close: function(manual_close){ } 
                            

                        });
                    // $('#smtv').modal('hide');
                      //  fetchtv();

                    };
                }

            })
        });
        });
        </script>







    <script src="{{asset('assets/js/vendor.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/app.min.js')}}" type="text/javascript"></script>


    <script src="{{asset('assets/plugins/highlightjs/cdn-assets/highlight.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/demo/render.highlight.js')}}" type="text/javascript"></script>



    <script src="{{asset('assets/plugins/gritter/js/jquery.gritter.js')}}"></script>
    <script src="{{asset('assets/plugins/sweetalert/dist/sweetalert.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/demo/ui-modal-notification.demo.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"
      type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"
      type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"
      type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"
      type="text/javascript"></script>

    <script src="{{asset('assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js')}}"
      type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"
      type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js')}}"
      type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables.net-buttons/js/buttons.flash.min.js')}}"
      type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables.net-buttons/js/buttons.html5.min.js')}}"
      type="text/javascript"></script>
    <script src="{{asset('assets/plugins/datatables.net-buttons/js/buttons.print.min.js')}}"
      type="text/javascript"></script>
    <script src="{{asset('assets/plugins/jszip/dist/jszip.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/chart.js/dist/Chart.min.js')}}"></script>

    <script src="{{asset('assets/js/rocket-loader.min.js')}}" data-cf-settings="a78dc8ef45d27e685eaf4c36-|49"
      defer=""></script>

    <script src="{{asset('ex/tableExport.js')}}"></script>

</body>

<!-- Mirrored from seantheme.com/color-admin/admin/html/ui_social_buttons.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 22 May 2022 08:58:49 GMT -->

</html> -->