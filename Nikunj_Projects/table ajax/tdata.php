
<?php
if (isset($_POST["status"]) && $_POST["status"] != "") {

    if ($_POST["status"] == "india") {
        echo "<option>Gujarat</option>";
        echo "<option>Goa</option>";
        echo "<option>Rajasthan</option>";
        echo "<option>Bihar</option>";
    } else if ($_POST["status"] == "usa") {
        echo "<option>California</option>";
        echo "<option>Colorado</option>";
        echo "<option>Maryland</option>";
        echo "<option>Alabama</option>";
        echo "<option>Alaska</option>";
    } else if ($_POST["status"] == "uk") {
        echo "<option>London</option>";
        echo "<option>Laister</option>";
        echo "<option>Edinburgh</option>";
        echo "<option>cardiff</option>";
        echo "<option>Belfast</option>";
    } else {
        echo "not connect";
    }
}

?>