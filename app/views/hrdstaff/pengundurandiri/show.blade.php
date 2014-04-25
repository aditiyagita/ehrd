@extends('master')

@section('content')
<!-- Datepicker -->
{{ HTML::style('assets/css/plugins/datepicker/datepicker.css') }}
<!-- Datepicker -->
{{ HTML::script('assets/js/plugins/datepicker/bootstrap-datepicker.js') }}
<!-- CKEditor -->
{{ HTML::script('assets/js/plugins/ckeditor/ckeditor.js') }}
<!-- Plupload -->
{{ HTML::style('assets/css/plugins/plupload/jquery.plupload.queue.css') }}  
<!-- PLUpload -->
{{ HTML::script('assets/js/plugins/plupload/plupload.full.js') }}
{{ HTML::script('assets/js/plugins/plupload/jquery.plupload.queue.js') }}
{{ HTML::script('assets/js/plugins/fileupload/bootstrap-fileupload.min.js') }}

<style type="text/css">
    .surat{
        margin-top: 10px;
        font-size: 12pt;
    }
</style>
<body>
    @include('menu')
    </div>
    <div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
        @include('hrdstaff.left')
        <div id="main">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="pull-left">
                        <h1>Detail Pengunduran Diri</h1>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="{{Url::asset('/')}}">Home</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="{{Url::asset('hrdstaff/pengunduran-diri')}}">Pengunduran Diri</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="layouts-fixed.html">Detail Pengunduran Diri</a>
                        </li>
                    </ul>
                    <div class="close-bread">
                        <a href="#"><i class="icon-remove"></i></a>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box-title">
                            
                        </div>
                        <table width=100% class="surat">
                            <tr>
                                <td align="right" colspan=2>Jakarta, {{ date('d M Y', strtotime($data['pengunduran']->tanggalsurat)) }}</td>
                            </tr>
                            <tr>
                                <td colspan=2>Kepada Yth.<br> {{ $data['pengunduran']->kepadapimpinan->user->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <td colspan=2><strong>Perihal  </strong>Pengunduran Diri</td>
                            </tr>
                            <tr>
                                <td colspan=2><br><br>Dengan Hormat,<br></td>
                            </tr>
                            <tr>
                                <td colspan=2>{{ $data['pengunduran']->isi }}</td>
                            </tr>
                            <tr>
                                <td width=85%></td>
                                <td>Hormat Saya,</td>
                            </tr>
                            <tr>
                                <td width=85%></td>
                                <td><br><br><br></td>
                            </tr>
                            <tr>
                                <td width=85%></td>
                                <td>{{$data['pengunduran']->karyawan->user->nama_lengkap}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div></div>
@stop