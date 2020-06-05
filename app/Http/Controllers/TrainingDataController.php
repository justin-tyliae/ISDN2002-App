<?php

namespace App\Http\Controllers;

use App\TrainingData;
use Illuminate\Http\Request;

use App\Devices;

class TrainingDataController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrainingData  $trainingData
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingData $trainingData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrainingData  $trainingData
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingData $trainingData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrainingData  $trainingData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainingData $trainingData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrainingData  $trainingData
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainingData $trainingData)
    {
        //
    }
    
    
    public function post_entry(Request $request)
    {
        $device = Devices::all()->where('device_id', $request->input('device-id'))->first();

        if ($request->header == 'register') {
            $device->register_status = 1;
            $device->save();
        } elseif ($request->header == 'check') {
            return $device->register_status;
        } elseif ($request->header == 'training') {
            if ($request->status == 'start')
            {
                $csv_folder_path = "csv/user_" . $device->user_id . "/";
                $csv_file_name = date("Y-m-d-G-i", time()) . ".csv";

                if (!is_dir($csv_folder_path))
                    mkdir($csv_folder_path, 0777, true);

                $training_data = new TrainingData;
                $training_data->user_id = $device->user_id;
                $training_data->device_id = $device->device_id;
                $training_data->device_type = $device->device_type;
                $training_data->csv_path = $csv_folder_path . $csv_file_name;
                $training_data->start_time = time();
                $training_data->save();
                return $training_data->id;
            }
            else if ($request->status == 'end')
            {
                $training_data = TrainingData::findOrFail($request->input('data-id'));
                $training_data->end_time = time();
                $training_data->save();
                return "success";
            }
            else if ($request->status == 'doing')
            {
                $training_data = TrainingData::findOrFail($request->input('data-id'));
                $csv_file_path = $training_data->csv_path;

                $timestamp = $request->input('timestamp');
                $finger1 = $request->input('finger1');
                $finger2 = $request->input('finger2');
                $finger3 = $request->input('finger3');
                $finger4 = $request->input('finger4');
                $finger5 = $request->input('finger5');
    
                // $header = array("Timestamp", "Finger1", "Finger2", "Finger3", "Finger4", "Finger5");
    
                $list = array($timestamp, $finger1, $finger2, $finger3, $finger4, $finger5);
    
                $fp = fopen($csv_file_path, 'a');
    
                // fputcsv($fp, $header);
    
                fputcsv($fp, $list);
    
                fclose($fp);
    
                return "success";
            }
            else
                abort(404);
        }
    }
}
