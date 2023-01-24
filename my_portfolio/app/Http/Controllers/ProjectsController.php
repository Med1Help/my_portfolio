<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\projects;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    //display all projects
    public function index(){
        return view('projects',['projects' => projects::filter(request(['search']))->get()]);
    }
    //display one project
    public function show($id){
        return view('project',['item' => projects::find($id) , 'comments' => comments::all()->where('id_project','like',$id)]);
    }
    //show create form
    public function showForm(){
        return View('create');
    }
    //add project
    public function addProject(Request $req){
      $formFields = $req->validate([
         'title'        =>'required',
         'github_repo'  =>'required',
         'techs'        =>'required',
         'description'  =>'required',
         "image_url"    =>'required'
      ]);
      $formFields['techs'] = json_encode(explode(',',$formFields['techs']));
      if($req->has('image_url')){
        $formFields['image_url'] = $req->file('image_url')->store("/images");
      }
      //image_url
      projects::create($formFields);
      return redirect('/')->with("message","Project added succesfuly");
    }

    public function edit($id){
        $project = projects::find($id);
        return View('edit',["project" => $project]);
    }

    public function editproject(Request $req ,$id){
        
        $project = projects::find($id);
        $formFields = $req->validate([
            'title'        =>'required',
            'github_repo'  =>'required',
            'techs'        =>'required',
            'description'  =>'required',
            "image_url"    =>'required'
         ]);
         $formFields['techs'] = json_encode(explode(',',$formFields['techs']));
      if($req->has('image_url')){
        $formFields['image_url'] = $req->file('image_url')->store("/images");
      }
      //image_url
      $project->update($formFields);
      return redirect('/')->with("message","Project updated succesfuly");
    }

    public function delete($id){
        $project = projects::find($id);
        $project->delete();
        return redirect('/')->with("message","Project deleted succesfuly");
    }
}
