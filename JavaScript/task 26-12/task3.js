/*  
// EX 1
function tellFortune( jobTitle,geoLocation, partner, numKids){

console.log("You will be a " + jobTitle + " in " + geoLocation + " , and married to " + partner + " with " + numKids + "kids.");
}

tellFortune("CS", "Amman" , "Osama" , 0);
*/
/*
// Ex 2
function calculateDogAge (ageDog){

let age = ageDog * 7 ;

console.log(age);
}

calculateDogAge(3);
*/

//Ex 3
/*
 function calculateSupply(age , perDay){

    let x = 100 - age ;
    let y = x * 365;
    let a = y * perDay;
console.log("You will need " + a + " cups of tea to last you until the ripe old age of 100");
 }

 calculateSupply(30 , 3);
 */
/*
// EX 4
function called (name){
    console.log("Hello" + name);

}
called(Osama);
*/

//Ex 5
// Se (1) variable is not found
//Se (2) the ruslte in the function it the sem
//se (3) in error of the function (int * String) 

//Ex 6
/*
function double1(x){
    return 2 * x;
}
function double2(x){
    return 2 * x;
}
function double3(x){
    return 2 * x;
}

 */

//Ex 7
/*
function calledCube(num){
    let cube = Math.pow(num , 3);
    console.log("the of this number is: " + cube);
}
    
calledCube(4);

*/

//Ex 8
/*
function calledmultiply(num1 , num2){

  let x = num1 * num2 ;
  console.log("multiply that numbers: " + x) ;
}

calledmultiply(4 , 5);

*/

//Ex 9

/*

function canIGetADrivingLicense(age){

    if (age >= 20){
       console.log("yes you can")
    }
    else{
        let y = 20 - age;
        console.log("please come back after " + y + "  years to get one"); 
    }

} 

canIGetADrivingLicense(20);

*/

    //Ex 10
    /*
function sameLength(word1 , word2){

  if (word1.length == word2.length){
    console.log("true");
  }
  else{
    console.log("false");
  }
}
sameLength("word1" , "wrd2")
*/
   //EX 11 

   /*
   function largerNubmer(num1 , num2){
    
    if (num1 > num2){
        console.log("The large Nubmer: " + num1)
    }
    else{
        console.log("The large Nubmer: " + num2);
    }
   }

   largerNubmer(5 , 3);
   */

  //Ex 12 
  /*

  function smallerNubmer(num1 , num2 , num3 ){

 if( num1 < num2 && num1 < num3){

    console.log("The smalle Nubmer: " + num1);
 }
 else if (num2 < num1 && num2 < num3){

    console.log("The smalle Nubmer: " + num2);
 }
else{
    console.log("The smalle Nubmer: " + num3);
}
  }
  smallerNubmer(6 , 6 , 6)
 */

     //Ex 13
   /*

     function shorterString(word1 , word2 , word3 , word4 , word5){
      
        let Strin = [word1 , word2 , word3 , word4 , word5];

        let shortWord = Strin[0];

        for (i = 1 ; i < Strin.length ; i++ ){
             
             if( shortWord.length > Strin[i].length ){

                shortWord = Strin[i];
             }
        }
        console.log("The shorte Word: " + shortWord);
     }
    
     shorterString("rrr","ee","eee","ee","ee");

     */
           //Ex 14
     /*
           function shorterString(word1 , word2 , word3 , word4 , word5){
      
            let Strin = [word1 , word2 , word3 , word4 , word5];
    
            let shortWord = Strin[0];
    
            for (i = 1 ; i < Strin.length ; i++ ){
                 
                 if( shortWord.length < Strin[i].length ){
    
                    shortWord = Strin[i];
                 }
            }
            console.log("The shorte Word: " + shortWord);
         }
        
         shorterString("rrr","ee","eee","ee","ee");
     */
          //EX 15
     /*
          function isEven(num){

            if ( num % 2 == 0){

                console.log("true, this number (" + num + ") is even")

            }
            else{
                console.log("false, this number (" + num + ") is not ood")
            }

          }
          isEven(6)
     */
           //EX 16
          /* 

           function isOod(num){

            if ( num % 2 == 0){

                console.log("false, this number (" + num + ") is even")

            }
            else{
                console.log("true, this number (" + num + ") is not ood")
            }
            } 
            isOod(5)
           */

               //Ex 17
     /*
               function positive(num){

                console.log(Math.abs(num));
               }
               positive(5);
     */
                 //EX 18

        /*         
               function fullName(firstName , lastName ){

                console.log(firstName + " " + lastName);
               }
               fullName("Osama","Madi")
        */
                //EX 19
         /*
                function average(num1 , num2 ,num3 ,num4 ,num5){
                  
                    let averg = (num1 + num2 + num3 + num4 + num5) / 5;
                    console.log("Average = " + averg);
                }
                average(5,7,9,3,5);
         */

                //EX 20

                /*

                function Random(){
                   let x = Math.random() * 1;
                   
                   console.log(x.toFixed(4));
                }
                Random();

                */

                  //Ex 21
            /*
                  function Random(max , min){
                    let x = Math.floor(Math.random() * (max+1 - min) +min)
                    
                    console.log(x);
                 }
                 Random(20 , 5);
            */

                    //Ex 22
             /*
                    function scoreInUniversty(num){

                      if (num <= 100 && num >= 95){
                        console.log("A");
                      }

                      else if (num <= 94 && num >= 85){
                        console.log("B");
                      }
                      else if (num <= 84 && num >= 70){
                        console.log("C");
                      }
                      else if (num <= 69 && num >= 50){
                        console.log("D");
                      }
                      else{
                        console.log("F");
                      }

                    }
                    scoreInUniversty(94)
             */

                    //Ex 23
              /*      
                    let count = 0;
                    function counter() {
                     
                          count++; 
                          console.log(count);
                         
                      }
                      
                     counter()
                     counter()
                     counter()
               */
                      

                         //Ex 24

                     /*    
                      let count = 0;
                      function counter() {
                       
                            count++; 
                            console.log(count); 
                      }
                            function resetCounter(){

                             let resetcount = count;
                             
                             console.log( resetcount + " and the counter reset now")
                             count = 0;
                            }
                             
                          
                        
                        counter()
                        counter()
                        counter()
                        counter()
                        resetCounter()
                      */
                       


                    
                  