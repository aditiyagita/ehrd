@extends('master')

@section('content')
<!-- Datepicker -->
{{ HTML::style('assets/css/plugins/datepicker/datepicker.css') }}
<!-- Datepicker -->
{{ HTML::script('assets/js/plugins/datepicker/bootstrap-datepicker.js') }}
<!-- Plupload -->
{{ HTML::style('assets/css/plugins/plupload/jquery.plupload.queue.css') }}  
<!-- PLUpload -->
{{ HTML::script('assets/js/plugins/plupload/plupload.full.js') }}
{{ HTML::script('assets/js/plugins/plupload/jquery.plupload.queue.js') }}
{{ HTML::script('assets/js/plugins/fileupload/bootstrap-fileupload.min.js') }}
<body>
    @include('menu')
    </div>
    <div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
        @include('hrdstaff.left')
        <div id="main">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="pull-left">
                        <h1>Karyawan</h1>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="{{Url::asset('hrdstaff/')}}">Home</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="{{Url::asset('hrdstaff/karyawan')}}">Karyawan</a>
                        </li>
                    </ul>
                    <div class="close-bread">
                        <a href="#"><i class="icon-remove"></i></a>
                    </div>
                </div>
                @if($errors->any())
                    <div class="alert alert-success" style="margin-top:15px">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Update!</strong> {{$errors->first()}}
                    </div>
                @endif
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box" style="padding-top:20px">
                                    {{ Form::model($data["karyawan"], array('method' => 'PATCH','route' => array('hrdstaff.karyawan.update', $data['karyawan']->user->iduser))) }}
                                        <div class="box-content nopadding" >
                                            <div class="span6"  >
                                                <div class="control-group">
                                                    <label for="namabank" class="control-label">Nama Bank</label>
                                                    <div class="controls">
                                                        <input type="text" name="namabank" id="namabank" placeholder="Nama Bank" value="{{ $data['karyawan']->namabank }}" class="input-block-level" required>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="norekening" class="control-label">No. rekening</label>
                                                    <div class="controls">
                                                        <input type="number" value="{{ $data['karyawan']->norekening }}"  name="norekening" id="norekening" placeholder="No. Rekening" class="input-block-level" min="1" max="9999999999999" required>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="alamat" class="control-label">Alamat</label>
                                                    <div class="controls">
                                                        <textarea name="alamat" id="textarea" rows="5" class="input-block-level" required>{{ $data['karyawan']->user->alamat }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="kode_pos" class="control-label">Kode Pos</label>
                                                    <div class="controls">
                                                        <input type="number" value="{{ $data['karyawan']->user->kode_pos }}" name="kode_pos" id="kode_pos" placeholder="Kode Pos"  class="input-block-level" min="1" max="99999" required>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="warga_negara" class="control-label">Warga Negara</label>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $data['karyawan']->user->warga_negara }}" name="warga_negara" id="warga_negara" placeholder="Warga Negara" class="input-block-level" readonly>
                                                    </div>
                                                </div>
                                                @if($data['karyawan']->user->warga_negara == "Indonesia")
                                                <div class="control-group">
                                                    <label for="no_ktp" class="control-label">No. KTP</label>
                                                    <div class="controls">
                                                        <input type="number" value="{{ $data['karyawan']->user->no_ktp }}" name="no_ktp" id="no_ktp" placeholder="No. KTP" class="input-block-level" min='1' max='9999999999999'  required>
                                                    </div>
                                                </div>
                                                @else
                                                <div class="control-group">
                                                    <label for="no_passport" class="control-label">No. Passport</label>
                                                    <div class="controls">
                                                        <input type="number" value="{{ $data['karyawan']->user->no_passport }}" name="no_passport" id="no_passport" placeholder="No. Passport" class="input-block-level" min='1' max='9999999999999'  required>
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="control-group">
                                                    <label for="idagama" class="control-label">Agama</label>
                                                    <div class="controls">
                                                        <select name="agama" id="agama" class='input-block-level' required>
                                                            <option value="" SELECTED>-Pilih Agama-</option>
                                                            <?php $i=1;?>
                                                            @foreach ($data['agama'] as $agama)
                                                                @if($data['karyawan']->user->agama == $i)
                                                                <option value="{{ $i }}" SELECTED>{{ $agama }}</option>
                                                                @else
                                                                <option value="{{ $i }}">{{ $agama }}</option>
                                                                @endif
                                                            <?php $i++ ?>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="status_kawin" class="control-label">Status Perkawinan</label>
                                                    <div class="controls">
                                                        <select name="status_kawin" id="status_kawin" class='input-block-level' required>
                                                            <option value="" SELECTED>-Pilih Status Perkawinan-</option>
                                                            <?php $i=1;?>
                                                            @foreach($data['statuskawin'] as $statuskawin)
                                                                @if($data['karyawan']->user->status_kawin == $i)
                                                                    <option value="{{$i}}" SELECTED>{{$statuskawin}}</option>
                                                                @else
                                                                    <option value="{{$i}}">{{$statuskawin}}</option>
                                                                @endif
                                                            <?php $i++ ?>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div> 
                                                <div class="control-group">
                                                    <label for="tinggibadan" class="control-label">Tinggi Badan</label>
                                                    <div class="controls">
                                                        <input type="number" value="{{ $data['karyawan']->user->tinggi_badan }}" name="tinggi_badan" id="tinggibadan" placeholder="Tinggi Badan"  class="input-block-level" min="1" max="9999" required>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="beratbadan" class="control-label">Berat Badan</label>
                                                    <div class="controls">
                                                        <input type="number" value="{{ $data['karyawan']->user->berat_badan }}" name="berat_badan" id="beratbadan" placeholder="Berat Badan"  class="input-block-level" min="1" max="9999" required>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="kacamata" class="control-label">Memakai Kacamata?</label>
                                                    <div class="controls">
                                                        <select name="kacamata" id="kacamata" class='input-block-level' required>
                                                            @if($data['karyawan']->user->kacamata == 1)
                                                                <option value="1" SELECTED>Ya</option>
                                                                <option value="2">Tidak</option>
                                                            @else
                                                                <option value="1">Ya</option>
                                                                <option value="2" SELECTED>Tidak</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="span6" >

                                                <div class="control-group">
                                                    <label for="nokaryawan" class="control-label">No. Karyawan</label>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $data['karyawan']->nokaryawan }}" name="nokaryawan" id="nokaryawan" placeholder="No. Karyawan" class="input-block-level" readonly>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="department" class="control-label">Department</label>
                                                    <div class="controls">
                                                        <select name="department" id="department" class='input-block-level' required>
                                                            <?php $i=1;?>
                                                            @foreach ($data['department'] as $department)
                                                                @if($data['karyawan']->user->iddepartment == $department->iddepartment)
                                                                    <option value="{{ $department->iddepartment }}" SELECTED>{{ $department->department }}</option>
                                                                @else
                                                                    <option value="{{ $department->iddepartment }}">{{ $department->department }}</option>
                                                                @endif
                                                            <?php $i++ ?>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="gaji" class="control-label">Gaji</label>
                                                    <div class="controls">
                                                        <input type="number" value="{{ $data['karyawan']->gaji }}" name="gaji" id="gaji" placeholder="Gaji" class="input-block-level" min="1" max="9999999999999" required>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="tunjanganjabatan" class="control-label">Tunjangan Jabatan</label>
                                                    <div class="controls">
                                                        <input type="number" value="{{ $data['karyawan']->tunjanganjabatan }}" name="tunjanganjabatan" id="no_passport" placeholder="Tunjangan Jabatan" class="input-block-level" min="0" max="99999999999" required>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="tunjanganjabatan" class="control-label">Tunjangan Harian</label>
                                                    <div class="controls">
                                                        <input type="number" value="{{ $data['karyawan']->tunjangan_harian }}" name="tunjangan_harian" id="tunjangan_harian" placeholder="Tunjangan Harian" class="input-block-level" min="0" max="99999999" required>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="nama_lengkap" class="control-label">Nama Lengkap</label>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $data['karyawan']->user->nama_lengkap }}" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap"class="input-block-level" required>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="nama_panggilan" class="control-label">Nama Panggilan</label>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $data['karyawan']->user->nama_panggilan }}" name="nama_panggilan" id="nama_panggilan" placeholder="Nama Panggilan" class="input-block-level" required>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="no_hp" class="control-label">No. Handphone</label>
                                                    <div class="controls">
                                                        <input type="number" value="{{ $data['karyawan']->user->no_hp }}" name="no_hp" id="no_hp" placeholder="No Handphone" class="input-block-level">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="no_telp" class="control-label">No. Telpon</label>
                                                    <div class="controls">
                                                        <input type="number" value="{{ $data['karyawan']->user->no_telp }}" name="no_telp" id="no_telp" placeholder="No Telpon" class="input-block-level">
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="tempat_lahir" class="control-label">Tempat Lahir</label>
                                                    <div class="controls">
                                                        <input type="text" value="{{ $data['karyawan']->user->tempat_lahir }}" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" class="input-block-level" required><br>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="tanggal_lahir" class="control-label">Tanggal Lahir</label>
                                                    <div class="controls">
                                                        <input type="text" value="{{ date('m/d/Y', strtotime($data['karyawan']->user->tanggal_lahir)) }}" name="tanggal_lahir" id="tanggalakhir" class="input-block-level datepick" required>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label for="jenis_kelamin" class="control-label">Jenis Kelamin</label>
                                                    <div class="controls">
                                                        @if($data['karyawan']->user->jenis_kelamin == 1)
                                                            <label class='radio'>
                                                                <input type="radio" name="jenis_kelamin" value=1 CHECKED> Laki-Laki
                                                            </label>
                                                            <label class='radio'>
                                                                <input type="radio" name="jenis_kelamin" value=2> Perempuan
                                                            </label>
                                                        @else
                                                            <label class='radio'>
                                                                <input type="radio" name="jenis_kelamin" value=1> Laki-Laki
                                                            </label>
                                                            <label class='radio'>
                                                                <input type="radio" name="jenis_kelamin" value=2 CHECKED> Perempuan
                                                            </label>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-actions">
                                                    <button type="submit" class="btn btn-brown btn-large">Update Karyawan</button>
                                                    <button type="button" class="btn btn-large">Cancel</button>
                                                </div>                                      
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop