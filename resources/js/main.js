// Humburger
let humburgerDashboard = document.getElementById("humburger-dashboard");
let sidebar = document.getElementById("sidebar");

if (humburgerDashboard) {
    humburgerDashboard.addEventListener("click", () => {
        humburgerDashboard.classList.toggle("humburger-active");
        sidebar.classList.toggle("-translate-x-96");
    });
}

const openSidebar = document.getElementById("openSidebar");

if (openSidebar) {
    openSidebar.addEventListener("click", () => {
        sidebar.classList.toggle("-translate-x-96");
    });
}

// Sidebar
let closeSidebar = document.getElementById("close");

if (closeSidebar) {
    closeSidebar.addEventListener("click", () => {
        humburgerDashboard.classList.toggle("humburger-active");
        sidebar.classList.toggle("-translate-x-96");
    });
}

// Modal
let modalCreate = document.getElementById("modalCreate");
let addLesson = document.getElementById("addLesson");

if (modalCreate) {
    modalCreate.addEventListener("click", (event) => {
        if (event.target == modalCreate) {
            modalCreate.classList.add("hidden");
            modalCreate.classList.remove("flex");
        }
    });
}

if (addLesson) {
    addLesson.addEventListener("click", () => {
        modalCreate.classList.remove("hidden");
        modalCreate.classList.add("flex");
    });
}

// Manipulasi Form Lesson
let editLesson = document.querySelectorAll("#editLesson");
let inputLesson = document.getElementById("inputLesson");
let deleteForm = document.getElementById("deleteForm");
let editForm = document.getElementById("editForm");

editLesson.forEach((lesson) => {
    lesson.addEventListener("click", () => {
        inputLesson.value = lesson.getAttribute("data-name");

        deleteForm.action =
            "/teacher/class/" +
            lesson.getAttribute("data-classId") +
            "/lesson/delete/" +
            lesson.getAttribute("data-lessonId");

        editForm.action =
            "/teacher/class/" +
            lesson.getAttribute("data-classId") +
            "/edit/" +
            lesson.getAttribute("data-lessonId");

        modalEdit.classList.remove("hidden");
        modalEdit.classList.add("flex");
    });
});

// Manipulasi Content
const lessons = document.querySelectorAll("#lesson");

lessons.forEach((lesson) => {
    lesson.addEventListener("click", () => {
        const lessonId = lesson.getAttribute("data-lesson-id");
        const content = document.getElementById(`content${lessonId}`);

        lesson.children[1].classList.toggle("rotate-90");
        lesson.classList.toggle("rounded-xl");
        lesson.classList.toggle("rounded-t-xl");
        lesson.classList.toggle("bg-violet-700");
        content.classList.toggle("hidden");
    });
});

// badge tooltip

const item = document.querySelectorAll("#item");
const tooltip = document.querySelectorAll(".tooltip");

item.forEach((item, index) => {
    item.addEventListener("mouseover", () => {
        tooltip[index].classList.remove("hidden");
    });
    item.addEventListener("mouseout", () => {
        tooltip[index].classList.add("hidden");
    });
});

// hideshow multipleChoice
document.addEventListener("DOMContentLoaded", () => {
    function hideshow(hide, show) {
        let element = document.getElementById(show);
        if (element) {
            document.getElementById(hide).style.display = "none";
            element.style.display = "flex";
        } else {
            document.getElementById(hide).style.display = "none";
            document.getElementById("end").style.display = "flex";
        }
    }
    window.hideshow = hideshow;
});

// datatable
import DataTable from "datatables.net-dt";

document.addEventListener("DOMContentLoaded", () => {
    const table = document.querySelector("#example");
    if (table) {
        new DataTable(table, {
            paging: true,
            searching: true,
            responsive: true,
            order: [[0, "asc"]],
            language: {
                search: "Find:",
                lengthMenu: "Show _MENU_ entries",
            },
        });
    }
});

