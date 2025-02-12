<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <div class="card mb-2">
            <div class="card-body">
                <?php

                echo "<h5>Cube function</h5>";

                function cube($num)
                {
                    $cube = $num * $num * $num;
                    return $cube;
                }

                echo "Cube = " . cube(5);
                ?>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <?php
                echo "<h5>Multiplication function</h5>";

                function mul($num1, $num2)
                {
                    $multi = $num1 * $num2;
                    return $multi;
                }

                echo "Multiplication = " . mul(3, 5);
                ?>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">

                <?php

                echo "<h5>Odd/Even Number Function</h5>";

                function oddeven($val)
                {
                    if ($val % 2 == 0) {
                        return "Even";
                    } else {
                        return "Odd";
                    }
                }

                echo "Number is = " . oddeven(14);

                ?>
            </div>
        </div>

        <div class="card">
            <div class="card-body ">

                <?php
                echo "<h5>Multiply array elements Function</h5>";
                function multiplyArray($array)
                {
                    $product = 1;
                    foreach ($array as $value) {
                        $product *= $value;
                    }
                    return $product;
                }
                $array = [2, 3, 10];
                $result = multiplyArray($array);
                echo "The product of the array elements is: " . $result;
                ?>

            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body ">

            </div>
        </div>
    </div>
</body>

</html>