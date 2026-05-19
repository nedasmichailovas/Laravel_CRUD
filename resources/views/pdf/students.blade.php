<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>Studentų sąrašas</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
        }
        h1 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #343a40;
            color: white;
            padding: 6px;
            text-align: left;
        }
        td {
            padding: 5px;
            border-bottom: 1px solid #dee2e6;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 20px;
            text-align: right;
            font-size: 10px;
            color: #888;
        }
    </style>
</head>
<body>
    <h1>Studentų sąrašas</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Miestas</th>
                <th>Grupė</th>
                <th>Gim. data</th>
                <th>Telefonas</th>
                <th>Asmens kodas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->surname }}</td>
                <td>{{ $student->city->name ?? '-' }}</td>
                <td>{{ $student->group->pavadinimas ?? '-' }}</td>
                <td>{{ $student->gim_data }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->asmens_kodas ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Sugeneruota: {{ date('Y-m-d H:i') }} | Viso studentų: {{ count($students) }}
    </div>
</body>
</html>