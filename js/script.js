$(document).ready(function() {

    $('.button-collapse').sideNav();

    const quizContainer = $('#quiz');
    const resultsContainer = $('#results');
    const submitButton = $('#submitBtn');

    function buildQuiz() {}

    function showResults() {}

    // display quiz right away
    buildQuiz();

    // on submit, show result
    submitButton.click(showResults);

    const myQuestions = [{
        question: "Who is the strongest?",
        answers: {
            a: "Superman",
            b: "The Terminator",
            c: "Waluigi, obviously"
        },
        correctAnswer: "c"
    }, {
        question: "What is the best site ever created?",
        answers: {
            a: "SitePoint",
            b: "Simple Steps Code",
            c: "Trick question; they're both the best"
        },
        correctAnswer: "c"
    }, {
        question: "Where is Waldo really?",
        answers: {
            a: "Antarctica",
            b: "Exploring the Pacific Ocean",
            c: "Sitting in a tree",
            d: "Minding his own business, so stop asking"
        },
        correctAnswer: "d"
    }];


});