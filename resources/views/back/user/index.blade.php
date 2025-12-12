@extends('back.theme.theme')

@section('head')
    <title>User's</title>
@endsection

@section('body')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="main-panel">

                    <h4 class="card-title">Users</h4>

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
                                        <th>
                                            Role
                                        </th>
                                    </tr>
                                </thead>

                                @php $i = 0; @endphp
                                @foreach($users as $user)
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
                                                {{$user->role? "admin" : "client"}}
                                            </td>

                                            @if($user->user_id != \Illuminate\Support\Facades\Auth::user()->user_id and $user->name != 'admin')
                                                <td>
                                                    <a class="btn btn-success" href="{{route('user.edit', $user->user_id)}}">Edit role</a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger" href="{{route('user.delete', $user->user_id)}}">Delete</a>
                                                </td>
                                            @endif

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
@endsection
