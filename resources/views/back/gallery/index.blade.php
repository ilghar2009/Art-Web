@extends('back.theme.theme')

@section('head')
    <title>Galleries</title>
@endsection

@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="main-panel">

                        <h4 class="card-title">Galleries</h4>


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
                                    Category
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Created_by
                                </th>
                                <th>
                                    Image
                                </th>
                            </tr>
                            </thead>

                            @php $i = 0; @endphp
                        @foreach($galleries as $gallery)
                                <tbody>

                                <tr>
                                    <td>
                                        {{++$i}}
                                    </td>

                                    <td>
                                        {{$gallery?->title}}
                                    </td>

                                    <td>
                                        {{$gallery->category?->title}}
                                    </td>

                                    <td>
                                        <p>{{$gallery?->description}}</p>
                                    </td>

                                    <td>
                                        {{$gallery->user->name}}
                                    </td>

                                    <td>
                                        <img src="{{$gallery->images?->image}}" alt="{{$gallery->title}}" style="width: 48px; height: 48px; border-radius: 50%; object-fit: cover;">
                                    </td>

                                    <td>
                                        <a class="btn btn-success" href="{{route('gallery.edit', $gallery->gallery_id)}}">Update</a>
                                        <a class="btn btn-danger" href="{{route('gallery.destroy', $gallery->gallery_id)}}">Delete</a>
                                        <a class="btn btn-dark" href="{{route('show.gallery',$gallery->gallery_id)}}">Show all Image of these gallery</a>
                                    </td>

                                </tr>
                                </tbody>
                        @endforeach

                        </table>

                </div>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
