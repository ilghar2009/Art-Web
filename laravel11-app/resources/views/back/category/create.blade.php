@extends('back.theme.theme')

@section('head')
    <title>Category create</title>
    <style>
        p{
            color:darkred;
        }
        input{
            font-size: 18px;
            font-family: 'nazanin', sans-serif !important;
            font-weight: bold;
        }
    </style>
@endsection

@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="content-wrapper">
                        <h3 class="card-title">ساخت دسته بندی</h3>
                        <p class="card-description">
                            Create new Category Record
                        </p>
                        <form class="forms-sample" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Title" value="{{old('title')}}">

                                @error('title')
                                    <p>{{$message}}</p>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="image" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" name="image" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                              <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleTextarea1">Description</label>
                                <textarea class="form-control" name="description" id="exampleTextarea1" rows="4">{{old('description')}}</textarea>

                                @error('description')
                                    <p>{{$message}}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
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
