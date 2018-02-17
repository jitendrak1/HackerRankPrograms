/*  ---- Sparse Arrays ----
	There is a collection of N strings ( There can be multiple occurences of a particular string ). Each string's length is no more than 20 characters. There are also Q queries. For each query, you are given a string, and you need to find out how many times this string occurs in the given collection of N strings.

	Input Format

	The first line contains N, the number of strings.
	The next N lines each contain a string.
	The N + 2nd line contains Q, the number of queries.
	The following Q lines each contain a query string.

	Constraints
		1 <= N <= 1000
		1 <= Q <= 1000
		1 <= length of any string <= 20
	 
	Sample Input
		4
		aba
		baba
		aba
		xzxb
		3
		aba
		xzxb
		ab

	Sample Output
		2
		1
		0

	Explanation
		Here, "aba" occurs twice, in the first and third string. The string "xzxb" occurs once in the fourth string, and "ab" does not occur at all.
*/

//// First Approch  complexity => O(n2)  ////

<?php
    /* Searcg give query into nStringArray total number of occureance. */
    function searchQueryIntoNStringArray($nStringArr, $searchString){
        $count = 0;
        for($i = 0; $i < count($nStringArr); $i++){
            if($nStringArr[$i] == $searchString){
                $count++;
            } 
        }
        
        return $count;
    }
    
    $_fp = fopen("php://stdin", "r");
    /* Enter your code here. Read input from STDIN. Print output to STDOUT */
    if($_fp){
        
        // read one line from the file input
        $N = (int)fgets($_fp);
        $nStringArray = [];
        
        // take N string from the file and store into nStringArray.
        for($i = 0; $i < $N; $i++){
            $nStringArray[] = trim(fgets($_fp), " \n");
        }
        
        // read total query from the file input
        $Q = (int)fgets($_fp);
        // search query into nStringArray and build resultArray
        for($i = 0; $i < $Q; $i++){
           echo searchQueryIntoNStringArray($nStringArray, trim(fgets($_fp), " \n"));
           if($i != $Q - 1){
               echo "\n";
           }
        }
        
    }else{
        echo 'Problems in opening file.';
    }
?>


//// Second Approch  complexity => O(n)  ////

<?php

    $_fp = fopen("php://stdin", "r");
    /* Enter your code here. Read input from STDIN. Print output to STDOUT */
    if($_fp){
        // read one line from the file input
        $N = (int)fgets($_fp);
        
        $nStringArray = array();
        $checkQuery = 0;
        
        // ready reamining add from the file
        while( ( $nextString = fgets($_fp) ) !== false ){
            // remove extra space and new line from the $nextString
            $nextString = trim($nextString, " \n");
            
            // check query start or not
            if((($nextString >= 1) && ($nextString <= 1000)) && ( is_int((int)$nextString) )){
                $checkQuery = 1;
            }else if($checkQuery == 0){
                // if $checkQuery == 0 means N String insert into associative array.
                // if $nextString present into associative array then increament value.
                if(array_key_exists($nextString, $nStringArray)){
                    $nStringArray[$nextString]++;
                }else{
                    // if $nextString is not present into associative array then insert a key and initial vaule set by 0
                    $nStringArray[$nextString] = 1;
                }
            }else if($checkQuery == 1){
                // if $checkQuery == 1 means Q Search into associative array   
               if(array_key_exists($nextString, $nStringArray)){
                    echo $nStringArray[$nextString]."\n";
                }else{
                   echo "0\n";
                }
            }         
        }
    }else{
        echo 'Problems in opening file.';
    }
?>


