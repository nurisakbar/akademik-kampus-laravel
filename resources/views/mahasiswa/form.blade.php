<div class="form-group row">
        <label class="col-md-2 col-form-label text-md-right">Nama Mahasiswa</label>
        <div class="col-md-8">
            {{ Form::text('nama_mahasiswa',null,['class'=>'form-control','placeholder'=>'Nama Lengkap'])}}
        </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Jurusan</label>
    <div class="col-md-8">
            {{ Form::select('kode_jurusan',$jurusan,null,['class'=>'form-control'])}}
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Alamat</label>
    <div class="col-md-8">
        {{ Form::text('alamat',null,['class'=>'form-control','placeholder'=>'Alamat Lengkap'])}}
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Tahun Akademik</label>
    <div class="col-md-8">
        {{ Form::select('kode_tahun_akademik',$tahun_akademik,null,['class'=>'form-control'])}}
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Semester Aktif</label>
    <div class="col-md-8">
        {{ Form::select('semester_aktif',$semester_aktif,null,['class'=>'form-control'])}}
    </div>
</div>


<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Email</label>
    <div class="col-md-8">
        {{ Form::email('email',null,['class'=>'form-control','placeholder'=>'Email'])}}
    </div>
</div>

<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">Password</label>
    <div class="col-md-8">
        {{ Form::password('password',['class'=>'form-control','placeholder'=>'Password'])}}
    </div>
</div>