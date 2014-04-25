@if((Auth::user()->foto) == '')
<img src="{{ URL::asset('assets/images/user/default.jpg') }}" width="100%" style="margin-bottom:5px"/>
@else
<img src="{{ URL::asset('assets/images/user/'.Auth::user()->foto) }}" width="100%" style="margin-bottom:5px"/>
@endif
<a href="{{URL::asset('resume')}}" class="btn-block btn btn-large">Edit Profil</a>
<a href="{{URL::asset('pendidikan')}}" class="btn-block btn btn-large">Pendidikan</a>
<a href="{{URL::asset('kursus-pelatihan')}}" class="btn-block btn btn-large">Kursus & Pelatihan</a>
<a href="{{URL::asset('bahasa')}}" class="btn-block btn btn-large">Bahasa</a>
<a href="{{URL::asset('pengalaman-kerja')}}" class="btn-block btn btn-large">Pengalaman Kerja</a>
<a href="{{URL::asset('keluarga')}}" class="btn-block btn btn-large">Keterangan Keluarga</a>
<a href="{{URL::asset('referensi')}}" class="btn-block btn btn-large">Referensi</a>
<a href="{{URL::asset('pertanyaan')}}" class="btn-block btn btn-large">Pertanyaan</a>