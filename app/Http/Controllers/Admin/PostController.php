<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\PostFormRequest;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('Admin.post.index', compact('posts'));
    }

    public function create()
    {
        $category = Category::where('status', '0')->get();
        return view('Admin.post.create', compact('category'));
    }

    public function store(PostFormRequest $request)
    //Condition if, si le formulaire est rempli correctement, on valide et on enregistre les données. 
    //Sinon on affiche un message d'erreur.
    {
        if ($request->isMethod('post')) {
            $data = $request->validated();
            $post = new Post;
            $post->category_id = $data['category_id'];
            $post->name = $data['name'];
            $post->slug = Str::slug($data['slug']);
            $post->description = $data['description'];
            $post->yt_iframe = $data['yt_iframe'];
            $post->meta_title = $data['meta_title'];
            $post->meta_description = $data['meta_description'];
            $post->meta_keyword = $data['meta_keyword'];
            $post->status = $request->status == true ? '1' : '0';
            $post->created_by = auth()->user()->id;
            //condition d'image, si l'image est entré, on enregistre l'image dans le dossier public/uploads/post
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move('uploads/post/', $filename);
                $post->image = $filename;
            }
            $post->save();

            return redirect('admin/posts')->with('message', 'Votre article a été créé avec succès');
        }
        //condition else, si le formulaire n'est pas rempli correctement, on affiche un message d'erreur.
        else {
            return redirect('admin/posts')->with('message', 'Une erreur est survenue lors de la création de votre article');
        }
    }

    // {
    //     $data = $request->validated();

    //     $post = new Post(); 
    //     $post->category_id = $data['category_id'];
    //     $post->name = $data['name'];
    //     $post->slug = Str::slug($data['slug']);
    //     $post->description = $data['description'];

    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');
    //         $filename = time() . '.' . $file->getClientOriginalName();
    //         $file->move('uploads/post/', $filename);
    //         $post->image = $filename;
    //     }

    //     $post->yt_iframe = $data['yt_iframe'];
    //     $post->meta_title = $data['meta_title'];
    //     $post->meta_description = $data['meta_description'];
    //     $post->meta_keyword = $data['meta_keyword'];
    //     $post->status = $request->status == true ? '1' : '0';
    //     $post->created_by = auth()->user()->id;
    //     $post->save();

    //     return redirect('admin/posts')->with('message', 'Votre article a été créé avec succès');
    // }

    public function edit($post_id)
    {
        $post = Post::find($post_id);
        $category = Category::where('status', '0')->get();
        return view('Admin.post.edit', compact('post', 'category'));
    }

    public function update(PostFormRequest $request, $post_id)
    {
        $data = $request->validated();

        $post = Post::find($post_id);
        $post->category_id = $data['category_id'];
        $post->name = $data['name'];
        $post->slug = Str::slug($data['slug']);
        $post->description = $data['description'];
        // $post->image = $data['image'];

        if($request->hasFile('image')) 
        {
            $destination = 'uploads/post/'.$post->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('uploads/post/', $filename);
            $post->image = $filename;
        }

        // if ($request->hasFile('image')) {

        //     $destination = 'uploads/post/'.$post->image;

        //     if (File::exists($destination)) {
        //         File::delete($destination);
        //     }

        //     $file = $request->file('image');
        //     $filename = time() . '.' . $file->getClientOriginalName();
        //     $file->move('uploads/post/', $filename);
        //     $post->image = $filename;
        // }

        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->status = $request->status == true ? '1' : '0';
        $post->created_by = auth()->user()->id;
        $post->update();

        return redirect('admin/posts')->with('message', 'Votre article a été modifié avec succès');
    }

    public function destroy(Request $request)
    {
        $post = Post::find($request->post_delete_id);
        $post->delete();

        return redirect('admin/posts')->with('message', 'Votre article a été supprimé avec succès');
    }
    
}
