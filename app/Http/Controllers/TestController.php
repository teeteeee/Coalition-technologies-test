<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function index()
    {
        $destination = base_path() . "/files/formresult.json";
        $inp = file_get_contents($destination);
        $inp = json_decode($inp);
        return view('formdata', compact('inp'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $validatedData['datetime_submitted'] = now();
        $validatedData['total_value'] = $validatedData['quantity'] * $validatedData['price'];

        $destination = base_path() . "/files/formresult.json";
        $inp = file_get_contents($destination);
        $tempArray = json_decode($inp);
        array_push($tempArray, [
            "product_name" => $validatedData['product_name'],
            "quantity" => $validatedData['quantity'],
            "price" => $validatedData['price'],
            "datetime_submitted" => $validatedData['datetime_submitted'],
            "total_value" => $validatedData['total_value']
        ]);
        $jsonData = json_encode($tempArray);
        file_put_contents($destination, $jsonData);

        $inp = json_decode($inp);

        return view('formdata', compact('inp'));
    }
}
