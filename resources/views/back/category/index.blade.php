@extends('back.theme.theme')

@section('head')
    <title>Category</title>
@endsection

@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="main-panel">
                    <h4 class="card-title">Categories</h4>
                    <div class="table-responsive pt-3">
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    Description
                                </th>
                            </tr>
                            </thead>
                            @php $i = 0; @endphp
                        @foreach($categories as $category)
                                <tbody>
                                <tr>
                                    <td>
                                        {{++$i}}
                                    </td>
                                    <td>
                                        {{$category->title}}
                                    </td>
                                    <td>
                                        <img src="{{$category->image}}">
                                    </td>
                                    <td>
                                        <p>{{$category->description}}</p>
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="{{route('category.edit', $category->category_id)}}">Update</a>
                                        <a class="btn btn-danger" href="{{route('category.destroy', $category->category_id)}}">Delete</a>
                                    </td>
                                </tr>
                                </tbody>
                        @endforeach

                        </table>
                    <div>
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
