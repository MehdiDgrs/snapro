<?php 

namespace App\Services\Crop;

class ApiCropManager extends CropManager
{
    public function generate(string $imgPath)
    {
        dd($this->request($imgPath));
    }
}

?>