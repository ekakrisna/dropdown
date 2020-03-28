<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class DynamicDependent extends Controller
{
    function index()
    {
        $provinces_list = DB::table('provinces')->get();
        // return $provinces_list;
        return view('dropdown')->with('provinces_list', $provinces_list);
    }

    function regencies(Request $request)
    {
        $value = $request->get('value');
        $data = DB::table('regencies')
            ->where('province_id', $value)
            ->get();
        $output = '<option value="">Pilih Kota</option>';
        foreach ($data as $row) {
            // var_dump($row->name);
            $output .= '<option value="' . $row->id . '">' . ucfirst($row->name) . '</option>';
        }
        echo $output;
    }

    function districts(Request $request)
    {
        $value = $request->get('value');
        $data = DB::table('districts')
            ->where('regency_id', $value)
            ->get();
        $output = '<option value="">Pilih Kabupaten</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . ucfirst($row->name) . '</option>';
        }
        echo $output;
    }

    function villages(Request $request)
    {
        $value = $request->get('value');
        $data = DB::table('villages')
            ->where('district_id', $value)
            ->get();
        $output = '<option value="">Pilih Desa</option>';
        // return $data;
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . ucfirst($row->name) . '</option>';
        }
        echo $output;
    }
}
