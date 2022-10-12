<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('Admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('Admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    //Condition try catch, si la requête est valide, on enregistre les données dans la base de données et on redirige vers la page index. Sinon on regirige vers la page index avec un message d'erreur.
    {
        try {
            $data = $request->validated();
            $category = new Category();
            $category->name = $data['name'];
            $category->slug = Str::slug($data['slug']);
            $category->description = $data['description'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keyword = $data['meta_keyword'];
            $category->navbar_status = $request->navbar_status == true ? '1' : '0';
            $category->status = $request->status == true ? '1' : '0';
            $category->created_by = auth()->user()->id;
            //upload l'image dans le dossier public/uploads/category avec le nom original de l'image
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '.' . $file->getClientOriginalName();
                $file->move('uploads/category/', $filename);
                $category->image = $filename;
            }
        //condition try catch, on enregistre seulement si les données attrapé sont valides.
            $category->save();
            return redirect('admin/category')->with('message', 'Votre catégorie a été ajouté avec succès');
        } catch (\Exception $exception) {
            return redirect('admin/category')->with('message', 'Une erreur est survenue lors de l\'ajout de votre catégorie');
        }
    }
    

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('Admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category_id)
    {
        $data = $request->validated();

        $category = Category::findOrFail($category_id);
        $category->name = $data['name'];
        $category->slug = Str::slug($data['slug']);
        $category->description = $data['description'];

        if ($request->hasFile('image')) {

            $destination = 'uploads/category/'.$category->image;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalName();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $data['meta_title'];
        $category->meta_description = $data['meta_description'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = auth()->user()->id;
        $category->update();

        return redirect('admin/category')->with('message', 'Votre catégorie a été modifiée avec succès !!');
    }



    public function destroy(Request $request)
    {
        $category = Category::findOrFail($request->category_delete_id);
        if($category)
        {
            $destination = 'uploads/category/'.$category->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            //supprimer les posts liés à la table categories
            // cf. app\Models\Category.php
            //$category->posts()->delete();
            $category->delete();
            return redirect('admin/category')->with('message', 'Votre catégorie à été supprimés avec succès !!');
        }
        else
        {
            return redirect('admin/category')->with('message', 'Une erreur est survenue lors de la suppression de la catégorie !!');
        }
        
    }


}
