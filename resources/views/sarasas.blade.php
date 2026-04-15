<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>Žmonių sąrašas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        p { border-bottom: 1px solid #ddd; padding: 8px 0; }
    </style>
</head>
<body>
    <h1>Žmonių sąrašas</h1>
    
    <div class="links">
        @foreach ($vartotojai as $vartotojas)
            <p>
                <strong>ID:</strong> {{ $vartotojas->id }} | 
                <strong>Vardas:</strong> {{ $vartotojas->vardas }} | 
                <strong>Pavardė:</strong> {{ $vartotojas->pavarde }} | 
                <strong>Tel.:</strong> {{ $vartotojas->telefonas }} | 
                <strong>Gimimo data:</strong> {{ $vartotojas->gim_data }}
            </p>
        @endforeach
    </div>
</body>
</html>