// manipulasi updateScore
const updateScore = document.getElementById("updateScore");
const parentScoreOverlay = document.getElementById("parent_score_overlay");
const scoreOverlay = document.getElementById("score_overlay");
const scoreClose = document.getElementById("score_close");

if (updateScore) {
    updateScore.addEventListener("click", () => {
        parentScoreOverlay.classList.remove("hidden");
    });
}

if (scoreOverlay) {
    scoreOverlay.addEventListener("click", (event) => {
        if (event.target == scoreOverlay) {
            parentScoreOverlay.classList.add("hidden");
        }
    });
}

if (scoreClose) {
    scoreClose.addEventListener("click", () => {
        parentScoreOverlay.classList.add("hidden");
    });
}

// modal confirm class
const deleteUser = document.getElementById("deleteUser");
const deleteClass = document.getElementById("deleteClass");
const confirmOverlay = document.getElementById("confirm_overlay");
const confirmModal = document.getElementById("confirm_modal");
const unconfirm = document.getElementById("unconfirm");
const leaveClass = document.getElementById("leaveClass");

if (deleteClass) {
    deleteClass.addEventListener("click", () => {
        confirmOverlay.classList.remove("hidden");
    });
}

if (deleteUser) {
    deleteUser.addEventListener("click", () => {
        confirmOverlay.classList.remove("hidden");
        confirmOverlay.classList.add("flex");
    });
}

if (leaveClass) {
    leaveClass.addEventListener("click", () => {
        confirmOverlay.classList.remove("hidden");
    });
}

if (confirmModal) {
    confirmModal.addEventListener("click", (event) => {
        if (event.target == confirmModal) {
            confirmOverlay.classList.add("hidden");
        }
    });
}

if (unconfirm) {
    unconfirm.addEventListener("click", () => {
        confirmOverlay.classList.add("hidden");
    });
}

if (confirmOverlay) {
    confirmOverlay.addEventListener("click", (event) => {
        if (event.target == confirmOverlay) {
            confirmOverlay.classList.add("hidden");
            confirmOverlay.classList.remove("flex");
        }
    });
}

// manipulasi add game
const emptyGame = document.getElementById("emptyGame");
const addGame = document.getElementById("addGame");
const addImgaeGame = document.getElementById("addImageGame");

if (addGame) {
    addGame.addEventListener("click", () => {
        addImgaeGame.classList.remove("hidden");
        emptyGame.classList.add("hidden");
    });
}

// manipulasi modal edit task
const ButtonEditTask = document.getElementById("ButtonEditTask");
const modalEditTask = document.getElementById("modalEditTask");

if (ButtonEditTask) {
    ButtonEditTask.addEventListener("click", () => {
        modalEditTask.classList.remove("hidden");
        modalEditTask.classList.add("flex");
    });
}

if (modalEditTask) {
    modalEditTask.addEventListener("click", (even) => {
        if (even.target == modalEditTask) {
            modalEditTask.classList.add("hidden");
            modalEditTask.classList.remove("flex");
        }
    });
}

// manipulasi create challenge
const buttonCreateChallenge = document.getElementById("buttonCreateChallenge");
const create_challenge_overlay = document.getElementById(
    "create_challenge_overlay"
);
const modal_create_challenge = document.getElementById(
    "modal_create_challenge"
);
const create_challenge_close = document.getElementById(
    "create_challenge_close"
);

if (buttonCreateChallenge) {
    buttonCreateChallenge.addEventListener("click", () => {
        create_challenge_overlay.classList.remove("hidden");
    });
}

if (modal_create_challenge) {
    modal_create_challenge.addEventListener("click", (event) => {
        if (event.target == modal_create_challenge) {
            create_challenge_overlay.classList.add("hidden");
        }
    });
}

if (create_challenge_close) {
    create_challenge_close.addEventListener("click", () => {
        create_challenge_overlay.classList.add("hidden");
    });
}

// manipulasi edit challenge
const buttonEditChallenge = document.getElementById("buttonEditChallenge");
const edit_challenge_overlay = document.getElementById(
    "edit_challenge_overlay"
);
const modal_edit_challenge = document.getElementById("modal_edit_challenge");
const edit_challenge_close = document.getElementById("edit_challenge_close");

