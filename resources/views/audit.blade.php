@extends('def.def')

@section ('contenta')

<div id="content" class="app-content">

	<h1>  </h1>

	<div class="row">

		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-info">
				<div class="stats-icon"><i class="fa fa-table"></i></div>
				<div class="stats-info">
					<h4>ACCIDENT DE TRAVAIL</h4>
                      <p> 
						<?php
							$a=App\Models\At::count();
							echo $a;
						?>
					  </p>
				</div>
				
			</div>
		</div>


		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-info">
				<div class="stats-icon"><i class="fa fa-table"></i></div>
				<div class="stats-info">
					<h4>MALADIES PROFESSIONNELLES</h4>
					<p> 
						<?php
							$a=App\Models\Mp::count();
							echo $a; 
						?>
					</p>
				</div>
				
			</div>
		</div>


		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-info">
				<div class="stats-icon"><i class="fa fa-table"></i></div>
				<div class="stats-info">
					<h4>CONSULTATION SPONTANEES</h4>
					<p> 
						<?php
							$a=App\Models\Cs::count();
							echo $a; 
						?>
					</p>
				</div>
				
			</div>
		</div>


		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-info">
				<div class="stats-icon"><i class="fa fa-table"></i></div>
				<div class="stats-info">
					<h4>VISITE MEDICALE SPECIALISEE</h4>
					<p> 
						<?php
							$a=App\Models\Vms::count();
							echo $a; 
						?>
					</p>
				</div>
				
			</div>
		</div>

		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-info">
				<div class="stats-icon"><i class="fa fa-table"></i></div>
				<div class="stats-info">
					<h4>ABSENTEISME</h4>
					<p> 
						<?php
							$a=App\Models\Abs::count();
							echo $a; 
						?>
					</p>
				</div>
				
			</div>
		</div>



		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-info">
				<div class="stats-icon"><i class="fa fa-table"></i></div>
				<div class="stats-info">
					<h4>CONVOCATIONS</h4>
					<p> 
						<?php
							 $a=App\Models\Convocation::where('DELETED', '!=', 'Invalide')
							 ->count();
							 echo $a;
						?>
					</p>
				</div>
				
			</div>
		</div>



		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-info">
				<div class="stats-icon"><i class="fa fa-table"></i></div>
				<div class="stats-info">
					<h4>VACCINATION</h4>
					<p> 
						<?php
							 $a=App\Models\Vac::count();
							 echo $a;
						?>
					</p>
				</div>
				
			</div>
		</div>

		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-info">
				<div class="stats-icon"><i class="fa fa-table"></i></div>
				<div class="stats-info">
					<h4>ORDONNANCES MEDICALES</h4>
					<p> 
						<?php
							 $a=App\Models\Om::count();
							 echo $a;
						?>
					</p>
				</div>
				
			</div>
		</div>


	</div>

	
	<div class="row">
		<div class="col-xl col-md">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title" style="text-align: center;"> TABLEAUX DE GESTION </h4>
				</div>

				<div class="panel-body p-0" >
					<div class="col-md-12 card-body" id="show_audit">
                        <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                    </div>
				</div>
			</div>
		</div>
	</div>


	<!-- <div class="row">

		<div class="col-xl-6 col-md-6">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title"> Accident de Travail </h4>
				</div>

				<div class="panel-body p-0" >
					<div class="col-md-12 card-body  table-responsive" id="show_at">
                        <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                    </div>
				</div>
			</div>
		</div>

		<div class="col-xl-6 col-md-6">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title"> Maladie Professionnelle </h4>
				</div>

				<div class="panel-body p-0" >
					<div class="col-md-12 card-body  table-responsive" id="show_mp">
                        <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                    </div>
				</div>
			</div>
		</div>

		<div class="col-xl-6 col-md-6">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title"> Consultation Spontanée </h4>
				</div>

				<div class="panel-body p-0" >
					<div class="col-md-12 card-body  table-responsive" id="show_cs">
                        <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                    </div>
				</div>
			</div>
		</div>

		<div class="col-xl-6 col-md-6">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title"> Visite Médicale Spécialisée </h4>
				</div>

				<div class="panel-body p-0" >
					<div class="col-md-12 card-body  table-responsive" id="show_vms">
                        <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                    </div>
				</div>
			</div>
		</div>

		<div class="col-xl-6 col-md-6">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title"> Absentéisme </h4>
				</div>

				<div class="panel-body p-0" >
					<div class="col-md-12 card-body  table-responsive" id="show_abs">
                        <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                    </div>
				</div>
			</div>
		</div>

		<div class="col-xl-6 col-md-6">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title"> Convocation </h4>
				</div>

				<div class="panel-body p-0" >
					<div class="col-md-12 card-body  table-responsive" id="show_convoc">
                            <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                    </div>
				</div>
			</div>
		</div>

		<div class="col-xl-6 col-md-6">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title"> Vaccination </h4>
				</div>

				<div class="panel-body p-0" >
					<div class="col-md-12 card-body  table-responsive" id="show_vac">
                        <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                    </div>
				</div>
			</div>
		</div>

		<div class="col-xl-6 col-md-6">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title"> Ordonnance Médicale </h4>
				</div>

				<div class="panel-body p-0" >
					<div class="col-md-12 card-body" id="show_om">
                        <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                    </div>
				</div>
			</div>
		</div>

	</div> -->


