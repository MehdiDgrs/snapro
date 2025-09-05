<?php

namespace App\Http\Controllers\Api;

use CropManager;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\CropTask;
use App\Jobs\ProcessCrop;
use Illuminate\Http\JsonResponse;

class CropController extends Controller
{  
    public function generate(Request $request): JsonResponse
    {
       /*  $request->validate([
            'image' => 'required|image|max:5120', 
        ]); */

        //$path = $request->file('image')->store('uploads', 'public');

        $task = CropTask::firstOrCreate([
            ['user_id' => 1],
            [    
            'image' => 'mypath',
            'status' => 'pending'
            ]
        ]);

        
        ProcessCrop::dispatch($task);

        return response()->json([
            'task_id' => $task->id,
            'status' => 'queued',
        ]);
    }
};
?>