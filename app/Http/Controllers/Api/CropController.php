<?php

namespace App\Http\Controllers\Api;

use CropManager;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\CropTask;
use App\Jobs\ProcessCrop;
use Illuminate\Http\JsonResponse;
use Exception;

class CropController extends Controller
{  
    public function generate(Request $request): JsonResponse
    {
       $request->validate([ 
            'file' => 'required|image|max:5120', 
        ]);
       
        $task = CropTask::firstOrCreate(
                ['user_id' => 1],
                [    
                'image' => $request->file->path(),
                'status' => 'processing',
                ]);
        
        ProcessCrop::dispatch($task);

        return response()->json([
            'task_id' => $task->id,
            'status' => 'queued',
        ]);
    }
};
?>