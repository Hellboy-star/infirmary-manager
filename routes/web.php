<?php

use App\Http\Controllers\AbsController;
use App\Http\Controllers\AptitudeController;
use App\Http\Controllers\AssistantController;
use App\Http\Controllers\SoinfamController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtController;
use App\Http\Controllers\CsController;
use App\Http\Controllers\MpController;
use App\Http\Controllers\VmsController;
use App\Http\Controllers\OmController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PersonnelfamController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\AnteController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChsController;
use App\Http\Controllers\ConvocationController;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PosteController;
use App\Http\Controllers\RegistreController;
use App\Http\Controllers\VacController;
use App\Http\Controllers\AuditController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/register', function () {
    return view('register');
})->middleware('CheckRole:Administrateur');

Route::get('/home', function () {
    return view('home');
})->middleware('CheckRole:Medecin');

Route::get('/assistant', function () {
    return view('assistant');
})->middleware('CheckRole:Assistant');


Route::delete('/import_excel/importp', [PersonnelController::class, 'importp']);
Route::post('/import_excel/importp', [PersonnelController::class, 'importp']);

Route::delete('/import_excel/importa', [PersonnelController::class, 'importa']);
Route::post('/import_excel/importa', [PersonnelController::class, 'importa']);

Route::delete('/import_excel/import', [PersonnelfamController::class, 'import']);
Route::post('/import_excel/import', [PersonnelfamController::class, 'import']);

// Route::put('/user/{id}', 'UsersController@upas')->name('user.upas');
Route::delete('/delete-user/{id}', 'UsersController@deleteUser')->name('delete-user');
Route::get('/delete-user/{id}', [UsersController::class, 'deleteUser']);
Route::get('/fetch-pero', [UsersController::class, 'fetchpero']);
Route::get('/fetch-perso', [UsersController::class, 'fetchperso']);
Route::get('/fetch-persod', [UsersController::class, 'fetchpersod']);
Route::put('/up-rpass/{mat}', [UsersController::class, 'rpass']);
Route::put('/up-pass/{id}', [UsersController::class, 'upas']);
Route::get('/fetch-p', [PersonnelController::class, 'fetchperso']);
Route::get('fetch-per', [PersonnelController::class, 'fetchper']);
Route::get('/fetch-perf', [PersonnelfamController::class, 'fetchperf']);
Route::get('/fetch-an', [ChsController::class, 'fetchan']);
Route::get('/fetch-abs', [AbsController::class, 'fetchabs']);
Route::get('/fetch-at', [AtController::class, 'fetchat']);
Route::get('/fetch-cs', [CsController::class, 'fetchcs']);
Route::get('/fetch-mp', [MpController::class, 'fetchmp']);
Route::get('/fetch-vms', [VmsController::class, 'fetchvms']);
Route::get('/fetch-vac', [VacController::class, 'fetchvac']);
Route::get('/fetch-om', [OmController::class, 'fetchom']);
Route::get('/fetch-apti', [AptitudeController::class, 'fetchapti']);
Route::get('/fetch-convoc', [ConvocationController::class, 'fetchconvoc']);
Route::get('/fetcha-abs', [AbsController::class, 'fetchabsa']);
Route::get('/fetcha-at', [AtController::class, 'fetchata']);
Route::get('/fetcha-cs', [CsController::class, 'fetchcsa']);
Route::get('/fetcha-mp', [MpController::class, 'fetchmpa']);
Route::get('/fetcha-vms', [VmsController::class, 'fetchvmsa']);
Route::get('/fetcha-vac', [VacController::class, 'fetchvaca']);
Route::get('/fetcha-om', [OmController::class, 'fetchoma']);
Route::get('/fetch-soin', [SoinfamController::class, 'fetchsoin']);
Route::get('/fetch-soina', [SoinfamController::class, 'fetchsoina']);
Route::get('/fetcha-convoc', [ConvocationController::class, 'fetchconvoca']);
Route::get('/fetch-homec', [HomeController::class, 'fetchhomec']);
Route::get('/fetch-homev', [HomeController::class, 'fetchhomev']);
Route::get('/fetch-homeg', [HomeController::class, 'fetchhomeg']);

// Tableau des registres
Route::get('/fetch-atr', [AtController::class, 'fetchatr']);
Route::get('/fetch-csr', [CsController::class, 'fetchcsr']);
Route::get('/fetch-mpr', [MpController::class, 'fetchmpr']);
Route::get('/fetch-vmsr', [VmsController::class, 'fetchvmsr']);
Route::get('/fetch-absr', [AbsController::class, 'fetchabsr']);
Route::get('/fetch-vacr', [VacController::class, 'fetchvacr']);
Route::get('/fetch-convr', [ConvocationController::class, 'fetchconvr']);

