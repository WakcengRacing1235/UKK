<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Program Keahlian</title>
    <style>
        body {

            height: 800px;
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        :root {
            --text-color: #000000;
            --bg-input-color: #4782B2;
            --bg-input-2-color: #70BFFF;
            --bg-1-color: #1A2189;
            --bg-2-color: #FFFFFF;
        }

        h1 {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            color: var(--bg-1-color);
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: var(--bg-2-color);
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Edit Program Keahlian</h1>
        <form action="{{ route('program.update', $programKeahlian->id_program_keahlian) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode_program_keahlian">Kode Program</label>
                <input type="text" name="kode_program_keahlian" id="kode_program_keahlian"
                    value="{{ $programKeahlian->kode_program_keahlian }}" required>
            </div>
            <div class="form-group">
                <label for="program_keahlian">Nama Program</label>
                <input type="text" name="program_keahlian" id="program_keahlian"
                    value="{{ $programKeahlian->program_keahlian }}" required>
            </div>
            <div class="form-group">
                <label for="id_bidang_keahlian">Bidang Keahlian</label>
                <select name="id_bidang_keahlian" id="id_bidang_keahlian">
                    @foreach ($bidangKeahlian as $bidang)
                        <option value="{{ $bidang->id_bidang_keahlian }}"
                            {{ $bidang->id_bidang_keahlian == $programKeahlian->id_bidang_keahlian ? 'selected' : '' }}>
                            {{ $bidang->bidang_keahlian }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit">Simpan</button>
        </form>
    </div>


</body>

</html>
