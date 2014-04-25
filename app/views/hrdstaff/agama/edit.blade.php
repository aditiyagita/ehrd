{{ Form::model($data["agama"], array('method' => 'PATCH', 'route' => array('hrdstaff.agama.update', $data["agama"]->idagama))) }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h3 id="myModalLabel1">Edit Agama</h3>
    </div>
    <div class="modal-body">
        <div class="form-horizontal">
            <div class="control-group">
                <label class="control-label">Agama</label>
                <div class="controls">
                    <input class="input-block-level" type="text" name="agama" value="{{ $data['agama']->agama }}" required>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn btn-yellow" data-dismiss="modal" aria-hidden="true">Close</button>
        <button class="btn btn-blue" type="submit"><i class="icon-ok"></i>Update</button>
    </div>
{{ Form::close() }}