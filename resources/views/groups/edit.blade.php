@extends('dashboard.header')

@section('title', 'Mon Dashboard')

@section('content')
    <div class="container">
        <h1>Editer un group</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erreurs :</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('groups.update', $group) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $group->name }}" required>
            </div>

            <button type="submit" class="btn btn-success">Modifier</button>
        </form>

        <h2>Le Coach</h2>
        <p>{{$coach->email}}</p>

         <form action="{{ route('members.store') }}" method="POST">
            @csrf
             <h2>Ajout de membre</h2>
            <div class="mb-3">
                <input name="group_id" value="{{$group->id}}" hidden="">

            </div>

            <div class="mb-3">
                <label for="user_id">User :</label>
                <select name="user_id" required>
                    @foreach($usersNotInGroup as $user)
                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-success">Créer</button>
        </form>


        <h2>Les membres</h2>
        @foreach($members as $user)
            <form action="{{ route('dashboard.members.delete', ['group' => $group->id,'member' => $user->user->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="membre" style="display: flex">
                   <p>{{ $user->user->email }}</p>
                    <input name="member" value="{{$user->user->id}}" hidden="">
                    <input name="group" value="{{$group->id}}" hidden="">
                    <button>Supprimé</button>
                </div>
            </form>
        @endforeach

        <h2>Ajout de sports</h2>

         <form action="{{ route('dashboard.group.sport.create') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input name="group_id" value="{{$group->id}}" hidden="">
            </div>

            <div class="mb-3">
                <label for="sport_id">Sport :</label>
                <select name="sport_id" required>
                    @foreach($sportsNotInGroup as $sport)
                        <option value="{{ $sport->id }}">{{ $sport->name }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-success">Créer</button>
        </form>


        <h2>Les sport associé</h2>
        @foreach($sportsGroup as $sport)
            <form action="{{ route('dashboard.groupsport.delete', ['group' => $group->id,'sport' => $sport->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="membre" style="display: flex">
                   <p>{{ $sport->name }}</p>
                    <input name="sport" value="{{$sport->id}}" hidden="">
                    <input name="group" value="{{$group->id}}" hidden="">
                    <button>Supprimé</button>
                </div>
            </form>
        @endforeach









    </div>
@endsection
