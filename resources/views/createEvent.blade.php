@extends('layouts.app')
@section('content')


<div class="container">
    <form action=<?php @$edit!=null? printf('/save_update_event'.'/'.$edit->id) : printf('/save_event') ?> method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Acara</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="nama_acara" value=<?php if(@$edit!=null) printf($edit->name)
            ?>>
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
              </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat Acara</label>
            <input type="text" class="form-control" name="alamat_acara" value=<?php if(@$edit!=null)
                printf($edit->address)?>>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Acara</label>
            <input type="date" class="form-control" name="tanggal_acara" value=<?php if(@$edit!=null)
                printf($edit->date)?>>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection