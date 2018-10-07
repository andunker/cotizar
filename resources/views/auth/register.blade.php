@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                    name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_tipo_documento" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de
                                documento') }}</label>

                            <div class="col-md-6">

                                <select id="id_tipo_documento" class="form-control{{ $errors->has('id_tipo_documento') ? ' is-invalid' : '' }}"
                                    name="id_tipo_documento" value="{{ old('id_tipo_documento') }}" required autofocus>
                                    <option>--Seleccione tipo de documento-</option>
                                    @foreach($documentos as $documento)
                                    <option value="{{$documento->id}}">{{$documento->nombre}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('id_tipo_documento'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_tipo_documento') }}</strong>
                                </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="documento" class="col-md-4 col-form-label text-md-right">{{ __('Documento') }}</label>

                            <div class="col-md-6">
                                <input id="documento" type="text" class="form-control{{ $errors->has('documento') ? ' is-invalid' : '' }}"
                                    name="documento" value="{{ old('documento') }}" required autofocus>

                                @if ($errors->has('documento'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('documento') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_tipo_documento" class="col-md-4 col-form-label text-md-right">{{
                                __('Ciudad') }}</label>
                            <div class="col-md-6">

                                <select id="id_ciudad" class="form-control{{ $errors->has('id_ciudad') ? ' is-invalid' : '' }}"
                                    name="id_ciudad" value="{{ old('id_ciudad') }}" required autofocus>
                                    <option>--Seleccione ciudad-</option>
                                    @foreach($ciudades as $ciudad)
                                    <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('id_ciudad'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_ciudad') }}</strong>
                                </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}"
                                    name="direccion" value="{{ old('direccion') }}" required autofocus>

                                @if ($errors->has('direccion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                    required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="proveedor" id="proveedor"
                                        {{ old('proveedor') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="proveedor">
                                        {{ __('¿Soy Proveedor?') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>@endsection
