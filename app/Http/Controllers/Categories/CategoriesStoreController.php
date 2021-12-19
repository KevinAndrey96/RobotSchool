<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request as RequestAlias;

class CategoriesStoreController extends Controller
{
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        if ($request->hasFile('icon_url')) {
            $pathName = Sprintf('category_images/%s.png', $category->id);
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
                                ->getPathPrefix() . 'category_images/' . $category->id . '.png', 'r'),
                    ],
                    [
                        'name' => 'path',
                        'contents' => 'category_images'
                    ]
                ]
            ]);

            $category->icon_url = '/storage/category_images/' . $category->id . '.png';
            return $category->icon_url;
            $category->save();
        }
        return back();

    }
}
