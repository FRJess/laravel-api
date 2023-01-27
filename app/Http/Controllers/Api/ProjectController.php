<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with(['type', 'technologies'])->paginate(10);
        return response()->json(compact('projects'));
    }

    public function show($slug){

        $project = Project::where('slug',$slug)->with(['type','technologies','user'])->first();

        if($project->image){
            $project->image = url("storage/" . $project->image);
        }else{
            $project->image = url("storage/uploads/image-paceholder.jpg");
        }

        return response()->json($project);

    }
}
