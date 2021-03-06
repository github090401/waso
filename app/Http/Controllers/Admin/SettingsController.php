<?php

namespace App\Http\Controllers\Admin;

use anlutro\LaravelSettings\SettingStore;
use App\Http\Requests\SettingsRequest;
use App\Http\Requests\Request;
use App\Services\SettingsServices;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
class SettingsController extends Controller
{
    protected $settings;
    protected $settingsServices;
    public function __construct(/*Settings $settings,*/SettingsServices $settingsServices)
    {
        $this->middleware('auth.admin:admin');
      /*  $this->settings= $settings;*/
           $this->settingsServices= $settingsServices;
    }
    //设置列表
    public function index(Request $request)
    {
        $type=$request->get('type') ?? 'system';
        $settings =  setting()->all();

       return view('admin.settings.index',compact('settings','type'));

    }
    //设置添加
    public function store(SettingsRequest $request)
    {

         foreach ($request->except('_token') as $key=>$value){
             if(is_array($value)){
                 setting([$key=>json_encode($value)])->save();
             }else{
                 setting([$key=>$value])->save();
             }
         }
         return success('更新成功');
    }
  //设置添加页面
    public function create(Request $request)
    {
       return view('admin.settings.create_and_edit');
    }
  //设置修改页面
    public function edit(Settings $settings)
    {
        return view('admin.settings.create_and_edit',compact('settings'));
    }
  //设置修改
    public function update(SettingsRequest $request,  Settings $settings)
    {
        $settings->update($request->all());
         return response()->json(['info'=>'修改成功'],Response::HTTP_CREATED);
    }
  //设置删除
    public function destroy(SettingsRequest $request,SettingStore $settingStore)
    {
        $key=$request->get('key');
        setting()->forget($key);
        setting(setting()->all())->save();
        //  return back();
//        Settings::destroy($request->get('id'));
      return response()->json(Response::HTTP_NO_CONTENT);
    }
}