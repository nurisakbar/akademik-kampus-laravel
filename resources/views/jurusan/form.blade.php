<div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Nama Jurusan</label>
        <div class="col-md-8">
            {{ Form::text('nama_jurusan',null,['class'=>'form-control','placeholder'=>'Nama jurusan'])}}
        </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Fakultas</label>
    <div class="col-md-8">
            {{ Form::select('kode_fakultas',$fakultas,null,['class'=>'form-control'])}}
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Jenjang</label>
    <div class="col-md-8">
        {{ Form::select('jenjang',['d3'=>'D3','d4'=>'D4'],null,['class'=>'form-control'])}}
    </div>
</div>