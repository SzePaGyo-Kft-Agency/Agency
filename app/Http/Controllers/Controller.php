<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function index(){
    //     $agency =  Agency::all();
    //     return $agency;
    // }

    // public function show($id)
    // {
    //     $agency = Agency::find($id);
    //     return $agency;
    // }
    // public function destroy($id)
    // {
    //     Agency::find($id)->delete();
    // }
    // public function store(Request $request)
    // {
    //     $agency = new Agency();
    //     $agency->name = $request->name;
    //     $agency->country = $request->country;
    //     $agency->type = $request->type;
    //     $agency->save();
    // }

    // public function update(Request $request, $id)
    // {
    //     $agency = Agency::find($id);
    //     $agency->name = $request->name;
    //     $agency->country = $request->country;
    //     $agency->type = $request->type;
    // }
}
