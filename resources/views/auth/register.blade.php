@extends('def.def', ['titre'=>'Utilisateur' ])

@section ('contenta')

<div id="content" class="app-content">

    <!-- <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">UI Elements</a></li>
        <li class="breadcrumb-item active">Social Buttons</li>
    </ol> -->


    <h1 class="page-header" style="text-align: center;">Gestion de Profil Utilisateur  </h1>
     

    @if (auth()->check() && auth()->user()->isAdmin())
    <div class="row">
        <div class="col-xl-6">

            <div  class="panel panel-inverse panel-with-tabs" data-sortable-id="ui-unlimited-tabs-1">

                <div class="bg-blue-400 panel-heading p-0">

                    <div class="tab-overflow">
                        <ul class="bg-blue-400 nav nav-tabs nav-tabs-inverse">
                            <li class="nav-item prev-button"><a href="javascript:;" data-click="prev-tab" class="nav-link text-primary"><i class="bi bi-arrow-left"></i></a></li>
                        </ul>
                    </div>

                    <div class="panel-heading-btn me-2 ms-2 d-flex">
                    </div>
                </div>


                <div class="panel-body tab-content">

                    <div class="tab-pane fade active show" id="nav-tab-1">

                        <div class="row">

                            <!-- <div style="float: right ;">
                                <div style="float: right ;" class="ms-auto">
                                    <a href="#mod" data-bs-toggle="modal" class="btn btn-success btn-rounded px-4 rounded-pill"><i class="fa fa-plus fa-lg me-2 ms-n2 text-success-900"></i>Ajouter un utilisateur</a>
                                </div>
                            </div> -->

                            <div class="col-md-12 card-body" id="show_per">

                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">
                <div class="panel-body p-0">
                    <div class="container-fluid">
                            <h3 class="mt-10px">FORMULAIRE D'ENREGISTREMENT D'UTILISATEUR</h3>
                            <div class="col-md-12 card-body">
                                <div class="card-body">
                                    <form action="{{route('user.store')}}" method="post">
                                    <div class="row">
                                @csrf
                                <div class="col-xl-12 mb-3">
                                    <label class="form-label" for="exampleInputEmail1">Utilisateur</label>
                                    <select onchange="fetchm(this.value);" id="name"  class="smatsa-select2 conto form-control form-select-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        <?php $s = App\models\personnel::all();
                                        foreach ($s as $d) {
                                        ?>
                                            <option value='<?php echo $d->MATSA; ?>'> 
                                                <?php 
                                                echo $d->MATSA;
                                                echo " - ";
                                                echo $d->NOMSA;
                                                echo " ";
                                                echo $d->PRESA;  
                                                ?> 
                                            </option><?php }; 
                                        ?>
                                    </select>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-7 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Email</label>
                                    <input  type="email" class="mail form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div style="display:none;" class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    </div>
                                </div>
    
                                <div class="col-xl-5 mb-3">
                                    <label class="form-label" for="exampleInputEmail1">Profil</label>

                                    <!-- <select id="profil" name="profil" class="profil selectpicker form-control form-select-sm">
                                        <option value="Administrateur">Administrateur</option>
                                        <option value="Medecin">Medecin</option>
                                        <option value="Assistant">Assistant</option>
                                    </select> -->

                                    <select id="profil" name="profil" 
                                        class="profil selectpicker form-control form-select-sm">
                                        <?php $p=App\Models\Roles::all(); foreach($p as $d){ ?>
                                        <option value=" <?php echo $d->id ?> ">
                                            <?php echo $d->nom; ?>
                                        </option>
                                        <?php }; ?>
                                    </select>
                                    

                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Annuler</a>
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
    @endif




    @if (auth()->check() && auth()->user()->isDir())
    <div class="row">
        <div class="col-xl-6">

            <div  class="panel panel-inverse panel-with-tabs" data-sortable-id="ui-unlimited-tabs-1">

                <div class="bg-blue-400 panel-heading p-0">

                    <div class="tab-overflow">
                        <ul class="bg-blue-400 nav nav-tabs nav-tabs-inverse">
                            <li class="nav-item prev-button"><a href="javascript:;" data-click="prev-tab" class="nav-link text-primary"><i class="bi bi-arrow-left"></i></a></li>
                        </ul>
                    </div>

                    <div class="panel-heading-btn me-2 ms-2 d-flex">
                    </div>
                </div>


                <div class="panel-body tab-content">

                    <div class="tab-pane fade active show" id="nav-tab-1">

                        <div class="row">

                            <div class="col-md-12 card-body" id="show_persd">

                                <h1 class="text-center text-secondary my-5">Chargement en cours ...</h1>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="panel panel-inverse" data-sortable-id="form-plugins-9">
                <div class="panel-body p-0">
                    <div class="container-fluid">
                            <h3 class="mt-10px">FORMULAIRE D'ENREGISTREMENT D'UTILISATEUR</h3>
                            <div class="col-md-12 card-body">
                                <div class="card-body">
                                    <form action="{{route('user.store')}}" method="post">
                                    <div class="row">
                                @csrf
                                <div class="col-xl-12 mb-3">
                                    <label class="form-label" for="exampleInputEmail1">Utilisateur</label>
                                    <select onchange="fetchm(this.value);" id="name"  class="smatsa-select2 conto form-control form-select-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        <?php $s = App\models\personnel::all();
                                        foreach ($s as $d) {
                                        ?>
                                            <option value='<?php echo $d->MATSA; ?>'> 
                                                <?php 
                                                echo $d->MATSA;
                                                echo " - ";
                                                echo $d->NOMSA;
                                                echo " ";
                                                echo $d->PRESA;  
                                                ?> 
                                            </option><?php }; 
                                        ?>
                                    </select>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-xl-7 mb-3">
                                    <label class="form-label" for="exampleInputPassword1">Email</label>
                                    <input  type="email" class="mail form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div style="display:none;" class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    </div>
                                </div>
    
                                <div class="col-xl-5 mb-3">
                                    <label class="form-label" for="exampleInputEmail1">Profil</label>

                                    <!-- <select id="profil" name="profil" class="profil selectpicker form-control form-select-sm">
                                        <option value="Administrateur">Administrateur</option>
                                        <option value="Medecin">Medecin</option>
                                        <option value="Assistant">Assistant</option>
                                    </select> -->

                                    <select id="profil" name="profil" 
                                        class="profil selectpicker form-control form-select-sm">
                                        <?php $p=App\Models\Roles::where('id', '=', '2'); foreach($p as $d){ ?>
                                        <option value=" <?php echo $d->id ?> ">
                                            <?php echo $d->nom; ?>
                                        </option>
                                        <?php }; ?>
                                    </select>

                                </div>
                                <div class="modal-footer">
                                    <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Annuler</a>
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
    @endif



