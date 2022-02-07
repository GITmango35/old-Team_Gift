<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gift;
use App\Models\Participation;
use App\Models\UserG;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function newevement($idUserG)
    {

        $gifts = Gift::all();
        $participants = UserG::all();
        $idUserG = $idUserG;

        return view('createEvent', compact('idUserG', 'gifts', 'participants'));
    }

    //creation d'evenement et envoie d'invitation aux participants
    public function CreerEventPart(Request $request)
    {

        $titreEvent = $request->titreEvent;
        $dateofEvent = $request->dateofEvent;
        $idUserG = $request->idUserG;
        $idgift = $request->gift;

        $idParticipant = $request->input('idParticipant');
        $contribution = 0.00;

        //Ajout dans la table event 
        $event = new Event();
        $event->Title = $titreEvent;
        $event->DateOfEvent = $dateofEvent;
        $event->OrganizerID = $idUserG;
        $event->GiftID = $idgift;
        $event->save();

        //Ajout des participants
        foreach ($idParticipant as $p) {
            $participation = new Participation();
            $participation->EventID = $event->ID;
            $participation->ParticipantID = $p;
            $participation->Accepted = 0;
            $participation->Contribution = $contribution;
            $participation->save();
        }
        return back();
    }


    public function detailEvenement(Request $request)
    {

        $idUserG = $request->idUserG;
        $idEvent = $request->idEvent;
        $organisateur = $request->organisateur;
        $idorganisateur = $request->idorganisateur;

        $event = Event::find($idEvent);
        $idgift = $event->GiftID;

        $detailGift = Gift::find($idgift);

        return view('detailEvenement', compact('detailGift', 'event', 'organisateur', 'idUserG', 'idEvent'));
    }

    public function listeMesevenementorganise($idUserG)
    {

        $mesevenementsorganises = Event::where(['OrganizerID' => $idUserG])->get();

        $allEvent = Event::all();
        $allUsers = UserG::all();

        $idUserG = $idUserG;

        return view('listeMesevenementorganise', compact('mesevenementsorganises', 'allUsers', 'idUserG', 'allEvent'));
    }
    public function home(Request $request)
    {

        return redirect()->to('/');
    }
}
