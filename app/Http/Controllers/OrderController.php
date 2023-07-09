<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\KibBDataTable;
use App\Models\KibB;
use App\Models\Order;
use Yajra\DataTables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;
use App\DataTables\OrdersDataTable;

class OrderController extends Controller
{
    public function index(OrdersDataTable $dataTable)
    {
        
        return $dataTable->render('order.index');
    }

    public function create()
    {
        $orderType = DB::table('order_type')->get();
        $dataTable = new KibBDataTable();
        return $dataTable->render('order.create', ['listJenis' => $orderType]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nosurat'=>'required',
            'jenis'=>'required',            
        ]);

        $user = Auth::user();

        $order = new Order;
        $order->code = $request->nosurat;
        $order->identity = $user->id;
        $order->applicant = $user->username;
        $order->order_status_id  = 1;
        $order->order_type_id = $request->jenis;
        $order->save();
        return redirect()->route('order')->with('Success','Order Inserted!');
    }

    public function dataKibb(Request $request)
    {
        if ($request->ajax()) {
            $data = KibB::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('welcome');
    }

    public function data(Request $request)
    {
        // if ($request->ajax()) {
            $data = Order::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        // }

        // return view('welcome');
    }
}
