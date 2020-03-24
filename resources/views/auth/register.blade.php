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
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                            @php
                                $titles = [
                                    ['bro' => 'Brother'],
                                    ['sis' => 'Sister'],
                                    ['mr' => 'Mr'],
                                    ['mrs' => 'Mrs'],
                                    ['dr' => 'Dr'],
                                    ['sir' => 'Sir'],
                                    ['dcn' => 'Dcn'],
                                    ['dcns' => 'Dcns'],
                                    ['pst' => 'Pastor']
                                ];    
                            @endphp
                            <div class="col-md-6">
                                <select
                                class="form-control"
                                name="title"
                                required
                                >
                                    <option disabled>All Titles</option>
                                    @foreach($titles as $title)
                                    @if(key($title) == old('title'))
                                    <option selected value="{{ key($title) }}">{{ current($title) }}</option>
                                    @else
                                    <option value="{{ key($title) }}">{{ current($title) }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if($invite == null)
                        <div class="form-group row">
                            <label for="church" class="col-md-4 col-form-label text-md-right">{{ __('Church') }}</label>

                            <div class="col-md-6">
                                <select
                                class="form-control"
                                name="church"
                                required
                                >
                                    <option disabled>All Churches</option>
                                    <option value="1">Christ Embassy Nungua</option>
                                    @foreach($churches as $church)
                                    @if($church->id == old('church'))
                                    <option selected value="{{ $church->id }}">{{ $church->name }}</option>
                                    @else
                                    <option value="{{ $church->id }}">{{ $church->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('church')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @else
                            <input type="hidden" name="church" value="{{ \App\Models\User::find($invite)->church_id }}">
                        @endif

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <input type="hidden" name="invite" value="{{ $invite }}">
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
</div>
@endsection
