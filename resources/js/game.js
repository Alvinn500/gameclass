// memory game
const cards = document.querySelectorAll(".memory-card");
const gameXP = document.getElementById("gameXP");
const gameCard = document.getElementById("gameCard");
const gameQuestion = document.getElementById("gameQuestion");
const sendGameXP = document.getElementById("sendGameXP");
const gameForm = document.getElementById("gameForm");

let hasFlippedCard = false;
let lockBoard = false;
let firstCard, secondCard;

function flipCard() {
    if (lockBoard || this === firstCard) return;

    this.classList.toggle("flip");

    const audio = new Audio("/sounds/tap-card.mp3");
    audio.play();

    if (!hasFlippedCard) {
        hasFlippedCard = true;
        firstCard = this;

        return;
    }

    hasFlippedCard = false;
    secondCard = this;

    checkForMatch();
}

function checkForMatch() {
    let isMatch =
        firstCard.dataset.game === secondCard.dataset.game &&
        firstCard.id != secondCard.id;

    isMatch ? disableCards() : unflipCards();
}

function checkGameComplete() {
    const allFlipped = [...cards].every((card) =>
        card.classList.contains("flip")
    );

    if (allFlipped) {
        setTimeout(() => {
            gameCard.classList.add("hidden");
            gameCard.classList.remove("grid");
            gameQuestion.classList.add("grid");
            gameQuestion.classList.remove("hidden");
        }, 800);
    }
}

function disableCards() {
    setTimeout(() => {
        const audio = new Audio("/sounds/card-match.mp3");
        audio.play();
        gameXP.innerHTML = parseInt(gameXP.innerHTML) + 50 + " XP";
        sendGameXP.value = parseInt(gameXP.innerHTML) + 50;
    }, 500);

    firstCard.removeEventListener("click", flipCard);
    secondCard.removeEventListener("click", flipCard);

    checkGameComplete();
}

function unflipCards() {
    lockBoard = true;

    setTimeout(() => {
        firstCard.classList.remove("flip");
        secondCard.classList.remove("flip");

        lockBoard = false;
    }, 500);
}

if (cards) {
    cards.forEach((card) => card.addEventListener("click", flipCard));
}

// finis

// manipulasi content modal game

let content = [
    {
        image: "/image/tutor-game-1.png",
        title: "Cara Mencocokan Gambar",
        description:
            "pilih 2 card dari 12 card yang ada dan cari gambar yang sama di kedua gambar tersebut",
    },
    {
        image: "/image/tutor-game-2.png",
        title: "Jika ada gambar yang cocok",
        description:
            "Jika kedua gambar cocok maka 2 gambar tersebut akan terbuka dua duanya",
    },
    {
        image: "/image/tutor-game-3.png",
        title: "Mendapatkan XP",
        description:
            "Kalian akan mendapatkan XP jika berhasil mencocokan gambar",
    },
];

const modalImage = document.getElementById("modalImage");
const modalTitle = document.getElementById("modalTitle");
const modalDescription = document.getElementById("modalDescription");
const prevButton = document.getElementById("prevButton");
const nextButton = document.getElementById("nextButton");

let contentPosition = 0;

function buildModal() {
    modalImage.src = content[contentPosition].image;
    modalTitle.innerHTML = content[contentPosition].title;
    modalDescription.innerHTML = content[contentPosition].description;

    prevButton.disabled = contentPosition === 0;
    // nextButton.disabled = contentPosition === content.length - 1;
}

if (modalImage) {
    buildModal();
    prevButton.addEventListener("click", () => {
        if (contentPosition > 0) {
            contentPosition--;
            buildModal();
        }
    });

    nextButton.addEventListener("click", () => {
        if (contentPosition < content.length - 1) {
            contentPosition++;
            buildModal();
        }

        if (contentPosition >= 2) {
            contentPosition++;
        }

        if (contentPosition === 4) {
            gameOverlay.classList.add("hidden");
            gameOverlay.classList.remove("flex");
            contentPosition = 0;
            buildModal();
        }
    });
}

// manipulasi modal game

const closeGameModal = document.getElementById("closeGameModal");
const gameOverlay = document.getElementById("gameOverlay");
const gameModal = document.getElementById("gameModal");
const tutorialButton = document.getElementById("tutorialButton");

if (tutorialButton) {
    tutorialButton.addEventListener("click", () => {
        gameOverlay.classList.remove("hidden");
        gameOverlay.classList.add("flex");
    });
}

if (gameOverlay) {
    gameOverlay.addEventListener("click", (event) => {
        if (event.target == gameOverlay) {
            gameOverlay.classList.add("hidden");
            gameOverlay.classList.remove("flex");
        }
    });
}

if (closeGameModal) {
    closeGameModal.addEventListener("click", () => {
        gameOverlay.classList.add("hidden");
        gameOverlay.classList.remove("flex");
        contentPosition = 0;
        buildModal();
    });
}

// manipulasi gameTime
const gameTime = document.getElementById("gameTime");
const startGame = document.getElementById("startGame");

if (gameTime) {
    let timeStr = gameTime.innerText.trim();
    let [minutes, seconds] = timeStr.split(":").map(Number);
    let totalSeconds = minutes * 60 + seconds;
    let timer = null;

    function updateTimer() {
        if (totalSeconds <= 0) {
            clearInterval(timer);
            gameTime.innerText = "00:00";
            cards.forEach((card) =>
                card.removeEventListener("click", flipCard)
            );
            gameForm.submit();
            // alert("Waktu Habis!");
            return;
        }

        totalSeconds--;
        let min = String(Math.floor(totalSeconds / 60)).padStart(2, "0");
        let sec = String(totalSeconds % 60).padStart(2, "0");

        gameTime.innerText = `${min}:${sec}`;
    }

    startGame.addEventListener("click", () => {
        if (!timer) {
            timer = setInterval(updateTimer, 1000);
        }
    });
}

// if (gameTime.innerText == "00:00") {
//     alert("Waktu Habis!");
// }
