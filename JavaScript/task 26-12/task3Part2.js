
                 //Ex 1
/*

let MyArray = [];
let cont = 0;
let e

function pushElement(Text){
    MyArray.push(Text);
    console.log("Add The Element:" + MyArray)
}

function largestElement (){
    
    for(let i in MyArray){
        cont ++;
    }
     
    e = MyArray[0];
     
    for (i = 0; i< cont ;i++){

        if (e.length < MyArray[i].length){
            e = MyArray[i];
        }
    }
    
    console.log(e)
}


pushElement("aaaaa");
pushElement("nnnn");
pushElement("ppp");
largestElement();

*/

                 //Ex 2
/*

let MyArray = [];
let cont = 0;
let e

function pushElement(Text){
    MyArray.push(Text);
    console.log("Add The Element:" + MyArray)
}

function smallestElement (){
    
    for(let i in MyArray){
        cont ++;
    }
     
    e = MyArray[0];
     
    for (i = 0; i< cont ;i++){

        if (e.length > MyArray[i].length){
            e = MyArray[i];
        }
    }
    
    console.log(e)
}


pushElement("aaaaa");
pushElement("nnnn");
pushElement("ppp");
smallestElement();

*/

 //Ex 3

/*

let MyArray = [];
let cont = 0;
let e = 0;

function pushElement(num){
    MyArray.push(num);
    console.log("Add The Element:" + MyArray)
}

function smallestElement (){
    
    for(let i in MyArray){
        cont ++;
    }
     
    
     
    for (i = 0; i < cont ; i++){
     
        e = e + MyArray[i]; 
       
    }
    
    console.log("The sum of all element: " + e)
}


pushElement(10);
pushElement(5);
pushElement(1);
smallestElement();

*/


//Ex 4


/*

let MyArray = [];
let cont = 0;
let e = 0;

function pushElement(num){
    MyArray.push(num);
    console.log("Add The Element:" + MyArray)
}

function AverageElement (){
    
    for(let i in MyArray){
        cont ++;
    }
     
    
     
    for (i = 0; i < cont ; i++){
     
        e = e + MyArray[i] ; 
       
    }

    let average = e / cont;
    console.log("The sum of all element: " + average.toFixed(4))
}


pushElement(10);
pushElement(5);
pushElement(1);
AverageElement();

*/

//Ex 5

/*

let MyArray = [];
let cont = 0;
let e = 0;

function pushElement(num){
    MyArray.push(num);
    console.log("Add The Element (" + MyArray + ")")
}

function medianElement (){
    
    for(let i in MyArray){
        cont ++;
    }
     
        e = cont / 2; 
        if(cont % 2 == 0){
           let x =  (MyArray[e - 1] +  MyArray[e ])/2
         console.log("The median Number is (" + x + ")")
        }
    else{
        console.log("The median Number is (" + MyArray[e - 0.5] + ")" )
    }    
   
}


pushElement(10);
pushElement(5);
pushElement(1);
pushElement(7);
pushElement(5);
pushElement(3);
medianElement();

*/

     //Ex 6
/*

let MyArray = [1 ,2 , 2 , 2 , 3 , 4 , 5 , 5];
let cont = 0;

function removeduplicatesِarray(array){
     
    let removduplicates = [];
    
         for (i=0; i < array.length; i++){
            let a = false;
            for (n = 0; n < removduplicates.length ; n++){
                
                if (array[i] === removduplicates[n]){
                    a = true;
                }
            }
            if ( a == false){
                removduplicates.push(array[i])
            }
         }  
         console.log("(" + removduplicates  + ")" );
}



removeduplicatesِarray(MyArray);

*/

       //Ex 7
/*
   let MyArray = [1, 5, 3, 10, 4, 7];
let cont = 0;

function sortArray(array) {
    let sort = [];
    
    while (array.length > 0) {
        let smallest = array[0];
        let smallestIndex = 0;
        
        for (let i = 1; i < array.length; i++) {
            if (array[i] < smallest) {
                smallest = array[i];
                smallestIndex = i;
            }
        }
        
        array.splice(smallestIndex, 1);
        sort.push(smallest);
    }
    
    console.log("(" + sort + ")");
}

sortArray(MyArray);





*/
        //Ex 8
/*

        let MyArray = [1, 5, 3, 10, 4, 7];
        let cont = 0;
        
        function sortArray(array) {
            let sort = [];
            
            while (array.length > 0) {
                let Larger = array[0];
                let LargerIndex = 0;
                
                for (let i = 1; i < array.length; i++) {
                    if (array[i] > Larger) {
                        Larger = array[i];
                        LargerIndex = i;
                    }
                }
                
                array.splice(LargerIndex, 1);
                sort.push(Larger);
            }
            
            console.log("(" + sort + ")");
        }
        
        sortArray(MyArray);
        

*/

let MyArray = [1, 5, 3, 10, 4, 7];

      //ُEx 9

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]]; 
    }
    console.log(array);
} 
shuffleArray(MyArray)