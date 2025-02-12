<?php
if (isset($_GET['state'])) {
    $state = $_GET['state'];
    
    // Define cities for each state
    $cities = [
        "Gujarat" => ["Ahmedabad", "Surat", "Vadodara", "Rajkot", "Dang", "Jamnagar", "Bhavnagar", "Gandhinagar", "Porbandar"],
        "Kerala" => ["Thiruvananthapuram", "Kochi", "Kozhikode"],
        "Maharashtra" => ["Mumbai", "Pune", "Nagpur", "Nashik", "Aurangabad", "Solapur"],
        "Delhi" => ["New Delhi", "Noida", "Ghaziabad", "Faridabad", "Gurgaon", "Greater Noida"],
        "Punjab" => ["Ludhiana", "Amritsar", "Jalandhar", "Patiala", "Bathinda", "Moga"],
        "Rajasthan" => ["Jaipur", "Udaipur", "Jodhpur", "Kota", "Ajmer", "Bikaner"],
        "Bihar" => ["Patna", "Gaya", "Muzaffarpur", "Bhagal", "Darbhanga"],
        "Chhattisgarh" => ["Raipur", "Bilaspur", "Durg", "Rajnandga", "Bilaspur"],
        "Karnataka" => ["Bengaluru", "Mysuru", "Hubballi", "Davang", "Belagavi"],
        "Uttarakhand" => ["Dehradun", "Haridwar", "Roorkee", "Haldwani", "Rishikesh"],
    ];

    // Return cities based on state selection
    $response = isset($cities[$state]) ? $cities[$state] : [];
    echo json_encode(["cities" => $response]);
      
}
?>
