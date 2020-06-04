<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HandDataController extends Controller
{
    public function csv()
    {
        $header = array("Name", "Age");

        $list = array(
            array('name' => 'John', 'age' => '12',),
            array('name' => 'Jack', 'age' => '34'),
        );

        $fp = fopen("file.csv", 'w');

        fputcsv($fp, $header);

        foreach ($list as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
    }

    public function get_data($data)
    {
        return view('test_get')->with('data', $data);
    }

    public function post_data(Request $request)
    {
        $timestamp = $request->input('timestamp');
        $finger1 = $request->input('finger1');
        $finger2 = $request->input('finger2');
        $finger3 = $request->input('finger3');
        $finger4 = $request->input('finger4');
        $finger5 = $request->input('finger5');

        // $header = array("Timestamp", "Finger1", "Finger2", "Finger3", "Finger4", "Finger5");

        $list = array($timestamp, $finger1, $finger2, $finger3, $finger4, $finger5);

        $fp = fopen("test.csv", 'a');

        // fputcsv($fp, $header);

        fputcsv($fp, $list);

        fclose($fp);

        return view('test_post')->with(['list' => $list]);
    }
}
