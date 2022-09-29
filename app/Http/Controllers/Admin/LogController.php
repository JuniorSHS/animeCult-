<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogController extends Controller
{
    //Affichier les logs des utilisateurs, des posts et des catégories
    public function index()
    {
        return view('admin.logse.index');

    }
}
