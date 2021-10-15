<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use DateTime;

class ReportController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();

        return view('admin.backend.reports.index', compact('orders'));
    }

    public function date(Request $request) {
        $request->validate([
            'date' => 'required'
        ], [
            'date.required' => 'This Field is Required!'
        ]);

        $date = new DateTime($request->date);
        $formatDate = $date->format('d/m/Y');

        $orders = Order::where('order_date', $formatDate)->latest()->get();

        return view('admin.backend.reports.index', compact('orders'));
    }

    public function month(Request $request) {
        $request->validate([
            'month' => 'required',
            'year_name' => 'required'
        ], [
            'required' => 'This Field is Required!'
        ]);

        $orders = Order::where('order_month', $request->month)->where('order_year', $request->year_name)->latest()->get();

        return view('admin.backend.reports.index', compact('orders'));
    }

    public function year(Request $request) {
        $request->validate([
            'year' => 'required'
        ], [
            'required' => 'This Field is Required!'
        ]);

        $orders = Order::where('order_year', $request->year)->latest()->get();

        return view('admin.backend.reports.index', compact('orders'));
    }
}
