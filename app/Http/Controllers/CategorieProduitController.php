<?php

namespace App\Http\Controllers;

use App\CategoriesProduit;
use Illuminate\Http\Request;

class CategorieProduitController extends Controller
{

    public function addCategorie(Request $request){
           if ($request->isMethod('post')){
              $categorieProduit = new CategoriesProduit();
              $categorieProduit->nom = $request->get('nom');
               $categorieProduit->description = $request->get('description');
               $categorieProduit->save();
           }
        return view('ajouter_categorie_produit');
    }

    public function viewCategorie(){

        $categorieProduit = CategoriesProduit::all();



        return view('voir_categorie_produit')->with(compact('categorieProduit'));
    }

}
