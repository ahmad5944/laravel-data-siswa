<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_siswa = \App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_siswa  = \App\Siswa::all();   
        }
        // dd($request->all());
        return view('siswa.index', ['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {   
        // dd($request->all());
        $this->validate($request, [
            'nama_depan' => 'min:3',
            'email' => 'required|email|unique:users',
            'avatar' => 'mimes:jpg,png'
        ]);
        //Inser ke table User
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = str_random(60);
        $user->save();
        
        //Insert ke table Siswa
        $request->request->add(['user_id' => $user->id ]);
        $siswa = \App\Siswa::create($request->all());

        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses','Data Berhasil Disimpan');

    }

    public function edit($id)
    {
        $siswa = \App\Siswa::find($id);
        return view('siswa.edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $siswa = \App\Siswa::find($id);
        $siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data Berhasil di Update');
    }

    public function destroy($id)
    {
        $siswa = \App\Siswa::find($id);
        $siswa->delete($siswa);

        return redirect('/siswa')->with('sukses', 'Data Berhasil dihapus');
    }

    public function profile($id)
    {
        $siswa = \App\Siswa::find($id);
        $matpel = \App\Mapel::all();
        // dd($matpel);

        //Menyiapkan data untuk chart
        $categories = [];
        $data = [];

        foreach($matpel as $map){
            $categories[] = $map->nama;
            $data[] = $siswa->mapel()->wherePivot('mapel_id', $map->id)->first()->pivot->nilai;
        }

        // dd($data);

        return  view('siswa.profile',['siswa' => $siswa, 'matpel' => $matpel, 'categories' => $categories, 'data' => $data]);
    }

    public function addnilai(Request $request, $idsiswa)
    {
        // dd($request->all());
        $siswa = \App\Siswa::find($idsiswa);
        if($siswa->mapel()->where('mapel_id', $request->mapel)->exists()){
            return redirect('/siswa/'.$idsiswa.'/profile')->with('error', 'Data mata pelajaran sudah ada');
        }
        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);

        return redirect('/siswa/'.$idsiswa.'/profile')->with('sukses', 'Data nilai berhasil dimasukan');
    }
}
