<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\KibBDataTable;
use App\Models\KibB;
use App\Models\Order;
use App\Models\OrderDetails;
use Yajra\DataTables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;
use App\DataTables\OrdersDataTable;
use Illuminate\Support\Facades\Storage;

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
        if ($order->save()){
            
            for($i=1;$i<=5;$i++){
                
                if ( $request->file('detailtype_'.$i) != NULL ){
                    $name=$request->file('detailtype_'.$i)->getClientOriginalName();
                    $extension=explode('.',$name);
                    $fileName = bin2hex(random_bytes(16)).'.'.$extension[count($extension)-1];
                    $request->file('detailtype_'.$i)->storeAs('order/'.date("Ymd"), $fileName);
                    $orderDetail = new OrderDetails;
                    $orderDetail->order_id = $order->id;
                    $orderDetail->attachment = 'order/'.date("Ymd").'/'.$fileName;
                    $orderDetail->order_detail_type_id = $i;
                    $orderDetail->xs1 = $name;
                    $orderDetail->save();
                }
            }            

            foreach($request->kibb as $key => $val){
                $oriName=$request->upload_kibb[$key]['image']->getClientOriginalName();
                $extension=explode('.',$oriName);
                $fileName = bin2hex(random_bytes(16)).'.'.$extension[count($extension)-1];
                $request->upload_kibb[$key]['image']->storeAs('order/'.date("Ymd"), $fileName);
                $orderDetail = new OrderDetails;
                $orderDetail->order_id = $order->id;
                $orderDetail->attachment = 'order/'.date("Ymd").'/'.$fileName;
                $orderDetail->order_detail_type_id = $request->detail_type[$key];
                $orderDetail->xs1 = $oriName;
                $orderDetail->xn1 = $key;
                $orderDetail->save();
            }

        }
        return redirect()->route('order')->with('Success','Order Inserted!');
    }

    public function storeDocument(Request $request)
    {
        // $request->validate([
        //     'detail_type_1' => 'required|mimes:pdf,xlx,csv,doc,xlsx|max:2048',
        // ]);        
        var_dump(count($request->file()));die();
        

        return back()

                    ->with('success', 'You have successfully upload image.')

                    ->with('image', $imageName); 
    }

    public function dataKibb(Request $request)
    {
        $user = Auth::user();
        // if ($request->ajax()) {
            $data = KibB::select([
                    'id',
                    'Nm_Aset5',
                    'Tgl_Perolehan',
                     DB::raw('CONCAT(Kd_Bidang,Kd_Unit,Kd_Sub,Kd_UPB,".",Kd_Aset8,Kd_Aset80,Kd_Aset81,Kd_Aset82,Kd_Aset83,Kd_Aset84,Kd_Aset85) as Kd_Barang'),
                    'Kondisi'
                ])->where('Nm_UPB', '=', $user->region);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<div class="input-group input-group-static mb-4">
                    <label>Upload Photo</label>
                    <input type="hidden" name="upload_kibb['.$row->id.'][image]" class="form-control hidden" >
                    </div>';
                    return $actionBtn;
                })
                ->addColumn('selection', function($row){
                    $actionBtn = '<input type="hidden" name="detail_type['.$row->id.']" class="form-control hidden" value="7" >
                    <input type="checkbox" id="kibb_'.$row->id.'" name="kibb['.$row->id.'][code]" value="'.$row->Kd_Barang.'">';
                    return $actionBtn;
                })
                ->rawColumns(['action','selection'])
                ->make(true);
        // }

        return view('welcome');
    }

    public function data(Request $request)
    {
        // if ($request->ajax()) {
            
            $eloOrder = Order::join('order_status','orders.order_status_id','=','order_status.id')
                        ->join('order_type','orders.order_type_id','=','order_type.id')
                        ->get(['orders.*','order_status.name as status_name','order_type.name as type_name']); 
            $data = $eloOrder;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:;" class="btn text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Detail Order">
                    <span class="badge badge-sm bg-gradient-info">Detail</span>
                </a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        // }

        // return view('welcome');
    }
}
