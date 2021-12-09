@extends('layouts.app')

@section('title','Read')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <table class="table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Keluarga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($silsilah as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->gender == 'lk' ? 'Laki - laki' : 'Perempuan' }}</td>
                            <td>@if ($item->parent_id == 0)
                                {{ 'Parent' }}
                            @elseif ($item->parent_id == 1)
                                {{ 'Anak Budi' }}
                            @else
                                {{ 'Cucu Budi' }}
                            @endif
                        </td>
                            <td><a class="btn btn-warning" href="{{ route('silsilah.edit', $item->id) }}">Edit</a>
                                <form action="{{ route('silsilah.destroy', $item->id) }}" method="post" style="display: inline">
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
        </div>
    </div>
@endsection
