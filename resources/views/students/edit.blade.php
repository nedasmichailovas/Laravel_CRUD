@extends('layouts.layout')
@section('title', 'Redaguoti studenta')
@section('content')
 
<div class="row justify-content-center">
  <div class="col-md-7">
    <h2>Redaguoti studenta</h2>
 
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
 
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="mb-3">
            <label class="form-label">Vardas</label>
            <input type="text" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $student->name) }}" required>
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
 
        <div class="mb-3">
            <label class="form-label">Pavarde</label>
            <input type="text" name="surname"
                   class="form-control @error('surname') is-invalid @enderror"
                   value="{{ old('surname', $student->surname) }}" required>
            @error('surname')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
 
        <div class="mb-3">
            <label class="form-label">Adresas</label>
            <input type="text" name="address"
                   class="form-control @error('address') is-invalid @enderror"
                   value="{{ old('address', $student->address) }}" required>
            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
 
        <div class="mb-3">
            <label class="form-label">Telefonas</label>
            <input type="text" name="phone"
                   class="form-control @error('phone') is-invalid @enderror"
                   value="{{ old('phone', $student->phone) }}" required>
            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
 
        <div class="mb-3">
            <label class="form-label">Miestas</label>
            <select name="city_id" class="form-control" required>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}"
                        {{ old('city_id', $student->city_id) == $city->id
                            ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
        </div>
 
        <div class="mb-3">
            <label class="form-label">Grupe</label>
            <select name="grupe_id" class="form-control" required>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}"
                        {{ old('grupe_id', $student->grupe_id) == $group->id
                            ? 'selected' : '' }}>
                        {{ $group->kodas }} - {{ $group->pavadinimas }}
                    </option>
                @endforeach
            </select>
        </div>
 
        <div class="mb-3">
            <label class="form-label">Gimimo data</label>
            <input type="date" name="gim_data"
                   class="form-control @error('gim_data') is-invalid @enderror"
                   value="{{ old('gim_data', $student->gim_data) }}">
            @error('gim_data')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
 
        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            Atgal
        </a>
        <button type="submit" class="btn btn-primary">
            Issaugoti
        </button>
    </form>
  </div>
</div>
 
@endsection
