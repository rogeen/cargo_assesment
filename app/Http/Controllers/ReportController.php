<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function totalOrderBasedOnCity(){

        $data = request()->only(['city_id','month']);

        $cityId = isset($data['city_id']) ? $data['city_id'] : null;
        $month = isset($data['month']) ? $data['month'] : null; //shoul be integer between [1-12]

        $report = Order::select(DB::raw('COUNT(orders.id) as number_of_order, SUM(orders.total) as total_or_orders,customers.fullname as customer_name,cities.name as city'))
        ->join('customers', 'orders.customer_id', '=', 'customers.id')
        ->join('cities','customers.city_id','cities.id')
        ->where('customers.city_id', $cityId);

        if($month){  //I think should check for year also
            $report = $report->whereRaw('MONTH(orders.created_at) = ?', [$month]);
        }
        $report = $report->groupBy('customers.id')->get();

        return response(['report' => $report], 200);

    }


    public function totalOrderBasedOnSpecificCity(){

        $data = request()->only(['city_id']);

        $cityId = isset($data['city_id']) ? $data['city_id'] : null;

        $report = Order::select(DB::raw('cities.name as city_name,COUNT(orders.id) as number_of_order, SUM(orders.total) as total_or_orders,COUNT(order_items.id) as number_of_items'))
        ->join('order_items','order_items.order_id','orders.id')
        ->join('customers', 'customers.id', '=', 'orders.customer_id')
        ->join('cities', 'cities.id', '=', 'customers.city_id') // to get city name
        ->where('customers.city_id', $cityId)->groupBy('cities.id')->get();

        return response(['report' => $report], 200);

    }
}
