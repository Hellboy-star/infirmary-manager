<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\roles;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function rpass(Request $request, $id)
    {


        $abs = user::find($id);
        $aa = $request->password;

        $op = Hash::make($aa);


        $abs->password = $op;
        $abs->update();
        return response()->json([
            'status' => 200,

        ]);
    }

    public function upas(Request $request, $id)
    {
        $abs = user::find($id);

        $an = auth()->user();

        //dd($abs->password);
        //dd($request->old);

        $anss = $request->old;

        if (Hash::check($anss, $an->password)) {
            $nw = $request->pas;

            $abs->password = Hash::make($nw);
            $abs->update();
            return response()->json([
                'status' => 200,

            ]);
        } else {
            return response()->json([
                'status' => 202,

            ]);
        }
    }

    public function updatePassword(Request $request)
{
    $this->validate($request, [
        'old' => 'required',
        'pas' => 'required|confirmed|min:8',
    ]);
// dd($request->all());
    
    $user = Auth::user();
        dd($user);
    if ($user) {
        // $userId = $user->id;
        $userPas = $user->password; 
        
        

        if (Hash::check($request->old, $userPas)) {
            // dd($request->old, $userPas);
            $user->password = Hash::make($request->pas);
            $user->save();
            return redirect()->back()->with('success', 'Mot de passe mis à jour avec succès.');
        }
    } else {
        // L'utilisateur n'est pas connecté
    }
    // dd("Update executed");
    
}


    
    public function store(Request $request)
{
    $profilu = Roles::find($request->profil);
    $empData = [
    'name' => $request->name,
    'password' => Hash::make($request->password),
    'email' => $request->email,
    'profil' => $profilu->nom,
    ];
    
    $a = User::create($empData);
    
    // Recherchez le rôle par nom
    $role = roles::where('nom', $request->profil)->first();
    $a->roles()->attach($request->profil);
    if ($role) {
        $a = User::create($empData);
        // Utilisez l'ID du rôle pour l'association
        $a->roles()->attach($role->id);
        return redirect()->back()->with('status', ['type' => 'success', 'message' => 'Ajout réussi']);
    } else {
        // Gérez le cas où le rôle n'est pas trouvé
        return redirect()->back()->with('status', ['type' => 'error', 'message' => 'Ajout réussi']);
    }


    // return redirect()->back()->with('status', ['type' => 'success', 'message' => 'Ajout réussi']);

}

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    public function fetchpero(Request $request)
    {
        \DB::statement("SET lc_time_names = 'fr_FR'");
        
        $empsa = user::all();
        $emps = DB::select("select id, MATSA, concat(NOMSA,' ', PRESA) as nom, LEMSA from personnels as pe  ");
		$output = '';
		if ($empsa->count() > 0) {
			$output .= '<table class="table0 table table-striped table-bordered align-middle">
            <thead>
              <tr>
                <th >ID</th>
                <th >Matricule</th>
                <th >Nom & Prénom</th>
                <th>Poste</th>
                
              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $index=>$emp) {
				$output .= '<tr>
                <td width="5%">' . ($index+1) . '</td>
               
                <td width="10%">' . $emp->MATSA . '</td>
                <td width="40%">' . $emp->nom . '</td>
                <td width="45%">' . $emp->LEMSA . ' </td>
                
               
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Aucune donnée !!!</h1>';
		}
    }


    public function fetchperso(Request $request)
    {
        \DB::statement("SET lc_time_names = 'fr_FR'");
        
        $empsa = user::all();
        $emps = DB::select("select us.id as user_id ,  MATSA, concat(NOMSA,' ', PRESA) as nom, email, r.nom as ro, LEMSA from users as us, personnels as pe, roles as r where r.nom=us.profil and us.name=pe.MATSA  order by us.id asc ");
		$output = '';
		if ($empsa->count() > 0) {
			$output .= '<table class="table0 table table-striped table-bordered align-middle">
            <thead>
              <tr>
                <th >ID</th>
                <th >Matricule</th>
                <th >Nom & Prénoms</th>
                <th>Email</th>
                <th>Profil</th>
                <th >Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $index=>$emp) {
				$output .= '<tr>
                <td width="5%">' . ($index+1) . '</td>
               
                <td width="10%">' . $emp->MATSA . '</td>
                <td width="35%">' . $emp->nom . '</td>
                <td width="20%">' . $emp->email . ' </td>
                <td width="20%">' . $emp->ro . ' </td>
                
                <td width="10%">
                    <div class="list-inline hstack gap-2 mb-0">

                    <a href="#" id="' .  $emp->user_id . '" value="' .  $emp->nom . '" mat="' .  $emp->MATSA . '" class="text-success mx-1 reiIcon"><i class="fas fa-lg fa-spinner"></i></a>

                         <button style="border:none; background-color:transparent" value="' . $emp->user_id . '" class=" text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#smper"><i class="bi-pencil-square h5"></i></button>

                        <a href="#" class="text-danger mx-1 delete-user" data-user-id="' . $emp->user_id . '"><i class="bi-trash h5"></i></a>
                    </div>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Aucune donnée</h1>';
		}
    }


    public function fetchpersod(Request $request)
    {
        \DB::statement("SET lc_time_names = 'fr_FR'");
        
        $empsa = user::all();
        $emps = DB::select("select us.id as user_id ,  MATSA, concat(NOMSA,' ', PRESA) as nom, email, r.nom as ro, LEMSA from users as us, personnels as pe, roles as r where r.nom=us.profil and us.name=pe.MATSA and us.profil='Assistant'  order by us.id asc ");
		$output = '';
		if ($empsa->count() > 0) {
			$output .= '<table class="table1 table table-striped table-bordered align-middle">
            <thead>
              <tr>
                <th >ID</th>
                <th >Matricule</th>
                <th >Nom & Prénoms</th>
                <th>Email</th>
                <th>Profil</th>
                <th >Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $index=>$emp) {
				$output .= '<tr>
                <td width="5%">' . ($index+1) . '</td>
               
                <td width="10%">' . $emp->MATSA . '</td>
                <td width="35%">' . $emp->nom . '</td>
                <td width="20%">' . $emp->email . ' </td>
                <td width="20%">' . $emp->ro . ' </td>
                
                <td width="10%">
                    <div class="list-inline hstack gap-2 mb-0">

                    <a href="#" id="' .  $emp->user_id . '" value="' .  $emp->nom . '" mat="' .  $emp->MATSA . '" class="text-success mx-1 reiIcon"><i class="fas fa-lg fa-spinner"></i></a>

                         <button style="border:none; background-color:transparent" value="' . $emp->user_id . '" class=" text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#smper"><i class="bi-pencil-square h5"></i></button>

                        <a href="#" class="text-danger mx-1 delete-user" data-user-id="' . $emp->user_id . '"><i class="bi-trash h5"></i></a>
                    </div>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Aucune donnée</h1>';
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function deleteUser($id)
    {
        try {
            $user = User::find($id);

            if ($user) {
                $user->delete();
                return response()->json(['status' => 200]);
            } else {
                return response()->json(['status' => 404]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => $e->getMessage()]);
        }
    }




    public function view(User $user)
    {
        return $user->isAdmin();
    }

    public function vue(User $user)
    {
        return $user->isDir();
    }

    public function vu(User $user)
    {
        return $user->isAssis();
    }

    // public function handl($request, Closure $next)
    // {
    //     if ( auth()->check() && auth()->isDir)
    //     {
    //         return $next($request);
    //     }
    //     return redirect('/');
    // }

    // public function hand($request, Closure $next)
    // {
    //     if ( auth()->check() && auth()->isAssis)
    //     {
    //         return $next($request);
    //     }
    //     return redirect('/formrat');
    // }

    // public function handle($request, Closure $next)
    // {
    //     if ( auth()->check() && auth()->isAdmin) 
    //     {
    //         return $next($request);
    //     }
    //     return redirect('/register');
    // }
    
}