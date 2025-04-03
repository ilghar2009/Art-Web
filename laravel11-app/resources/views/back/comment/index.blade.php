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
                                    CommentAble title
                                </th>

                                <th>
                                    Status
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
                                        {{$comment?->user->name}}
                                    </td>

                                    <td>
                                        {{$comment?->text}}
                                    </td>

                                    <td>
                                        <p>{{$comment?->commentable_type=='App\Models\Gallery'? 'gallery': 'category'}}</p>
                                    </td>

                                    <td>
                                        <a href="{{route($comment?->commentable_type=='App\Models\Gallery'? 'show.gallery' : 'show.category', $comment->commentable_id)}}" style="color:#fff">
                                            {{$comment->commentable->title}}
                                        </a>
                                    </td>

                                    <td>
                                        {{$comment->status? 'true': 'false'}}
                                    </td>

                                    <td>
                                        @if($comment->status == false)
                                            <a class="btn btn-success" href="{{route('comment.accept',$comment->id)}}">Accept</a>
                                        @endif
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
