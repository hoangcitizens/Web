<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm số nguyên tố</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #8B4513;
            text-align: center;
            margin-top: 0;
        }
        .input-group {
            margin-bottom: 10px;
        }
        input[type="number"] {
            width: 100%;
            padding: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #FFD700;
            border: none;
            color: black;
            cursor: pointer;
        }
        #result {
            margin-top: 10px;
            padding: 10px;
            background-color: #FFFACD;
            border: 1px solid #FFD700;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tìm số nguyên tố</h1>
        <form method="post">
            <div class="input-group">
                <label for="n">Nhập N:</label>
                <input type="number" id="n" name="n" required>
            </div>
            <button type="submit" name="submit">Các số nguyên tố <= N</button>
        </form>
        <div id="result">
            <?php
            function kt_snt($so) {
                if ($so < 2) return 0;
                for ($i = 2; $i <= sqrt($so); $i++) {
                    if ($so % $i == 0) return 0;
                }
                return 1;
            }

            if (isset($_POST['submit'])) {
                $n = intval($_POST['n']);
                $primes = [];
                
                if ($n < 2) {
                    echo "Không có số nguyên tố nào.";
                } else {
                    $primes[] = 2;
                    for ($i = 3; $i <= $n; $i++) {
                        if (kt_snt($i)) {
                            $primes[] = $i;
                        }
                    }
                    echo implode(', ', $primes) . " là các số Nguyên tố";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>