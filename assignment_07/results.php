<!DOCTYPE html>
<html>
    <head>
        <title>Results</title>
        <?php
        // Access the text file 
        $data = file_get_contents("results/results.txt");

        // Isolate each character 
        $line = explode("\n", trim($data)); // trim() prevents empty last line issues

        // Generate bar chart
        //print_r($line);

        $bart_results = array();
        $lisa_results = array();
        $homer_results = array();
        $marge_results = array();

        for ($i = 0; $i < sizeof($line); $i++){
            if ($line[$i] == 'bart'){
                array_push($bart_results, $i);
            }
            else if ($line[$i] == 'lisa'){
                array_push($lisa_results, $i);
            }
            else if ($line[$i] == 'homer') {
                array_push($homer_results, $i);
            }
            else if ($line[$i] == 'marge') {
                array_push($marge_results, $i);
            }
        }

        $bart_num = sizeof($bart_results);
        $lisa_num = sizeof($lisa_results);
        $homer_num = sizeof($homer_results);
        $marge_num = sizeof($marge_results);

        print_r($bart_results);
        print_r($lisa_results);
        print_r($homer_results);

        // Calculate total votes for percentage-based widths
        $total_num = $bart_num + $lisa_num + $homer_num + $marge_num;

        if ($total_num > 0) {
            $bart_width = ($bart_num / $total_num) * 100;
            $lisa_width = ($lisa_num / $total_num) * 100;
            $homer_width = ($homer_num / $total_num) * 100;
            $marge_width = ($marge_num / $total_num) * 100;
        } 
        ?>
        
        <style> 

            #bart_r {
                width: <?php echo $bart_width; ?>%;
                background-color: red;
                height: 25px;
                text-align: center;
                color: white;
            }

            #lisa_r {
                width: <?php echo $lisa_width; ?>%;
                background-color: blue;
                height: 30px;
                text-align: center;
                color: white;
            }

            #homer_r {
                width: <?php echo $homer_width; ?>%;
                background-color: purple;
                height: 30px;
                text-align: center;
                color: white;
            }

            #marge_r {

            width: <?php echo $marge_width; ?>%;
                background-color: green;
                height: 30px;
                text-align: center;
                color: white;
            
            }
        </style>
    </head>

    <body>
        <h1>Results</h1>

        <div class="bar" id="bart_r"><?php echo round($bart_width); ?>% Bart</div>
        <div class="bar" id="lisa_r"><?php echo round($lisa_width); ?>% Lisa</div>
        <div class="bar" id="homer_r"><?php echo round($homer_width); ?>% Homer </div>
        <div class="bar" id="marge_r"><?php echo round($marge_width); ?>% Marge </div>
        <div style='text-align: center; font-family: Arial;'>
        <br>
        <br>
        <br>
        <a href='index.php'>
        <button>Play again?</button>
        </a>
    </div>
    </body>
</html>
