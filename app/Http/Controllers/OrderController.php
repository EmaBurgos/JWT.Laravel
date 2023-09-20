<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request, Orders $orders)
    {
        $barcode = $request->input('barcode');

          $existingOrder = Orders::where('barcode', $barcode)->first();

        if ($existingOrder) {
            return response()->json(['message' => 'Código de barras ya utilizado'], 400);
        }



       $orders = new Orders();
       $orders->barcode = $request->input('barcode');
       $orders->labTestGroups = $request->input('labTestGroups');
       $orders->save();
        
       return response()->json(['message'=>'Orden Creada'],201);
    }
}
