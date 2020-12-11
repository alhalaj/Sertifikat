<?php
require '../Include/Connect/Connections.php';
echo'<div class="card-content">
<form action="" method="POST" role="form">
<div class="input-group">
<span class="input-group-addon">
<i class="material-icons">face</i>
</span>
<div class="form-group label-floating">
<label class="control-label">Nama Seminar</label>
<input type="text" class="form-control" name ="seminar" autocomplete="off">
</div>
</div>
<div class="input-group">
<span class="input-group-addon">
    <i class="material-icons">date_range</i>
</span>
<div class="form-group label-floating">
    <label class="control-label">Tanggal Seminar</label>
    <input type="text" class="form-control datepicker"  name="tanggal" autocomplete="off"/>
    </div>
</div>
<div class="input-group">
    <span class="input-group-addon">
        <i class="material-icons">lock_outline</i>
    </span>
    <div class="form-group label-floating">
        <label class="control-label">Keterangan</label>
        <input type="text" class="form-control" name ="keterangan" autocomplete="off">
        </div>
    </div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
<button type="submit" name="Submit" class="btn btn-primary">Simpan</button>
</div>
</form>
</div>';

?>