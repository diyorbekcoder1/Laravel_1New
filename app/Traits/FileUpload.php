<?php

namespace App\Traits;

trait FileUpload
{
    public function FileUpload($data)
    {
        $file = $data['image'];
        $name = uniqid('bek', true) . '.' . $file->getClientOriginalExtension();
        $file->move(storage_path('/app/public/images'), $name);
        $data['image'] = $name;
        return $data;

    }
}
