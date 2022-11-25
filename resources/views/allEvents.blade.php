@extends('layouts.app')
@section('content')
<div class="container">
    Acara
    @if ($message = Session::get('success'))
    <div class="alert alert-success" role="alert">
        {{$message}}
    </div>
    @endif
    <a href="/create_event">Create Event</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>Tanggal</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{$event->id}}</td>
                <td>{{$event->name}}</td>
                <td>{{$event->address}}</td>
                <td>{{$event->date}}</td>
                <td>
                    <span class="badge text-bg-warning">
                        <a href="/edit/{{$event->id}}" style="text-decoration: none; color:black">Edit</a>
                    </span>
                    <span class="badge text-bg-danger">
                        <a href="#" style="text-decoration: none; color:white">Delete</a>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</div>
@endsection