<?php

namespace EasyShop\Http\Controllers\Admin;

use Illuminate\Http\Request;

use EasyShop\Http\Requests;
use EasyShop\Http\Controllers\Controller;
use EasyShop\Models\PopupModal;
use File;
use Intervention\Image\Facades\Image;

class PopupModalController extends Controller
{
    public function find($id = NULL)
    {        
        if (!is_null($id)) {
            $record = PopupModal::find($id);
        } else {
            $record = PopupModal::get();
            if(isset($record[0])) {
                $record = $record[0];
            }
        }

        return view('admin.popup_modal.popup_modal', compact('record'));
    }

    public function store(Request $request)
    {
        if (is_null($request->get('popup_modal_id'))) {
            $record = new PopupModal();
        } else {
            $record = PopupModal::find($request->get('popup_modal_id'));
        }

        $record->title = !is_null($request->get('title')) ?  $request->get('title') : null;
        $record->short_description = !is_null($request->get('short_description')) ?  $request->get('short_description') : null;
        $record->description = !is_null($request->get('description')) ?  $request->get('description') : null;
        $record->url = !is_null($request->get('url')) ?  $request->get('url') : null;
        $record->active = $request->input('active', 0);
        
        $record->save();

        if (!is_null($request->file('image')) && is_object($request->file('image'))) {
            $imageName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $record->image = $imageName;

            if (!File::isDirectory(public_path() . DIRECTORY_SEPARATOR . 'uploads')) {
                File::makeDirectory(public_path()  . DIRECTORY_SEPARATOR .  'uploads', 0775, true);
            }

            if (!File::isDirectory(public_path()  . DIRECTORY_SEPARATOR .  'uploads/popup_modal')) {
                File::makeDirectory(public_path()  . DIRECTORY_SEPARATOR .  'uploads/popup_modal', 0775, true);
            }

            if (!File::isDirectory(public_path()  . DIRECTORY_SEPARATOR .  'uploads/popup_modal' . DIRECTORY_SEPARATOR .  $record->id)) {
                File::makeDirectory(public_path()  . DIRECTORY_SEPARATOR .  'uploads/popup_modal' . DIRECTORY_SEPARATOR .  $record->id, 0775, true);
            }

            $path = public_path('/uploads/popup_modal' . DIRECTORY_SEPARATOR . $record->id . DIRECTORY_SEPARATOR . $imageName);
            $image = Image::make($request->file('image')->getRealPath());
            $image->save($path);
            $record->save();
        }
        return view('admin.popup_modal.popup_modal', compact('record'));
    }

    public function delete($id)
    {
        if (File::exists(public_path() . '/uploads/popup_modal' . DIRECTORY_SEPARATOR . $id)) {
            File::deleteDirectory(public_path() . '/uploads/popup_modal' . DIRECTORY_SEPARATOR . $id);
        }

        PopupModal::destroy($id);

        return response()->json([
            'message' => 'Модалот е успешно избришан'
        ]);
    }
}
