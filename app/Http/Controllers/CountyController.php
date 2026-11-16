<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $name = $request->get('name');
        $url = $name ? '/counties?name=' . urlencode($name) : '/counties';

        $response = Http::api()
            ->withToken(session('api_token'))
            ->get($url);

        if ($response->failed())
        {
            return redirect()->route('counties.index')->with('error', 'Hiba az adatok lekérdezése közben.');
        }

        $counties = json_decode($response->body(), false)?->counties ?? [];
        return view('counties.index', compact('counties', 'name'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('counties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Http::api()
            ->withToken(session('api_token'))
            ->get("/counties?id=$id");
        if ($response->failed())
        {
            return back()->with('error', 'Nem sikerült a megye adatait lekérni.');
        }
        $county = json_decode($response->body(), false)?->counties[0];
        if ($county === NULL)
        {
            return back()->with('error', 'Nincs ilyen megye.');
        }
        return view('counties.edit', compact('county'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $response = Http::api()
            ->withToken(session('api_token'))
            ->delete("/counties/$id");
        if ($response->failed())
        {
            return back()->with('error', 'Nem sikerült a megyét törölni.');
        }
        return redirect()->route('counties.index')->with('success', 'Megye sikeresen törölve.');
    }
}
