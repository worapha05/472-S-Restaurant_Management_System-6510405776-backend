<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collections\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     */

    public function __construct(
        private OrderRepository $orderRepository,
        private UserRepository $userRepository,
    ) {}

    public function index()
    {
        Gate::authorize('viewAny',  Order::class);
        $orders = $this->orderRepository->getAllByDesc();
        return new OrderCollection($orders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create',  Order::class);
        $request->validate([
            'user_id' => ['nullable', 'exists:users,id'],
            'table_id' => ['nullable', 'exists:tables,id'],
            'address' => ['nullable', 'string', 'max:255'],
            'type' => ['required', 'in:DELIVERY,TAKEAWAY,DINE_IN'],
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
        Gate::authorize('view', $order);
        $order = Order::with(['orderLists.food'])->findOrFail($order->id);
        return new OrderResource($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        Gate::authorize('update', $order);

        if($order->status === 'PENDING') {
            $this->orderRepository->update([
                'accept' => $request->get('accept'),
            ], $order->id);
        }

        $this->orderRepository->update([
            'status' => $request->get('status')
        ], $order->id);


        return new OrderResource($order->refresh());
    }

    public function destroy(Order $order)
    {

    }

    public function getOrdersByUser($userId)
    {
        try {
            // Validate that the user exists
            $user = $this->userRepository->isExists($userId);

            if($user == null) {
                return response()->json(['message' => 'User not found'], 404);
            }

            // Get orders for the user
            $orders = $this->orderRepository->findByUserId($userId);

            foreach ($orders as $order) {
                Gate::authorize('view', $order);
            }

            return new OrderCollection($orders);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
