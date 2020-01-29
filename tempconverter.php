<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <div class="maincontainer">

            <?php
            // tempconverter.php

            // $FormSubmitted
            // var to change display style of converted temperatures and iframe
            // initialize to "none" because we don't want to show conversions or iframe until submitted
            $FormSubmitted = "none";

            if (isset($_POST["Temperature"])) {

                // form has been submitted, show converted temperatures and iframe
                $FormSubmitted = "block";

                // $InputTemp and $InputUnit
                // stores the POSTed user-input temperature and selected temperature unit
                $InputTemp = $_POST["Temperature"];
                $InputUnit = $_POST["FromTempUnit"];
                
                // Convert $InputTemp based on $InputUnit
                // Sets variables $ftemp (Fahrenheit), $ctemp (Celsius), $ktemp (Kelvin), and $rtemp (Rankine)
                // to converted values. Since Kelvin is just Celsius + 273.15 and Rankine is just Fahrenheit
                // + 459.67, we only need to convert to Celsius or Fahrenheit and add these values depending on
                // $InputUnit.
                if ($InputUnit === "Fahrenheit") {
                    $ftemp = $InputTemp;
                    $ctemp = convertToC($InputTemp);
                    $ktemp = convertToC($InputTemp) + 273.15;
                    $rtemp = $InputTemp + 459.67;
                } else if ($InputUnit === "Celsius") {
                    $ftemp = convertToF($InputTemp);
                    $ctemp = $InputTemp;
                    $ktemp = $InputTemp + 273.15;
                    $rtemp = convertToF($InputTemp) + 459.67;
                } else if ($InputUnit === "Kelvin") {
                    $ftemp = convertToF($InputTemp - 273.15);
                    $ctemp = $InputTemp - 273.15;
                    $ktemp = $InputTemp;
                    $rtemp = convertToF($InputTemp - 273.15) + 459.67;
                } else if ($InputUnit === "Rankine") {
                    $ftemp = $InputTemp - 459.67;
                    $ctemp = convertToC($InputTemp - 459.67);
                    $ktemp = convertToC($InputTemp - 459.67) + 273.15;
                    $rtemp = $InputTemp;
                }
            }
            
            // Show form. This is shown whether the form has been submitted or not, to allow for another form input
            echo '
            <form action="" method="POST">
                <h1>Temperature Converter</h1>
                <h3>Enter Temperature: <br><input class="tempinput" type="number" name="Temperature" /></h3>
                <input type="radio" name="FromTempUnit" value="Fahrenheit" checked> Fahrenheit
                <input type="radio" name="FromTempUnit" value="Celsius"> Celsius
                <input type="radio" name="FromTempUnit" value="Kelvin"> Kelvin
                <input type="radio" name="FromTempUnit" value="Rankine"> Rankine
                <p></p>
                <input type="submit" id="convert" value="Convert"/>
            </form>
            ';

            // Convert $t to Fahrenheit
            function convertToF($t) {
                return ($t * 9 / 5) + 32;
            }

            // Convert $t to Celsius
            function convertToC($t) {
                return ($t - 32) * 5 / 9;
            }

            // Creates script object and prints input x to console for debugging
            function cons($x) {
                echo '
                <script> console.log({$x}); </script>
                ';
            }
            ?>
            
            <p><em>Note: Values are rounded to the nearest hundredth decimal place after conversion.</em></p>

            
            <div id="conversions">

                <div class="unitInfo">
                    <p><strong>Your Input: <?php if (isset($InputTemp) && isset($InputUnit)) echo $InputTemp . '&deg; ' . $InputUnit; ?></strong></p>
                </div>

                <br>

                <div class="unitInfo">
                    <a href="https://en.wikipedia.org/w/index.php?title=Fahrenheit&printable=yes" target="iframe_a" id="f">Fahrenheit: <?php if (isset($ftemp)) echo round($ftemp, 2); ?>&deg;F</a>
                </div>

                <br>

                <div class="unitInfo">
                    <a href="https://en.wikipedia.org/w/index.php?title=Celsius&printable=yes" target="iframe_a" id="c">Celsius: <?php if (isset($ctemp)) echo round($ctemp, 2); ?>&deg;C</a>
                </div>

                <br>

                <div class="unitInfo">
                    <a href="https://en.wikipedia.org/w/index.php?title=Kelvin&printable=yes" target="iframe_a" id="k">Kelvin: <?php if (isset($ktemp)) echo round($ktemp, 2); ?>&deg;K</a>
                </div>

                <br>

                <div class="unitInfo">
                    <a href="https://en.wikipedia.org/w/index.php?title=Rankine_scale&printable=yes" target="iframe_a" id="r">Rankine: <?php if (isset($rtemp)) echo round($rtemp, 2); ?>&deg;Ra</a>
                </div>

                <div id="iframecontainer">
                    <iframe name="iframe_a" srcdoc="<h3>For more information please select one of the temperature links above:</h3>"></iframe>
                </div>
            </div>

        </div>
    </body>

    <script>

        // Setting the display of the "conversions" div based on Boolean of whether form has been submitted
        // could be done inline with css/php but we'll just do it here with JS

        document.getElementById("conversions").style.display = "<?php echo $FormSubmitted; ?>";

        // document.getElementById("convert").onclick = function() {
        //     document.getElementById("conversions").style.display = "block";
        // };
    </script>
</html>