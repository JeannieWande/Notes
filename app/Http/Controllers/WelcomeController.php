<?php

namespace App\Http\Controllers;
use App\Models\note;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome(){
        $notes=note::paginate(6);
        $users=user::all();
    
        return view('welcome', compact('notes', 'users'));
    }
   

   


}
