const input = document.getElementById('inputText');
const output = document.getElementById('output');

input.addEventListener('input', function() {
    output.innerHTML = input.value;
});

  let showMassege = document.getElementById("chat")

function addComment() {
    
    showMassege.innerHTML = input.value;
   
    output.innerHTML = "";
    input.value = ""
}