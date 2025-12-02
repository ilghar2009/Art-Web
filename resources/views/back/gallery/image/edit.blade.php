@extends('back.theme.theme')

@section('head')
    <title>Image Update</title>
@endsection

@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">

                    <h4 class="card-title">update Image</h4>

                    <form class="forms-sample" action="{{route('gallery.update.image', $image->id)}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <p>Gallery_id</p>
                                        <select name="gallery_id" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                            @foreach($galleries as $gallery)

                                                <option value="{{$gallery->gallery_id}}">{{$gallery->title}}</option>

                                            @endforeach

                                            @error('gallery_id')
                                                {{$message}}
                                            @enderror
                                        </select>

                                        @error('gallery_id')
                                        <p class="error">{{$message}}</p>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <p>role</p>
                                        <select name="role" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                            <option value="{{true}}">اصلی</option>
                                            <option selected value="{{false}}">فرعی</option>
                                        </select>

                                        @error('role')
                                            <p class="error">{{$message}}</p>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Plugin js for this page -->
    <script src="/assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="/assets/vendors/select2/select2.min.js"></script>

    <!-- Custom js for this page-->
    <script src="/assets/js/file-upload.js"></script>
    <script src="/assets/js/typeahead.js"></script>
    <script src="/assets/js/select2.js"></script>
    <!-- End custom js for this page-->
@endsection
