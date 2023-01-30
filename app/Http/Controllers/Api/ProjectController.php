<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Database\Seeders\ProjectSeeder;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with(['type', 'technologies'])->paginate(10);
        $technologies = Technology::all();
        $type = Type::all();
        return response()->json(compact('projects', 'technologies', 'type'));
    }

    public function show($slug){

        $project = Project::where('slug',$slug)->with(['type','technologies','user'])->first();

        // if($project->image){
        //     $project->image = url("storage/" . $project->image);
        // }else{
        //     $project->image = url("storage/uploads/image-paceholder.jpg");
        // }

        return response()->json($project);

    }

    public function search(){
        $tosearch = $_GET['tosearch'];

        $projects = Project::where('name', 'like', "%$tosearch%")->with(['type','technologies',])->get();

        return response()->json($projects);
    }
}
