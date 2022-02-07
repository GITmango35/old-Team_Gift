<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Participation;
use App\Models\UserG;
use Illuminate\Http\Request;

class ParticipationController extends Controller
{
   public function listeEventsRecus($idUserG){

   $participationsNonAcceptes=Participation::where(['Accepted'=>0,'ParticipantID'=>$idUserG])->get();
  
      $allEvent= Event:: all();
      $allUsers= UserG:: all();
      $tabIdEvent=array();
  
        foreach($participationsNonAcceptes as $item){
          array_push($tabIdEvent,$item->EventID);         
        }

        $idUserG=$idUserG;
   
       return view('listeEventsRecus', compact('tabIdEvent', 'allUsers', 'idUserG', 'allEvent'));
  }
  public function listeMescontributions($idUserG){

    $participationsAcceptes=Participation::where(['Accepted'=>1,'ParticipantID'=>$idUserG])->get();
   
       $allEvent= Event:: all();
       $allUsers= UserG:: all();
       $tabIdEvent=array();
   
         foreach($participationsAcceptes as $item){
           array_push($tabIdEvent,$item->EventID);         
         }
 
         $idUserG=$idUserG;
    
        return view('listeMescontributions', compact('participationsAcceptes','tabIdEvent', 'allUsers', 'idUserG', 'allEvent'));
   }
 

  public function participationAccepte(Request $request){

      $idUserG=$request->idUserG;
      $idEvent=$request->idEvent;
      $contribution=$request->contribution;
      $organisateur=$request->organisateur;        
     
       ///update des champs contribution et Accepted
       $participationModifie = Participation::where(['EventID'=>$idEvent,'ParticipantID'=>$idUserG])       
                                              ->update(['Accepted'=> 1, 'Contribution'=> $contribution]); 
       //on recupere toutes les participations Acceptes
       $participationsAcceptes=Participation::where(['Accepted'=>1,'ParticipantID'=>$idUserG])->get();

        $event = Event::find($idEvent);
        $allEvent= Event:: all();

        $tabIdEvent=array();
  
        foreach($participationsAcceptes as $item){
          array_push($tabIdEvent,$item->EventID);         
        }

    return view('listeparticipationAccepter', compact('participationsAcceptes', 'event', 'organisateur', 'tabIdEvent', 'allEvent'));
  } 

  
  public function participationRefuse(){
    
    return back();
  } 
}