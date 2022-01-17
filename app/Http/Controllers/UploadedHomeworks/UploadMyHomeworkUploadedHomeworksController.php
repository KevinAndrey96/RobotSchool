<?php

namespace App\Http\Controllers\UploadedHomeworks;

use App\Http\Controllers\Controller;
use App\Models\Uploaded_homework;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request as RequestAlias;

class UploadMyHomeworkUploadedHomeworksController extends Controller
{
    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function uploadMyHomework(Request $request)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = substr(str_shuffle($permitted_chars), 0, 10);
        $file = $_FILES['homeworkFile']['name'];
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $uploadedHomework = Uploaded_homework::find($request->input('uploadedHomework_id'));
        if ($request->hasFile('homeworkFile')) {
            if ($extension == 'pdf') {
                $pathName = Sprintf('homework_files/%s.pdf', $randomString);
            } elseif ($extension == 'docx') {
                $pathName = Sprintf('homework_files/%s.docx', $randomString);
            } elseif ($extension == 'rar') {
                $pathName = Sprintf('homework_files/%s.rar', $randomString);
            } else {
                return back()->with('extensionError', 'Archivo con extensión no permitida');
            }
            Storage::disk('public')->put($pathName, file_get_contents($request->file('homeworkFile')));
            $client = new Client();
            $url = "https://miel.robotschool.co/upload.php";
            if ($extension == 'pdf') {
                $client->request(RequestAlias::METHOD_POST, $url, [
                    'multipart' => [
                        [
                            'name' => 'image',
                            'contents' => fopen(
                                Storage::disk('public')
                                    ->getDriver()
                                    ->getAdapter()
                                    ->getPathPrefix() . 'homework_files/' . $randomString . '.pdf', 'r'),
                        ],
                        [
                            'name' => 'path',
                            'contents' => 'homework_files'
                        ]
                    ]
                ]);
                $uploadedHomework->path = 'storage/homework_files/' . $randomString . '.pdf';
                $uploadedHomework->save();
            } elseif ($extension == 'docx') {
                $client->request(RequestAlias::METHOD_POST, $url, [
                    'multipart' => [
                        [
                            'name' => 'image',
                            'contents' => fopen(
                                Storage::disk('public')
                                    ->getDriver()
                                    ->getAdapter()
                                    ->getPathPrefix() . 'homework_files/' . $randomString . '.docx', 'r'),
                        ],
                        [
                            'name' => 'path',
                            'contents' => 'homework_files'
                        ]
                    ]
                ]);
                $uploadedHomework->path = 'storage/homework_files/' . $randomString . '.docx';
                $uploadedHomework->save();
            } elseif ($extension == 'rar') {
                $client->request(RequestAlias::METHOD_POST, $url, [
                    'multipart' => [
                        [
                            'name' => 'image',
                            'contents' => fopen(
                                Storage::disk('public')
                                    ->getDriver()
                                    ->getAdapter()
                                    ->getPathPrefix() . 'homework_files/' . $randomString . '.rar', 'r'),
                        ],
                        [
                            'name' => 'path',
                            'contents' => 'homework_files'
                        ]
                    ]
                ]);
                $uploadedHomework->path = 'storage/homework_files/' . $randomString . '.rar';
                $uploadedHomework->save();
            }
            $path = substr($uploadedHomework->path, 8);
            unlink(storage_path('app/public/'.$path));
        }

        return back()->with('upMyHomeworkSuccess','Tarea subida');
    }
}
