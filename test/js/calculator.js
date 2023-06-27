/**
 * Created by seron on 16/12/14.
 */
function showDate(){
    var today = Date();

document.getElementById("showDate").innerHTML = "today is " + today;
}
function openCalculator(){
    var firstNumber = prompt("Enter first number");
    var secondNumber = prompt("Enter second number");
    var result = parseInt(firstNumber) + parseInt(secondNumber);
    if(isNaN(result)){
        alert("You don dey mad abi!");
    }else{
        document.getElementById("result").innerHTML = "The sum is "+ result;
    }

}