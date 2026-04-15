@extends('layouts.layout')

@section('content')
    <h1 class="mb-4">Studentų sąrašas</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">+ Pridėti naują studentą</a>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Gimimo data</th>
                <th>Telefonas</th>
                <th>Adresas</th>
                <th>Miestas</th>
                <th>Veiksmai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->surname }}</td>
                <td>{{ $student->birthday }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->city->name ?? '—' }}</td>
                <td>
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-warning btn-sm">Redaguoti</a>
                    
                    <form action="{{ route('students.destroy', $student) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" 
                                onclick="return confirm('Tikrai ištrinti šį studentą?')">
                            Ištrinti
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $students->links() }}
@endsection