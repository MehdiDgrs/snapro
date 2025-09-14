<?php
namespace App\Services\Crop;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

abstract class CropManager
{
    protected function request(string $imgPath): ResponseInterface
    {
        $client = new Client();

        return  $client->post(config('cropProvider.endpoint'), [
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
            'headers' => [
                'X-Api-Key' => config('cropProvider.api_key')
            ]
        ]);
    }

    abstract public function generate(string $imgPath);
}
?> 