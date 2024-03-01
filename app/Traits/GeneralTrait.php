<?php

namespace App\Traits;


use App\Helpers\Classes\Mediaable;
use Illuminate\Http\Request;

trait GeneralTrait
{
    public function uploadImage(Request $request, mixed $attributes, $file_request, $dir): mixed
    {
        if ($request->hasFile($file_request)) {
            $attributes[$file_request] = (new Mediaable($request))
                ->moveToDir($dir)
                ->getMediaFromRequestByName($file_request)
                ->getMediaNameAfterUpload();
        }
        return $attributes[$file_request] ?? null;
    }
}
