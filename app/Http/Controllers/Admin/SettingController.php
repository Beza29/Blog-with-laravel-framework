<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
class SettingController extends Controller
{
    public function index()
    {
        $setting=Setting::find('1');
       return view('admin.setting.index',compact('setting'));
    
    }
    public function savedata(Request $request)
    {
        $validator= Validator::make($request->all(), [
            'website_name'=>'required|max:255',
            'website_logo'=>'required',
            'website_fevicon'=>'nullable',
            'description'=>'nullable',
            'meta_title' =>'nullable',
            'meta_keyword' =>'nullable',
            'meta_description'=>'nullable'
        ]);
        if($validator->fails()){
            return back()->with('message','all fields are mandatory');
        }
        $setting=Setting::where('id','1')->first();
        if($setting)
        {
            $setting->website_name = $request->website_name;
           
            if($request->hasfile('website_logo')){
                $destination= 'uploads/settings/'.$setting->logo;
        if(File::exists($destination)){
                File::delete($destination);
        }
                $file= $request->file ('website_logo');
                $filename=time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings', $filename);
                $setting->logo=$filename;
                }
               
            if($request->hasfile('website_fevicon')){
                $destination= 'uploads/settings/'.$setting->fevicon;
                if(File::exists($destination)){
                        File::delete($destination);
                }
                $file= $request->file ('website_fevicon');
                $filename=time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings', $filename);
                $setting->fevicon=$filename;
                }
            $setting->description= $request->description;
            $setting->meta_title= $request->meta_title;
            $setting->meta_keyword= $request->meta_keyword;
            $setting->meta_description= $request->meta_description;
            $setting->save();
            return redirect('admin/settings')->with('message','Setting updated');
        }
        else{
            $setting=new Setting;
            $setting->website_name = $request->website_name;
           
            if($request->hasfile('website_logo')){
                $file= $request->file ('website_logo');
                $filename=time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings', $filename);
                $setting->logo=$filename;
                }
               
            if($request->hasfile('website_fevicon')){
                $file= $request->file ('website_fevicon');
                $filename=time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/settings', $filename);
                $setting->fevicon=$filename;
                }
            $setting->description= $request->description;
            $setting->meta_title= $request->meta_title;
            $setting->meta_keyword= $request->meta_keyword;
            $setting->meta_description= $request->meta_description;
            $setting->save();
            return redirect('admin/settings')->with('message','Setting added');
        }
    }
}
