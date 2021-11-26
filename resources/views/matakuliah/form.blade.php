<div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Nama Matakuliah</label>
        <div class="col-md-8">
            {{ Form::text('nama_mk',null,['class'=>'form-control','placeholder'=>'Nama Matakuliah'])}}
        </div>
</div>

<div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Jumlah SKS</label>
        <div class="col-md-2">
            {{ Form::text('jml_sks',null,['class'=>'form-control','placeholder'=>'Jumlah SKS'])}}
        </div>
</div>