<?php

namespace App\Jobs;

use App\Models\CropTask;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Services\Crop\CropManager;

class ProcessCrop implements ShouldQueue
{
    use Queueable;

    protected CropTask $task;
    /**
     * Create a new job instance.
     */
    public function __construct(CropTask $task)
    {
        $this->task = $task;
    }

    /**
     * Execute the job.
     */
    public function handle(CropManager $manager): void
    {
        try {
            $processedPath = $manager->generate($this->task->image);

            $this->task->update([
                'processed_image' => $processedPath,
                'status' => 'done',
            ]);
        } catch (\Throwable $e) {
            $this->task->update(['status' => 'failed']);
            throw $e;
        }
    }
}
