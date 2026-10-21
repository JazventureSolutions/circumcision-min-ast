<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //

    public function index()
    {
        dd(auth()->user()->roles()->get());
        return "Welcome Admin";
    }
    
    public function sync(Request $request)
    {
        
        $ids = $request->input('ids');
        
        // Get data from templates_bck
        $records = DB::table('templates_bck')->whereIn('id', $ids)->get();
        
        // Prepare insertable array (remove IDs if needed)
        $insertData = $records->map(function ($item) {
            $array = (array) $item;
            unset($array['id']); // Remove ID if templates table uses auto-increment
            return $array;
        })->toArray();

        // Insert into templates
        DB::table('templates')->insert($insertData);

        return response()->json([
            'message' => 'Templates synced successfully.',
            'inserted_count' => count($insertData)
        ]);
    }
}
