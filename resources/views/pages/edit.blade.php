@extends('layouts.app')

@section('title','Edit')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Data</div>
            <form action="{{ route('silsilah.update', $silsilah->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="parent_id">Parent</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="0">Jadikan Parent</option>
                                <option value="{{ $silsilah->parent_id }}"{{ $silsilah->parent_id == $silsilah->id ? 'selected' : '' }}>{{ $silsilah->name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $silsilah->name }}">
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="lk"{{ $silsilah->gender == 'lk' ? 'selected' : '' }}>Laki - laki</option>
                            <option value="pr"{{ $silsilah->gender == 'pr' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
