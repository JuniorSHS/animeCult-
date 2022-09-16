<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        //compteur de catégories
        $categories = Category::count();
        //compteur de posts
        $posts = Post::count();
        //compteur d'utilisateurs
        $users = User::where('role', '0')->count();
        //compteur le nomdre d'aministrateurs
        $admins = User::where('role', '1')->count();
        return view('Admin.dashboard', compact('categories', 'posts', 'users','admins'));
    }

}