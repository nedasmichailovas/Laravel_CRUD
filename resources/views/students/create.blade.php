@extends('layouts.layout')
@section('title', 'Prideti studenta')
@section('content')
 
<div class="row justify-content-center">
  <div class="col-md-7">
    <h2>Prideti nauja studenta</h2>
 
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
 
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
 
        <div class="mb-3">
            <label class="form-label">Vardas</label>
            <input type="text" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" required>
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
 
        <div class="mb-3">
            <label class="form-label">Pavarde</label>
            <input type="text" name="surname"
                   class="form-control @error('surname') is-invalid @enderror"
                   value="{{ old('surname') }}" required>
            @error('surname')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
 
        <div class="mb-3">
            <label class="form-label">Adresas</label>
            <input type="text" name="address"
                   class="form-control @error('address') is-invalid @enderror"
                   value="{{ old('address') }}" required>
            @error('address')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
 
        <div class="mb-3">
            <label class="form-label">Telefonas</label>
            <input type="text" name="phone"
                   class="form-control @error('phone') is-invalid @enderror"
                   value="{{ old('phone') }}" required>
            @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
 
        <div class="mb-3">
            <label class="form-label">Miestas</label>
            <select name="city_id" class="form-control" required>
                <option value="">-- Pasirinkite miesta --</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}"
                        {{ old('city_id') == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
            @error('city_id')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
 
        <div class="mb-3">
            <label class="form-label">Grupe</label>
            <select name="grupe_id" class="form-control" required>
                <option value="">-- Pasirinkite grupe --</option>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}"
                        {{ old('grupe_id') == $group->id ? 'selected' : '' }}>
                        {{ $group->kodas }} - {{ $group->pavadinimas }}
                    </option>
                @endforeach
            </select>
            @error('grupe_id')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
 
        <div class="mb-3">
            <label class="form-label">Gimimo data</label>
            <input type="date" name="gim_data"
                   class="form-control @error('gim_data') is-invalid @enderror"
                   value="{{ old('gim_data') }}">
            @error('gim_data')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
 
        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            Atgal
        </a>
        <button type="submit" class="btn btn-success">
            Issaugoti
        </button>
    </form>
  </div>
</div>
 
@endsection
