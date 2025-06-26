document.querySelectorAll('.password_fill').forEach(container => {
    const input = container.querySelector('input');
    const icon = container.querySelector('.eye-icon');

    icon.addEventListener('click', () => {
      const isPassword = input.type === 'password';
      input.type = isPassword ? 'text' : 'password';
      icon.classList.toggle('ri-eye-fill');
      icon.classList.toggle('ri-eye-off-fill');
    });
  });
   
document.addEventListener('DOMContentLoaded', function() {

    const textDisplayArea = document.querySelector('.typed');

    if (!textDisplayArea) {
        console.error("Error: The place to type text (class '.typed') was not found on the page.");
        return;
    }

    const allWordsRaw = textDisplayArea.getAttribute('data-typed-items');

    if (!allWordsRaw) {
        console.error("Error: No words found in 'data-typed-items' attribute. Please add your words there.");
        return;
    }

    const wordsToDisplay = allWordsRaw.split(',').map(word => word.trim());

    if (wordsToDisplay.length === 0 || wordsToDisplay.every(word => word === '')) {
        console.warn("Warning: The list of words is empty. Nothing to type.");
        return;
    }

    let currentWordIndex = 0;
    let currentCharIndex = 0;
    let isDeleting = false;

    const typingSpeed = 100;
    const deletingSpeed = 50;
    const pauseAfterWord = 1500;
    const pauseBeforeNext = 500;

    function animateText() {
        const activeWord = wordsToDisplay[currentWordIndex];

        if (isDeleting) {
            textDisplayArea.textContent = activeWord.substring(0, currentCharIndex - 1);
            currentCharIndex--;
        } else {
            textDisplayArea.textContent = activeWord.substring(0, currentCharIndex + 1);
            currentCharIndex++;
        }

        let delayForNextStep = typingSpeed;

        if (!isDeleting && currentCharIndex === activeWord.length) {
            delayForNextStep = pauseAfterWord;
            isDeleting = true;
        } else if (isDeleting && currentCharIndex === 0) {
            isDeleting = false;
            currentWordIndex = (currentWordIndex + 1) % wordsToDisplay.length;
            delayForNextStep = pauseBeforeNext;
        } else if (isDeleting) {
            delayForNextStep = deletingSpeed;
        }
        setTimeout(animateText, delayForNextStep);
    }
    animateText();
});

const myCarouselElement = document.querySelector('#carouselCaptions')

        const carousel = new bootstrap.Carousel(myCarouselElement, {
           interval: 2000,
           touch: false
          })