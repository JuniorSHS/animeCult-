<?php

namespace App\Http\Controllers\Admin;

use App\Models\Paremetres;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Paremetres::first();
        return view('Admin.settings.index', compact('setting'));
    }

    public function savedata(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom_site' => 'required|string|max:255',
            'logo_site' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // 2MB Max
            'favicon_site' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
        ]);

        // if ($validator->fails()) 
        // {
        //     return redirect()->back()->withErrors($validator);
        // }

        //si le logo ne contient pas la bonne extension alors on retourne une erreur
        if ($request->hasFile('logo_site')) {
            $extension = $request->file('logo_site')->getClientOriginalExtension();
            if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg' && $extension != 'gif') {
                return redirect()->back()->with('error', 'Le logo doit être une image de type png, jpg, jpeg ou gif');
            }
        }

        //si le favicon ne contient pas la bonne extension alors on retourne une erreur
        if ($request->hasFile('favicon_site')) {
            $extension = $request->file('favicon_site')->getClientOriginalExtension();
            if ($extension != 'png' && $extension != 'jpg' && $extension != 'jpeg') {
                return redirect()->back()->with('error', 'Le favicon doit être une image de type png, jpg ou jpeg');
            }
        }

        $setting = Paremetres::where('id', '1')->first();
        if ($setting) 
        {
            $setting->nom_site = $request->nom_site;

            if($request->hasfile('logo_site')){

                //si l'image existe déjà on la supprime
                $destination = 'uploads/settings/'.$setting->logo_site;
                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $file = $request->file('logo_site');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings/',$filename);
                $setting->logo_site = $filename;
            }

            if($request->hasfile('favicon_site')){

                //si l'image existe déjà on la supprime
                $destination = 'uploads/settings/'.$setting->favicon_site;
                if (File::exists($destination)) 
                {
                    File::delete($destination);
                }

                $file = $request->file('favicon_site');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings/',$filename);
                $setting->favicon_site = $filename;
            }

            $setting->meta_title = $request->meta_title;
            $setting->meta_description = $request->meta_description;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->save();

            return redirect('admin/settings')->with('message', 'Les paramètres ont été modifiés avec succès.');
        } 
        else 
        {
            $setting = new Paremetres;
            $setting->nom_site = $request->nom_site;

            if($request->hasfile('logo_site')){
                $file = $request->file('logo_site');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings/',$filename);
                $setting->logo_site = $filename;
            }

            if($request->hasfile('favicon_site')){
                $file = $request->file('favicon_site');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings/',$filename);
                $setting->favicon_site = $filename;
            }

            $setting->meta_title = $request->meta_title;
            $setting->meta_description = $request->meta_description;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->save();

            return redirect('admin/settings')->with('message', 'Les paramètres ont été modifiés avec succès.');

        }

    }
}
