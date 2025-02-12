<?php
// echo"hii";
if (isset($_POST["states"]) && $_POST["states"] != "") {
    if ($_POST["states"] == "India") {
        // echo "Hello";
        $states = array(
            "---Select---",
            "Andhra Pradesh",
            "Arunachal Pradesh",
            "Assam",
            "Bihar",
            "Chhattisgarh",
            "Goa",
            "Gujarat",
            "Haryana",
            "Himachal Pradesh",
            "Jammu and Kashmir",
            "Andhra Pradesh",
            "Karnataka",
            "Kerala",
            "Madhya Pradesh",
            "Maharashtra",
            "Manipur",
            "Meghalaya",
            "Mizoram",
            "Nagaland",
            "Odisha",
            "Punjab",
            "Rajasthan",
            "Sikkim",
            "Tamil Nadu",
            "Telangana",
            "Tripura",
            "Uttarakhand",
            "Uttar Pradesh",
            "West Bengal"
        );
        $states = array_map('ucwords', $states);
        foreach ($states as $state) {
            echo "<option>$state</option>";
        }
        // $states = array_map('ucwords', $states);

        // print_r($states);
    } elseif ($_POST['states'] == 'USA') {
        $states = array(
            "---Select---",
            'California',
            'Florida',
            'New York',
            'Texas',
            'Illinois',
            'Ohio',
            'Georgia',
            'North Carolina',
            'Pennsylvania',
            'Michigan',
            'New Jersey',
            'Virginia',
            'Washington',
            'Arizona',
        );
        $states = array_map('ucwords', $states);
        // print_r($states);
        foreach ($states as $usa) {
            echo "<option>$usa</option>";
        }
    } elseif ($_POST['states'] == 'UK') {
        $states = array(
            "---Select---",
            'Germany',
            'Italy',
            'Spain',
            'Poland',
            'Sweden',
            'Denmark',
            'Norway',
            'Portugal',
            'Belgium',
            'Netherlands',
            'Austria',
        );
        $states = array_map('ucwords', $states);
        // print_r($states);
        foreach ($states as $uk) {
            echo "<option>$uk</option>";
        }
    } elseif ($_POST['states'] == 'Africa') {
        $states = array(
            "---Select---",
            'Captown',
            'Egypt',
            'Morocco',
            'Nigeria',
        );
        $states = array_map('ucwords', $states);
        // print_r($states);
        foreach ($states as $africa) {
            echo "<option>$africa</option>";
        }
    }
}
