<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
//Wilayah Indonesia
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class BiodataController extends Controller
{
    public function index()
    {
        $biodatas = Biodata::latest()->get();
        return view('biodatas.index', compact('biodatas'));
    }

    public function create()
    {
        $provinces = Province::all();

        return view('biodatas.create', compact('provinces'));
    }

    public function getkabupaten(Request $request)
    {
        $id_provinsi = $request->id_provinsi;
        $id_kabupaten = $request->id_kabupaten;
        $kabupatens = Regency::where('province_id', $id_provinsi)->get();
        $option = "<option value=''>PILIH KOTA / KABUPATEN</option>";
        foreach ($kabupatens as $kabupaten) {
            $option .= "<option value='$kabupaten->id' ".($kabupaten->id == $id_kabupaten ? 'selected' : '')." >$kabupaten->name</option>";
        }
        echo $option;
    }

    public function getkecamatan(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;
        $id_kecamatan = $request->id_kecamatan;
        $kecamatans = District::where('regency_id', $id_kabupaten)->get();
        $option = "<option value=''>PILIH KECAMATAN</option>";
        foreach ($kecamatans as $kecamatan) {
            $option .= "<option value='$kecamatan->id' ".($kecamatan->id == $id_kecamatan ? 'selected' : '')." >$kecamatan->name</option>";

        }
        echo $option;
    }

    public function getdesa(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;
        $id_desa = $request->id_desa;
        $desas = Village::where('district_id', $id_kecamatan)->get();
        $option = "<option value=''>PILIH DESA / KELURAHAN</option>";
        foreach ($desas as $desa) {
            $option .= "<option value='$desa->id' ".($desa->id == $id_desa ? 'selected' : '')." >$desa->name</option>";
        }
        echo $option;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'no_ktp' => 'required|string',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'status_nikah' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'alamat_ktp' => 'required',
            'handphone' => 'required',
            'no_npwp' => 'required',
        ]);

        $biodata = Biodata::create([
            'no_ktp' => $request->no_ktp,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_nikah' => $request->status_nikah,
            'kewarganegaraan' => $request->kewarganegaraan,
            'agama' => $request->agama,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
            'alamat_ktp' => $request->alamat_ktp,
            'handphone' => $request->handphone,
            'no_npwp' => $request->no_npwp,
        ]);

        if ($biodata) {
            return redirect()
                ->route('home')
                ->with([
                    'success' => 'New post has been created successfully'
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

    public function edit($id)
    {
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();
        $villages = Village::all();
        $biodata = Biodata::findOrFail($id);
        return view('biodatas.edit', compact('biodata','provinces', 'regencies', 'districts', 'villages'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'no_ktp' => 'required|string',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'status_nikah' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'provinsi' => 'required',
            'kabupaten' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'alamat_ktp' => 'required',
            'handphone' => 'required',
            'no_npwp' => 'required',
        ]);

        $biodata = Biodata::findOrFail($id);

        $biodata->update([
            'no_ktp' => $request->no_ktp,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_nikah' => $request->status_nikah,
            'kewarganegaraan' => $request->kewarganegaraan,
            'agama' => $request->agama,
            'provinsi' => $request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
            'alamat_ktp' => $request->alamat_ktp,
            'handphone' => $request->handphone,
            'no_npwp' => $request->no_npwp,
        ]);

        if ($biodata) {
            return redirect()
                ->route('home')
                ->with([
                    'success' => 'Post has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    public function destroy($id)
    {
        $biodata = Biodata::findOrFail($id);
        $biodata->delete();

        if ($biodata) {
            return redirect()
                ->route('home')
                ->with([
                    'success' => 'Post has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('home')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
