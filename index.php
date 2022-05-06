<html>
    <title>Bishal Shrestha</title>
    <body>

    <?php
        echo "<center><h2>Grepsr Written Assessment</h2></center>";
        echo "<center>By: Bishal Shrestha</center>";
        function displayArray($arr){
            foreach($arr as $values){
                echo "$values"." ";
            }
        }
    ?>


    <?php
        echo "<hr><h3>Task 1: Ascending and Descending Order.</h3>";
        // Task 1 : ascending and decending
        $a = [3, 1, 5, 13, 18, 2, 4];
        echo "Array: ";
        displayArray($a);

        // Function that returns array in ascending order
        function ascending($arry){
            $arr = $arry;
            for ($i=0; $i<count($arr); $i++){
                for ($j=$i; $j<count($arr); $j++){
                    if ($arr[$j] <= $arr[$i] ){
                        $temp = $arr[$i];
                        $arr[$i] = $arr[$j];
                        $arr[$j] = $temp;
                    }
                }
            }
            return ($arr);
        }

        // Function that returns array in descending order
        function descending($arry){
            $arr = $arry;
            for ($i=0; $i<count($arr); $i++){
                for ($j=$i; $j<count($arr); $j++){
                    if ($arr[$j] >= $arr[$i] ){
                        $temp = $arr[$i];
                        $arr[$i] = $arr[$j];
                        $arr[$j] = $temp;
                    }
                }
            }
            return ($arr);
        }
        
        // Display the results
        echo "<br><br>Using Manual Method: ";
        echo "<br>Ascending Order: ";
        $assend = ascending($a);
        displayArray($assend);

        echo "<br>Descending Order: ";
        $descend = descending($a);
        displayArray($descend);

    ?>


    <?php
        echo "<hr><h3>Task 2: In numbers 1 to 500, print numbers divisible by 5.</h3>";
        // Task 2: In numbers 1 to 500, print numbers divisible by 5.
        function printDivBy5(){
            echo "In numbers 1 to 500, print numbers divisible by 5:<br>";
            for($i = 1; $i<=500; $i++){
                if (($i % 5) == 0){
                    echo "$i"." ";
                }
            }
        }
        printDivBy5();
    ?>


    <?php
        echo "<hr><h3>Task 3: Find common elements in array a and array b.</h3>";
        // Task 3: a = [‘a’, ‘c’, ‘d’, ‘g’, ‘i’], b = [‘x’, ‘z’, ‘n’, ‘k’, ‘d’, ‘l’, ‘a’, ‘m’, ‘n’], Find common elements in array a and array b.
        
        // Given array
        $a = array('a', 'c', 'd', 'g', 'i');
        $b = array('x', 'z', 'n', 'k', 'd', 'l', 'a', 'm', 'n');
        
        // Method 1
        function commonElementMethod1($a, $b){
            return(array_intersect($a, $b));
        }
        $c = commonElementMethod1($a, $b);
        echo "Common Elements using default method: ";
        displayArray($c);

        // Method 2
        function commonElementMethod2($a, $b){
            $result = array();
            foreach($a as $value){
                if(in_array($value,$b)){
                    $result[] = $value;
                }
            }
            return($result);
        }
        $c = commonElementMethod2($a, $b);
        echo "<br>Common Elements using manual method: ";
        displayArray($c);
    ?>


    <?php
        echo "<hr><h3>Task 4: Create a CSV file with the following headers and insert at least one sample data.</h3>";
        // Task 4: Create a CSV file with the following headers and insert at least one sample data
        
        // Creating .csv file.
        $fileName = 'grepsr.csv';
        $f = fopen($fileName, 'w');
        $header = ['Name', 'Phone', 'Email', 'Address'];
        fputcsv($f, $header);
        fclose($f);
        echo $fileName.".csv created";

        // Inserting one sample data.
        $f = fopen($fileName, 'a');
        $sampleData = ['Bishal', '9860476106', 'officialbishal@gmail.com', 'Kathmandu'];
        fputcsv($f, $sampleData);
        fclose($f);
        echo "<br>sample data appended";
    ?>

    
    <?php
        echo "<hr><h3>Task 5: Split names in an array by “First name”, “Middle name”, “Last name”.</h3>";
        // Task 5: [“Trapper Wolf”, “Cara Dune”, “Bo-Katan Kryze”, “Paul Sun-Hyung Lee”, “Dee Bradley Baker”]
        // Split names in an array by “First name”, “Middle name”, “Last name”

        // Given name list
        $nameList = ['Trapper Wolf', 'Cara Dune', 'Bo-Katan Kryze', 'Paul Sun-Hyung Lee', 'Dee Bradley Baker'];
        
        // Function to split the name to desired sections.
        function split_name($string) {
            $words = explode(' ', $string);
            $num = count($words);
            $first_name = $middle_name = $last_name = null;
            if ($num == 1){
                $first_name = $words[0];
            }
            else if ($num == 2){
                $first_name = $words[0];
                $last_name = $words[1];
            }
            else if ($num == 3){
                $first_name = $words[0];
                $middle_name = $words[1];
                $last_name = $words[2];
            }
            else if($num>3){
                $firstname = $words[0];
                $middlename = $words[1];
                $lastname = str_replace(array( $first_name,$middle_name ),"", implode(' ',$words));
                $lastname = trim($last_name);
            }
            return (array('First name'=>$first_name,'Middle name'=>$middle_name,'Last name'=>$last_name ));
        }

        // Call split_name function for every element of the given name list
        foreach($nameList as $names){
            $result = split_name($names);
            foreach($result as $key => $value) {
                echo "$key: $value<br>";
            }
            echo "<br>";
        }
    ?>


    <?php
        echo "<hr><h3>Task 6: Remove the letter “a” (not “A”) from each element of an array.</h3>";
        // [“Maeve Millay”, “Bernard Lowe”, “Dolores Abernathy”, “Charlotte Hale”]. Remove the letter “a” (not “A”) from each element of an array.
        
        // Given array
        $nameList = ['Maeve Millay', 'Bernard Lowe', 'Dolores Abernathy', 'Charlotte Hale'];

        // Function to replace 'a' by ''
        function strip_special_chars($v){
            return str_replace('a','',$v);
        }

        // Call the function with array_map
        $results =array_map('strip_special_chars', $nameList);
        
        // Display the result
        echo "Result: ";
        displayArray($results);
        print ("<pre>");
        print_r($results);
        print ("</pre>");
    ?>


    <?php
        echo "<hr><h3>Task 7: Check Password.</h3>";
        
        // Function to apply the given conditions
        function checkPassword($password){
            // Using regular expression for conditions
            $number    = preg_match('@[0-9]@', $password);
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $special   = preg_match('@[^\w]@', $password);
            
            if( strlen($password) < 8 ||  strlen($password) > 14 || !$number || !$uppercase || !$lowercase || !$special) {
                return 0;
            }
            else{
                return 1;
            }
        }

        // Test cases of the function
        $password = 'abcDeF1as@';
        echo "Password: $password<br>Return: ".checkPassword($password);
        
        $password2 = 'abcDeF1as';
        echo "<br><br>Password: $password2<br>Return: ".checkPassword($password2);
    ?>


    <?php
        echo "<hr><h3>Task 8: The sum of all the numbers between 1 to y and is divisible by x.</h3>";
        
        // Function to perform operation
        function conditionSumDivide($x, $y){
            $sum = 0;
            for ($i = 1; $i<=$y; $i++){
                if (($i % $x) == 0){
                    $sum += $i;
                }
            }
            return $sum;
        }

        // Initialization of variables
        $x = 2;
        $y = 5;

        // Call the function
        $result = conditionSumDivide($x, $y);

        // Echo the result
        echo "The sum of all the numbers between 1 to $y and is divisible by $x: ".$result;
    ?>


    <?php
        echo "<hr><h3>Task 9: Reverse the “Specialties” order and remove all ‘null’ or empty key strings, from JSON.</h3>";
        
        // URL to json data
        $url = 'data.json';

        // Recursion function to remove null values
        function array_filter_recursive($input){
            foreach ($input as &$value){
                if (is_array($value)){
                    $value = array_filter_recursive($value);
                }
            }
            return array_filter($input);
        }

        // Get the json file
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        $filteredData = array_filter_recursive($data);

        // Apply reverse for 'specialities'
        $filteredData['specialties'] = array_reverse($filteredData['specialties']);
        print "<pre>";
        print_r($filteredData);
        print "</pre>";
        $filteredJson = json_encode($filteredData, JSON_PRETTY_PRINT);

        // Write the modified output to new json file
        $fp = fopen('output.json', 'w');
        fwrite($fp, $filteredJson);
        fclose($fp);
    ?>


    <?php 
        echo "<hr><h3>Task 10: Looking for a desired final output.</h3>";
        
        // Input
        $x= array(  0=>['label'=>'Appointment','is_open'=>1],
                    1=>['label'=>'Checkup','is_open'=>0]);
        $y = array( 0=>['open_time'=>'10:00'],
                    1=>['open_time'=>'12:00']);
        $z = array( 0=>['close_time'=>'16:00'],
                    1=>['close_time'=>'20:00']);
        
        // Initialization
        $result = array();

        // Merge function
        function custom_array_merge($array1, $array2) {
            $result = Array();
            foreach ($array1 as $key_1 => &$value_1) {
                foreach ($array2 as $key_2 => $value_2) {
                    if($key_1 ==  $key_2) {
                        $result[$key_1] = array_merge($value_1, $value_2);
                    }
                }

            }
            return $result;
        }

        // Call merge funtion
        $result = custom_array_merge($x, $y);
        $result = custom_array_merge($result, $z);

        // Print the merged output
        print "<pre>";
        print_r($result);
        print "</pre>";
    ?>

    </body>

</html>