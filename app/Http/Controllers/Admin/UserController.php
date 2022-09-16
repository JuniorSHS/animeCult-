<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Admin.user.index', compact('users'));
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('Admin.user.edit', compact('user'));
    }

    //supprimer l'utilisateur
    // public function destroy($user_id)
    // {
    //     $user = User::find($user_id);
    //     $user->delete();
    //     return redirect('admin/users')->with('message', 'Utilisateur supprimé avec succès');
    // }

    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        //supprimer l'ancienne image si elle existe et si la nouvelle image est envoyée
        if($request->hasFile('avatar')) 
        {
            $destination = 'uploads/membres/'.$user->avatar;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('uploads/membres/', $filename);
            $user->avatar = $filename;
        }

        $user->role = $request->role;
        $user->update();
        return redirect('admin/users')->with('message', 'Utilisateur modifié avec succès');
    }
}
