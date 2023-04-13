<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Revolution\Google\Sheets\Facades\Sheets;

class GoogleSheetsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required',
            'number' => 'required|integer',
            'whatsapp_number' => 'required|integer',
            'value' => 'required|string',
            'url' => 'required|string',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errors = $validator->messages();
            return response()->json([
                'message' => 'invalid params',
                'errors' => $errors,
            ], 244);
        } else {
            $sheets = Sheets::spreadsheet(env('GOOGLE_SHEET_ID'))->sheet(env('GOOGLE_SUB_SHEET_NAME'))
            ->append([[
                'Full Name' => $request->name, 
                'Email' => $request->email, 
                'Phone Number' => $request->number, 
                'Whatsapp number' => $request->whatsapp_number, 
                'value' => $request->value,
                'Website Url' => $request->url,
                ]]);
            return response()->json([
                'message' => 'Success',
                'data' => $sheets,
            ], 200);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
