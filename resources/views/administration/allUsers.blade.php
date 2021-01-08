@extends('layouts.master')
@section('content')


<br>
<br>
<br>
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-xl-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Last name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    @foreach($allUsers as $user)
                    <tbody>
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><p><a class="button button3"  onclick="return confirm('Do you want to delete this user?')" href="{{ route('deleteUser', $user->id) }}">Delete</a></p></td>

                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</main>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
@endsection