</div>








<script type="text/javascript">
$(document).ready(function() {

    fetchaudit();

    function fetchaudit() {
        $.ajax({
            url: "{{ url('/fetch-audit') }}",
            method: 'get',
            success: function(response) {

                $("#show_audit").html(response);
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


<script type="text/javascript">
$(document).ready(function() {

    fetchabsa();

    function fetchabsa() {
        $.ajax({
            url: "{{ url('/fetcha-abs') }}",
            method: 'get',
            success: function(response) {

                $("#show_abs").html(response);
                $(".table1").DataTable({
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




<script type="text/javascript">
$(document).ready(function() {

    fetchcsa();

    function fetchcsa() {
        $.ajax({
            url: "{{ url('/fetcha-cs') }}",
            method: 'get',
            success: function(response) {

                $("#show_cs").html(response);
                $(".table2").DataTable({
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



<script type="text/javascript">
$(document).ready(function() {

    fetchata();

    function fetchata() {
        $.ajax({
            url: "{{ url('/fetcha-at') }}",
            method: 'get',
            success: function(response) {

                $("#show_at").html(response);
                $(".table3").DataTable({
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


<script type="text/javascript">
$(document).ready(function() {

    fetchmpa();

    function fetchmpa() {
        $.ajax({
            url: "{{ url('/fetcha-mp') }}",
            method: 'get',
            success: function(response) {

                $("#show_mp").html(response);
                $(".table4").DataTable({
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


<script type="text/javascript">
$(document).ready(function() {

    fetchoma();

    function fetchoma() {
        $.ajax({
            url: "{{ url('/fetcha-om') }}",
            method: 'get',
            success: function(response) {

                $("#show_om").html(response);
                $(".table5").DataTable({
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

    fetchvmsa();

    function fetchvmsa() {
        $.ajax({
            url: "{{ url('/fetcha-vms') }}",
            method: 'get',
            success: function(response) {

                $("#show_vms").html(response);
                $(".table6").DataTable({
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


<script type="text/javascript">
$(document).ready(function() {

    fetchvaca();

    function fetchvaca() {
        $.ajax({
            url: "{{ url('/fetcha-vac') }}",
            method: 'get',
            success: function(response) {

                $("#show_vac").html(response);
                $(".table7").DataTable({
                    order: [0, 'asc'],
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


<script type="text/javascript">
$(document).ready(function() {

    fetchconvoca();

    function fetchconvoca() {
        $.ajax({
            url: "{{ url('/fetcha-convoc') }}",
            method: 'get',
            success: function(response) {

                $("#show_convoc").html(response);
                $(".table8").DataTable({
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

