@extends('master')

@section('content')
<!-- Datepicker -->
{{ HTML::style('assets/css/plugins/datepicker/datepicker.css') }}
<!-- Datepicker -->
{{ HTML::script('assets/js/plugins/datepicker/bootstrap-datepicker.js') }}
<!-- CKEditor -->
{{ HTML::script('assets/js/plugins/ckeditor/ckeditor.js') }}
<!-- imagesLoaded -->
{{ HTML::script('assets/js/plugins/imagesLoaded/jquery.imagesloaded.min.js') }}
<!-- PLUpload -->
{{ HTML::script('assets/js/plugins/plupload/plupload.full.js') }}
{{ HTML::script('assets/js/plugins/plupload/jquery.plupload.queue.js') }}
    <script src="js/plugins/"></script>
    <script src="js/plugins/"></script>
    <!-- Custom file upload -->
{{ HTML::script('assets/js/plugins/fileupload/bootstrap-fileupload.min.js') }}
{{ HTML::script('assets/js/plugins/mockjax/jquery.mockjax.js') }}

<body>
    @include('menu')
    </div>
    <div class="container-fluid" id="content"> <!-- <div class="container-fluid nav-hidden" id="content"> -->
        @include('hrdstaff.left')
        <div id="main">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="pull-left">
                        <h1>Fixed layout</h1>
                    </div>
                    <div class="pull-right">
                        <ul class="minitiles">
                            <li class='grey'>
                                <a href="#"><i class="icon-cogs"></i></a>
                            </li>
                            <li class='lightgrey'>
                                <a href="#"><i class="icon-globe"></i></a>
                            </li>
                        </ul>
                        <ul class="stats">
                            <li class='satgreen'>
                                <i class="icon-money"></i>
                                <div class="details">
                                    <span class="big">$324,12</span>
                                    <span>Balance</span>
                                </div>
                            </li>
                            <li class='lightred'>
                                <i class="icon-calendar"></i>
                                <div class="details">
                                    <span class="big">February 22, 2013</span>
                                    <span>Wednesday, 13:56</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="more-login.html">Home</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="layouts-sidebar-hidden.html">Layouts</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <li>
                            <a href="layouts-fixed.html">Fixed layout</a>
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
                                    <h3><i class="icon-list-ul"></i> Add Job Vacancy</h3>
                                </div>
                                {{ Form::model($data["contactus"], array('method' => 'PATCH', 'route' => array('hrdstaff.contact-us.update', $data["contactus"]->idhalaman))) }}
                                <div class="box-content nopadding" style="padding-top:15px">
                                    <br>
                                        <div class="control-group">
                                            <label for="department" class="control-label">Judul</label>
                                            <div class="controls">
                                                <input type="text" name="judul" value="{{ $data['contactus']->judul }}" id="judul" placeholder="Judul" class="input-block-level">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="textfield"></label>
                                            <div class="controls">
                                                <div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" value="" name="imagefile">
                                                    <div style="width: 200px; height: 150px;" class="fileupload-new thumbnail"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"></div>
                                                    <div style="max-width: 200px; max-height: 150px; line-height: 20px;" class="fileupload-preview fileupload-exists thumbnail"></div>
                                                    <div>
                                                        <span class="btn btn-file">
                                                            <span class="fileupload-new">Select image</span>
                                                            <span class="fileupload-exists">Change</span>
                                                            <input type="file" name="foto">
                                                        </span>
                                                        <a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                </div>
                                <div class="box-title" style="margin-top:0px; padding-left:0px;">
                                    <h3>Uraian</h3>
                                </div>
                                <div class="box-content nopadding">
                                    <div class='form-wysiwyg'>
                                        <textarea name="ck" class='ckeditor span12' rows="5">{{ $data['contactus']->uraian }}</textarea>
                                        <div style="padding-top:10px; float:right;">
                                            <button type="submit" class="btn btn-large btn-primary">Save changes</button>
                                            <button type="button" class="btn btn-large">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                                    {{ Form::close() }}

                        </div>
                    </div>
                </div>
            </div>
        </div></div>
@stop