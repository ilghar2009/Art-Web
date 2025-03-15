@extends('back.theme.theme')

@section('head')
    <title>Category create</title>
@endsection

@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">

                    <h4 class="card-title">Create Category</h4>

                    <p class="card-description">
                        Create new Category Record
                    </p>

                    <form class="forms-sample" action="{{route('gallery.update', $gallery->gallery_id)}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName1">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Title" value="{{$gallery->title}}">
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="js-example-basic-single w-100">
                                @foreach($categories as $category)
                                    <option value="null" selected>none</option>
                                    <option value="{{$category->category_id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleTextarea1">Description</label>
                            <textarea class="form-control" name="description" id="exampleTextarea1" rows="4">{{$gallery->description}}</textarea>
                        </div>

                        <p>created_by:{{$gallery->cart->user->name}}.</p>

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
