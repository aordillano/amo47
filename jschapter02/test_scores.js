// declare empty array
const scores = [];

let score = 0;
do {
    // TODO prompt user for test score (int) and assign
    // to score variable
    score = parseInt(prompt("Enter score. Enter -1 to stop."));
    // TODO if-else statement to error-check this "score" variable
    // if valid, add value to array
    // if not valid, display alert
    if (isNaN(score) || score <= 0 || score >= 100) {
        alert("Score must be between 0 to 100.");
    } else {
        scores[scores.length] = score;
    }
} while(score != -1)

if(scores.length > 0) {
    // TODO using a for-loop display all array elements
    // using document.write
    document.write("Scores: ");
    for (let i = 0; i < scores.length; i++) {
        document.write(scores[i] + " ");
    }
    // TODO sum all the values in the array using for-loop
    let sum = 0;
    for (let val of scores) {
        sum += val;
    }
    // calculate average
    average = sum / (scores.length + 1);
    // TODO display average using document.write
    document.write("Average: " + average.toFixed(2));
}