@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Meetings</h1>

        <a href="{{ route('meetings.create') }}" class="btn btn-primary">Create Meeting</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Date and Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all as $meeting)
                    <tr>
                        <td>{{ $meeting->subject }}</td>
                        <td>{{ $meeting->datetime }}</td>
                        <td>
                            <a href="{{ route('meetings.edit', $meeting->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('meetings.destroy', $meeting->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
