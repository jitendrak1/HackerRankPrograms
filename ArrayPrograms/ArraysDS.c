/* 	---- Arrays - DS ----
	An array is a type of data structure that stores elements of the same type in a contiguous block of memory. 
	In an array, A, of size N, each memory location has some unique index, i (where 0 <= i <= N), that can be referenced as  
	A[i] (you may also see it written as Ai).

	Given an array, A, of N integers, print each element in reverse order as a single line of space-separated 
	integers.

	Note: If you've already solved our C++ domain's Arrays Introduction challenge, you may want to skip this.

	Input Format
		The first line contains an integer, N (the number of integers in A). 
		The second line contains N space-separated integers describing A.

	Constraints
		1 <= N <= 10 to the power 3
		1 <= Ai <= 10 to the power 4, where Ai is the ith integer in A.

	Output Format
		Print all N integers in A in reverse order as a single line of space-separated integers.

	Sample Input
		4
		1 4 3 2

	Sample Output
		2 3 4 1
*/

#include <math.h>
#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <assert.h>
#include <limits.h>
#include <stdbool.h>

int main(){
    int n; 
    scanf("%d",&n);
    int *arr = malloc(sizeof(int) * n);
    for(int arr_i = 0; arr_i < n; arr_i++){
       scanf("%d",&arr[arr_i]);
    }
    for(int i = n - 1; i > -1; i--)
        printf("%d ", arr[i]);
    return 0;
}