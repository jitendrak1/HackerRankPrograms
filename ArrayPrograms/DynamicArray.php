/*
    --------- Dynamic Array --------

    1. Create a list, seqList, of N empty sequences, where each sequence is indexed from 0 to N-1 . The elements within each of the N sequences also use 0-indexing.

    2. Create an integer, lastAnswer, and initialize it to 0.

    3. The 2 types of queries that can be performed on your list of sequences (seqList) are described below:
        1. Query: 1 x y
            1.  Find the sequence, seq, at index ( ( x ^ lastAnswer ) % N ) in seqList.
            2.  Append integer y to sequence seq.
        2. Query: 2 x y
            1.  Find the sequence, seq, at index ( ( x ^ lastAnswer ) % N ) in seqList.
            2.  Find the value of element y % size in seq (where size is the size of seq) and assign it     
                to lastAnswer.
            3.  Print the new value of lastAnswer on a new line
    Task 
    Given N, Q, and Q queries, execute each query.

    Note: ^ is the bitwise XOR operation, which corresponds to the ^ operator in most languages. Learn more about it on Wikipedia.

    Input Format
        The first line contains two space-separated integers, N (the number of sequences) and  Q (the number of queries), respectively. 
        Each of the Q subsequent lines contains a query in the format defined above.

    Constraints
        1.  1 <= N, Q <= 10 to the power 5
        2.  0 <= x <= 10 to the power 9
        3.  0 <= y <= 10 to the power 9
        4.  It is guaranteed that query type  will never query an empty sequence or index.
    
    Output Format
        For each type 2 query, print the updated value of lastAnswer on a new line.

    Sample Input
        2 5
        1 0 5
        1 1 7
        1 0 3
        2 1 0
        2 1 1

    Sample Output
        7
        3

    Explanation
        Initial Values: 
            N = 2
            lastAnswer = 0       
            S0 = [ ] 
            S1 = [ ]

        Query 0: Append 5 to sequence ( ( 0 ^ 0 ) % 2 ) = 0. 
         lastAnswer = 0
         S0 = [5] 
         S1 = [ ]

        Query 1: Append 7 to sequence ( ( 1 ^ 0 ) % 2 ) = 1. 
         S0 = [5] 
         S1 = [7]

        Query 2: Append 3 to sequence ( ( 0 ^ 0 ) % 2 ) = 0. 
         lastAnswer = 0
         S0 = [5, 3] 
         S1 = [7]

        Query 3: Assign the value at index 0 of sequence ( ( 1 ^ 0 ) % 2 ) = 1 to lastAnswer, print lastAnswer.
         lastAnswer = 7 
         S0 = [5, 3] 
         S1 = [7]
            7

        Query 4: Assign the value at index 1 of sequence ( ( 1 ^ 7 ) % 2 ) = 0 to lastAnswer, print lastAnswer. 
         lastAnswer = 3
         S0 = [5, 3] 
         S1 = [7]
            3
*/

<?php
    $_fp = fopen("php://stdin", "r");
    /* Enter your code here. Read input from STDIN. Print output to STDOUT */
    $N;
    $Q;
    $mainArray = [];
    $lastAnswer = 0;

    if($_fp){
        // get first line from the file.
        $fistLineArr = explode(" ", fgets($_fp));
        $N = $fistLineArr[0];
        $Q = $fistLineArr[1];
        $mainArray = [];

        $count = 0;
        // get reamining line from the file and create dynamic array for each.
        while( ( $nextLine = fgets($_fp) ) !== false ){
            $nextLineArr = explode(" ", $nextLine);
            
            if($nextLineArr[0] == 1){
                // take the xor operation
                $index = ( (int)$nextLineArr[1] ^ (int)$lastAnswer ) % $N;

                // check index is exists or not into main Array for inserting the values.
                if(array_key_exists($index, $mainArray)){
                    $mainArray[$index][] = $nextLineArr[2];
                }else{
                    $mainArray[$index] = [];
                    $mainArray[$index][] = $nextLineArr[2];
                }
                
            }else if($nextLineArr[0] == 2){
                // take the xor operation
                $index = ( (int)$nextLineArr[1] ^ (int)$lastAnswer ) % $N;

                $seq = $nextLineArr[2] % count($mainArray[$index]);
                // check index is exists or not into main array for printing the values.
                $lastAnswer = $mainArray[$index][$seq];
                echo $lastAnswer;
            }
         
        }

        // close open file
        fclose($_fp);
    }else{
        echo 'Problems in file opening..';
    }
    
?>