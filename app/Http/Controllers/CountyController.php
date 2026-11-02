<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CountyController extends Controller
{
    public function index(Request $request)
    {
        $name = $request
            ->withToken(session('api_token'))
            ->get('name');
        $url = $name ? '/counties?name=' . urlencode($name) : '/counties';

        $response = Http::api()->get($url);

        if ($response->failed())
        {
            return redirect()->route('counties.index')->with('error', 'Hiba az adatok lekérdezése közben.');
        }

        $counties = $response->json();
        return view('counties.index', compact('counties'));
    }

    public function store(Request $request)
    {
        $response = Http::api()
            ->withToken(session('api_token'))
            ->post('/counties', $request->all());
        if ($response->failed())
        {
            return back()->with('error', 'Nem sikerült létrehozni a megyét.');
        }
        return redirect()->route('counties.index')->with('success', 'Megye sikeresen létrehozva.');
    }

    public function update(Request $request, $id)
    {
        $response = Http::api()
            ->withToken(session('api_token'))
            ->put("/counties/$id", $request->all());
        if ($response->failed())
        {
            return back()->with('error', 'Nem sikerült a megyét módosítani.');
        }
        return redirect()->route('counties.index')->with('success', 'Megye sikeresen módosítva.');
    }

    public function destroy($id)
    {
        $response = Http::api()
            ->withToken(session('api_token'))
            ->delete("/counties/$id");
        if ($response->failed())
        {
            return back()->with('error', 'Nem sikerült a megyét törölni.');
        }
        return redirect()->route('counties.index')->with('success', 'Megye sikeresen törölve');
    }
}