</div>


<!-- <div class=" modal fade" id="mod">
       <div class="modal-dialog modal-md">
            <div style="background-color: #e2e2e2 ;" class="modal-content">
          
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">Enregistrer un utilisateur</h4>

                    </div>
                </div>
                <div style="background-color: #e2e2e2 ;" class="modal-body">

                    <form method="post">
                        
                    </form>
                </div>
            </div>
   
        </div>
</div> -->



</div>
</div>

<script>
    $(".smatsa-select2").select2();
</script>

<!-- <script>
    // Lorsque la sélection change
    document.getElementById('profil').addEventListener('change', function() {
        var selectedRoleId = this.value; // Récupérer l'ID du profil sélectionné
        var selectedRoleName = this.options[this.selectedIndex].text; // Récupérer le nom du profil sélectionné
        document.getElementById('roles_id').value = selectedRoleId; // Affecter l'ID à l'input roles_id
        document.getElementById('profil').setAttribute('name', 'profil_' + selectedRoleName); // Affecter le nom au champ "profil"
    });
</script> -->
<!-- 
<script>
    // Lorsque la sélection change
    document.getElementById('profil').addEventListener('change', function() {
        var selectedRoleId = this.value; // Récupérer l'ID du profil sélectionné
        var selectedRoleName = this.options[this.selectedIndex].text; // Récupérer le nom du profil sélectionné
        document.getElementById('roles_id').value = selectedRoleId; // Affecter l'ID à l'input roles_id
        document.getElementById('profil').setAttribute('name', 'profil_' + selectedRoleName); // Affecter le nom au champ "profil"
    });
</script> -->

<!-- <script>
    // Lorsque la sélection change
    $('#profil').on('change', function() {
        var selectedRoleId = $(this).val(); // Récupérer la valeur (l'ID du rôle) de la sélection
        $('#roles_id').val(selectedRoleId); // Affecter la valeur à l'input roles_id
    });
