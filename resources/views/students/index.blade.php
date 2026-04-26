@extends('layouts.layout')
@section('title', 'Studentu sarasas')
@section('content')
 
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Studentu sarasas</h2>
    <div class="d-flex gap-2">
        @auth
        <a href="{{ route('students.create') }}"
           class="btn btn-success">
            Prideti studenta
        </a>
        <a href="{{ route('students.trashed') }}"
           class="btn btn-warning">
            Rodyti istrinta
        </a>
        @endauth
    </div>
</div>
 
<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Vardas</th>
            <th>Pavarde</th>
            <th>Adresas</th>
            <th>Telefonas</th>
            <th>Miestas</th>
            <th>Grupe</th>
            <th>Gim. data</th>
            @auth
            <th>Veiksmai</th>
            @endauth
        </tr>
    </thead>
    <tbody>
    @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->surname }}</td>
            <td>{{ $student->address }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->city->name ?? '-' }}</td>
            <td>{{ $student->group->pavadinimas ?? '-' }}</td>
            <td>{{ $student->gim_data }}</td>
            @auth
            <td>
                <a href="{{ route('students.edit', $student->id) }}"
                   class="btn btn-primary btn-sm">
                    Redaguoti
                </a>
                <form action="{{ route('students.destroy', $student->id) }}"
                      method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Istrinti?')">
                        Istrinti
                    </button>
                </form>
            </td>
            @endauth
        </tr>
    @endforeach
    </tbody>
</table>
 
{{ $students->links() }}
 
@endsection
