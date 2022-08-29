<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\User;
use App\Models\Anime;
use App\Models\Category;
use App\Models\Paremetres;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $setting = Paremetres::find(1);
        //Avoir toutes les catégories
        $all_categories = Category::where('status', '0')->get();
        $latest_posts = Post::where('status', '0')->orderBy('created_at', 'desc')->take(5)->get();
        return view('frontend.index', compact('all_categories','latest_posts', 'setting'));
    }

    public function apercuCatPost(string $category_slug)
    {
        $category = Category::where('slug', $category_slug)->where('status','0')->first();
        if($category)
        {
            $post = Post::where('category_id', $category->id)->where('status','0')->paginate(10);
            return view('frontend.post.index', compact('post','category'));
        }
        else
        {
            return redirect('/');
        }
    }

       public function viewPost(string $category_slug, string $post_slug)
       {
          $category = Category::where('slug', $category_slug)->where('status','0')->first();
          if($category)
          {
             $post = Post::where('category_id', $category->id)->where('slug',$post_slug)->where('status','0')->first();
            //Dernier post de la catégorie
            $last_posts = Post::where('category_id', $category->id)->where('status','0')->orderBy('created_at', 'desc')->get()->take(3);
              return view('frontend.post.view', compact('post','last_posts'));
          }
          else
          {
              return redirect('/');
          }
       }
        //Afficher la liste des membres
         public function members()
         {
              $members = User::all();
              return view('frontend.members.view', compact('members'));
         }
            //Afficher le profil d'un membre avec son id
            
                public function viewMembers(string $membre_id)
                {
                    $membre = User::where('id', $membre_id)->first();
                    if($membre)
                    {
                        return view('frontend.members.profil.profilview', compact('membre'));
                    }
                    else
                    {
                        return redirect('/');
                    }
                }
            //affichier la liste des animes
                public function ViewProchainement()
                {
                    $animes = Anime::all();
                    return view('frontend.prochainement.index', compact('animes'));
                }

}


