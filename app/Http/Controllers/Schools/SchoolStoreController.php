<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use App\Models\School;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request as RequestAlias;

/**
 * Class SchoolStoreController
 * @package App\Http\Controllers\Schools
 * @author Cristian Delgado
 */
class SchoolStoreController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws GuzzleException
     */
    public function store(Request $request)
    {
        $school = new School();
        $school->name = $request->input('name');
        $school->address = $request->input('address');
        $school->city = $request->input('city');
        $school->country = $request->input('country');
        $school->is_enable = true;
        $school->save();
        if ($request->hasFile('icon_url')) {
            $pathName = Sprintf('school_logos/%s.png', $school->id);
            Storage::disk('public')->put($pathName, file_get_contents($request->file('icon_url')));
            $client = new Client();
            $url = "https://miel.robotschool.co/upload.php";
            $client->request(RequestAlias::METHOD_POST, $url, [
                'multipart' => [
                    [
                        'name' => 'image',
                        'contents' => fopen(
                            Storage::disk('public')
                                ->getDriver()
                                ->getAdapter()
                                ->getPathPrefix() . 'school_logos/' . $school->id . '.png', 'r'),
                    ],
                    [
                        'name' => 'path',
                        'contents' => 'school_logos'
                    ]
                ]
            ]);
            $school->icon_url = '/storage/school_logos/' . $school->id . '.png';
            $school->save();
        }

        return redirect('/schools')->with('storeschoolsuccess','Colegio agregado');
    }
}
