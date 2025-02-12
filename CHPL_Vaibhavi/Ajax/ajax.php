<?php

$country = array(
    "India" => array(
        "Gujarat" => array("Ahmedabad", "Surat", "Vadodara"),
        "Maharashtra" => array("Mumbai", "Pune", "Nagpur"),
        "Rajasthan" => array("Jaipur", "Jodhpur", "Udaipur"),
        "Tamil Nadu" => array("Chennai", "Coimbatore", "Madurai"),
        "Kerala" => array("Thiruvananthapuram", "Kochi", "Kozhikode")
    ),
    "USA" => array(
        "California" => array("Los Angeles", "San Diego", "San Jose"),
        "Florida" => array("Miami", "Tampa", "Orlando"),
        "New York" => array("New York City", "Buffalo", "Rochester"),
        "Texas" => array("Houston", "San Antonio", "Dallas"),
        "Washington" => array("Seattle", "Spokane", "Tacoma")
    ),
    "UAE" => array(
        "Abu Dhabi" => array("Abu Dhabi City", "Al Ain", "Liwa Oasis"),
        "Ajman" => array("Ajman City", "Masfout", "Manama"),
        "Dubai" => array("Dubai City", "Hatta", "Jebel Ali"),
        "Sharjah" => array("Sharjah City", "Khor Fakkan", "Dibba Al-Hisn"),
        "Fujairah" => array("Fujairah City", "Dibba Al-Fujairah", "Masafi")
    ),
    "Canada" => array(
        "Ontario" => array("Toronto", "Ottawa", "Mississauga"),
        "Quebec" => array("Montreal", "Quebec City", "Laval"),
        "British Columbia" => array("Vancouver", "Victoria", "Surrey"),
        "Alberta" => array("Calgary", "Edmonton", "Red Deer"),
        "Nova Scotia" => array("Halifax", "Sydney", "Truro")
    ),
    "Australia" => array(
        "New South Wales" => array("Sydney", "Newcastle", "Wollongong"),
        "Victoria" => array("Melbourne", "Geelong", "Ballarat"),
        "Queensland" => array("Brisbane", "Gold Coast", "Cairns"),
        "South Australia" => array("Adelaide", "Mount Gambier", "Port Augusta"),
        "Western Australia" => array("Perth", "Bunbury", "Geraldton")
    )
);

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'getState':
            $country_name = $_POST['country_name'];
            $html = '<option value="">--Select State--</option>';
            foreach ($country[$country_name] as $state_name => $cities) {
                $html .= '<option value="'.$state_name.'">'.$state_name.'</option>';
            }
            echo $html;
            break;
        case 'getCity':
            $country_name = $_POST['country_name'];
            $state_name = $_POST['state_name'];
            $html = '<option value="">--Select City--</option>';
            foreach ($country[$country_name][$state_name] as $city) {
                $html .= '<option value="'.$city.'">'.$city.'</option>';
            }
            echo $html;
            break;
    }
}

?>