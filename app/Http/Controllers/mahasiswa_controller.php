<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa_model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class mahasiswa_controller extends Controller
{
    public function index()
    {
        $mahasiswa = mahasiswa_model::all();

        return response()->json([
            'message' => 'Success Tampilkan Data ni ',
            'data' => $mahasiswa
        ], Response::HTTP_OK);
    }


    public function add(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'nama_mahasiswa' => 'required',
                'nim' => 'required|numeric'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Failed',
                'errors' => $validator->errors()
            ], Response::HTTP_NOT_ACCEPTABLE);
        }

        $validator = $validator->validate();
        try {
            $createMahasiswa = mahasiswa_model::create($validator);

        }catch(\Throwable $th)
        {
            return response()->json([
                'message' => 'failed nih',
                'data' => $th->getMessage()
            ]);
        }

        return response()->json([
            'message' => 'Success Tambah Data',
            'data' => $createMahasiswa
        ]);
    }
}
