<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keluhan;
use Carbon\Carbon;
use Auth;

class KeluhanController extends Controller
{
    //
    public function index(){
        $keluhans = Keluhan::where('user_id', '=', Auth::user()->id)->get();
        return view('user.keluhan.index')->with(compact('keluhans'));
    }

    public function create(){
        return view('user.keluhan.create');
    }

    public function store(Request $request){
        $request->validate([
            "keluhan" => "required",
        ]);

        $dd= new Keluhan();
        $dd->keluhan_user = $request->keluhan;
        $dd->respond_admin = "";
        $dd->user_id = Auth::user()->id;
        $dd->is_reply = 0;
        $dd->tanggal = Carbon::now();
        $dd->save();
        return redirect()->route('keluhan.index')->with('success', 'Data keluhan berhasil ditambahkan!');;
    }

    public function edit($id){
        $dd= Keluhan::find($id);
        return view('user.keluhan.edit', compact('dd'));
    }

    public function update($id, Request $request){
        $request->validate([
            "keluhan" => "required",
        ]);

        Keluhan::where('id', '=', $id)->update([
            'keluhan_user' => $request->keluhan,
        ]);

        return redirect()->route('keluhan.index')->with('success', 'Data keluhan berhasil diupdate!');
    }

    public function delete($id){
        $dd= Keluhan::find($id);
        $dd->delete();
        return redirect()->route('keluhan.index')->with('success', 'Data keluhan berhasil didelete!');;
    }
}
