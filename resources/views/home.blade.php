@extends('def.def')

@section ('contenta')

<div id="content" class="app-content">
	<?php use Illuminate\Support\Facades\Auth; ?>

	<h1 style="text-align: center; text-decoration:solid;">  CENTRE HOSPITALIER DE SANTE DE LA SONEB </h1>

	@if (auth()->check() && auth()->user()->isDir())
	<div class="row">
		

		<div class="row">

			<div class="col-xl-3 col-md-6">
				<div class="widget widget-stats bg-blue">
					<div class="stats-icon"><i class="fa fa-table"></i></div>
					<div class="stats-info">
						<h4>ACCIDENT DE TRAVAIL</h4>
    	                  <p> 
							<?php
								$a=App\Models\At::where('DELETED', '!=', 'invalide')
								 ->count();
								echo $a;
							?>
						  </p>
					</div>
					<div class="stats-link">
						<a href="{{('/registres')}}"> Voir Détails <i class="fa fa-arrow-alt-circle-right"></i></a>
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
								$a=App\Models\Mp::where('DELETED', '!=', 'invalide')
								 ->count();
								echo $a; 
							?>
						</p>
					</div>
					<div class="stats-link">
						<a href="{{('/registres')}}"> Voir Détails <i class="fa fa-arrow-alt-circle-right"></i></a>
					</div>
				</div>
			</div>


			<div class="col-xl-3 col-md-6">
				<div class="widget widget-stats bg-blue">
					<div class="stats-icon"><i class="fa fa-table"></i></div>
					<div class="stats-info">
						<h4>CONSULTATION SPONTANEES</h4>
						<p> 
							<?php
								$a=App\Models\Cs::where('DELETED', '!=', 'invalide')
								 ->count();
								echo $a; 
							?>
						</p>
					</div>
					<div class="stats-link">
						<a href="{{('/registres')}}"> Voir Détails <i class="fa fa-arrow-alt-circle-right"></i></a>
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
								$a=App\Models\Vms::where('DELETED', '!=', 'invalide')
								 ->count();
								echo $a; 
							?>
						</p>
					</div>
					<div class="stats-link">
						<a href="{{('/registres')}}"> Voir Détails <i class="fa fa-arrow-alt-circle-right"></i></a>
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
								$a=App\Models\Abs::where('DELETED', '!=', 'invalide')
								 ->count();
								echo $a; 
							?>
						</p>
					</div>
					<div class="stats-link">
						<a href="{{('/registres')}}"> Voir Détails <i class="fa fa-arrow-alt-circle-right"></i></a>
					</div>
				</div>
			</div>



			<div class="col-xl-3 col-md-6">
				<div class="widget widget-stats bg-blue">
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
					<div class="stats-link">
						<a href="{{('/registres')}}"> Voir Détails <i class="fa fa-arrow-alt-circle-right"></i></a>
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
								 $a=App\Models\Vac::where('DELETED', '!=', 'invalide')
								 ->count();
								 echo $a;
							?>
						</p>
					</div>
					<div class="stats-link">
						<a href="{{('/registres')}}"> Voir Détails <i class="fa fa-arrow-alt-circle-right"></i></a>
					</div>
				</div>
			</div>

			<div class="col-xl-3 col-md-6">
				<div class="widget widget-stats bg-blue">
					<div class="stats-icon"><i class="fa fa-table"></i></div>
					<div class="stats-info">
						<h4>ORDONNANCES MEDICALES</h4>
						<p> 
							<?php
								 $a=App\Models\Om::where('DELETED', '!=', 'invalide')
								 ->count();
								 echo $a;
							?>
						</p>
					</div>
					<div class="stats-link">
						<a href="{{('/registres')}}"> Voir Détails <i class="fa fa-arrow-alt-circle-right"></i></a>
					</div>
				</div>
			</div>


		</div>
		
		<div class="row">

			<!-- <div class="col-xl-12 col-md-6">
				<div class="panel panel-inverse">
					<div class="panel-heading">
						<h4 class="panel-title">  Statistiques des accidents de travail et des maladies professionnelles par mois </h4>
					</div>

					<div class="panel-body p-0">
						<canvas id="line-chart"></canvas>
					</div>
				</div>
			</div> -->

			<div class="col-xl-6 col-md-6">
				<div class="panel panel-inverse">
					<div class="panel-heading">
						<h4 class="panel-title"> Convocations prochaine </h4>
					</div>

					<div class="panel-body p-0" >
						<div class="col-md-12 card-body  table-responsive" id="show_conv">
    	                    <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
    	                </div>
					</div>
				</div>
			</div>

			<div class="col-xl-6 col-md-6">
				<div class="panel panel-inverse">
					<div class="panel-heading">
						<h4 class="panel-title"> Vaccination en approche d'expiration </h4>
					</div>

					<div class="panel-body p-0" >
						<div class="col-md-12 card-body  table-responsive" id="show_vac">
    	                    <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
    	                </div>
					</div>
				</div>
			</div>

		</div>
		
	</div>
	@endif



	@if (auth()->check() && auth()->user()->isAssis())
	<div class="row">
		
	<div class="row">

		<div class="col-xl-3 col-md-6">
			<div class="widget widget-stats bg-info">
				<div class="stats-icon"><i class="fa fa-table"></i></div>
				<div class="stats-info">
					<h4>ACCIDENT DE TRAVAIL</h4>
                      <p> 
						<?php
							$na = Auth::user()->name;
							$i = App\models\personnel::Where('MATSA', $na)->first();
							$fullName = $i->PRESA . ' ' . $i->NOMSA;
							$a=App\Models\At::where('USERS', $fullName)
							->where('DELETED', '!=', 'invalide')
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
					<h4>MALADIES PROFESSIONNELLES</h4>
					<p> 
						<?php
							$na = Auth::user()->name;
							$i = App\models\personnel::Where('MATSA', $na)->first();
							$fullName = $i->PRESA . ' ' . $i->NOMSA;
							$a=App\Models\Mp::where('USERS', $fullName)
							->where('DELETED', '!=', 'invalide')
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
					<h4>CONSULTATION SPONTANEES</h4>
					<p> 
						<?php
							$na = Auth::user()->name;
							$i = App\models\personnel::Where('MATSA', $na)->first();
							$fullName = $i->PRESA . ' ' . $i->NOMSA;
							$a=App\Models\Cs::where('USERS', $fullName)
							->where('DELETED', '!=', 'invalide')
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
					<h4>VISITE MEDICALE SPECIALISEE</h4>
					<p> 
						<?php
							$na = Auth::user()->name;
							$i = App\models\personnel::Where('MATSA', $na)->first();
							$fullName = $i->PRESA . ' ' . $i->NOMSA;
							$a=App\Models\Vms::where('USERS', $fullName)
							->where('DELETED', '!=', 'invalide')
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
					<h4>ABSENTEISME</h4>
					<p> 
						<?php
							$na = Auth::user()->name;
							$i = App\models\personnel::Where('MATSA', $na)->first();
							$fullName = $i->PRESA . ' ' . $i->NOMSA;
							$a=App\Models\Abs::where('USERS', $fullName)
							->where('DELETED', '!=', 'invalide')
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
					<h4>CONVOCATIONS</h4>
					<p> 
						<?php
							$na = Auth::user()->name;
							$i = App\models\personnel::Where('MATSA', $na)->first();
							$fullName = $i->PRESA . ' ' . $i->NOMSA;
							$a=App\Models\Convocation::where('USERS', $fullName)
							->where('DELETED', '!=', 'invalide')
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
							$na = Auth::user()->name;
							$i = App\models\personnel::Where('MATSA', $na)->first();
							$fullName = $i->PRESA . ' ' . $i->NOMSA;
							$a=App\Models\Vac::where('USERS', $fullName)
							->where('DELETED', '!=', 'invalide')
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
					<h4>ORDONNANCES MEDICALES</h4>
					<p> 
						<?php
							$na = Auth::user()->name;
							$i = App\models\personnel::Where('MATSA', $na)->first();
							$fullName = $i->PRESA . ' ' . $i->NOMSA;
							$a=App\Models\Om::where('USERS', $fullName)
							->where('DELETED', '!=', 'invalide')
							->count();
							echo $a;
						?>
					</p>
				</div>
				
			</div>
		</div>


	</div>

	</div>
	@endif




	@if (auth()->check() && auth()->user()->isAdmin())
	<div class="row">
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
	</div>
	@endif


	

