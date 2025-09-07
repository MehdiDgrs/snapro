<?php

use Illuminate\Support\Facades\Http;

abstract class CropManager
{
    public string $img;

    public function __constructor(
        string $img 
    ) {
        $this->img = $img;
    }

    protected function request() {
        Http::withHeaders([
            'multipart' => [
                [
                    'name'     => 'image_file',
                    'contents' => fopen($this->img, 'r')
                ],
                [
                    'name'     => 'size',
                    'contents' => 'auto'
                ]
            ],
            'X-Api-Key' => config('cropProvider.api_key')
        ])->post(config('cropProvider.endooint'));
    }

    public function generate(): string
    {
        return 'hello';
    }
}
?> 