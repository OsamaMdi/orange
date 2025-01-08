
       //-----------------------Add Phone-------------------------- 
let clicPhone = false;
let contI = 2;
let totaleP = 500;
document.getElementById("addphone").addEventListener("click", function(){
     
    if (clicPhone == false){
    document.getElementById("section").innerHTML = `
    <div class="section1" id="divToRemove" >
        <div class="section1Img">     
        </div> 
        
        <div class="cont" id="contennar">
            <div id="negativ" class="AS" onclick="variabeclick(this)">-</div>
            <div class="var" id="variabel" >1</div>
            <div id="posativ" class="AS" onclick="posaticlick(this)">+</div>
        </div>
             
        <div class="totelsum"> <span id="totelSumPhone" >500</span> jd
            <div class="iconRemove" id="remove" onclick="divToRemovclick(this)">
                <i style="font-size:15px; margin-top: 5px;" class="fa">&#xf00d;</i>
            </div>
        </div>
    </div>`;
   
    sessionStorage.setItem("addphone", totaleP);
    updateTotal();

    clicPhone = true;
}
else{
    if(contFalse == true){
        contI = contI + 2;
        }
        contFalse = false;

    document.getElementById("variabel").innerHTML = contI++;
    document.getElementById("totelSumPhone").innerHTML = totaleP = totaleP + 500 ;

    sessionStorage.setItem("addphone", totaleP);
    
    updateTotal();
}

})
let contFalse = false;
function variabeclick(){
    if(contI > 0){
    if(contFalse == false){
    contI = contI - 2;
    }
    contFalse = true;
if(variabel){
    
    document.getElementById("variabel").innerHTML = contI--;
    document.getElementById("totelSumPhone").innerHTML = totaleP = totaleP -  500 ;

       sessionStorage.setItem("addphone", totaleP);
       updateTotal();
}
    }
}



