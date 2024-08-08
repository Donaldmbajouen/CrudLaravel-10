<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection\links;
use App\Models\Etudiant;
use App\Models\User;

class CrudController extends Controller
{
    public function AjouterEtudiant(){
        return view('CreateEtud');
    }
    //fonction d'affichage
    public function  ListEtudiant(){

        // User::create([
        //     'name'=>'donald',
        //     'email'=>'donald@gmail.com',
        //     'password'=>Hash::make('0000')
        // ]);
        $etudiants = Etudiant::paginate(6);
        return view('listEtud' , compact('etudiants'));
    }
    // fonction d ajout
    public function AjouterTraitement(Request $request){

        $request->validate([
            'nom'=>'required|min:4|string',
            'prenom'=>'required|string',
            'classe'=>'required|min:4',
            'image' => ['image', 'max:2000']
        ]);

        $etudiants = new Etudiant();
        $etudiants->nom = $request->nom;
        $etudiants->prenom = $request->prenom;
        $etudiants->classe = $request->classe;
        $etudiants->save();

        return redirect('/create')-> with('status', 'Etudiant enregistre avec succes');
    }

    //modification fonction
    public function UpdateEtudiant($id){
        $etudiants = new Etudiant();
        $etudiants = $etudiants::find($id);

        return view('updatEtud', compact('etudiants'));
    }
    public function UpdateTraitement(Request $request){
        $request->validate([
            'nom'=>'required|min:4|string',
            'prenom'=>'required|string',
            'classe'=>'required|min:4|'
        ]);

        $etudiants = Etudiant::find($request->id);

        $etudiants->nom = $request->nom;
        $etudiants->prenom = $request->prenom;
        $etudiants->classe = $request->classe;
        $etudians->image = $request->image;
        $etudians->image -> store('images', 'public');
        $etudiants->update();

        return redirect('/')-> with('status', 'Etudiant modifier avec succes');

    }

    //supprimer un etudiant

    public function supprimerEtudiant($id){
        $etudiants = Etudiant::find($id);
        if(!is_null($etudiants)){
            $etudiants->delete();
        }
        return redirect('/')-> with('status', 'Etudiant supprime avec succes');

    }
    // voir les donnees Etudiants

    public function ShowEtudiant($id){
        $etudiants = new Etudiant();
        $etudiants = $etudiants::find($id);
        return view('listEtud', compact('etudiants'));
    }
}
