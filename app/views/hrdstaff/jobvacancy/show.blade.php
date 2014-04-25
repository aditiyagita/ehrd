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
        @include('hrdstaff.left')
        <div id="main">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="pull-left">
                        <h1>Detail Lowongan</h1>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="{{Url::asset('hrdstaff/')}}">Home</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="{{Url::asset('hrdstaff/job-vacancy')}}">Lowongan</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="#">Detail Lowongan</a>
                        </li>
                    </ul>
                    <div class="close-bread">
                        <a href="#"><i class="icon-remove"></i></a>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="box">
                            <div class="box-title">
                                <h3>{{ $data['jobvacancy']->judul }}</h3>
                            </div>
                            <div class="box-content nopadding" style="padding-top:15px">
                               <table class="table table-striped table-invoice">
                                    <tr>
                                        <td><strong>Posisi</strong></td>
                                        <td>{{ $data['jobvacancy']->posisi }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Department</strong></td>
                                        <td>{{ $data['jobvacancy']->department->department }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Berlaku Sampai Dengan</strong></td>
                                        <td>{{ date('m/d/Y', strtotime($data['jobvacancy']->tanggalakhir)) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan=2>{{ $data['jobvacancy']->uraian }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div></div></div>
@stop