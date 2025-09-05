<?php

abstract class CropManager
{
    public string $img;

    public function __constructor(
        string $img 
    ) {
        $this->img = $img;
    }

    protected function connect() {
        //
    }

    public function generate(): string
    {
        return 'hello';
    }
}
?> 