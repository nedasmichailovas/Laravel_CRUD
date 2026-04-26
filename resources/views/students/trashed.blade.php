@extends('layouts.layout')
@section('title', 'Istrinti studentai')
@section('content')
 
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="text-danger">Istrinti studentai</h2>
    <a href="{{ route('students.index') }}" class="btn btn-secondary">
        Grizti i sarasa
    </a>
</div>
 
@if($students->isEmpty())
    <div class="alert alert-info">Istrinta studentu nera.</div>
@else
<table class="table table-striped table-bordered">
    <thead class="table-danger">
        <tr>
            <th>Vardas</th>
            <th>Pavarde</th>
            <th>Miestas</th>
            <th>Grupe</th>
            <th>Istrinta</th>
            <th>Veiksmai</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->surname }}</td>
            <td>{{ $student->city->name ?? '-' }}</td>
            <td>{{ $student->group->pavadinimas ?? '-' }}</td>
            <td>{{ $student->deleted_at->format('Y-m-d H:i') }}</td>
            <td>
                {{-- Atkurti --}}
                <form action="{{ route('students.restore', $student->id) }}"
                      method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm">
                        Atkurti
                    </button>
                </form>
 
                {{-- Istrinti visam laikui --}}
                <form action="{{ route('students.forceDelete', $student->id) }}"
                      method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Tikrai istrinti visam laikui?')">
                        Istrinti visam laikui
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $students->links() }}
@endif
 
@endsection
