<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $num1 = rand(0, 10);
    $num2 = rand(0, 10);
    $num3 = rand(0, 10);

    echo 'Los números generados son: ' . $num1 . ', ' . $num2 . ', ' . $num3;
    if ($num1 == $num2) {
        echo 'El número ' . $num1 . ' está repetido';
    } elseif ($num1 == $num3) {
        echo 'El número ' . $num1 . ' está repetido';
    } elseif ($num2 == $num3) {
        echo 'El número ' . $num2 . ' está repetido';
    }

    if ($num1 <= $num2 && $num1 <= $num3) {
        if ($num2 <= $num3) {
            echo 'Los números ordenados son: ' . $num1 . ',' . $num2 . ',' . $num3;
        } else {
            echo 'Los números ordenados son: ' . $num1 . ',' . $num3 . ',' . $num2;
        }
    } elseif ($num2 <= $num1 && $num2 <= $num3) {
        if ($num1 <= $num3) {
            echo 'Los números ordenados son: ' . $num2 . ',' . $num1 . ',' . $num3;
        } else {
            echo 'Los números ordenados son: ' . $num2 . ',' . $num3 . ',' . $num1;
        }
    } elseif ($num3 <= $num1 && $num3 <= $num2) {
        if ($num1 <= $num2) {
            echo 'Los números ordenados son: ' . $num3 . ',' . $num1 . ',' . $num2;
        } else {
            echo 'Los números ordenados son: ' . $num3 . ',' . $num2 . ',' . $num1;
        }
    }
    ?>
</body>

</html>