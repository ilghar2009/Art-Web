@extends('back.theme.theme')

    @section('top-head')
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    @endsection

    @section('head')
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico">

        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">

        <style>
            #fh5co-projects-feed{
                display:grid;
                grid-template-columns: auto auto auto;
            }
        </style>
    @endsection

    @section('body')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="container-fluid pt70 pb70">
                            <div id="fh5co-projects-feed" class="fh5co-projects-feed clearfix masonry">
                                @foreach($images as $image)
                                    <div style="margin:5px;" class="fh5co-project masonry-brick">

                                        <img src="{{$image->image}}" alt="image of gallery" width="100" height="100">
                                        <h5 style="padding:5px;">{{$image->gallery->title}}</h5>
                                        <p style="color:#28a745">@if($image->role){{"اصلی"}} @else {{"فرعی"}}@endif</p>
                                        <a class="btn btn-success" href="{{route('gallery.edit.image', $image->id)}}">Update</a>
                                        <a class="btn btn-danger" href="{{route('gallery.destroy.image', $image->id)}}">Delete</a>

                                    </div>
                                @endforeach
                            </div>
            <!--END .fh5co-projects-feed-->
                        </div>
        <!-- END .container-fluid -->
                    </div>
                </div>
            </div>
        </div>


    @endsection

    @section('script')
    @endsection