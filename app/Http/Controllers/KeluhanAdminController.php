<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keluhan;
use Auth;

class KeluhanAdminController extends Controller
{
    //
    public function index(){
        $keluhans = Keluhan::all();
        return view('admin.keluhan.index')->with(compact('keluhans'));
    }

    public function create($id){
        $dd = Keluhan::find($id);
        return view('admin.keluhan.create', compact('dd'));
    }

    public function store($id, Request $request){
        $request->validate([
            "keluhan" => "required",
        ]);

        Keluhan::where('id', '=', $id)->update([
            'respond_admin' => $request->keluhan,
            'is_reply' => 1,
            'admin_id' => Auth::guard('admin')->user()->id
        ]);

        return redirect()->route('admin.keluhan.index')->with('success', 'Data keluhan berhasil ditambahkan!');;
    }

    public function edit($id){
        $dd= Keluhan::find($id);
        return view('admin.keluhan.edit', compact('dd'));
    }

    public function update($id, Request $request){
        $request->validate([
            "keluhan" => "required",
        ]);

        Keluhan::where('id', '=', $id)->update([
            'respond_admin' => $request->keluhan,
        ]);

        return redirect()->route('admin.keluhan.index')->with('success', 'Data keluhan berhasil diupdate!');
    }

    public function delete($id){
        $dd= Keluhan::find($id);
        $dd->delete();
        return redirect()->route('admin.keluhan.index')->with('success', 'Data keluhan berhasil didelete!');;
    }
}
