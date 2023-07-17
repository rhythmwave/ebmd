<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\KibA;
use App\Models\KibB;
use App\Models\KibC;
use App\Models\KibD;
use App\Models\KibE;
use App\Models\Order;
use App\Models\OrderDetails;

use App\DataTables\OrdersDataTable;
use App\DataTables\KibBDataTable;
use App\DataTables\KibADataTable;
use App\DataTables\KibCDataTable;
use App\DataTables\KibDDataTable;
use App\DataTables\KibEDataTable;

class OrderController extends Controller
{
    public function index(OrdersDataTable $dataTable)
    {
        
        return $dataTable->render('order.index');
    }


    public function create(Request $request)
    {        
        $user = Auth::user();
        $orderType = DB::table('order_type')->get();
        $dataTableKibB = new KibBDataTable();
        $dataTableKibA = new KibADataTable();
        $dataTableKibC = new KibCDataTable();
        $dataTableKibD = new KibDDataTable();
        $dataTableKibE = new KibEDataTable();
        $kibaTable = $dataTableKibA->html();
        $kibcTable = $dataTableKibC->html();
        $kibdTable = $dataTableKibD->html();
        $kibeTable = $dataTableKibE->html();
        
        $data=[];

        if (isset($request->id)){
            $data_order = Order::where('id','=',$request->id);
            
            $data['order']=$data_order->first();

        }
        return $dataTableKibB->render(
            'order.create', 
            [   'listJenis' => $orderType,
                'kibaTable'=>$kibaTable,
                'kibcTable'=>$kibcTable,
                'kibdTable'=>$kibdTable,
                'kibeTable'=>$kibeTable,
                'dataOrder'=>$data

            ]
        );
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
        $order->order_type_id = $request->jenis;
        
        if (isset($request->submit_type) && $request->submit_type == 'draft'){
            
            $order->order_status_id  = 4;
        }else{

            $order->order_status_id  = 1;
        }

        if ($order->save()){

            if (isset($request->dokumen)){
                foreach($request->dokumen as $key => $val){
                    $oriName=$val['doc']->getClientOriginalName();
                    $extension=explode('.',$oriName);
                    $fileName = bin2hex(random_bytes(16)).'.'.$extension[count($extension)-1];
                    $val['doc']->storeAs('order/'.date("Ymd"), $fileName);
                    $orderDetail = new OrderDetails;
                    $orderDetail->order_id = $order->id;
                    $orderDetail->attachment = 'order/'.date("Ymd").'/'.$fileName;
                    $orderDetail->order_detail_type_id = $key;
                    $orderDetail->xs1 = $oriName;
                    $orderDetail->xn1 = $key;
                    $orderDetail->save();
                }
            }

            if (isset($request->kibb)){
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
        if ($request->ajax()) {
            $data = KibB::select([
                    'id',
                    'Nm_Aset5',
                    'Tgl_Perolehan',
                     DB::raw('CONCAT(Kd_Bidang,Kd_Unit,Kd_Sub,Kd_UPB,".",Kd_Aset8,Kd_Aset80,Kd_Aset81,Kd_Aset82,Kd_Aset83,Kd_Aset84,Kd_Aset85) as Kd_Barang'),
                    'Kondisi'
                ])->where([
                    ['Nm_UPB', '=', $user->region],
                    ['reserved', '=', 0]
                ]);
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
        }

        return view('welcome');
    }

    public function data(Request $request)
    {
        if ($request->ajax()) {
            
            $eloOrder = Order::join('order_status','orders.order_status_id','=','order_status.id')
                        ->join('order_type','orders.order_type_id','=','order_type.id')
                        ->get(['orders.*','order_status.name as status_name','order_type.name as type_name']); 
            $data = $eloOrder;
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('order.create', ['id' => $row->id]).'" class="btn text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Detail Order">
                    <span class="btn bg-gradient-info">Detail</span>
                </a>';
                    return $actionBtn;
                })
                ->editColumn('status_name',function($row){
                    if ($row['order_status_id'] == 4){                        
                        $addClass = '<span class="badge badge-sm bg-gradient-light">';
                    }elseif($row['order_status_id'] == 1){                        
                        $addClass = '<span class="badge badge-sm bg-gradient-secondary">';
                    }elseif($row['order_status_id'] == 2){                        
                        $addClass = '<span class="badge badge-sm bg-gradient-dark">';
                    }elseif($row['order_status_id'] == 3){                        
                        $addClass = '<span class="badge badge-sm bg-gradient-warning">';
                    }
                    
                    return  $addClass.$row['status_name'].'</span>';
                })
                ->rawColumns(['action','status_name'])
                ->make(true);
        }

        return view('welcome');
    }

    public function dataKiba(Request $request)
    {
        $user = Auth::user();
        if ($request->ajax()) {
            $data = KibA::select([
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
        }

        return view('welcome');
    }

    public function dataKibc(Request $request)
    {
        $user = Auth::user();
        if ($request->ajax()) {
            $data = KibC::select([
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
        }

        return view('welcome');
    }

    public function dataKibd(Request $request)
    {
        $user = Auth::user();
        if ($request->ajax()) {
            $data = KibD::select([
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
        }

        return view('welcome');
    }

    public function dataKibe(Request $request)
    {
        $user = Auth::user();
        if ($request->ajax()) {
            $data = KibE::select([
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
        }

        return view('welcome');
    }
}
