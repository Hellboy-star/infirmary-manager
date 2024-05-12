@extends('def.def', ['titre'=>'Rapport Annuel  du Centre Hospitalier de Santé' ])
@section ('contenta')

<div id="content" class="app-content">

    <h1 class="page-header"> Rapport du Centre Hospitalier de Santé </h1>


    <div class="row">
        <div class="col-xl-12">

            <div class="panel panel-inverse panel-with-tabs" data-sortable-id="ui-unlimited-tabs-1">

                <div class="panel-heading p-0">

                    <div class="tab-overflow">
                        <ul class="nav nav-tabs nav-tabs-inverse">
                            <li class="nav-item prev-button"><a href="javascript:;" data-click="prev-tab"
                                    class="nav-link text-primary"><i class="bi bi-arrow-left"></i></a></li>
                            <li class="nav-item"><a href="#nav-tab-1" data-bs-toggle="tab"
                                    class="nav-link active">I- IDENTIFICATION DE L'ENTREPRISE</a></li>
                            <li class="nav-item"><a href="#nav-tab-2" data-bs-toggle="tab" class="nav-link">II- PRESENTATION DU COMITE D'HYGIENE ET DE SECURITE</a></li>
                            <li class="nav-item"><a href="#nav-tab-3" data-bs-toggle="tab"
                                    class="nav-link">ACTIVITES DU CHS</a></li>
                            <li class="nav-item"><a href="#nav-tab-4" data-bs-toggle="tab" class="nav-link">IV- MOYENS MIS A LA DISPOSITION DU CHS</a>
                            </li>
                            <li class="nav-item"><a href="#nav-tab-5" data-bs-toggle="tab" class="nav-link">V- DIFFICULTES RENCONTREES</a>
                            </li>
                            <li class="nav-item"><a href="#nav-tab-6" data-bs-toggle="tab" class="nav-link">VI- PERSPECTIVES</a>
                            </li>
                            <li class="nav-item"><a href="#nav-tab-7" data-bs-toggle="tab"
                                    class="nav-link">VII- SUGGESTIONS</a></li>
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

                        <div class="card-body container-fluid" id="index_chs">
                            <h2>I- IDENTIFICATION DE L'ENTREPRISE</h2>
                            <p>
                                1-	Raison sociale :………………………………………………………………<br>
                                2-	Date de création :…………………………………………………………… <br>
                                3-	Activité principale :………………………………………………………… <br>
                                4-	Activités secondaires :………………………………………………………<br>
                                5-	Nom du Responsable/Directeur :………………………………………<br>
                                6-	N° Registre de Commerce : ………………………………………………… <br>
                                7-	N° INSAE :…………………………………………………………………… <br>
                                8-	N° IFU :………………………………………………………………………… <br>
                                9-	N° d’immatriculation CNSS :…………………………………………… <br>
                                10-	Adresse : * Boîte postale :…………………………………………… <br>
                                <pre>
                                   * Fax :……………………………………………………………… <br>
                                   * Email :…………………………………………………………… <br>
                                   * Téléphone :……………………………………………………  <br>
                                   * Commune : ……………………………………………………  <br>
                                   * Arrondissement :……………………………………………… <br>
                                   * Quartier :………………………………………………………  <br>
                                   * Rue :……………………………………………………………  <br><br>
                                </pre>
                                10-Effectif total du personnel : ……………dont ………… hommes et ………………femmes. <br>
                            </p>
                            <p>
                                <h4>REPARTITION DU PERSONNEL SELON LA CATEGORIE PROFESSIONNELLE</h4>
                                <table></table>
                                
                                11-	Nombre de travailleurs déclarés à la Caisse Nationale de Sécurité Sociale : …………………………………………………………<br>
                                12-	Horaires de travail :…………………………………………………………………………………………………………………………………<br>
                                13-	Nombre d’équipes de travail :………………………………………<br>


                            </p>
                        </div>

                        </div>

                    </div>



                    <div class="tab-pane fade" id="nav-tab-2">

                        <div class="row">

                            <div class="col-md-7 card-body" id="show_tv">
                                <p>
                                    1- Date de création (référence note de service) :………………………<br>
                                    2-Composition (Tableau indicatif)
                                <table class="table-bordered align-middle">
                                    <tbody>
                                        <tr>
                                            <th>N°</th>
                                            <th>Nom et Prénom</th>
                                            <th>Fonction dans le CHS</th>
                                            <th>Poste de travail</th>
                                        </tr>
                                        <tr>
                                            <td>01</td>
                                            <td>
                                                <input type="text" class="form-control my-n1" />
                                            </td>
                                            <td>Président</td>
                                            <td>
                                                <input type="text" class="form-control my-n1" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>02</td>
                                            <td>
                                                <input type="text" class="form-control my-n1" />
                                            </td>
                                            <td>Chef sécurité</td>
                                            <td>
                                                <input type="text" class="form-control my-n1" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>03</td>
                                            <td>
                                                <input type="text" class="form-control my-n1" />
                                            </td>
                                            <td>1er délégué du personnel</td>
                                            <td>
                                                <input type="text" class="form-control my-n1" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>04</td>
                                            <td>
                                                <input type="text" class="form-control my-n1" />
                                            </td>
                                            <td>2ième délégué du personnel</td>
                                            <td>
                                                <input type="text" class="form-control my-n1" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>05</td>
                                            <td>
                                                <input type="text" class="form-control my-n1" />
                                            </td>
                                            <td>Médecin</td>
                                            <td>
                                                <input type="text" class="form-control my-n1" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </p>
                            </div>

                            <div class="col-md-5 card-body" id="">

                                

                            </div>

                        </div>

                    </div>


                    <div class="tab-pane fade" id="nav-tab-3">
                        <div class="row">

                            <div class="col-md-7 card-body" id="show_tran">
                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>

                            

                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-tab-4">
                        <div class="row">

                            <div class="col-md-7 card-body" id="show_marq">
                                <h2>IV-	MOYENS MIS A LA DISPOSITION DU CHS </h2>
                                <p>
                                    1-	Moyens matériels
                                    <?php ?>
                                </p>
                                <p>
                                    2-	Moyens financiers
                                    <?php ?>
                                </p>
                                <p>
                                    3-	Autres moyens
                                    <?php ?>
                                </p>
                            </div>

                            
                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-tab-5">
                        <div class="row">

                            <div class="col-md-7 card-body" id="show_model">
                                <h2>V- DIFFICULTES RENCONTREES</h2>
                            </div>

                            
                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-tab-6">
                        <div class="row">

                            <div class="col-md-7 card-body" id="show_stat">
                                <h2>VI- PERSPECTIVES</h2>
                            </div>

                            <div class="col-md-5 card-body" id="">

                                
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-tab-7">
                        <div class="row">

                            <div class="col-md-7 card-body" id="show_set">
                                <h2>VII- SUGGESTIONS</h2>
                            </div>

                            <div class="col-md-5 card-body" id="">

                               

                            </div>
                        </div>
                    </div>
                </div>



            </div>



        </div>

    </div>

</div>

@endsection