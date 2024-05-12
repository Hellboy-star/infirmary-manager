@extends('def.def', ['titre'=>'Tableaux Annexes Rapport Annuel'])
@section('contenta')

<div id="content" class="app-content">

    <h1 class="page-header" style="text-align: center; text-decoration:underline"> TABLEAUX ET DOCUMENTS A  ANNEXER ANNEE {{$empsaa->ANNEE}} </h1>


    <div class="row">
        <div class="col-xl-12">
            <div class="panel panel-inverse panel-with-tabs" data-sortable-id="ui-unlimited-tabs-1">
                <div class="panel-heading p-0">
                    <div class="tab-overflow">
                        <ul class="nav nav-tabs nav-tabs-inverse">
                            <li class="nav-item prev-button"><a href="javascript:;" data-click="prev-tab"
                                    class="nav-link text-primary"><i class="bi bi-arrow-left"></i></a></li>
                            <li class="nav-item"><a href="#nav-tab-1" data-bs-toggle="tab"
                                    class="nav-link active">Tableau 01</a></li>
                            <li class="nav-item"><a href="#nav-tab-2" data-bs-toggle="tab" class="nav-link">Tableau 02</a></li>
                            <li class="nav-item"><a href="#nav-tab-3" data-bs-toggle="tab"
                                    class="nav-link">Tableau 03</a></li>
                            <li class="nav-item"><a href="#nav-tab-4" data-bs-toggle="tab" class="nav-link">Tableau 04</a>
                            </li>
                            <li class="nav-item"><a href="#nav-tab-5" data-bs-toggle="tab" class="nav-link">Tableau 05</a>
                            </li>
                            <li class="nav-item"><a href="#nav-tab-6" data-bs-toggle="tab" class="nav-link">Tableau 06</a>
                            </li>
                            <li class="nav-item"><a href="#nav-tab-7" data-bs-toggle="tab"
                                    class="nav-link">Tableau 07</a>
                            </li>
                            <li class="nav-item"><a href="#nav-tab-8" data-bs-toggle="tab"
                                    class="nav-link">Tableau 08</a>
                            </li>
                            <li class="nav-item"><a href="#nav-tab-9" data-bs-toggle="tab" class="nav-link">Tableau 09</a>
                            </li>
                            <li class="nav-item"><a href="#nav-tab-10" data-bs-toggle="tab"
                                    class="nav-link">Tableau 10</a>
                            </li>
                            <li class="nav-item next-button"><a href="javascript:;" data-click="next-tab"
                                    class="nav-link text-primary"><i class="bi bi-arrow-right"></i></a>
                            </li>
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
                            <div class="card-body container-fluid" id="show_tab1">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-tab-2">
                        <div class="row">
                            <div class="col-md-7 card-body" id="show_tab2">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>
                            <div class="col-md-5 card-body" id="">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-tab-3">
                        <div class="row">
                            <div class="col-md-7 card-body" id="show_tab3">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-tab-4">
                        <div class="row">
                            <div class="col-md-7 card-body" id="show_tab4">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-tab-5">
                        <div class="row">
                            <div class="col-md-7 card-body" id="show_tab5">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-tab-6">
                        <div class="row">
                            <div class="col-md-7 card-body" id="show_tab6">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>
                            <div class="col-md-5 card-body" id="">  
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-tab-7">
                        <div class="row">
                            <div class="col-md-7 card-body" id="show_tab7">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>
                            <div class="col-md-5 card-body" id="">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-tab-8">
                        <div class="row">
                            <div class="col-md-7 card-body" id="show_tab8">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-tab-9">
                        <div class="row">
                            <div class="col-md-7 card-body" id="show_tab9">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-tab-10">
                        <div class="row">
                            <div class="col-md-7 card-body" id="show_tab10">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        
       tab1();
       
       function tab1() {
        $.ajax({
            url: "{{ url('/t1') }}",
            method: 'get',
            success: function(response) {
                $("#show_tab1").html(response);
                $(".table0").DataTable({
                    order: [0, 'desc'],
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excelHtml5', 'print'],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });
       };

        
       tab2();
       
       function tab2() {
        $.ajax({
            url: "{{ url('/t2') }}",
            method: 'get',
            success: function(response) {
                $("#show_tab2").html(response);
                $(".table0").DataTable({
                    order: [0, 'desc'],
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excelHtml5', 'print'],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });
       };
        
       tab3();
       
       function tab3() {
        $.ajax({
            url: "{{ url('/t3') }}",
            method: 'get',
            success: function(response) {
                $("#show_tab3").html(response);
                $(".table0").DataTable({
                    order: [0, 'desc'],
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excelHtml5', 'print'],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });
       };
        
       tab4();
       
       function tab4() {
        $.ajax({
            url: "{{ url('/t4') }}",
            method: 'get',
            success: function(response) {
                $("#show_tab4").html(response);
                $(".table0").DataTable({
                    order: [0, 'desc'],
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excelHtml5', 'print'],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });
       };
        
       tab5();
       
       function tab5() {
        $.ajax({
            url: "{{ url('/t5') }}",
            method: 'get',
            success: function(response) {
                $("#show_tab5").html(response);
                $(".table0").DataTable({
                    order: [0, 'desc'],
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excelHtml5', 'print'],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });
       };
        
       tab6();
       
       function tab6() {
        $.ajax({
            url: "{{ url('/t6') }}",
            method: 'get',
            success: function(response) {
                $("#show_tab6").html(response);
                $(".table0").DataTable({
                    order: [0, 'desc'],
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excelHtml5', 'print'],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });
       };
        
       tab7();
       
       function tab7() {
        $.ajax({
            url: "{{ url('/t7') }}",
            method: 'get',
            success: function(response) {
                $("#show_tab7").html(response);
                $(".table0").DataTable({
                    order: [0, 'desc'],
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excelHtml5', 'print'],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });
       };
        
       tab8();
       
       function tab8() {
        $.ajax({
            url: "{{ url('/t8') }}",
            method: 'get',
            success: function(response) {
                $("#show_tab8").html(response);
                $(".table0").DataTable({
                    order: [0, 'desc'],
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excelHtml5', 'print'],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });
       };
        
       tab9();
       
       function tab9() {
        $.ajax({
            url: "{{ url('/t9') }}",
            method: 'get',
            success: function(response) {
                $("#show_tab9").html(response);
                $(".table0").DataTable({
                    order: [0, 'desc'],
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excelHtml5', 'print'],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/fr-FR.json'
                    }
                });
            }
        });
       };
        
       tab10();
       
       function tab10() {
        $.ajax({
            url: "{{ url('/t10') }}",
            method: 'get',
            success: function(response) {
                $("#show_tab10").html(response);
                $(".table0").DataTable({
                    order: [0, 'desc'],
                    dom: 'Bfrtip',
                    buttons: ['copy', 'excelHtml5', 'print'],
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