@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Meeting') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('meetings.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="subject"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Subject') }}</label>

                                <div class="col-md-6">
                                    <input id="subject" type="text"
                                        class="form-control @error('subject') is-invalid @enderror" name="subject"
                                        value="{{ old('subject') }}" required autocomplete="subject" autofocus>

                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="datetime"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Date and Time') }}</label>

                                <div class="col-md-6">
                                    <input id="datetime" type="datetime-local"
                                        class="form-control @error('datetime') is-invalid @enderror" name="datetime"
                                        value="{{ old('datetime') }}" required autocomplete="datetime">

                                    @error('datetime')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="attendee1"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Attendee 1') }}</label>

                                <div class="col-md-6">
                                    <input id="attendee1" type="email"
                                        class="form-control @error('attendee1') is-invalid @enderror" name="attendee1"
                                        value="{{ old('attendee1') }}" required autocomplete="attendee1">

                                    @error('attendee1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="attendee2"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Attendee 2') }}</label>

                                <div class="col-md-6">
                                    <input id="attendee2" type="email"
                                        class="form-control @error('attendee2') is-invalid @enderror" name="attendee2"
                                        value="{{ old('attendee2') }}" required autocomplete="attendee2">

                                    @error('attendee2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
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
