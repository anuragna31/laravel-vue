<?php

namespace App\Http\Controllers\V1\Backend\Data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StoreData;
use Intervention\Image\Facades\Image;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class StoreDataController extends Controller
{
    public function index()
    {
        $data = StoreData::all();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        if($request->image) {
            $pos = strpos($request->image, ';');
            $sub = substr($request->image, 0, $pos);
            $ext = explode('/',$sub)[1];

            $name = time().'.'.$ext;
            $img = Image::make($request->image)->resize(240, 200);
            $path = 'backend/img/store/';
            $img_url = $path.$name;
            $img->save($img_url);


            $save = new StoreData();
            $save->name = $request->name;
            $save->text = $request->text;
            $save->image = $img_url;
            $save->save();
            return response()->json(['success' => 'success']);
        }else {
            $save = new StoreData();
            $save->name = $request->name;
            $save->text = $request->text;
            $save->save();
            return response()->json(['success' => 'success']);
        }
    }

    public function delete($id)
    {
        $delete = StoreData::find($id);
        $delete->delete();
        return response()->json(['success' => 'delete']);
    }

    public function edit($id)
    {
        $data = StoreData::find($id);
        return response()->json($data);
    }

    public function update(Request $request,$id)
    {
        $update = StoreData::find($id);
        $update->name = $request->name;
        $update->text = $request->text;
        $update->save();
        return response()->json(['success' => 'Update']);
    }
}