// Modification
Route::get('/e-at/{at}', [AtController::class, 'edit']);
Route::get('/e-cs/{cs}', [CsController::class, 'edit']);
Route::get('/e-mp/{mp}', [MpController::class, 'edit']);
Route::get('/e-vms/{vms}', [VmsController::class, 'edit']);
Route::get('/e-abs/{abs}', [AbsController::class, 'edit']);
Route::get('/e-vac/{vac}', [VacController::class, 'edit']);
Route::get('/e-om/{om}', [OmController::class, 'edit']);
Route::get('/e-aptitude/{aptitude}', [AptitudeController::class, 'edit']);
Route::get('/e-soin/{soin}', [SoinfamController::class, 'edit']);
Route::get('/e-conv/{id}', [ConvocationController::class, 'edit']);

//Suppression
Route::get('/d-at/{at}', [AtController::class, 'destroy']);
Route::get('/d-cs/{cs}', [CsController::class, 'destroy']);
Route::get('/d-mp/{mp}', [MpController::class, 'destroy']);
Route::get('/d-vms/{vms}', [VmsController::class, 'destroy']);
Route::get('/d-abs/{abs}', [AbsController::class, 'destroy']);
Route::get('/d-vac/{vac}', [VacController::class, 'destroy']);
Route::get('/d-conv/{conv}', [ConvocationController::class, 'destroy']);
Route::get('/d-om/{om}', [OmController::class, 'destroy']);
Route::get('/d-aptitude/{aptitude}', [AptitudeController::class, 'destroy']);
Route::get('/d-soin/{soin}', [SoinfamController::class, 'destroy']);

Route::get('/v-om/{id}', [OmController::class, 'afficherPDF']);
Route::get('/v-aptitude/{id}', [AptitudeController::class, 'affichePDF']);
// Route::get('afficher-pdf/{id}', 'OmControllerr@afficherPDF')->name('afficherPDF');

Route::get('/fetch-audit', [AuditController::class, 'fetchaudit']);
Route::get('/e-/{personnel}', [PersonnelController::class, 'dosmed']);
Route::get('/table1', [ChsController::class, 'tab1']);
Route::get('/table2', [ChsController::class, 'tab2']);
Route::get('/table3', [ChsController::class, 'chrono']);
Route::get('/table4', [ChsController::class, 'recap4']);
Route::get('/table5', [ChsController::class, 'recap5']);
Route::get('/table6', [ChsController::class, 'recap6']);
Route::get('/table7', [ChsController::class, 'recap7']);
Route::get('/table8', [ChsController::class, 'recap8']);
Route::get('/table9', [ChsController::class, 'taux9']);
Route::get('/table0', [ChsController::class, 'taux0']);


Route::resource('/', HomeController::class);
Route::resource('/personnel', PersonnelController::class);
Route::resource('/personfam', PersonnelfamController::class);
Route::resource('/rat', AtController::class);
Route::resource('/rcs', CsController::class);
Route::resource('/rmp', MpController::class);
Route::resource('/rvms', VmsController::class);
Route::resource('/rom', OmController::class);
Route::resource('/chs', ChsController::class);
Route::resource('/vac', VacController::class);
Route::resource('/registres', RegistreController::class);
Route::resource('/formulaire', FormulaireController::class);
Route::resource('/tableau', ChsController::class);
Route::resource('/absent', AbsController::class);
Route::resource('/ante', AnteController::class);
Route::resource('/convoc', ConvocationController::class);
Route::resource('/annee', ChsController::class);
Route::resource('/poste', PosteController::class);
Route::resource('/user', UsersController::class);
Route::resource('/audit',AuditController::class);
Route::resource('/assistant',AssistantController::class);
Route::resource('/soinfam',SoinfamController::class);
Route::resource('/aptitude',AptitudeController::class);
// Route::resource('/formulaire',FormulaireController::class);



Route::get('/formrat', [AtController::class, 'format'])->name('erat');
Route::get('/formrcs', [CsController::class, 'formcs'])->name('ercs');
Route::get('/formrmp', [MpController::class, 'formmp'])->name('ermp');
Route::get('/formrvms', [VmsController::class, 'formvms'])->name('ervms');
Route::get('/formrvac', [VacController::class, 'formvac'])->name('ervac');
Route::get('/formrom', [OmController::class, 'formom'])->name('erom');
Route::get('/formaptit', [AptitudeController::class, 'formaptit'])->name('eraptitude');


