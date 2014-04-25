    {{ Form::open(array('method' => 'POST', 'url' => 'hrdstaff/terima-lamaran', 'class' => 'form-horizontal')) }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3 id="myModalLabel1">Data Karyawan</h3>
    </div>
    <div class="modal-body">
        <div class="form-horizontal">
            <input class="input-block-level" type="hidden" name="idlamaran" value="{{ $data['lamaran']->idlamaran }}" required>
            <div class="control-group">
                <?php
                    if($data['nokaryawan'] < 100){
                        $isi = "0".$data['nokaryawan'];
                    }else{
                        $isi = $data['nokaryawan'];
                    }
                ?>
                <label class="control-label">No. Karyawan</label>
                <div class="controls">
                    <input class="input-block-level" type="text" name="nokaryawan" value="{{ $isi }}" readonly>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">No. Rekening</label>
                <div class="controls">
                    <input class="input-block-level" type="text" name="norekening" required>
                </div>
            </div>
            <div class="control-group">
                <label for="department" class="control-label">Department</label>
                <div class="controls">
                    <select name="department" id="department" class='input-block-level'>
                        @foreach ($data['department'] as $department)
                            @if($department->iddepartment == $data['lamaran']->lowongan->iddepartment)
                            <option value="{{ $department->iddepartment }}" SELECTED>{{ $department->department }}</option>
                            @else
                            <option value="{{ $department->iddepartment }}">{{ $department->department }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Nama Bank</label>
                <div class="controls">
                    <input class="input-block-level" type="text" name="namabank" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Gaji</label>
                <div class="controls">
                    <input class="input-block-level" type="text" name="gaji" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Tunjangan Jabatan</label>
                <div class="controls">
                    <input class="input-block-level" type="text" name="tunjanganjabatan" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Tunjangan Harian</label>
                <div class="controls">
                    <input class="input-block-level" type="text" name="tunjanganharian" required>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-yellow" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-blue" type="submit"><i class="icon-ok"></i>Terima Lamaran</button>
    </div>
    {{Form::close()}}