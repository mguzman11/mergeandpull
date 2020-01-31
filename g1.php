
 <?php
// Martin adds h1 tag to top of page.
<h1>Tempurature Conversions</h1>
//group project 1
if(isset($_POST["convert"])){
    //get value of user's input
    $degree =  $_POST ['degree'];
    $choice =  $_POST ['choice'];
    //check if it's empty
    if(empty($degree)) {
        echo 'Please enter degree to convert!';
        //check if it's numeric
    }else if (!is_numeric($degree)){
        echo 'Please enter valid degree!';
    }else{
        //do actions according to user's choices
        switch ($choice)
        {
            case "fc":
                $value = number_format(5/9 * ($degree - 32), 2);
                echo $degree . '&deg Fahrenheit = ' . $value . '&deg Celsius';
                break;
            case "cf":
                $value = number_format(9/5 * $degree + 32, 2);
                echo $degree . '&deg Celsius = ' . $value . '&deg Fahrenheit';
                break;
            case "fk":
                $value = number_format(5/9 * ($degree - 32) + 273.15, 2);
                echo $degree . '&deg Fahrenheit = ' . $value . '&deg Kelvin';
                break;
            case "kf":
                $value = number_format(($degree - 273.15) * 9/5 + 32, 2);
                echo $degree . '&deg Kelvin = ' . $value . '&deg Fahrenheit';
                break;
            case "ck":
                $value = number_format($degree + 273.15, 2);
                echo $degree . '&deg Celsius = ' . $value . '&deg Kelvin';
                break;
            case "kc":
                $value = number_format($degree - 273.15, 2);
                echo $degree . '&deg Kelvin = ' . $value . '&deg Celsius';
                break;
            default:
                echo 'Please select a convert option!';
                break;
        }

    }
    
}else{
    // get user input using a form
    echo '
        <form action="" method="POST">
            Please enter degrees to convert:<input type="text" name="degree" /><br />
            <fieldset>
                <legend>Please select an option to convert degrees</legend>
                <p><input type="radio" name="choice" value="fc" />Fahrenheit to Celsius<br /></p>
                <p><input type="radio" name="choice" value="cf" />Celsius to Fahrenheit<br /><br /></p>
                <p><input type="radio" name="choice" value="fk" />Fahrenheit to Kelvin<br /></p>
                <p><input type="radio" name="choice" value="kf" />Kelvin to Fahrenheit<br /><br /></p>
                <p><input type="radio" name="choice" value="ck" />Celsius to Kelvin<br /></p>
                <p><input type="radio" name="choice" value="kc" />Kelvin to Celsius<br /><br /></p>
            </fieldset>
            <p><input type="submit" name="convert" value="Convert" /></p>
            <br /><br /><a href="https://docs.google.com/document/d/1X8vZvMHgvqR6yFRKa5bvprdZBvr_j85GSnMqvEVPHik/edit">Project Document</a></button>
        </form>
    ';
};