function posaticlick(){
        if(clicPhone == true){

            if(contFalse == true){
                contI = contI + 2;
                }
                contFalse = false;

            document.getElementById("variabel").innerHTML =  contI++ ;
            document.getElementById("totelSumPhone").innerHTML = totaleP = totaleP +  500 ;
                   
            sessionStorage.setItem("addphone", totaleP);
            updateTotal();
        }
            }
            function divToRemovclick() {
                const divToRemove = document.getElementById("divToRemove");
                if (divToRemove) {
                    divToRemove.remove();
                    clicPhone = false;
                                  sessionStorage.removeItem("addphone");
                                  updateTotal();
                } else {
                    console.log("The div does not exist!");
                }
            }       
         //-------------------------- Add Laptop ---------------------------
         
         let clicLaptop = false;
         let contLp = 2;
         let totaleL = 900;
         document.getElementById("addLaptop").addEventListener("click", function(){
              
             if (clicLaptop == false){
             document.getElementById("section2").innerHTML = `
             <div class="section1" id="divToRemove2" >
                 <div class="section1Img2">     
                 </div> 
                 
                 <div class="cont" id="contennar2">
                     <div id="negativ2" class="AS" onclick="variabeclick2(this)">-</div>
                     <div class="var" id="variabe2" >1</div>
                     <div id="posativ2" class="AS" onclick="posaticlick2(this)">+</div>
                 </div>
                      
                 <div class="totelsum"> <span id="totelSumLaptop">900</span> jd
                     <div class="iconRemove" id="remove2" onclick="divToRemovclick2(this)">
                         <i style="font-size:15px; margin-top: 5px;" class="fa">&#xf00d;</i>
                     </div>
                 </div>
             </div>`;
             sessionStorage.setItem("addLaptop", totaleL);
             updateTotal();
             clicLaptop = true;
         }
         else{
             if(contFalse2 == true){
                contLp = contLp + 2;
                 }
                 contFalse2 = false;
         
             document.getElementById("variabe2").innerHTML = contLp++;
             document.getElementById("totelSumLaptop").innerHTML = totaleL = totaleL + 900 ;
                  
             sessionStorage.setItem("addLaptop", totaleL);
             updateTotal();
           
         }
         
         })
         let contFalse2 = false;
         function variabeclick2(){
             if(contLp > 0){
             if(contFalse2 == false){
                contLp = contLp - 2;
             }
             contFalse2 = true;
         if(variabe2){
             
             document.getElementById("variabe2").innerHTML = contLp--;
             document.getElementById("totelSumLaptop").innerHTML = totaleL = totaleL -  900 ;
             sessionStorage.setItem("addLaptop", totaleL);
             updateTotal();
         }
             }
         }
         
         
         
         function posaticlick2(){
                 if(clicLaptop == true){
         
                     if(contFalse2 == true){
                        contLp = contLp + 2;
                         }
                         contFalse2 = false;
         
                     document.getElementById("variabe2").innerHTML =  contLp++ ;
                     document.getElementById("totelSumLaptop").innerHTML = totaleL = totaleL +  900 ;
                     sessionStorage.setItem("addLaptop", totaleL);
                     updateTotal();
                 }
                     }
                     function divToRemovclick2() {
                         const divToRemove2 = document.getElementById("divToRemove2");
                         if (divToRemove2) {
                             divToRemove2.remove();
                             clicLaptop = false;
                             sessionStorage.removeItem("addLaptop", totaleL);
                             updateTotal();
                         } else {
                             console.log("The div does not exist!");
                         }
                     }  
                     
             //-------------------------- Add Laptop ---------------------------
         
         let clicHedPhone = false;
         let contH = 2;
         let totaleH = 100;
         document.getElementById("addHedPhone").addEventListener("click", function(){
              
             if (clicHedPhone == false){
             document.getElementById("section3").innerHTML = `
             <div class="section1" id="divToRemove3" >
                 <div class="section1Img3">     
                 </div> 
                 
                 <div class="cont" id="contennar3">
                     <div id="negativ3" class="AS" onclick="variabeclick3(this)">-</div>
                     <div class="var" id="variabe3" >1</div>
                     <div id="posativ3" class="AS" onclick="posaticlick3(this)">+</div>
                 </div>
                      
                 <div class="totelsum"> <span id="totelSumHedPhone">100</span> jd
                     <div class="iconRemove" id="remove3" onclick="divToRemovclick3(this)">
                         <i style="font-size:15px; margin-top: 5px;" class="fa">&#xf00d;</i>
                     </div>
                 </div>
             </div>`
             sessionStorage.setItem("addHedPhone", totaleH);
             updateTotal();
             clicHedPhone = true;
         }
         else{
             if(contFalse3 == true){
                contH = contH + 2;
                 }
                 contFalse3 = false;
         
             document.getElementById("variabe3").innerHTML = contH++;
             document.getElementById("totelSumHedPhone").innerHTML = totaleH = totaleH + 100 ;
             sessionStorage.setItem("addHedPhone", totaleH);
             updateTotal();
           
         }
         
         })
         let contFalse3 = false;
         function variabeclick3(){
             if(contH > 0){
             if(contFalse3 == false){
                contH = contH - 2;
             }
             contFalse3 = true;
         if(variabe3){
             
             document.getElementById("variabe3").innerHTML = contH--;
             document.getElementById("totelSumHedPhone").innerHTML = totaleH = totaleH -  100 ;
             sessionStorage.setItem("addHedPhone", totaleH);
             updateTotal();
         }
             }
         }
         
         
         
         function posaticlick3(){
                 if(clicHedPhone == true){
         
                     if(contFalse3 == true){
                        contH = contH + 2;
                         }
                         contFalse3 = false;
         
                     document.getElementById("variabe3").innerHTML =  contH++ ;
                     document.getElementById("totelSumHedPhone").innerHTML = totaleH = totaleH +  100 ;
                     sessionStorage.setItem("addHedPhone", totaleH);
                     updateTotal();
                 }
                     }
                     function divToRemovclick3() {
                         const divToRemove3 = document.getElementById("divToRemove3");
                         if (divToRemove3) {
                             divToRemove3.remove();
                             clicHedPhone = false;
                             sessionStorage.removeItem("addHedPhone", totaleH);
                             updateTotal();
                         } else {
                             console.log("The div does not exist!");
                         }
                     }           
                     
                 

let totalText = document.getElementById("colorTotale")
let totaleS;
function updateTotal() {
    
    let x = parseInt(sessionStorage.getItem("addphone") ) || 0;
    let y = parseInt(sessionStorage.getItem("addLaptop") ) || 0;
    let z = parseInt(sessionStorage.getItem("addHedPhone") ) || 0;

    totaleS = x + y + z;

    if (totaleS > 0) {
       
        totalText.innerHTML =  totaleS ;
    } 
     else {
         
        totalText.innerHTML = "";
    }
}
