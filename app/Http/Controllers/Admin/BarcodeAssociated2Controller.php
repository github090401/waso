<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BarcodeAssociatedRequest;
use App\Http\Requests\Request;
use App\Models\WarehouseOutManagement;
use App\Services\BarcodeAssociatedServices;
use App\Models\BarcodeAssociated;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

class BarcodeAssociatedController extends Controller
{
    protected $barcode_associated;
    protected $barcode_associatedServices;

    public function __construct(BarcodeAssociated $barcode_associated, BarcodeAssociatedServices $barcode_associatedServices)
    {
        $this->middleware('auth.admin:admin');
        $this->barcode_associated = $barcode_associated;
        $this->barcode_associatedServices = $barcode_associatedServices;
    }

    //条码关联列表
    public function index(Request $request)
    {
        $status = $request->get('status') ?? 'barcode_associated';
        switch ($status) {
            case 'loan_out': {
              $barcode_associateds=$this->barcode_associatedServices->loan_out($status);
              break;
            }
            case 'returned_to_the_factory_and_warranty_returned_to_the_factory': {
                $barcode_associateds=$this->barcode_associatedServices->returned_to_the_factory_and_warranty_returned_to_the_factory($status);
                break;
            }
            case 'test': {
                $barcode_associateds=$this->barcode_associatedServices->test($status);
                break;
            }
            case  'barcode_associated': {
                $barcode_associateds=$this->barcode_associatedServices->barcode_associated( $request->get('type'));
                break;
            }
            case  'quality_return': {
                $barcode_associateds=$this->barcode_associatedServices->quality_return($status);
                break;
            }
            default:{
                $barcode_associateds=$this->barcode_associatedServices->barcode_associateds($status);
            }
        }

        return view('admin.barcode_associateds.index', compact('barcode_associateds', 'status'));

    }

    //条码关联添加
    public function store(BarcodeAssociatedRequest $request)
    {
//        BarcodeAssociated::create($request->all());
          $this->barcode_associatedServices->create_associated($request->all(),'');
        return response()->json(['info' => '操作成功'], Response::HTTP_CREATED);
    }

    //条码关联添加页面
    public function create(Request $request)
    {
        $status = $request->get('status') ?? 'barcode_associated';

        switch ($status) {
            case in_array($status,['loan_out','sell_return','warranty_replacement','loan_out_to_replace']): {
                $barcode_associated=$this->barcode_associatedServices->loan_out_info($status,$request);
              //  dump($barcode_associated);
                break;
            }
            case 'test': {
                $barcode_associated=$this->barcode_associatedServices->test_info($status,$request);
                break;
            }
            default:{

                $barcode_associated=$this->barcode_associatedServices->barcode_associated_info($status,$request);
            }
        }


        return view('admin.barcode_associateds.create_and_edit',compact('barcode_associated','status'));
    }

    //条码关联修改页面
    public function edit(BarcodeAssociated $barcode_associated)
    {
        return view('admin.barcode_associateds.create_and_edit', compact('barcode_associated'));
    }

    //条码关联修改
    public function update(BarcodeAssociatedRequest $request, BarcodeAssociated $barcode_associated)
    {
//        $barcode_associated->update($request->all());
        $this->barcode_associatedServices->create_associated($request->all(),$barcode_associated);
        return response()->json(['info' => '操作成功'], Response::HTTP_CREATED);
    }

    //条码关联删除
    public function destroy(BarcodeAssociatedRequest $request)
    {
        BarcodeAssociated::destroy($request->get('id'));
        return response()->json(Response::HTTP_NO_CONTENT);
    }
}