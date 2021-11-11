'use strict';

const storedQuestions = JSON.parse(localStorage.getItem("questions"))
const musicTime = JSON.parse(localStorage.getItem("musicTime"))
const musicPause = JSON.parse(localStorage.getItem('paused'))
const questionAsked = document.getElementById('question')
let questionIterator = 0;
const submitQsButton = document.getElementById('btnSubmit')
const nextQsButton = document.getElementById('btnNext')
const prevQsButton = document.getElementById('btnBack')
const answerButtons = document.querySelectorAll('#btn')
let answerSelected = false;
console.log(musicPause['0'])

const updateCounter = () => {
    const counterDiv = document.getElementById('counter');
    const counterSpan = document.getElementById('counterSpan');
    counterSpan.classList = ("counterSpan");
    counterSpan.innerHTML  = `Question ${questionIterator}/${storedQuestions.length}`;
    }

const updateButtons = () => {
    const answerButtons = document.querySelectorAll('#btn')
    console.log(storedQuestions)
    questionAsked.innerHTML= (storedQuestions[questionIterator].question)

    function getRandomInt(max) {
        return Math.floor(Math.random() * Math.floor(max));
    }
    const setButtonVal = () => {
        let answer = getRandomInt(4)
        let j = 0;
        for (let i = 0; i < answerButtons.length; i++){
            if (i === answer){
                answerButtons[i].innerHTML = storedQuestions[questionIterator].correct_answer
            }
            else{
                answerButtons[i].innerHTML = storedQuestions[questionIterator].incorrect_answers[j]
                j++
            }
        }
    }
    setButtonVal()
};

console.log(myMusic.autoplay)

if(musicPause['0'] === 'play'){
    myMusic.autoplay = true;
    myMusic.load()
    myMusic.play()
    console.log(myMusic.autoplay)
}

document.addEventListener('DOMContentLoaded', ()=>{
    updateButtons();
    questionIterator = 1;
    nextQsButton.style.display = "none"
    updateCounter();
})


const buttonNeutral = () =>{
    const answerButtons = document.querySelectorAll('#btn')
    const resultDisplay = document.getElementById('result')
    answerButtons.forEach(btn=>{
        btn.classList.remove('selected')
    })
    resultDisplay.classList.toggle('on')
}
