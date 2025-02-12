<!-- Write a program to convert the given string into an array. Suppose the string is -
$a = 'Burch Jr, Philip H., The American establishment, Research in political
economy 6(1983), 83-156'; -->

<html>
<body>
    <?php
        $a =  'Burch Jr, Philip H., The American establishment, Research in political economy 6(1983), 83-156';
        echo $a;
        echo "<br>";
        echo "<br>";
        $word= explode(',', $a);
        print_r($word);
    ?>
</body>
</html>