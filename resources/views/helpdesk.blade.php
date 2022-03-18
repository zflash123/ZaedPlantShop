@extends('layouts.app')
@section('title','Order')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
          $("#tanaman").click(function(){
              $("#nama_tanaman").show();
              $("#nama_benih").hide();
              $("#nama_media").hide();
              $("#btn_clear").show();
          });
          $("#benih").click(function(){
              $("#nama_tanaman").hide();
              $("#nama_benih").show();
              $("#nama_media").hide();
              $("#btn_clear").show();
          });
          $("#media_tanam").click(function(){
              $("#nama_tanaman").hide();
              $("#nama_benih").hide();
              $("#nama_media").show();
              $("#btn_clear").show();
          });
      });
  </script>
  <script>
    const clearSelection = (name) => {
      const radioBtns = document.querySelectorAll(
      "input[type='radio'][name='" + name + "']");
      radioBtns.forEach((radioBtn) => {
        if (radioBtn.checked === true)
          radioBtn.checked = false;
      });
    };
  </script>
<div class="container pt-4 bg-white">
    <div class="row">
        <div class="col-md-8 col-xl-6">
            <form action="/confirm" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="@foreach ($users as $user){{ $user->name }}@endforeach">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="text" class="form-control" id="email" name="email" value="@foreach ($users as $user){{ $user->email }}@endforeach">
                </div>

                <div class="mb-3" id="jenis_barang">
                    <label for="jenis_barang" class="form-label">Jenis Barang</label><br>
                    @error('jenis_barang')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <input type="radio" id="tanaman" name="jenis_barang" value="Tanaman">
                    <label for="tanaman">Tanaman</label><br>
                    <input type="radio" id="benih" name="jenis_barang" value="Benih">
                    <label for="benih">Benih</label><br>
                    <input type="radio" id="media_tanam" name="jenis_barang" value="Media Tanam">
                    <label for="media_tanam">Media Tanam</label><br>
                </div>
                
                <div class="mb-3" id="nama_tanaman" style="display: none;">
                    <label for="nama_tanaman">Nama Tanaman</label>
                    @error('nama_barang')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-check form-check">
                        <input class="form-check-input" type="radio" name="nama_barang" id="keladi_tengkorak" value="Keladi Tengkorak">
                        <label for="keladi_tengkorak" class="form-check-label">Keladi Tengkorak</label>
                    </div>
                    <div class="form-check form-check">
                        <input class="form-check-input" type="radio" name="nama_barang" id="peperomia_watermelon" value="Peperomia Watermelon">
                        <label for="peperomia_watermelon" class="form-check-label">Peperomia Watermelon</label>
                    </div>
                    <div class="form-check form-check">
                        <input class="form-check-input" type="radio" name="nama_barang" id="jade_plant" value="Jade Plant">
                        <label for="jade_plant" class="form-check-label">Jade Plant</label>
                    </div>
                </div>

                <div class="mb-3" id="nama_benih" style="display: none;">
                    <label for="nama_benih">Nama Benih</label>
                    @error('nama_barang')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-check form-check">
                        <input class="form-check-input" type="radio" name="nama_barang" id="samhong_king" value="Samhong King">
                        <label for="samhong_king" class="form-check-label">Samhong King</label>
                    </div>
                    <div class="form-check form-check">
                        <input class="form-check-input" type="radio" name="nama_barang" id="painted_daisy" value="Painted Daisy">
                        <label for="painted_daisy" class="form-check-label">Painted Daisy</label>
                    </div>
                    <div class="form-check form-check">
                        <input class="form-check-input" type="radio" name="nama_barang" id="red_pakcoy" value="Red Pakcoy">
                        <label for="red_pakcoy" class="form-check-label">Red Pakcoy</label>
                    </div>
                </div>

                <div class="mb-3" id="nama_media" style="display: none;">
                    <label for="nama_media">Nama Media Tanam</label>
                    @error('nama_barang')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-check form-check">
                        <input class="form-check-input" type="radio" name="nama_barang" id="tanah_humus" value="Tanah Humus">
                        <label for="tanah_humus" class="form-check-label">Tanah Humus</label>
                    </div>
                    <div class="form-check form-check">
                        <input class="form-check-input" type="radio" name="nama_barang" id="sekam_mentah" value="Sekam Mentah">
                        <label for="sekam_mentah" class="form-check-label">Sekam Mentah</label>
                    </div>
                    <div class="form-check form-check">
                        <input class="form-check-input" type="radio" name="nama_barang" id="sekam_bakar" value="Sekam Bakar">
                        <label for="sekam_bakar" class="form-check-label">Sekam Bakar</label>
                    </div>
                    
                </div>
                <button type="button" class="btn btn-secondary mb-2" id="btn_clear" onclick="clearSelection('nama_barang');" style="display: none;">Clear Selection</button><br>
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection