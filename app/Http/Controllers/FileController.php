<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{
    /**
     * Show Image Or Download File
     *
     * @return \Illuminate\Http\Response
     */
    public function index($filename, $storage='local', $download=0)
    {
        $path = Storage::disk($storage)->getAdapter()->getPathPrefix().$filename;
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);
        if($download){
            $headers = array(
                'Content-Type: application/'.$type,
            );

            return Response::download($path, $filename, $headers);
        }
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

}
