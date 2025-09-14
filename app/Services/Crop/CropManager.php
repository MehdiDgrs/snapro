<?php
namespace App\Services\Crop;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

abstract class CropManager
{
    protected function request(string $imgPath): Response
    {
        dd($imgPath);
        return Http::withHeaders([
            'multipart' => [
                [
                    'name'     => 'image_file',
                    'contents' => fopen($imgPath, 'r')
                ],
                [
                    'name'     => 'size',
                    'contents' => 'auto'
                ]
            ],
            'X-Api-Key' => config('cropProvider.api_key')
        ])->post(config('cropProvider.endooint'));
    }

    abstract public function generate(string $imgPath);
}
?> 