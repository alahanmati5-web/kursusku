<?php

$history = [

    [
        'nomor' => 'KRS-2026-101',
        'nama' => 'Andi Saputra',
        'kursus' => 'Web Development',
        'jenis' => 'Mahasiswa',
        'diskon' => 20,
        'total' => 600000
    ],

    [
        'nomor' => 'KRS-2026-102',
        'nama' => 'Siti Rahma',
        'kursus' => 'Database',
        'jenis' => 'Guru',
        'diskon' => 15,
        'total' => 510000
    ],

    [
        'nomor' => 'KRS-2026-103',
        'nama' => 'Budi Pratama',
        'kursus' => 'Desain',
        'jenis' => 'Umum',
        'diskon' => 5,
        'total' => 522500
    ],

    [
        'nomor' => 'KRS-2026-104',
        'nama' => 'Rina Amelia',
        'kursus' => 'Artificial Intelligence',
        'jenis' => 'Mahasiswa',
        'diskon' => 20,
        'total' => 680000
    ]

];

?>

<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>History Pendaftaran - KursusKu</title>


    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {

            font-family: Arial, sans-serif;

            background: #07110d;

            color: #eafff1;

            padding: 40px 20px;

        }


        .container {

            max-width: 1100px;

            margin: auto;

        }


        .header {

            text-align: center;

            margin-bottom: 35px;

        }


        .header h1 {

            color: #39ff88;

            margin-bottom: 8px;

        }


        .header p {

            color: #91a59a;

        }


        .history-box {

            background: #0a1710;

            border: 1px solid #28583b;

            border-radius: 15px;

            padding: 25px;

            overflow-x: auto;

        }


        table {

            width: 100%;

            border-collapse: collapse;

            min-width: 750px;

        }


        th {

            background: #0c2b18;

            color: #39ff88;

            padding: 15px;

            text-align: left;

            border-bottom: 1px solid #28583b;

        }


        td {

            padding: 15px;

            border-bottom: 1px solid #173d27;

        }


        tr:hover td {

            background: #0c2115;

        }


        .badge {

            display: inline-block;

            padding: 5px 10px;

            border-radius: 20px;

            background: #0c2b18;

            color: #39ff88;

            border: 1px solid #28583b;

            font-size: 13px;

        }


        .discount {

            color: #39ff88;

            font-weight: bold;

        }


        .total {

            font-weight: bold;

            color: #eafff1;

        }


        .back {

            display: inline-block;

            margin-top: 25px;

            padding: 12px 20px;

            border: 1px solid #39ff88;

            border-radius: 8px;

            color: #39ff88;

            text-decoration: none;

        }


        .back:hover {

            background: #39ff88;

            color: #031108;

        }


        @media (max-width: 600px) {

            body {

                padding: 25px 10px;

            }

            .history-box {

                padding: 15px;

            }

        }

    </style>

</head>


<body>


<div class="container">


    <div class="header">

        <h1>
            📋 History Pendaftaran
        </h1>

        <p>
            Data pendaftaran peserta KursusKu
        </p>

    </div>


    <div class="history-box">


        <table>

            <thead>

                <tr>

                    <th>No. Pendaftaran</th>

                    <th>Nama</th>

                    <th>Kursus</th>

                    <th>Participant Type</th>

                    <th>Diskon</th>

                    <th>Total Bayar</th>

                </tr>

            </thead>


            <tbody>


                <?php foreach ($history as $data): ?>

                    <tr>

                        <td>

                            <?= htmlspecialchars(
                                $data['nomor']
                            ); ?>

                        </td>


                        <td>

                            <?= htmlspecialchars(
                                $data['nama']
                            ); ?>

                        </td>


                        <td>

                            <?= htmlspecialchars(
                                $data['kursus']
                            ); ?>

                        </td>


                        <td>

                            <span class="badge">

                                <?= htmlspecialchars(
                                    $data['jenis']
                                ); ?>

                            </span>

                        </td>


                        <td class="discount">

                            <?= $data['diskon']; ?>%

                        </td>


                        <td class="total">

                            Rp <?= number_format(
                                $data['total'],
                                0,
                                ',',
                                '.'
                            ); ?>

                        </td>

                    </tr>

                <?php endforeach; ?>


            </tbody>

        </table>


    </div>


    <a
        href="registration.php"
        class="back"
    >

        ← Kembali ke Registrasi

    </a>


</div>


</body>

</html>