<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CityController extends Controller
{
    private static function createUrl($name, $countyId)
    {
        $url = '/cities';
        if ($name || $countyId)
        {
            $url .= '?';
            if ($name)
            {
                $url .= 'name=' . urlencode($name);
                if ($countyId) $url .= '&';
            }
            if ($countyId) $url .= 'county_id=' . urlencode($countyId);
        }
        return $url;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        $countyId = $request->input('county_id');

        $url = self::createUrl($name, $countyId);

        $cityResponse = Http::api()
            ->withToken(session('api_token'))
            ->get($url);
        $countyResponse = Http::api()
            ->withToken(session('api_token'))
            ->get('/counties');

        if ($cityResponse->failed() || $countyResponse->failed())
        {
            return redirect()->route('cities.index')->with('error', 'Hiba az adatok lekérdezése közben.');
        }

        $cities = json_decode($cityResponse->body(), false)?->cities ?? [];
        $counties = json_decode($countyResponse->body(), false)?->counties ?? [];
        return view('cities.index', compact('cities', 'counties', 'name', 'countyId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = Http::api()
            ->withToken(session('api_token'))
            ->get('/counties');
        if ($response->failed())
        {
            return redirect()->route('cities.index')->with('error', 'Hiba a megyék lekérése közben.');
        }
        $counties = json_decode($response->body(), false)?->counties ?? [];

        return view('cities.create', compact('counties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::api()
            ->withToken(session('api_token'))
            ->post('/cities', $request->all());
        if ($response->failed())
        {
            return redirect()->route('cities.index')->with('error', 'Nem sikerült létrehozni a várost.');
        }

        return redirect()->route('cities.index')->with('success', 'Város sikeresen létrehozva.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
