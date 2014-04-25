<?php namespace Pelamar;

use BaseController, View, Session, Auth, Redirect, Hash, User, Input, Pendidikan, KursusPelatihan, JobVacancy, Department, Uploadfoto, File, Validator;

class ResumeController extends BaseController {


	public function __construct(){
    	$this->menu = array(
    			array('menu' => 'Home',
                      'link' => ''
                      ),
    			array('menu' => 'Lowongan Kerja',
                      'link' => 'job-vacancy'
                      ),
    		);
    	$this->tanda 		= $this->tanda = array('', '');
    	$this->title        = "JC & K Advertising - Resume";
    	$this->user 		= new User();
    	$this->pendidikan 	= new Pendidikan();
    	$this->kursus 		= new KursusPelatihan();
    	$this->jobvacancy 	= new JobVacancy();
    	$this->department 	= new Department();

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['menu']   	= $this->menu;
      	$data['tanda']    	= $this->tanda;
      	$data['title']		= $this->title;
      	$data['bulan'] 		= array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
		$data['statuskawin']= array('Belum Kawin', 'Kawin', 'Janda', 'Duda');
		$data['user'] 		= $this->user->getDataUser(Auth::user()->iduser);
      	$data['agama'] 		= array('Islam', 'Kristen Protestan', 'Kristen Katholik', 'Hindu', 'Budha');
      	$data['jobwidget'] 	= $this->jobvacancy->getWidget();
      	$data['department'] = $this->department->getDataDepartment();
      	return View::make('pelamar.resume.index')
               				->with('data', $data);
	}

	
	public function edit($id)
	{
		$data['menu']   	= $this->menu;
      	$data['tanda']    	= $this->tanda;
      	$data['title']		= $this->title;
     	return View::make('pelamar.resume')
              				->with('data', $data);
	}

	public function update($id)
	{
		
		$input = Input::all();
		$file = Input::file('imagefile');

		$rules = array(
		    'image' => 'image|max:300'
		);

		$inputs = array(
		    'image' => Input::file('imagefile')
		);

		$validation = Validator::make($inputs, $rules);

		if (!empty($file)){
			if($validation->fails()){
				return Redirect::back()
                              ->withErrors($validation);
			}elseif($file->getError() !== UPLOAD_ERR_OK){
				return Redirect::back()->withErrors('Data Terlalu Besar');
			}else{
				$extension = $file->getClientOriginalExtension();
		    	$filename = $input['nama_panggilan'].'_'.Auth::user()->iduser.'.'.$extension;
		    	$directory = public_path().'/assets/images/user';
		        
		        $upload_success = Input::file('imagefile')->move($directory, $filename); 
		           
		        if( $upload_success ) {
		            $input['foto'] = $filename;
		        } 
			}
			
		}
    	
		$input['iduser'] = $id;
		$tanggal = date('Y-m-d', strtotime($input['tanggal_lahir']));
		$input['tanggal_lahir'] = $tanggal;
		$apdet = $this->user->apdet($input);
		return Redirect::back()->withErrors('Update Profil Berhasil');	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function addPendidikan(){
		$input = Input::all();
		$i = 0;
		//return $input;
		foreach($input['jenjang'] as $kls){
			echo $in[$i]['jenjang'] = $input['jenjang'][$i];
			echo $in[$i]['nama_sekolah'] = $input['nama_sekolah'][$i];
			echo $in[$i]['tahun'] = $input['tahun'][$i];
			echo $in[$i]['ijazah'] = $input['ijazah'][$i];
			echo $in[$i]['iduser'] = Auth::user()->iduser;
			$i++;
			//echo $input['kelas'][$kls].'-'.$input['guru'][$kls]."</br>";			
		}
		$this->pendidikan->simpan($in);
		return Redirect::to('resume');
	}

	public function destroyPendidikan($id){
		$this->pendidikan->hapus($id);
        return Redirect::back();
	}

	public function addPelatihan(){
		$input = Input::all();
		$i = 0;
		//return $input;
		foreach($input['tahunkursus'] as $kursus){
			echo $in[$i]['tahunkursus'] = $input['tahunkursus'][$i];
			echo $in[$i]['lokasi'] = $input['lokasi'][$i];
			echo $in[$i]['subjek'] = $input['subjek'][$i];
			echo $in[$i]['iduser'] = Auth::user()->iduser;
			$i++;
			//echo $input['kelas'][$kls].'-'.$input['guru'][$kls]."</br>";			
		}
		$this->kursus->simpan($in);
		return Redirect::to('resume');
	}

}