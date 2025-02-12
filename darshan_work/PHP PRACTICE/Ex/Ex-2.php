<!-- Write a division table program in PHP using for loop. -->

<html>
<body>
<table border="5">
    <tr>
        <th>Dividend</th>
        <th>Divisor</th>
        <th>Answer</th>
    </tr>
    <?php 
    $dividend = 1;
    $divisor = 2;
    for ($dividend = 0; $dividend <= 10; $dividend++) {
        $answer = $dividend / $divisor;
        ?>
        <tr>
            <td><?php echo $dividend; ?></td>
            <td><?php echo $divisor; ?></td>
            <td><?php echo $answer; ?></td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>
