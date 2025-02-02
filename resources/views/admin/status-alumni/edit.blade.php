<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sekolah</title>
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

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            color: var(--bg-1-color);
            margin-bottom: 20px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
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

        .form-group input {
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

        /* Responsif untuk perangkat kecil */
        @media (max-width: 768px) {
            .form {
                padding: 15px;
            }

            .form-group input {
                padding: 8px;
            }

            button {
                font-size: 14px;
            }
        }           
    </style>
</head>

<body>
    <div class="container">
        <form action="{{ route('status-alumni.update', $status_alumni->id_status_alumni) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" class="form-control" value="{{ $status_alumni->status }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</body>

</html>
