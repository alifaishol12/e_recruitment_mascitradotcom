<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use App\Models\Regency;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PendidikanController extends Controller
{
    public function create()
    {
        $pendidikans = Pendidikan::latest()->get();
        $regencies = Regency::all();
        return view('form.pendidikan.create' , compact('pendidikans', 'regencies'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jenjang' => 'required',
            'institusi' => 'required',
            'jurusan' => 'required',
            'kota' => 'required',
            'tanggal_lulus' => 'required',
            'nilai_uan_ipk' => 'required',
            'akreditasi' => 'required'
        ]);

        $pendidikan = Pendidikan::create([
            'jenjang' => $request->jenjang,
            'institusi' => $request->institusi,
            'jurusan' => $request->jurusan,
            'kota' => $request->kota,
            'tanggal_lulus' => $request->tanggal_lulus,
            'nilai_uan_ipk' => $request->nilai_uan_ipk,
            'akreditasi' => $request->akreditasi
        ]);

        if ($pendidikan) {
            return redirect()
                ->route('pendidikan.create')
                ->with([
                    'success' => 'New Pendidikan has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    public function destroy($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->delete();

        if ($pendidikan) {
            return redirect()
                ->route('pendidikan.create')
                ->with([
                    'success' => 'Pendidikan has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('pendidikan.create')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}