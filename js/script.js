$(document).ready(function() {

    (function() {
        const quizContainer = $('#quiz');
        const resultsContainer = $('#results');
        const submitButton = $('#submitBtn');

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

        function buildQuiz() {
            // we'll need a place to store the HTML output
            const output = [];

            // for each question...
            myQuestions.forEach(
                (currentQuestion, questionNumber) => {

                    // we'll want to store the list of answer choices
                    const answers = [];

                    // and for each available answer...
                    for (letter in currentQuestion.answers) {

                        // ...add an HTML radio button
                        answers.push(
                            `<label>
                            <input type="radio" name="question${questionNumber}" value="${letter}">
                                ${letter} : ${currentQuestion.answers[letter]}
                        </label>`
                        );
                    }

                    // add this question and its answers to the output
                    output.push(
                        `<div class="question"> ${currentQuestion.question} </div>
                    <div class="answers"> ${answers.join('')} </div>`
                    );
                }
            );

            // finally combine our output list into one string of HTML and put it on the page
            quizContainer.html(output.join(''));
        }

        function showResults() {
            // gather answer containers from our quiz
            const answerContainers = quizContainer.find('.answers');

            // keep track of user's answers
            let numCorrect = 0;

            // for each question...
            myQuestions.forEach((currentQuestion, questionNumber) => {

                // find selected answer
                const answerContainer = answerContainers[questionNumber];
                const selector = 'input[name=question' + questionNumber + ']:checked';
                const userAnswer = ($(answerContainer).find(selector) || {}).val();

                // if answer is correct
                if (userAnswer === currentQuestion.correctAnswer) {
                    // add to the number of correct answers
                    numCorrect++;

                    // color the answers green
                    $(answerContainers[questionNumber]).css("color", "lightgreen");
                }
                // if answer is wrong or blank
                else {
                    // color the answers red
                    $(answerContainers[questionNumber]).css("color", "red");
                }
            });

            // show number of correct answers out of total
            resultsContainer.html(numCorrect + ' out of ' + myQuestions.length);
        }

        // display quiz right away
        buildQuiz();

        // on submit, show result
        submitButton.click(showResults);
    })();

});