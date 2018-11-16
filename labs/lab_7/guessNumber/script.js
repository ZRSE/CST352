            
            
            var randomNumber;
            randomNumber = Math.floor(Math.random() * 99) + 1;
            console.log(randomNumber);
            document.getElementById("numberToGuess").innerHTML = randomNumber;
            
            var guessCount = 1;
            var resetButton = document.querySelector('#reset');
            resetButton.style.display="none";
            
            var guesses = document.querySelector('#guesses');
            var lastResult = document.querySelector('#lastResult');
            var lowOrHi = document.querySelector('#lowOrHi');
           
            var guessSubmit = document.querySelector('.guessSubmit');
            var guessField = document.querySelector('.guessField');
            
            var countWon = 0;
            var countLost = 0;
            
               $("#won").html("Won games: " + countWon);
                $("#lost").html("Lost games: " + countLost);
            
            
            
        

            guessSubmit.addEventListener('click', function checkGuess() {
              
               var userGuess = Number(guessField.value);
               
               if (userGuess > 99 || userGuess < 1) {
                    $("#lastResult").html("Choose a number between 1 and 99");
                    $("#lowOrHi").html("");
                    return false;
               }
               
               if (guessCount === 1) {
                    $("#guesses").html("Previous guesses: ");

               }
               
               guesses.innerHTML += userGuess + ' ';
               
               if (userGuess === randomNumber) {
                    $("#lastResult").html("Congrats! You got it right!");
                    lastResult.style.backgroundColor = "green";
                    $("#lowOrHi").html("");
                    countWon++;
                    setGameOver();
               } 
               else if(guessCount === 7) {
                   lastResult.innerHTML = 'Sorry, you lost!';
                   countLost++;
                   setGameOver();
               }
               else {
                    lastResult.innerHTML = 'Wrong!';
                    lastResult.style.backgroundColor = "red";
                    
                    if (userGuess < randomNumber) {
                        lowOrHi.innerHTML = 'Last guess was too low!';
                    } else if (userGuess > randomNumber) {
                        lowOrHi.innerHTML = 'Last guess was too high!';
                    }
               }
               
               guessCount++;
               guessField.value = '';
               guessField.focus();
               
            }
            );
            
            
            
            
            function setGameOver() {
                guessField.disabled = true;
                guessSubmit.disabled = true;
                resetButton.style.display = 'inline';
                resetButton.addEventListener('click', resetGame);
            }
            
            function resetGame() {
                guessCount = 1;
                
                var resetParas = document.querySelectorAll('.resultParas p');
                
                for (var i = 0; i < resetParas.length; i++) {
                    resetParas[i].textContent = '';
                }
                
                $("#won").html("Won games: " + countWon);
                $("#lost").html("Lost games: " + countLost);
            
                
                resetButton.style.display = 'none';
                
                guessField.disabled = false;
                guessSubmit.disabled = false;
                guessField.value = '';
                guessField.focus();
                
                lastResult.style.backgroundColor = 'white';
                
                randomNumber = Math.floor(Math.random() * 99) + 8;
                console.log(randomNumber);
                document.getElementById("numberToGuess").innerHTML = randomNumber;

            }