<?php

namespace App\Http\Controllers;

use App\Devices;
use Illuminate\Http\Request;

class DevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addDevice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'device-name' => 'required',
            'device-id' => 'required', 
            'device-type' => 'required',
        ]);

        $device = new Devices;
        $device->device_name = $request->input('device-name');
        $device->device_id = $request->input('device-id');
        $device->device_type = $request->input('device-type');
        $device->device_alias = $request->input('device-alias');
        $device->user_id = auth()->user()->id;
        $device->register_status = 0;
        $device->save();

        return redirect('/home')->with('success', 'Device has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function show(Devices $devices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function edit(Devices $devices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Devices $devices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Devices $devices, $id)
    {
        $device = Devices::findOrFail($id)->first();
        $device->delete();

        return redirect('/home')->with('success', 'Device has been removed');
    }
}
