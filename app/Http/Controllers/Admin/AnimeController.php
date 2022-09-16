<?php

namespace App\Http\Controllers\Admin;

use App\Models\Anime;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\AnimeFormRequest;

class AnimeController extends Controller
{
    //afficher toute les informations de la table anime
    public function index() 
    {
        $animes = Anime::all();
        return view('Admin.anime.index', compact('animes'));
    }

    //Ajouter un anime
    public function create()
    { 
        $category = Category::where('status', '0')->get();
        return view('Admin.anime.create', compact('category'));
    }

    public function store(AnimeFormRequest $request)
    {
        $data = $request->validated();

        $anime = new Anime();
        $anime->name = $data['name'];
        $anime->category_id = $data['category_id'];
        $anime->nb_episode = $data['nb_episode'];
        $anime->description = $data['description'];
        $anime->date_release = $data['date_release'];
        $anime->studio = $data['studio'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->move('uploads/anime/', $filename);
            $anime->image = $filename;
        }

        $anime->yt_iframe = $data['yt_iframe'];
        $anime->meta_title = $data['meta_title'];
        $anime->meta_description = $data['meta_description'];
        $anime->meta_keyword = $data['meta_keyword'];
        $anime->save();

        return redirect('admin/animes')->with('message', 'Votre anime a été créé avec succès');
    }
    //modifier un anime
    public function edit($anime_id)
    {
        $anime = Anime::find($anime_id);
        $category = Category::where('status', '0')->get();
        return view('Admin.anime.edit', compact('anime', 'category'));
    }
    //supprimer un anime
    public function destroy(Request $request)
    {
        // trouver id de l'anime a supprimer et le supprimer
        $anime = Anime::find($request->anime_id);
        $anime->delete();
        // $anime = Anime::find($request->anime_id);
        // $anime->delete();
        
        return redirect('admin/animes')->with('message', 'vote anime a été supprimé avec succès');
    }
    //mettre à jour un anime
    public function update(AnimeFormRequest $request, $anime_id)
    {
        $data = $request->validated();

        $anime = Anime::find($anime_id);
        $anime->name = $data['name'];
        $anime->category_id = $data['category_id'];
        $anime->nb_episode = $data['nb_episode'];
        $anime->description = $data['description'];
        $anime->date_release = $data['date_release'];
        $anime->studio = $data['studio'];

         //supprimer l'ancienne image si elle existe et si la nouvelle image est envoyée
         if($request->hasFile('image')) 
         {
             $destination = 'uploads/anime/'.$anime->image;
             if(File::exists($destination))
             {
                 File::delete($destination);
             }
             $file = $request->file('image');
             $extension = $file->getClientOriginalExtension();
             $filename = time(). '.' . $extension;
             $file->move('uploads/anime/', $filename);
             $anime->image = $filename;
         }

        $anime->yt_iframe = $data['yt_iframe'];
        $anime->meta_title = $data['meta_title'];
        $anime->meta_description = $data['meta_description'];
        $anime->meta_keyword = $data['meta_keyword'];
        $anime->update();
        // $anime = Anime::find($request->anime_id);
        // $anime->update($request->all());
        return redirect('admin/animes')->with('message', 'Votre anime a été modifié avec succès');
    }
}


