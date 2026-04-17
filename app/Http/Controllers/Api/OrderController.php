<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OrderResource::collection(Order::with(['items.service', 'items.product', 'user'])->latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(\App\Http\Requests\StoreOrderRequest $request)
    {
        $validated = $request->validated();
        
        try {
            return DB::transaction(function () use ($validated) {
                $totalPrice = collect($validated['items'])->sum(function ($item) {
                    return $item['price'] * $item['quantity'];
                });

                $order = Order::create([
                    'user_id' => auth('sanctum')->id(),
                    'customer_name' => $validated['customer_name'],
                    'customer_phone' => $validated['customer_phone'],
                    'latitude' => $validated['latitude'] ?? null,
                    'longitude' => $validated['longitude'] ?? null,
                    'address' => $validated['address'],
                    'total_price' => $totalPrice,
                    'status' => 'pending',
                    'payment_method' => 'cash',
                    'payment_status' => 'pending',
                ]);

                foreach ($validated['items'] as $item) {
                    $order->items()->create([
                        'service_id' => $item['service_id'] ?? null,
                        'product_id' => $item['product_id'] ?? null,
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                    ]);
                }

                return new OrderResource($order->load(['items.service', 'items.product']));
            });
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erreur lors de la création de la commande',
                'error' => $e->getMessage()
            ], 500);
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
    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,completed,processing,cancelled'
        ]);

        $order->update($validated);

        return new OrderResource($order->load(['items.service', 'items.product']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
