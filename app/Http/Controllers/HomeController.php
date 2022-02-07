<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserG;
use App\Models\Event;
use App\Models\Participation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function login()
  {

    return view('connexion.login');
  }


  public function inscription()
  {

    return view('connexion.signin');
  }

  public function getInscription(Request $request)
  {

    request()->validate([
      'fullName' => ['required', 'string'],
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);
    //verifier si le mail existe deja dans la BD
    $email = $request->email;

    if (UserG::where('Email', $email)->first())

      return redirect('/signin')->with('messager', 'Attention Utilisateur existe deja!!');

    else
      //si le mail n,existe pas dans la BD on l,ajoute
      $userG = new UserG();
    $userG->FullName = request('fullName');
    $userG->Email = request('email');
    $userG->Password = request('password');
    $userG->save();

    return redirect('/signin')->with('message', 'Inscription faite avec succes');
  }

  public function connection(Request $request)
  {

    request()->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    $email = $request->email;
    $password = $request->password;

    $userG = UserG::where(['Email' => $email, 'Password' => $password])->first();

    if (is_null($userG)) {
      return redirect('/');
    } else {
      $participationsNonAcceptes = Participation::where(['Accepted' => 0, 'ParticipantID' => $userG->ID])->get();

      $allEvent = Event::all();
      $allUsers = UserG::all();
      $tabIdEvent = array();

      foreach ($participationsNonAcceptes as $item) {
        array_push($tabIdEvent, $item->EventID);
      }

      $idUserG = $userG->ID;


      return view('connexion.profile', compact('tabIdEvent', 'allUsers', 'idUserG', 'userG', 'allEvent'));
    }
  }

  public function deconnexion(Request $request)
  {
    Auth::logout();
    return redirect('/');
  }

  
  public function home() { 
    // Your logic here 
    return view('profile'); 
   } 
}
