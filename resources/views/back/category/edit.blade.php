@extends('back.theme.theme')

@section('head')
    <title>Category Edit</title>
@endsection

@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">

                    <h4 class="card-title">update Category</h4>

                    <form class="forms-sample" action="{{route('category.update', $category->category_id)}}" method="post" enctype="multipart/form-data">
                        @csrf

{{--                        <input type="hidden" name="category_id" value="{{$category->category_id}}">--}}

                        <div class="form-group">
                            <label for="exampleInputName1">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Title" value="{{old('title')??$category->title}}">
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
                            <textarea class="form-control" name="description" id="exampleTextarea1" rows="4">{{old('description')??$category->description}}</textarea>
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