</div>






<script>
    var ctx = document.getElementById('line-chart').getContext('2d');
    var data = @json($combinedData); // Convertit les données PHP en JSON

    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aoüt', 'Septembre', 'Octobre', 'Novembre', 'Décembre'], // Les mois de la première table
            datasets: [
                {
                    label: 'Accident de Travail',
                    backgroundColor: 'blue',
                    data: data.values1.map(item => item.total) // Les totaux de la première table
                },
                {
                    label: 'Maladie Professionnelle',
                    backgroundColor: 'green',
                    data: data.values2.map(item => item.total) // Les totaux de la deuxième table
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


<script type="text/javascript">
$(document).ready(function() {

    fetchhomec();

    function fetchhomec() {
        $.ajax({
            url: "{{ url('/fetch-homec') }}",
            method: 'get',
            success: function(response) {

                $("#show_conv").html(response);
                $(".table0").DataTable({
                    order: [0, 'desc'],
                });
            }
        });

    };


});
</script>



<script type="text/javascript">
$(document).ready(function() {

    fetchhomev();

    function fetchhomev() {
        $.ajax({
            url: "{{ url('/fetch-homev') }}",
            method: 'get',
            success: function(response) {

                $("#show_vac").html(response);
                $(".table1").DataTable({
                    order: [0, 'desc'],
                });
            }
        });

    };


});
</script>

@endsection

