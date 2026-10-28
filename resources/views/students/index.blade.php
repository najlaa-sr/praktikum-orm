<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Portal ORM Laravel</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            padding: 30px;
            color: #1e293b;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        h1 {
            color: #1d4ed8;
            margin-bottom: 8px;
        }

        .deskripsi {
            color: #64748b;
            margin-bottom: 25px;
        }

        .table-wrapper {
            overflow-x: auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 12px #00000010;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background: #1d4ed8;
            color: white;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .badge {
            display: inline-block;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 5px 8px;
            border-radius: 5px;
            margin: 2px;
            font-size: 12px;
        }

        .kosong {
            text-align: center;
            padding: 25px;
        }

        footer {
            margin-top: 20px;
            font-size: 13px;
            color: #64748b;
        }

        @media (max-width: 768px) {
            body {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <h1>Portal ORM Laravel</h1>

        <p class="deskripsi">
            Data mahasiswa, program studi, profil, dan mata kuliah.
        </p>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Program Studi</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Mata Kuliah</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $student->nim }}</td>

                            <td>{{ $student->name }}</td>

                            <td>
                                {{ $student->studyProgram?->name ?? '-' }}
                            </td>

                            <td>
                                {{ $student->profile?->phone ?? '-' }}
                            </td>

                            <td>
                                {{ $student->profile?->address ?? '-' }}
                            </td>

                            <td>
                                @forelse ($student->courses as $course)
                                    <span class="badge">
                                        {{ $course->name }}
                                    </span>
                                @empty
                                    -
                                @endforelse
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="kosong">
                                Belum ada data mahasiswa.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <footer>
            Demo Relasi Eloquent ORM — Laravel 13
        </footer>

    </div>
</body>
</html>
