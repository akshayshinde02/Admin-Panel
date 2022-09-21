<?php 
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Quiz App</title>
</head>
<body>

  <style>
    
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap');

*{
  margin: 0;
  padding: 0;
}
body{
  display: flex;
  background-image: linear-gradient(315deg, #b8c6db 0%, #f5f7f7 100%);
  font-family: 'Poppins', sans-serif;
  background-color: #f891c1;
  align-items: center;
  justify-content: center;
  margin: 0;
  height: 90vh;
}
.Container{
  background-color: white;
  width: 600px;
  box-shadow: 0 0 12px 3px rgba(100, 100, 100, 0.1);
  border-radius: 12px;
}
.In-Container{
  padding: 4rem;
}
h2{
  padding: 1rem;
  margin: 0;
  text-align: center;
}

ul{
  list-style-type: none;
  padding: 0;
}

ul li label{
  cursor: pointer;
}

ul li{
  font-size: 22px;
  margin: 20px 0;
}

button{
  background-color: #d2f0b7;
  color: black;
  border: none;
  width: 100%;
  cursor: pointer;
  font-size: 35px;
  font-family:'Times New Roman', Times, serif;
  padding: 15px;
}
button:hover{
  background-color: orange;
}
button:focus{
  background-color: #e6eb5f;
}
  </style>

  <div class="Container" id="quiz">
    <div class=" In-Container">
      <h2 id="question"> Questions </h2>
      <ul>
        <li>
          <input type="radio" name="answer" id="a" class="answer">
          <label for="a" id="1_text">Answer</label>
        </li>

        <li>
          <input type="radio" name="answer" id="b" class="answer">
          <label for="b" id="2_text">Answer</label>
        </li>

        <li>
          <input type="radio" name="answer" id="c" class="answer">
          <label for="c" id="3_text">Answer</label>
        </li>

        <li>
          <input type="radio" name="answer" id="d" class="answer">
          <label for="d" id="4_text">Answer</label>
        </li>

      </ul>
    </div>

    <button id="submit">Submit</button>

  </div>


  <script src="script.js"></script>



  <script>
    const quizData = [
    {
        question :  "1. In HTML, the element defining a table heading is",
        a: "<style>",
        b: "<head>",
        c: "<thead>",
        d: "<th>",
        correct: "d",
    },
    {
        question: "2. HTML is considered as _______ language",
        a: "Programming",
        b: "OOP(Object Orianted)",
        c: "High Level",
        d: "Makeup",
        correct: "d",
    },
    {
        question: "3. HTML is ___ of makeups ",
        a: "Attribute",
        b: "Tag",
        c: "Groups",
        d: "Set",
        correct: "b",
    },
    {
        question: "4. What does CSS stand for?",
        a: "Central Style Sheets",
        b: "Cascading Style Sheets",
        c: "Cascading Simple Sheets",
        d: "Cars SUVs Sailboats",
        correct: "b",
    },
    {
        question: "5. Which language runs in a web browser?",
        a: "Java",
        b: "C",
        c: "Python",
        d: "javascript",
        correct: "d",
    },
    {
        question: "6. Who invented WWW",
        a: "Beci Pascal",
        b: "Robert Danny",
        c: "Tim Cook",
        d: "Tim Burners-Lee",
        correct: "d",
    },
    {
        question: "7. Which keyword is used to define a variable in javascript?",
        a: "var",
        b: "let",
        c: "both a & b",
        d: "None",
        correct: "c",
    },
    {
        question: "8. Javascript is an _______ language",
        a: "Object- Based",
        b: "Object Orianted",
        c: "Procedural",
        d: "None",
        correct: "a",
    },
    {
        question: "9. Which of following used to access HTML elements using javascript",
        a: "getElementbyId()",
        b: "getElementByClassName()",
        c: "both a & b",
        d: "None",
        correct: "c",
    },
    {
        question: "10. Which of the following is not javascript datatypes?",
        a: "Null type",
        b: "Undefined type",
        c: "Number type",
        d: "All of the mentioned",
        correct: "d",
    },


];

const quiz= document.getElementById('quiz')
const answerEls = document.querySelectorAll('.answer')
const questionEl = document.getElementById('question')
const a_text = document.getElementById('1_text')
const b_text = document.getElementById('2_text')
const c_text = document.getElementById('3_text')
const d_text = document.getElementById('4_text')
const submitBtn = document.getElementById('submit')


let curr_Quiz = 0
let score = 0

loadQuiz()

function loadQuiz() {

    deselectAnswers()

    const curr_QuizData = quizData[curr_Quiz]

    questionEl.innerText = curr_QuizData.question
    a_text.innerText = curr_QuizData.a
    b_text.innerText = curr_QuizData.b
    c_text.innerText = curr_QuizData.c
    d_text.innerText = curr_QuizData.d
}

function deselectAnswers() {
    answerEls.forEach(answerEl => answerEl.checked = false)
}

function getSelected() {
    let answer
    answerEls.forEach(answerEl => {
        if(answerEl.checked) {
            answer = answerEl.id
        }
    })
    return answer
}


submitBtn.addEventListener('click', () => {
    const answer = getSelected()
    if(answer) {
       if(answer === quizData[curr_Quiz].correct) {
           score++
       }

       curr_Quiz++

       if(curr_Quiz < quizData.length) {
           loadQuiz()
       } else {
           quiz.innerHTML = `
           <h2>You answered ${score}/${quizData.length} questions correctly</h2>

           <button onclick="location.reload()">Reload</button>
           `
       }
    }
})
  </script>
  
</body>
</html>