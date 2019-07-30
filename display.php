<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
<table border="0">
    <caption><h1>Danh sach khach hang</h1></caption>
    <tr>
        <th>Ten</th>
        <th>Ngay sinh</th>
        <th>Dia chi</th>
        <th>Anh</th>
    </tr>
    <?php
    $myFile = "listCustomer.json";
    $customersLists = array();
    try {
        $formData = array(
            "ten" =>$name = $_POST['name'],
            "ngaysinh" => $date = $_POST['date'],
            "diachi" =>$address = $_POST['address'],
            "anh" => $image = $_POST['image'],
        );
        $jsondata = file_get_contents($myFile);
        $customersLists = json_decode($jsondata, true);
        array_push($customersLists, $formData);
        $jsondata = json_encode($customersLists, JSON_PRETTY_PRINT);
        if (file_put_contents($myFile, $jsondata)) {
            echo 'Data successfully saved <br/>';
        } else {
            echo "error";
        }
    } catch (Exception $e) {
        echo 'Caught Exception :', $e->getMessage(), "</br>";
    }

    ?>
    <?php
//            var_dump($customersLists);
    foreach ($customersLists as $customers):?>
        <!--        --><?php //var_dump($customer);
        ?>
        <tr>
            <td><?php echo $customers['ten'] ?></td>
            <td><?php echo $customers['ngaysinh'] ?></td>
            <td><?php echo $customers['diachi'] ?></td>
            <td><img src="<?php echo $customers['anh'] ?>" alt="" width="60px" height="60px"></td>
        </tr>
    <?php endforeach;
    ?>
</table>
</body>
</html>
