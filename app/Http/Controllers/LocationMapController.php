<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LocationMap;

class LocationMapController extends Controller
{
    //
    /**
     * Display a listing of the outlet.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('manage_locationmap');

        $outletQuery = LocationMap::query();
        $outletQuery->where('name', 'like', '%'.request('q').'%');
        $outlets = $outletQuery->paginate(25);

        return view('locationmap.index', compact('outlets'));
    }

    public function getMap(Request $request)
    {
        return view('locationmap.map');
    }

    /**
     * Show the form for creating a new outlet.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new LocationMap);

        return view('locationmap.create');
    }

    /**
     * Store a newly created outlet in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new LocationMap);

        $newOutlet = $request->validate([
            'name'      => 'required|max:60',
            'address'   => 'nullable|max:255',
            'latitude'  => 'nullable|required_with:longitude|max:15',
            'longitude' => 'nullable|required_with:latitude|max:15',
        ]);
        //$newOutlet['creator_id'] = auth()->id();

        $outlet = LocationMap::create($newOutlet);

        return redirect()->route('locationmap.index', $outlet);
    }

    /**
     * Display the specified outlet.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $outlet = LocationMap::findOrFail($id);
        return view('locationmap.show', ['outlet' => $outlet]);
    }

    /**
     * Show the form for editing the specified outlet.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $this->authorize('update', new LocationMap);

        $outlet = LocationMap::findOrFail($id);

        return view('locationmap.edit', compact('outlet'));
    }

    /**
     * Update the specified outlet in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', new LocationMap);

        $outletData = $request->validate([
            'name'      => 'required|max:60',
            'address'   => 'nullable|max:255',
            'latitude'  => 'nullable|required_with:longitude|max:15',
            'longitude' => 'nullable|required_with:latitude|max:15',
        ]);
        
        $outlet = LocationMap::findOrFail($id);

        $outlet->update($outletData);

        return redirect()->route('locationmap.show', $outlet);
    }

    /**
     * Remove the specified outlet from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $this->authorize('delete', new LocationMap);

        
        $outlet = LocationMap::findOrFail($id);
        $outlet->delete();
        
        return redirect()->route('locationmap.index');
    }
}
