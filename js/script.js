$(document).ready(function() {

    (function() {
        const quizContainer = $('#quizSection');
        const resultsContainer = $('#results');
        const submitButton = $('#submitBtn');

        let myQuestions = getQuestions()[0];

        function getQuestions() {
            let myQuestions = [];

            $.ajax({
                url: "http://localhost/Quiz-website/php/testQuestions.php",
                type: 'GET',
                dataType: "json",
                async: false, // todo find way to do the request asynchronously
                success: function(result) {
                    let serverResponse = JSON.stringify(result);
                    myQuestions.push(JSON.parse(serverResponse));
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR.status);
                    console.log(errorThrown);
                }
            });
            return myQuestions;
        }

        function buildQuiz() {

            // <div class="row">
            //         <div class="col s12 m8 card-panel">
            //             <div class="section">
            //                 <div class="container">
            //                     Question 1 <br><br>
            //                     Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laborum inventore itaque, tempore saepe, in delectus incidunt natus officia eaque perferendis? Voluptatum assumenda, ad incidunt nam, optio sed nemo a.
            //                     <form action="#">
            //                         <p>
            //                             <input id="first" name="group1" type="radio" value="first" checked />
            //                             <label for="first">Red</label>
            //                         </p>
            //                         <p>
            //                             <input id="second" name="group1" type="radio" value="second" />
            //                             <label for="second">Yellow</label>
            //                         </p>
            //                         <p>
            //                             <input id="third" class="with-gap" name="group1" type="radio" value="third" />
            //                             <label for="third">Green</label>
            //                         </p>
            //                     </form>
            //                 </div>
            //             </div>

            //         </div>
            //     </div>

            // a place to store the HTML output
            const output = [];

            // for each question
            myQuestions.forEach(
                (currentQuestion, questionNumber) => {

                    // store containing list of answer choices
                    const answers = [];

                    // for each available answer
                    for (letter in currentQuestion.answers) {

                        // push radio buttons and labels to array
                        answers.push(
                            `<p>
                                <input id="question${currentQuestion.answers[letter]}" class="with-gap" name="question${questionNumber}" type="radio" value="${letter}" />
                                <label for="question${currentQuestion.answers[letter]}">${currentQuestion.answers[letter]}</label>
                            </p>`
                        );
                    }

                    let container = `<div class="row">
                                        <div class="col s12 m8 card-panel">
                                            <div class="section">
                                                <div class="container">
                                                    Question ${questionNumber+1} <br><br>
                                                    ${currentQuestion.question}
                                                    <form action="#">
                                                        ${answers.join('')}
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;

                    output.push(container);
                }
            );

            // combine output list into one string of HTML and put it on the page
            quizContainer.prepend(output.join(''));
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
        // submitButton.click(showResults);
    })();

});