if (buttonEditChallenge) {
    buttonEditChallenge.addEventListener("click", () => {
        edit_challenge_overlay.classList.remove("hidden");
    });
}

if (modal_edit_challenge) {
    modal_edit_challenge.addEventListener("click", (event) => {
        if (event.target == modal_edit_challenge) {
            edit_challenge_overlay.classList.add("hidden");
        }
    });
}

if (edit_challenge_close) {
    edit_challenge_close.addEventListener("click", () => {
        edit_challenge_overlay.classList.add("hidden");
    });
}

// manipulasi edit quiz
const parentEditQuiz = document.getElementById("parent_edit_quiz_overlay");
const editQuizOverlay = document.getElementById("edit_quiz_overlay");

if (editQuizOverlay && parentEditQuiz) {
    editQuizOverlay.addEventListener("click", (event) => {
        if (event.target == editQuizOverlay) {
            parentEditQuiz.classList.toggle("hidden");
        }
    });
}

const buttonEditQuiz = document.querySelectorAll("#buttonEditChallenge");
const formEditQuiz = document.getElementById("formEditQuiz");
const editQuizQuestion = document.getElementById(`editQuizQuestion`);
const editA = document.getElementById(`editA`);
const editB = document.getElementById(`editB`);
const editC = document.getElementById(`editC`);
const editE = document.getElementById(`editD`);
const editD = document.getElementById(`editE`);
const editQuestionAnswer = document.getElementById(`editQuestionAnswer`);

if (buttonEditQuiz) {
    buttonEditQuiz.forEach((question) => {
        question.addEventListener("click", () => {
            let options = JSON.parse(question.dataset.options);

            formEditQuiz.action = "/quiz/question/edit/" + question.dataset.id;
            editQuizQuestion.value = question.dataset.question;
            editA.value = options.a;
            editB.value = options.b;
            editC.value = options.c;
            editD.value = options.d;
            editE.value = options.e;
            editQuestionAnswer.value = question.dataset.answare;
        });
        question.addEventListener("click", () => {
            edit_challenge_overlay.classList.remove("hidden");
        });
    });
}

// manipulasi question

const quizzes = document.querySelectorAll("#quiz");

quizzes.forEach((quiz) => {
    quiz.addEventListener("click", () => {
        const quizId = quiz.getAttribute("data-quizId");
        const quizOption = document.getElementById(`quizOption${quizId}`);

        quiz.children[1].classList.toggle("rotate-90");
        quiz.classList.toggle("rounded-2xl");
        quiz.classList.toggle("rounded-t-2xl");
        quiz.classList.toggle("bg-violet-700");
        quizOption.classList.toggle("hidden");
    });
});

// manipulasi edit essay
const buttonEditEssay = document.querySelectorAll("#buttonEditEssay");
const inputEditEssay = document.getElementById("inputEditEssay");
const formEditEssay = document.getElementById("formEditEssay");

if (buttonEditEssay) {
    buttonEditEssay.forEach((essay) => {
        essay.addEventListener("click", () => {
            inputEditEssay.value = essay.dataset.question;
            formEditEssay.action = "/essay/question/edit/" + essay.dataset.id;
            edit_challenge_overlay.classList.toggle("hidden");
            edit_challenge_overlay.classList.toggle("flex");
        });

        essay.addEventListener("click", () => {
            edit_challenge_overlay.classList.remove("hidden");
        });
    });
}

// manipulasi essay
const essays = document.querySelectorAll("#essay");

essays.forEach((essay) => {
    essay.addEventListener("click", () => {
        const essayId = essay.getAttribute("data-essayId");
        document.getElementById(`essay${essayId}`).classList.toggle("hidden");

        essay.classList.toggle("rounded-2xl");
        essay.classList.toggle("rounded-t-2xl");
        essay.classList.toggle("bg-violet-700");
        essay.children[1].children[0].classList.toggle("rotate-90");
    });
});
