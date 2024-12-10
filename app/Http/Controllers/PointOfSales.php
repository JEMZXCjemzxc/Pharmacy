<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Medicine;
use Illuminate\Http\Request;

class PointOfSales extends Controller
{
    public function index()
    {
        $medicines = Medicine::with(['category', 'supplier'])->get();
        return view('myApp.dashboard', compact('medicines'));
    }
    public function update(Request $srequest){

    }

}
