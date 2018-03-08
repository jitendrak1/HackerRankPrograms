/*
 ----------- Find the pattern from the give number -----------
 You are given an integer N, print N lines in the following manners if N = 4, then the pattern would be:
    1*2*3*4
    9*10*11*12
    13*14*15*16
    5*6*7*8

 The input to the method square pattern print of class Square pattern integer N(Assume 0 <= N <= 100).

 Do not return anything from the method. Print the required pattern System.out.println().

 Each line of the output shall consist of 'numberals' and '*' only. Make sure that your class and method are
 public. Do not access.

 Input :
  Case 1:  3
    Output :
        1*2*3
        7*8*9
        4*5*6

  Case 2: 5
    Output :
        1*2*3*4*5
        11*12*13*14*15
        21*22*23*24*25
        16*17*18*19*20
        6*7*8*9*10
*/

#include <stdio.h>
int main()
{
    int n, i, j, v = 1, k = 0;
    
    scanf("%d", &n);
    for(i = 0; i < n - 1; i++){
    
        if(n%2 == 1){
            if(i <= n/2){
                v = n * k + 1;
                if(i < n/2)
                    k = k + 2;
                else
                    k = k - 1;
            }else{
                v = n * k + 1;
                k = k - 2;
            }
        }else{
            if(i < n/2){
                v = n * k + 1;
                k = k + 2;
            }else if(i == n/2){
                v = n * (k - 1) + 1;
                k = k - 1;
            }else{
                v = n * (k - 2) + 1;
                k = k - 2;
            }  
        }
        
        for(j = 0; j < n; j++){
            printf("%d", v++);
            if(j < n - 1)
                printf("*");
        }
        printf("\n");
    } 
        
    if(i + 1 == n && n%2 == 0){
        k = n;
        for(j = 0; j < n; j++){
            printf("%d", ++k);
            if(j < n - 1)
                printf("*");
        }
    }else if(n == 1){
        printf("%d", n);
    }else{
        k = n;
        for(j = 0; j < n; j++){
            printf("%d", ++k);
            if(j < n - 1)
                printf("*");
        }
    }
    return 0;
}