</script> -->

<script>    
 function fetchm(id){
         //alert(id);
         var m_id= id;
         $('#password').val(m_id);
         $('#password-confirm').val(m_id);
         
    }

</script>



<script type="text/javascript">
$(document).ready(function() {

    fetchpersod();

    function fetchpersod() {
        $.ajax({
            url: "{{ url('/fetch-persod') }}",
            method: 'get',
            success: function(response) {

                $("#show_persd").html(response);
                $(".table1").DataTable({
                    order: [0, 'asc'],
                    });
            }
        });

    };


});
</script>


<script type="text/javascript">
    $(document).ready(function() {

        fetchpero();

        function fetchpero() {
            $.ajax({
                url: "{{ url('/fetch-perso') }}",
                method: 'get',
                success: function(response) {

                    $("#show_per").html(response);
                    $(".table0").DataTable({
                        order: [0, 'asc']
                    });
                }

            });

        };

        $(document).on('click', '.reiIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let mat = $(this).attr('mat');
        let nom = $(this).attr('value');
        //console.log(id);
        let csrf = '{{ csrf_token() }}';
        swal({
    title: 'Confirmation',
    text: "Vous êtes sur le point de réinitialiser le mot de passe de "+ nom,
    icon: 'info',
    buttons: {
      cancel: {
        text: 'Annuler',
        value: null,
        visible: true,
        className: 'btn btn-default',
        closeModal: true,
      },
      confirm: {
        text: 'Confirmer',
        value: true,
        visible: true,
        className: 'btn btn-primary',
        closeModal: true
      }
    }
    
        }).then((confirm) => {
          if (confirm) {  

            var data = {
             
             'password' : mat,

         }
console.log(data);
         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
              
            $.ajax({
              url: "/up-rpass/"+id,
              method: 'PUT',
              data:data,
                dataType:"json",
              success: function(response) {
                $.gritter.add({
                            title: 'Notification',
                            text: 'Mot de passe réinitialisé avec succès',
                            time: 4000,
                            class_name: 'my-sticky-class gritter-light',
                            style_name: 'background-color:red',
                            before_open: function(){ },
                            after_open: function(e){ },
                            before_close: function(manual_close) { },
                            after_close: function(manual_close){ } 
                            

                        });
                        fetchcarb();
              }
            });
          }
        })
      });




      document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-user');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const userId = this.getAttribute('data-user-id');
            
            if (confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) {
                fetch(`/delete-user/${userId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                })
                .then(response => {
                    if (response.ok) {
                        // La suppression a réussi, vous pouvez rediriger ou effectuer d'autres actions
                        alert('Utilisateur supprimé avec succès');
                        // Actualisez la liste des utilisateurs si nécessaire
                        fetchperso();
                    } else {
                        // Gérer le cas où la suppression a échoué
                        alert('La suppression a échoué');
                    }
                })
                .catch(error => {
                    console.error(error);
                    alert('Une erreur s\'est produite.');
                });
            }
        });
    });
});





    });


</script>


<script>
    $(document).on('click','.add_users', function(e) {
            e.preventDefault();
            
           
            var data = {
                
                'name':$('#name').val(),
                'email':$('.mail').val(),
                'profil':$('.profil').val(),
                'password':$('#password').val(),
               
               }
            console.log(data);


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{route('sass')}}",
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.status === 200) {
                        toastr.success(response.message, 'Succès');
                    } else if (response.status === 202) {
                        toastr.error(response.message, 'Erreur');
                    }
                },
                error: function (error) {
                    // Gérez les erreurs ici si nécessaire
                }
            });
        });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        document.addEventListener('DOMContentLoaded', function () {
            const deleteForm = document.getElementById('delete-form');

            deleteForm.addEventListener('submit', function (e) {
                e.preventDefault();
            
                if (confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) {
                    fetch(this.action, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': this.querySelector('input[name="_token"]').value,
                        },
                    })
                    .then(response => {
                        if (response.ok) {
                            // La suppression a réussi, vous pouvez rediriger ou effectuer d'autres actions
                            alert('Utilisateur supprimé avec succès');
                        } else {
                            // Gérer le cas où la suppression a échoué
                            alert('La suppression a échoué');
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        alert('Une erreur s\'est produite.');
                    });
                }
            });
        });


    });
</script>

@endsection