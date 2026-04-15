@extends('layouts.layout')

@section('content')
    <h1>Naujas studentas</h1>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Vardas</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Pavardė</label>
            <input type="text" name="surname" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Gimimo data</label>
            <input type="date" name="birthday" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Telefonas</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Adresas</label>
            <textarea name="address" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Miestas</label>
            <select name="city_id" class="form-control" required>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Išsaugoti studentą</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Atgal</a>
    </form>
@endsection