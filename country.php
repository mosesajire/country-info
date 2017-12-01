 <?php
        if(!empty($_GET['country'])) {
        $country = urlencode($_GET['country']);
        $country_url = "https://restcountries.eu/rest/v2/name/$country";
        $country_json = file_get_contents($country_url);
        $country_array = json_decode($country_json, true);
        // Then obtain the data
        $countryname = $country_array[0]['name'];
        $callingcode = $country_array[0]['callingCodes'][0];
        $capital= $country_array[0]['capital'];
        $region= $country_array[0]['region'];
        $subregion= $country_array[0]['subregion'];
        $population= $country_array[0]['population'];
        $latitude= $country_array[0]['latlng'][0];
        $longitude= $country_array[0]['latlng'][1];
        $people= $country_array[0]['demonym'];
        $landarea= $country_array[0]['area'];
        $currency_code= $country_array[0]['currencies'][0]['code'];
        $currency_name= $country_array[0]['currencies'][0]['name'];
        $currency_symbol= $country_array[0]['currencies'][0]['symbol'];
        $flag= $country_array[0]['flag'];
        if (empty($countryname) || !isset($countryname)) {
            $info = "Sorry, an error occurred while processing your request.<br>Please try again.<br>Thank you.<br>";
        }
        }
        ?>
        
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Welcome to Country Info Spot</title>      
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keyword" content="Country, Africa, Asia, Continent, Europe, America, 'North America', 'South America', Australia">
        <meta name="description" content="This program displays the details of the country typed by the user.">
        <meta name="author" content="Moses Ajireloja">
        <link rel="stylesheet" href="../style.css" type="text/css" media="all">
    </head>
    
     <body>
        <div id="container">
        <h2 class="title">COUNTRY INFO APP</h2>
        <p class="welcome">
        Welcome to Country Info App. This app displays some information about any country in the world. Simply type a country name.
        </p>
        <!-- Display the Input Form by default -->
            <form action="" class="form">
                Enter a Country:
                <input type="text" name="country" required="required"><br>
                <button type="submit" class="button">Display Info</button>
                <input type="reset" name="Reset"  value="Reset" class="button">
            </form>
            
            <div id="result">
                <p class="title">Info of <?php if (!empty($country)) {echo urldecode($country);} else {echo "Country";} ?></p>
           <?php
           if(!empty($countryname)) {
            echo "Country: " . $countryname . "<br>";
            echo "Capital: " . $capital . "<br>";
            echo "Region: " . $region . "<br>";
            echo "Subregion: " . $subregion . "<br>";
            echo "Population: " . number_format($population) . "<br>";
            echo "Land Area: " . $landarea . " sq km" . "<br>";
            echo "People: " . $people . "<br>";
            echo "Calling Code: " . $callingcode . "<br>";
            echo "Currency: " . $currency_name . " (" . $currency_code . ")" . "<br>";
            echo "Currency Symbol: " . $currency_symbol . "<br>";
            echo "Flag: " . "<br>" . "<img src='$flag' title='Flag of $country' alt='Flag of $country' width='150px' height='150px'>" . "<br>";
           } else {
                if (isset($info)) {
                    echo $info;
                } else {
               echo "Please enter a country to display some information.";
                 }
           }
           ?>
        </div>
        </div>
    </body>
</html>