Route::get('/formrom', [OmController::class, 'formom'])->name('erom');
Route::get('/formconvoc', [ConvocationController::class, 'formconv'])->name('econvocation');
Route::get('/formabs', [AbsController::class, 'formabs'])->name('eabsenteisme');
Route::get('/poste', [PersonnelController::class, 'poste'])->name('eposte');
Route::get('/annee', [ChsController::class, 'annee'])->name('annee');
Route::get('/formante', [AnteController::class, 'formante'])->name('eantecedent');
Route::get('/formrom', [OmController::class, 'formom'])->name('erom');
Route::get('/formrom', [OmController::class, 'formom'])->name('erom');
Route::get('/formrom', [OmController::class, 'formom'])->name('erom');
Route::get('/annee', [ChsController::class, 'annee'])->name('annee');
Route::get('/etab1', [ChsController::class, 'etab1'])->name('etab1');
Route::get('/etab3', [ChsController::class, 'etab3'])->name('etab3');
Route::get('/etab4', [ChsController::class, 'etab4'])->name('etab4');
Route::get('/etab5', [ChsController::class, 'etab5'])->name('etab5');
Route::get('/etab6', [ChsController::class, 'etab6'])->name('etab6');
Route::get('/etab7', [ChsController::class, 'etab7'])->name('etab7');
Route::get('/etab8', [ChsController::class, 'etab8'])->name('etab8');
Route::get('/etab9', [ChsController::class, 'etab9'])->name('etab9');
Route::get('/etab10', [ChsController::class, 'etab10'])->name('etab10');

//Route::get('annee', "ChsController@annee");
//Route::get('etab1',"ChsController@etab1");
//Route::get('ante',"PersonnelController@ante");
Route::get('personnel', "PersonnelController@pdf");
// Route::get('/personnel/pdf', 'App\Http\Controllers\PersonnelController@pdf');


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/personnel', [PersonnelController::class, 'index'])->name('personnel');
Route::get('/personfam', [PersonnelfamController::class, 'index'])->name('personfam');
Route::get('/rat', [AtController::class, 'index'])->name('rat');
Route::get('/rcs', [CsController::class, 'index'])->name('rcs');
Route::get('/rmp', [MpController::class, 'index'])->name('rmp');
Route::get('/rvms', [VmsController::class, 'index'])->name('rvms');
Route::get('/rom', [OmController::class, 'index'])->name('rom');
Route::get('/aptitude', [AptitudeController::class, 'index'])->name('aptitude');
Route::get('/chs', [ChsController::class, 'index'])->name('chs');
Route::get('/vac', [VacController::class, 'index'])->name('vac');
Route::get('/absent', [AbsController::class, 'index'])->name('rabs');
Route::get('/ante', [AnteController::class, 'index'])->name('rante');
Route::get('/tableau', [ChsController::class, 'show'])->name('annexechs');
Route::get('/registres', [RegistreController::class, 'index'])->name('registres');
Route::get('/audit', [AuditController::class, 'index'])->name('audit');
Route::get('/soinfam', [SoinfamCOntroller::class, 'index'])->name('soin');
Route::get('/soinfamf', [SoinfamCOntroller::class, 'create'])->name('soinfamf');
Route::get('/assistant', [AssistantController::class, 'index'])->name('assistant');
Route::post('/sass', [UsersController::class, 'store'])->name('sass');
Route::post('/update-password', [UsersController::class, 'updatePassword'])->name('user.updatePassword');
// Route::post('/update-password', 'UsersController@updatePassword')->name('user.updatePassword');
Route::get('/formulaire', [FormulaireController::class, 'index'])->name('formulaire');
Route::get('/convoc', [ConvocationController::class, 'index'])->name('rconvoc');
// Route::get('/personnel', [PersonnelController::class, 'pdf'])->name('personnel');
// Route::get('generate-pdf', 'PersonnelController@generatePDF');
// Route::get('/generate-pdf', 'PersonnelController@generatePDF')->name('personnel');
// Route::get('/generate-pdf/{id}', [PersonnelController::class, 'generatePDF'])->name('personnel');
Route::get('/personnel/{id}', [PersonnelController::class, 'generatePDF'])->name('personnel.generatePDF');
Route::get('/personnelfam/{id}', [PersonnelfamController::class, 'index'])->name('personnel.generatePDF');
// Route::get('/personnel/{id}', 'PersonnelController@generatePDF')->name('personnel.generatePDF');



Route::put('/rat/{id}', 'AtController@update')->name('rat.update');
Route::put('/rcs/{id}', 'CsController@update')->name('rcs.update');
Route::put('/rmp/{id}', 'MpController@update')->name('rmp.update');
Route::put('/rvms/{id}', 'VmsController@update')->name('rvms.update');
Route::put('/rom/{id}', 'OmController@update')->name('rom.update');
Route::put('/aptitude/{id}', 'AptitudeController@update')->name('aptitude.update');
Route::put('/vac/{id}', 'VacController@update')->name('vac.update');
Route::put('/ante/{id}', 'AnteController@update')->name('ante.update');
Route::put('/convoc/{id}', 'ConvocationController@update')->name('convoc.update');
Route::put('/absent/{id}', 'AbsController@update')->name('absent.update');
Route::put('/soinfam/{id}', 'SoinfamController@update')->name('soinfam.update');

Route::resource('admin\user', UsersController::class);