@extends('def.def')

@section ('contenta')

<div id="content" class="app-content">
    <div class="profil-content">
        <div class="card-body">
            <div class="row">
            <div class="card-body">
                    <div class="row">
                        <h2>Tableau :</h2>
                        <div class="card-body container-fluid" id="index_tab1"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h2>Tableau :</h2>
                        <div class="card-body container-fluid" id="index_tab2"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h2>Tableau :</h2>
                        <div class="card-body container-fluid" id="index_tab3"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h2>Tableau :</h2>
                        <div class="card-body container-fluid" id="index_tab4"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h2>Tableau :</h2>
                        <div class="card-body container-fluid" id="index_tab5"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h2>Tableau :</h2>
                        <div class="card-body container-fluid" id="index_tab6"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h2>Tableau :</h2>
                        <div class="card-body container-fluid" id="index_tab7"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h2>Tableau :</h2>
                        <div class="card-body container-fluid" id="index_tab8"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h2>Tableau :</h2>
                        <div class="card-body container-fluid" id="index_tab9"></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h2>Tableau :</h2>
                        <div class="card-body container-fluid" id="index_tab10"></div>
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
                $("#index_tab1").html(response);
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
                $("#index_tab2").html(response);
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
                $("#index_tab3").html(response);
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
                $("#index_tab4").html(response);
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
                $("#index_tab5").html(response);
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
                $("#index_tab6").html(response);
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
                $("#index_tab7").html(response);
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
                $("#index_tab8").html(response);
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
                $("#index_tab9").html(response);
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
                $("#index_tab10").html(response);
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