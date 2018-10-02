<div id="AddSiswa" class="modal fade" role="dialog">
  <div class="modal-dialog">
      {{Form::open(['route' => 'user.store'])}}
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Siswa</h4>
      </div>
      <div class="modal-body col-md-12">
        @csrf
        @method('POST')
        {{
          Form::hidden('nis', 'NIS', ['class' => 'awesome'])
        }}{{
          Form::hidden('nis', '',['type'=>'hidden','placeholder'=>'N2018092101','class' => 'form-control','required'])
        }}{{
          Form::label('nama', 'Nama', ['class' => 'awesome'])
        }}{{
          Form::text('nama', '',['placeholder'=>'ahmad','class' => 'form-control','required','autofocus'])
        }}{{
          Form::label('jenis_kelamin', 'Jenis kelamin', ['class' => 'awesome'])
        }}{{ Form::select('jenis_kelamin', [
                        'laki-laki' => 'laki-laki',
                        'perempuan' => 'perempuan'
          ,], null, ['placeholder' => '---unknown---','class' => 'form-control select2','required']) }}
        {{
          Form::label('kode_kelas', 'kode kelas', ['class' => 'awesome'])
        }}{{ Form::select('kode_kelas', '$selectClass', null, ['class' => 'form-control select2','required']) }}
        {{
          Form::label('no_hp', 'No Hp', ['class' => 'awesome'])
        }}{{
          Form::number('no_hp', '',['placeholder'=> '0877xxxxx','min'=>'0','class' => 'form-control','required'])
        }}{{
          Form::label('alamat', 'Alamat', ['class' => 'awesome'])
        }}{{
          Form::textarea('alamat', '',['placeholder'=>'Dk.tanjung 01/04 Ds.kedungtuban Kb.blora','class' => 'form-control','required'])
        }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" title="close" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" title="submit" >Submit</button>
      </div>
    </div>
  {{ Form::close() }}
  </div>
</div>
