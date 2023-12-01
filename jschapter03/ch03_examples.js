
// Slide 5
let lastName = "Hopper";
if (lastName == "Hopper") {
    console.log("Last name is Hopper");
}
if (lastName != "Grace") {
    console.log("Last name is not Grace");
}
// Slide 8
let rate = "some number";
if (isNaN(rate) || rate < 0) {
    console.log("Rate is not valid.")
}
// Slide 10
let age = prompt("What is your age?");
if (age >= 18) {
    alert("You may vote.");
} else {
    alert("You are not old enough to vote.");
}
//Slide 15
let years = parseInt(prompt("Enter number of years."));
while(isNaN(years) || years <= 0) {
    years = parseInt(prompt(
        "Years must be a positive number."))
}
// Slide 19
for (let index = 3; index > 0; index--) {
    document.write(index + "...");
}
document.write("Blast Off!");
// Slide 31
const totals = [];
totals[0] = 141.95;
totals[1] = 212.25;

console.log("totals[2] = " );
console.log("totals length")
totals[totals.length] 
// Slide 34
// TODO Modify this to use parseFloat and toFixed(14)

// Slide 36

// Slide 37
let sum = 0;
for (let val of totals) {
    sum += val;
}
alert(sum);