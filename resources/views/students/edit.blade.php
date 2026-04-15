@extends('layouts.layout')

@section('content')
    <h1>Redaguoti studentą</h1>

    <form action="{{ route('students.update', $student) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Vardas</label>
            <input type="text" name="name" value="{{ $student->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Pavardė</label>
            <input type="text" name="surname" value="{{ $student->surname }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Gimimo data</label>
            <input type="date" name="birthday" value="{{ $student->birthday }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Telefonas</label>
            <input type="text" name="phone" value="{{ $student->phone }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Adresas</label>
            <textarea name="address" class="form-control" rows="3" required>{{ $student->address }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Miestas</label>
            <select name="city_id" class="form-control" required>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ $student->city_id == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Atnaujinti</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Atgal</a>
    </form>
@endsection