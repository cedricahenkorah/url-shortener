<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UrlController extends Controller
{

    public function generateCode($length = 6)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $shortcode = $this->generateCode(6);

        $domain = $_SERVER['HTTP_HOST'];

        $validated = $request->validate([
            'link' => 'required|url'
        ]);

        $originalUrl = $validated['link'];

        if (!$validated) return redirect(route('welcome'));

        $shortenedUrl = "http://$domain/$shortcode";

        $url = Url::create([
            'link' => $originalUrl,
            'shortUrl' => $shortenedUrl,
            'code' => $shortcode
        ]);

        Session::put('url', ['link' => $shortenedUrl]);

        return redirect('/');
    }

    public function redirect($code)
    {
        $shortenedUrl = Url::where('code', $code)->first();

        if ($shortenedUrl) {
            return redirect($shortenedUrl->link);
        } else {
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Url $url)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Url $url)
    {
        //
    }
}
