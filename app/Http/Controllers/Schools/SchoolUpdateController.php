<?php

namespace App\Http\Controllers\Schools;

use App\Http\Controllers\Controller;
use App\Models\School;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolUpdateController extends Controller
{
    public function update(Request $request)
    {
        $school =  School::find($request->input('school_id'));
       $school->name = $request->input('name');
       $school->address = $request->input('address');
       $school->city = $request->input('city');
       $school->country = $request->input('country');

       if ($request->hasFile('icon_url')) {
           $school->icon_url = $request->icon_url->store('public/school_logos');
           $image_name = substr($school->icon_url, 20);
           $client = new Client();
           $url = "https://miel.robotschool.co/upload.php";
           print(Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix().'/school_logos/'.$request->file('icon_url')->getClientOriginalName());
           $response = $client->request('POST', $url, [
               'multipart' => [
                   [
                       'name' => 'image',
                       'contents' => fopen(Storage::disk('public')->getDriver()->getAdapter()->getPathPrefix().'school_logos/'.$image_name, 'r'),
                   ],
                   [
                       'name'=>'path',
                       'contents' => 'school_logos'
                   ]
               ]
           ]);
           dd($response);
           $school->save();
           unlink(storage_path('app/public/school_logos/'.$image_name));
           return redirect('/schools')->with('updaschoolsuccess', 'Colegio modificado');
       }
       $school->save();
       return redirect('/schools')->with('updaschoolsuccess', 'Colegio modificado');
    }
}
