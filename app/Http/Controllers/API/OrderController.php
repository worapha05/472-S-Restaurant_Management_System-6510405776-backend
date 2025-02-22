<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(
        private OrderRepository $orderRepository,
    ) {}

    public function index()
    {
        $orders = $this->orderRepository->getAll();
        return new OrderCollection($orders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'table_id' => ['nullable', 'exists:tables,id'],
            'address' => ['nullable', 'string', 'max:255'],
            'type' => ['required', 'in:DELIVERY,PICKUP,DINE_IN'],
            'payment_method' => ['required', 'in:CASH,CREDIT_CARD,QRCODE'],
            'sum_price' => ['required', 'numeric', 'min:0'],
        ]);

        $order = $this->orderRepository->create([
            'user_id' => $request->get('user_id'),
            'table_id' => $request->get('table_id'),
            'address' => $request->get('address'),
            'accept' => null,
            'status' => 'PENDING',
            'type' => $request->get('type'),
            'payment_method' => $request->get('payment_method'),
            'sum_price' => $request->get('sum_price'),
        ]);

        return new OrderResource($order);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order = Order::with(['orderLists.food'])->findOrFail($order->id);
        return new OrderResource($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
//        $validated = $request->validate([
//            'status' => ['nullable', 'in:PENDING,WAITING,COMPLETED,CANCELLED'],
//            'payment_method' => ['nullable', 'string', 'in:CASH,CREDIT_CARD,ONLINE'],
//            'sum_price' => ['nullable', 'numeric', 'min:0'],
//        ]);

        $this->orderRepository->update([
            'status' => $request->get('status'),
            'payment_method' => $request->get('payment_method'),
            'sum_price' => $request->get('sum_price'),
        ], $order->id);

        return new OrderResource($order->refresh());
    }

    public function destroy(Order $order)
    {

    }
}
