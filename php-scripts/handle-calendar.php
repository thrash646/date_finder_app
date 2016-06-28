<?php
function printCalendar(){
    $success = false;
     $scoop_html ="";

    if( (isset($_POST["months"]) && $_POST["months"] !== "default") &&
        (isset($_POST["days"]) && $_POST["days"] !== "default") &&
        (isset($_POST["years"]) && $_POST["years"] !== "default") ){
        
        $success = true;
        
    }

    $months = array("January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December");
    
    echo "<div class=\"form-box\">";
    echo "<select name=\"months\">";
    echo "<option value=\"default\">Select Month</option>";
    for($i=0; $i<sizeof($months); $i++){
        echo "<option " . ( $_POST["months"]==$months[$i] && !$success ? 'selected="true"' : "" ) . ">" . $months[$i] . "</option>";
    }
    echo "</select>";
    echo "</div>";

    echo "<div class=\"form-box\">";
    echo "<select name=\"days\">";
    echo "<option value=\"default\">Select Day</option>";
    for($i=1; $i<=31; $i++){
        echo "<option " . ( $_POST["days"]==$i && !$success ? 'selected="true"' : "" ) . ">" . $i . "</option>";
    }
    echo "</select>";
    echo "</div>";

    echo "<div class=\"form-box\">";
    echo "<select name=\"years\">";
    echo "<option value=\"default\">Select Year</option>";
    for($i=date("Y"); $i>=1900; $i--){
        echo "<option " . ( $_POST["years"]==$i && !$success ? 'selected="true"' : "" ) . ">" . $i . "</option>";
    }
    echo "</select>";
    echo "</div>";
      
}

function evaluate(){
    
    $err = "";
    if(isset($_POST["send"])){

        if(trim($_POST["months"]) && $_POST["months"] != "default"){
            $_POST["months"] = trim(strip_tags($_POST["months"]));
            $m = $_POST["months"];
            
        } else {
            $err = "<p>- Please select a month.</p>";
        }

        if(trim($_POST["days"]) && $_POST["days"] != "default"){
            $_POST["days"] = trim(strip_tags($_POST["days"]));
            $d = $_POST["days"];
        } else {
            $err .= "<p>- Please select a day.</p>";
        }

        if(trim($_POST["years"]) && $_POST["years"] != "default"){
            $_POST["years"] = trim(strip_tags($_POST["years"]));
            $y = $_POST["years"];
        } else {
            $err .= "<p>- Please select a year.</p>";
        }
        if(!empty($m) && !empty($d) && !empty($y)){
			
            $feed ="<div class=\"summary\"><h2>Summary of choices:</h2>" . "<p>- You have selected: $m $d, $y.</p>";
			if ($y >= 1900 && $y <= 1946) {
                $feed .= "<p>- You have chosen the <span style=\"font-weight:700;\">'MATURES'</span> generation.</p>";
                $query = "SELECT spec_name, spec_img, spec_content
                         FROM sport_dob
                         WHERE spec_type = 'M'";
            }
			elseif ($y >= 1947 && $y <= 1965) {
                $feed .= "<p>- You have chosen the <span style=\"font-weight:700;\">'Baby Boomers'</span> generation.</p>";
                $query = "SELECT spec_name, spec_img, spec_content
                         FROM sport_dob
                         WHERE spec_type = 'B'";
            }
			elseif ($y >= 1966 && $y <= 1980) {
                $feed .= "<p>- You have chosen <span style=\"font-weight:700;\">'GENERATION X'</span>.</p>";
                $query = "SELECT spec_name, spec_img, spec_content
                         FROM sport_dob
                         WHERE spec_type = 'X'";
            }
			elseif ($y >= 1981 && $y <= 2000){
                $feed .= "<p>- You have chosen the <span style=\"font-weight:700;\">'Millenials'</span> generation.</p>";
                $query = "SELECT spec_name, spec_img, spec_content
                         FROM sport_dob
                         WHERE spec_type = 'Y'";
            } else {
                $err .= "<p>- We're sorry, there doesn't appear to be any data for this generation. Please try again.</p>";
                $query = "";
            }
            if ($y <= 2000) {
                $result =mysqli_query($GLOBALS['conn'],$query);
                $feed .= "</div>";
                $scoop_html ="<div class=\"wrapper\">"; 
                    while($row = mysqli_fetch_assoc($result)){
                        $scoop_html .= "<div class= 'data-container'>";
                        foreach($row as $k => $v) {
                            if($k =="spec_name") {
                                $scoop_html .=  "<div class='wrap'><h3>$v</h3>";
                            }
                            else if ($k =="spec_img") {
                                $scoop_html .=  "<img src=\"$v\">";
                            }
                            else {
                                 $scoop_html .=  "<p class=\"content\">$v</p></div>";
                            } 
                        }
                        $scoop_html .="</div>";
                    }
                $scoop_html .="</div>";  
            }
            
        }
    }
    if(isset($err) && $err !== ""){
        echo "<div class=\"errors\"><h2>Errors:</h2>".$err."</div>";
    }
    
    if(isset($feed)){
        echo $feed;
    }
    
    
	
    if(isset($scoop_html)){
        echo $scoop_html;
    }
}

?>