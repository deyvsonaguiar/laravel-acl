@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar usuário - <strong>{{ $user->name }}</strong></div>
                        <div class="card-body">
                            <form action="{{ route('admin.users.update', $user) }}" method="post">
                                @csrf
                                {{ method_field('PUT')}}

                                <div class="form-group row">
                                    <label for="name" class="col-md-2 col-form-label text-md-left">Nome: </label>

                                    <div class="col-md-8">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label for="email" class="col-md-2 col-form-label text-md-left">E-mail: </label>

                                        <div class="col-md-8">
                                            <input id="name" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                @foreach ( $roles as $role )
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}"
                                        @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                        <label for="my-input" class="form-check-label">{{ $role->name}}</label>
                                    </div>
                                @endforeach
                                <div>
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>

@endsection
