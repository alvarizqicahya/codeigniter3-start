<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
    <h5 class="text-center"><?= $title ?></h5>
    <h6 class="text-center">s-code </h6>
    <br>

    <table class="table table-bordered " style="font-size: 11px;">
        <thead>
            <tr>
                <th class="text-center" style="width: 20px;">#</th>
                <th class="text-center">NAMA</th>
                <th class="text-center">CREATED AT</th>
                <th class="text-center">UPDATED AT</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            if (!$rows) {
                echo ' <tr>
                                <td class="text-center" colspan="6">
                                    <p>Data Kosong</p>
                                </td>
                                </tr>';
            } else {
                foreach ($rows as $row) {
                    echo '<tr><th class="text-center" scope="row">' . $no . '</th>';
                    echo '<td>' . $row->nama_user . '</td>';
                    echo '<td>' . date("Y-m-d H:i:s", $row->created_at) . '</td>';
                    echo '<td>' . date("Y-m-d H:i:s", $row->updated_at) . '</td>';
                    $no++;
                }
            }
            ?>
        </tbody>
    </table>

</body>

</html>