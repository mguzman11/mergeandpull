<?php
//temp.php
?>

<html>
<style>
body {
    background-color: lightblue;}

h1   {
    color: black;
    text-align: center;
    padding: 1em;
    }
    
p    {
    color: black;
    text-align: center;
    padding: 4em;
    font-size: 18; 
    }
    
}
    
</style>
    <body>

<?php
        if(isset($_POST["Submit"]))

            {//show data

                $temp = $_POST ['Temp'];

                $tempcon = $_POST ['Conversion'];



            if(empty($temp) || !is_numeric($temp))

            {
                echo 'You must enter a numeric value!';

            }else{
                // Convert F to C
                function ftoc ($temp){
                    $newtemp = 5/9 * ($temp - 32);       
                    return $newtemp;
                }
                // Convert C to F
                function ctof ($temp){
                    $newtemp = (9/5 * $temp) + 32;
                    return $newtemp;
                }
                //Convert F to K
                function ftokl ($temp){
                    $newtemp = 5/9 * ($temp - 32) + 273.15;
                    return $newtemp;
                }
                // Convert K to F
                function ktof ($temp){
                    $newtemp = ($temp - 273.15) * 9/5 + 32;
                    return $newtemp;
                }
                // Convert C to K
                function ctok ($temp){
                    $newtemp = $temp + 273.15;
                    return $newtemp;
                }
                // Convert K to C
                function ktoc ($temp){
                    $newtemp = $temp - 273.15;
                    return $newtemp;
                }

                switch ($tempcon)

                {

                    case "ftoc":

                        echo $temp . '&deg Fahrenheit = ' . ftoc($temp) . '&deg Celsius.';

                        break;

                    case "ctof":

                        echo $temp . '&deg Celsius = ' . ctof($temp) . '&deg Fahrenheit.';

                        break;

                    case "ftokl":

                        echo $temp . '&deg Fahrenheit = ' . ftokl($temp) . '&deg Kelvin.';

                        break;

                    case "ktof":

                        echo $temp . '&deg Kelvin = ' . ktof($temp) . '&deg Fahrenheit.';

                        break;

                    case "ctok":

                        echo $temp . '&deg Celsius = ' . ctok($temp) . '&deg Kelvin.';

                        break;

                    case "ktoc":

                        echo $temp . '&deg Kelvin = ' . ktoc($temp) . '&deg Celsius.';

                        break;

                    default:

                        echo 'You must select a conversion type!';

                        break;
                }

            }

                echo '<br /> Please use the browser&#8217s back button to do more conversions';

        }else{//show form

                echo '
                <h1> Temperature Conversion </h1></br>

                <form action="" method="post">

                    Enter number of degrees: <input type="text" name="Temp" /><br /><br />

                    <label>

                    Convert from:<br />

                    <label><input type="radio" name="Conversion" value="ftoc" />Fahrenheit to Celsius</label><br />

                    <label><input type="radio" name="Conversion" value="ctof" />Celsius to Fahrenheit</label><br /><br />

                    <label><input type="radio" name="Conversion" value="ftokl"/>Fahrenheit to Kelvin</label><br />

                    <label><input type="radio" name="Conversion" value="ktof" />Kelvin to Fahrenheit</label><br /><br />

                    <label><input type="radio" name="Conversion" value="ctok" />Celsius to Kelvin</label><br />

                    <label><input type="radio" name="Conversion" value="ktoc" />Kelvin to Celsius</label><br /><br />

                    </label>

                    <input type="submit" name="Submit" value="Submit">

                </form>

                ';

            }

            ?>

    </body>
<footer>
      <small>&copy; 2020, All Rights Reserved
      </small>
    </footer>
</html>