<?php include('dbcon.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    

    if (isset($_POST['delete_user'])) {

        $id = $_POST['id'];

        $query = "DELETE  from usermaster where id = '$id'";
        $result = mysqli_query($conn, $query);

        if ($result) {

            $response['message']="Data Deleted Successfully";
            $response['status']="200";

        } else {
            $response['message'] = "Error executing query : " . mysqli_error($conn);
            $response['status'] = "201";
        }



    } else {
        $response['message'] = "Invalid tag";
        $response['status'] = "201";
    }


} else {
    $response['message'] = "use only post method";
    $response['status'] = "201";
}

echo json_encode($response);

mysqli_close($conn);

?>