<?php

namespace App\Http\Controllers;

use App\Models\comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function add(Request $req , $id){
       $formFields = $req->validate([
        'comment'  => 'required'
       ]);
       $formFields['email_user'] = auth()->user()->email;
       $formFields['id_project'] = $id;
       comments::create($formFields);
       return back();

    }
}
