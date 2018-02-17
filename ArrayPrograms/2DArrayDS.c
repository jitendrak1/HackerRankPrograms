/*	---- 2D Array - DS ------
	Context 
		Given a 6 X 6 2D Array, :

		1 1 1 0 0 0
		0 1 0 0 0 0
		1 1 1 0 0 0
		0 0 0 0 0 0
		0 0 0 0 0 0
		0 0 0 0 0 0

	We define an hourglass in A to be a subset of values with indices falling in this pattern in A's graphical 
	representation:

	a b c
	  d
	e f g

	There are 16 hourglasses in A, and an hourglass sum is the sum of an hourglass' values.

	Task 
		Calculate the hourglass sum for every hourglass in A, then print the maximum hourglass sum.

	Note: If you have already solved the Java domain's Java 2D Array challenge, you may wish to skip this 
	challenge.

	Input Format
		There are 6 lines of input, where each line contains 6 space-separated integers describing 2D Array A; 
		every value in A will be in the inclusive range of -9 to 9.

	Constraints
		-9 <= A[i][j] <= 9
		0 <= i,j <= 5

	Output Format
		Print the largest (maximum) hourglass sum found in A.

	Sample Input
		1 1 1 0 0 0
		0 1 0 0 0 0
		1 1 1 0 0 0
		0 0 2 4 4 0
		0 0 0 2 0 0
		0 0 1 2 4 0

	Sample Output
		19

	Explanation
		A contains the following hourglasses:

		1 1 1   1 1 0   1 0 0   0 0 0
		  1       0       0       0
		1 1 1   1 1 0   1 0 0   0 0 0

		0 1 0   1 0 0   0 0 0   0 0 0
		  1       1       0       0
		0 0 2   0 2 4   2 4 4   4 4 0

		1 1 1   1 1 0   1 0 0   0 0 0
		  0       2       4       4
		0 0 0   0 0 2   0 2 0   2 0 0

		0 0 2   0 2 4   2 4 4   4 4 0
		  0       0       2       0
		0 0 1   0 1 2   1 2 4   2 4 0

	The hourglass with the maximum sum (19) is:
		2 4 4
		  2
		1 2 4
*/

#include <math.h>
#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <assert.h>
#include <limits.h>
#include <stdbool.h>

int main(){
    int arr[6][6];
    int i = 0, j = 0, k = 0, l = 0;
    int count = 0, row = 0, col = 0, total = 0, preTotal = 0;
    int fcount = 0, scount = 0, pcount = 0;;
    for(int arr_i = 0; arr_i < 6; arr_i++){
       for(int arr_j = 0; arr_j < 6; arr_j++){  
          scanf("%d",&arr[arr_i][arr_j]);
       }
    }
    
    for( i = 0; i <= 3; i++){
        for( j = 0; j <= 3; j++){
            for( k = i; k < 3 + i; k++){
                for( l = j; l < 3 + j; l++){                    
                    if(count == 1 || count == 3){
                        //printf(" ");
                        count++;
                    }else if(count == 2){
                        //printf("  %d%d ", k, l);
                        //printf(" %d ", arr[k][l]);
                        total = total + arr[k][l];
                        count++;
                    }else{
                        //printf("%d%d ", k, l);
                        //printf("%d ", arr[k][l]);
                        total = total + arr[k][l];
                    }         
                }
                count++;
                //printf("\n");
            }
            //printf("\t total : %d", total);
            if(total >= preTotal){
                preTotal = total;
                row = i, col = j;
            }
            total = 0;
            count = 0;
            //printf("\n");
        }
        //printf("\n");
    }
    
 /*   count = col;
    fcount = 0;
    scount = 0;
    while(fcount < 3){
        while(scount < 3){
            if(pcount == 1 || pcount == 3){
                printf("  ");
                pcount++;
            }else if(pcount == 2){
                printf("%d ", arr[row][col]);
                pcount++;
            }else{
                printf("%d ", arr[row][col]);
            }     
            
            col++;
            scount++;
        }
        pcount++;
        printf("\n");
        col = count;
        row++;
        scount = 0;
        fcount++;
    }*/
    printf("%d", preTotal);
    return 0;
}
