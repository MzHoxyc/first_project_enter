@extends('layouts.app')
@section('content')


<div class="container">
    <form action=<?php @$edit!=null? printf('/save_update_guest'.'/'.$edit->id) : printf('/save_guest') ?> method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Tamu</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="nama_tamu" value=<?php if(@$edit!=null) printf($edit->name)
            ?>>
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
              </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat Tempat tinggal</label>
            <input type="text" class="form-control" name="alamat_tamu" value=<?php if(@$edit!=null)
                printf($edit->address)?>>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanda Tangan</label>
            <input type="number" class="form-control" name="ttd" value=<?php if(@$edit!=null)
                printf($edit->date)?>>
        </div>
        <div class="mb-3">
            <label class="form-label">Acara</label>
            <select name="event" id="" class="form-select">
                @if (@$edit==null)
                    <option value="0">pilih acara</option>
                @endif
                @foreach ($events as $event)
                    @if (@$edit->event->id == $event->id)
                        <option value="{{$event->id}}" selected>{{$event->name}}</option>
                    @else 
                        <option value="{{$event->id}}">{{$event->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection