<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['nama_depan','nama_belakang', 'jenis_kelamin', 'agama', 'alamat', 'avatar','user_id'];

    public function getAvatar()
    {
        if(!$this->avatar && $this->jenis_kelamin == "P"){
            return asset('images/woman.png');
        }else if(!$this->avatar && $this->jenis_kelamin == "L"){
            return asset('images/man.png');
        }

        return asset('images/'.$this->avatar);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }
}
 