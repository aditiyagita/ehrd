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
<body>
    @include('menu')
    </div>
    <div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
        @include('karyawan.left')
        <div id="main">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="pull-left">
                        <h1>Pelatihan</h1>
                    </div>
                    <div class="pull-right" style="padding-top:15px">
                        @if($data['cekpeserta'] == 0)
                            <a href="{{Url::asset('karyawan/ikut-pelatihan/'.$data['pelatihan']->idpelatihan)}}" class="btn btn-large btn-brown"><i class="icon-ok"></i> Ikut Pelatihan</a>
                        @else
                            <a href="#" class="btn btn-large btn-brown"><i class="icon-check"></i> Sudah Mendaftar Pelatihan</a>
                        @endif
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="{{Url::asset('/')}}">Home</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="{{Url::asset('karyawan/pelatihan')}}">Pelatihan</a>
                        </li>
                        <li>
                            <a href="#">Detail Pelatihan</a>
                        </li>
                    </ul>
                    <div class="close-bread">
                        <a href="#"><i class="icon-remove"></i></a>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="post-content">
                            <h3 class="post-title">{{ $data['pelatihan']->judul }}</h3>
                            <div class="post-meta">
                                <span class="date">
                                    <h5>Tanggal: {{ date('d M Y', strtotime($data['pelatihan']->tanggalmulai)) }} - {{ date('d M Y', strtotime($data['pelatihan']->tanggalselesai)) }}</h5>
                                </span>
                                <div class="comments">
                                    <h5>Kuota: {{ $data['pelatihan']->kuota }}</h5>
                                </div>
                            </div>
                            <div class="post-text">
                                {{ $data['pelatihan']->uraian }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div></div>
@stop