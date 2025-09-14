<?php 

namespace App\Services\Crop;

use Illuminate\Support\Facades\Storage;

class ApiCropManager extends CropManager
{
    public function generate(string $imgPath)
    {
        $response = $this->request($imgPath);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception("Crop API failed: " . $response->getReasonPhrase());
        }

        $imageContent = $response->getBody()->getContents();

        $filename = 'processed/' . uniqid() . '.png';

        Storage::disk('public')->put($filename, $imageContent);

        return $filename;
    }
}

?>