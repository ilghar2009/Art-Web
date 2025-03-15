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
                    <div class="table-responsive pt-3">
                        <table class="table table-dark">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
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
                                        {{$user->name}}
                                    </td>

                                    <td>
                                        {{$user->email}}
                                    </td>

                                    <td>
                                        <a class="btn btn-danger" href="{{route('user.destroy', $gallery->gallery_id)}}">Delete</a>
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
