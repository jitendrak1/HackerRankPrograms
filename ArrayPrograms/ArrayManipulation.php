/*  ---- Array Manipulation ----

	You are given a list(1-indexed) of size n, initialized with zeroes. You have to perform m operations on the list and output the maximum of final values of all the n elements in the list. For every operation, you are given three integers a, b  and k and you have to add value k to all the elements ranging from index a to b (both inclusive).

	For example, consider a list a of size 3. The initial list would be a = [0, 0, 0] and after performing the update O(a,b,k) = (2,3,30), the new list would be a = [0, 30, 30]. Here, we've added value 30 to elements between indices 2 and 3. Note the index of the list starts from 1.

	Input Format
		The first line will contain two integers n and m separated by a single space.
		Next m lines will contain three integers a, b and k separated by a single space.
		Numbers in list are numbered from 1 to n.

	Constraints
		3 <= n <= 10 to the power 7
		1 <= m <= 2 * 10 to the power 5
		1 <= a <= b <= n
		0 <= k <= 10 to the power 9

	Output Format
		Print in a single line the maximum value in the updated list.

	Sample Input
		5 3
		1 2 100
		2 5 100
		3 4 100

	Sample Output
		200

	Explanation
		After first update list will be 100 100 0 0 0. 
		After second update list will be 100 200 100 100 100.
		After third update list will be 100 200 200 200 100.
		So the required answer will be 200.
*/

// first approch 

<?php
    
    // find maximum elements from updated result array.
    function findMaximumElementFromArray($result){
        $maxElement = 0;
        for($i = 0; $i < count($result); $i++){
            if($result[$i] > $maxElement){
                $maxElement = $result[$i];
            }
        }
        return $maxElement;
    }
    
    // Open the file into read mode
    $handle = fopen ("php://stdin", "r");
    fscanf($handle, "%i %i", $n, $m);
    
    $resultArray = [];
    // Create a dynamic array with initial value 0
    for($i = 0; $i < $n; $i++){
        $resultArray[] = 0;
    }

    for($a0 = 0; $a0 < $m; $a0++){
        fscanf($handle, "%i %i %i", $a, $b, $k);
        
        // update existing array value based on index $a and $b with value $k
        $resultArray[$a - 1] = $resultArray[$a - 1] + $k;
        $resultArray[$b - 1] = $resultArray[$b - 1] + $k;
    }

    // find maximum value from updated resultArray
    echo findMaximumElementFromArray($resultArray);
   
?>



// Second Approch

<?php
    // result Array for storing the data
     $resultArray = [];

    // find the maximum elements from the $resultArray
    function findMaximumElementFromResultArray($resultArr){
        $maxElement = $resultArr[0];
        for($i = 1; $i < count($resultArr); $i++){
            if($resultArr[$i] > $maxElement){
                $maxElement = $resultArr[$i];
            }
        }
        return $maxElement;
    }

    // Open the file into read mode
    $handle = fopen ("php://stdin", "r");
    fscanf($handle, "%i %i", $n, $m);
    
    // create dynamic array according to the given values.
    for($i = 0; $i <= $n; $i++){
         $resultArray[$i] = 0; 
    }

    for($a0 = 0; $a0 < $m; $a0++){
        fscanf($handle, "%i %i %i", $a, $b, $k);
        while($a <= $b){
            $resultArray[$a] = $resultArray[$a] + $k;
            $a++;
        }
    }

    // print the maximum elements from the resultArray
    echo findMaximumElementFromResultArray($resultArray);
?>


// In C langue  ( Best Approch ).
#include <math.h>
#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <assert.h>
#include <limits.h>
#include <stdbool.h>

int main() {   
    long long int N, K, i, MAX = 0, x = 0;
    scanf("%lld %lld", &N, &K);
    
    // create dynamic array based on N.
    int *Array = (int*)malloc(sizeof(int) * (N + 1));
    
    // first of all we have to set initial value in dynamic array.
    for( i = 0; i < N; i++){
        *(Array + i) = 0;
    }
    
    // take value a, b and k give on run time.
    for( i = 0; i < K; i++){
        long long int a, b, k;
        scanf("%lld %lld %lld", &a, &b, &k);
        
        *(Array + a) = *(Array + a) + k;
        if( b + 1 <= N){
            *(Array + b + 1) = *(Array + b + 1) - k;
        }
    }
    
    // find the maximum value from the array
    for( i = 1; i <= N; i++){
        x = x + *(Array + i);
        if( MAX < x){
            MAX = x;
        }
    }
    
    printf("%lld", MAX);
    
    return 0;
}

