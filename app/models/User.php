<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'iduser';
	protected $table = 'users';
	public $timestamps = false; 
	protected $fillable  = array('nama_lengkap','nama_panggilan','alamat','kode_pos','no_telp','no_hp','tempat_lahir','tanggal_lahir','warga_negara','no_ktp','no_passport','idjabatan','agama','jenis_kelamin','berat_badan','tinggi_badan','status_kawin', 'foto', 'kacamata');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	public static $ruleslogin = array(
        'uname' => 'required|min:3',
        'upw' => 'required|min:3'
    );

    public static $rulesimages = array(
        'image' => 'image|max:2000|mimes:jpg,jpeg'
    );

    public function jabatan()
	{
	    return $this->belongsTo('Jabatan', 'idjabatan');
	}

    public function pendidikan()
	{
	    return $this->hasMany('Pendidikan', 'iduser');
	}
	public function jawaban()
	{
	    return $this->hasMany('Jawaban', 'iduser');
	}
	public function referensi()
	{
	    return $this->hasMany('Referensi', 'iduser');
	}
	public function bahasa()
	{
	    return $this->hasMany('Bahasa', 'iduser');
	}
	public function keluarga()
	{
	    return $this->hasOne('Keluarga', 'iduser');
	}
	public function karyawan()
	{
	    return $this->hasOne('Karyawan', 'iduser');
	}
	public function kursuspelatihan()
	{
	    return $this->hasMany('KursusPelatihan', 'iduser');
	}
	public function lamaran()
	{
	    return $this->hasMany('Lamaran', 'iduser');
	}
	public function pengalamankerja()
	{
	    return $this->hasMany('PengalamanKerja', 'iduser');
	}

    public function register($input) {
        //$id_siswa = DB::getPdo()->lastInsertId();
        //$passwords = ;

	    if($input['kewarganegaraan'] == 1){
	        $this->warga_negara = "Indonesia";
	        $this->no_ktp = $input['noktp'];
	    }else{
	    	$this->warga_negara = $input['warganegara'];
	    	$this->no_passport = $input['nopassport'];
	    }
        $password = Hash::make($input['password']);
        $this->username = $input['username']; //$input['username'];
        $this->password = $password;
        $this->email = $input['email'];//$input['email'];
        $this->idjabatan = $input['jabatan'];
        $this->agama = $input['agama'];
        $this->nama_lengkap = $input['nama_lengkap'];
        $this->nama_panggilan = $input['nama_panggilan'];
        $this->alamat = $input['alamat'];
        $this->kode_pos = $input['kode_pos'];
        $this->no_telp = $input['no_telp'];
        $this->no_hp = $input['no_hp'];
        $this->tempat_lahir = $input['tempat_lahir'];
        $this->tanggal_lahir = date('Y-m-d', strtotime($input['tanggal_lahir']));
        $this->jenis_kelamin = $input['jenis_kelamin'];
        $this->berat_badan = $input['berat_badan'];
        $this->tinggi_badan = $input['tinggi_badan'];
        $this->foto = '';
        $this->status_kawin = $input['status_kawin'];
        $this->kacamata = $input['kacamata'];

        if($this->save()){
        	return $this->iduser;
        }
    }

    public function getDataUser($id = null){
		if ($id != null) {
            return self::find($id);
        }else{
            return self::all();
        }
	}

	public function apdet($input){
            self::find($input['iduser'])->update($input);
    }

    public function hapus($id){
        self::find($id)->delete();
    }

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}