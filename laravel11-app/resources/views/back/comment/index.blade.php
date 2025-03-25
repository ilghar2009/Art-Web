@extends('back.theme.theme')

@section('head')
    <title>comments</title>
@endsection

@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="main-panel">

                        <h4 class="card-title">Comments</h4>


                        <table class="table table-dark">

                            <thead>
                            <tr>

                                <th>
                                    #
                                </th>

                                <th>
                                    Created_by
                                </th>

                                <th>
                                    Text
                                </th>

                                <th>
                                    Type
                                </th>

                                <th>
                                    Gallery
                                </th>

                                <th>
                                    Category
                                </th>




                            </tr>
                            </thead>

                            @php $i = 0; @endphp
                        @foreach($comments as $comment)
                                <tbody>

                                <tr>
                                    <td>
                                        {{++$i}}
                                    </td>

                                    <td>
                                        {{$comment?->created_by}}
                                    </td>

                                    <td>
                                        {{$comment?->text}}
                                    </td>

                                    <td>
                                        <p>{{$comment?->type}}</p>
                                    </td>

                                    <td>
                                        {{$comment->gallery?->title}}
                                    </td>

                                    <td>
                                        {{$comment->category?->title}}
                                    </td>

                                    <td>
                                        <a class="btn btn-success" href="{{route('comment.accept',$comment->id)}}">Accept</a>
                                        <a class="btn btn-danger" href="{{route('comment.destroy', $comment->id)}}">Delete</a>
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

@endsection
