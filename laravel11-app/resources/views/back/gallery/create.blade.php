@extends('back.theme.theme')

@section('head')
    <title>Gallery create</title>
    <style>
        .error{
            color:darkred;
        }
    </style>
@endsection

@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="content-wrapper">
                        <h3>Gallery create</h3>
                        <p class="card-description">
                            Create a new recorde of Gallery
                        </p>
                        <form class="forms-sample" action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputName1" placeholder="Title" value="{{old('title')}}">

                                @error('title')
                                <p>{{$message}}</p>
                                @enderror

                            </div>

                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <p>Category_id</p>
                                            <select name="category_id" class="form-control form-control-sm" id="exampleFormControlSelect3">
                                                @foreach($categories as $category)

                                                        <option value="{{$category->category_id}}">{{$category->title}}</option>

                                                @endforeach


                                            </select>

                                            @error('category_id')
                                                {{$message}}
                                            @enderror

                                        </div>
                                    </div>
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

    <script src="/assets/js/file-upload.js"></script>
    <script src="/assets/js/typeahead.js"></script>
    <script src="/assets/js/select2.js"></script>
@endsection
