import axios from "axios";

// Humburger
let humburgerDashboard = document.getElementById("humburger-dashboard");
let sidebar = document.getElementById("sidebar");

humburgerDashboard.addEventListener("click", () => {
    humburgerDashboard.classList.toggle("humburger-active");
    sidebar.classList.toggle("-translate-x-96");
    // setTimeout(() => {
    //     sidebar.classList.toggle("absolute");
    // }, 250);
});

// Sidebar
let closeSidebar = document.getElementById("close");

closeSidebar.addEventListener("click", () => {
    humburgerDashboard.classList.toggle("humburger-active");
    sidebar.classList.toggle("-translate-x-96");
    console.log("close");
});

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

let modalEdit = document.getElementById("modalEdit");

if (modalEdit) {
    modalEdit.addEventListener("click", (event) => {
        if (event.target == modalEdit) {
            modalEdit.classList.add("hidden");
            modalEdit.classList.remove("flex");
        }
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
        content.classList.toggle("hidden");
    });
});

// badge tooltip

const badge = document.querySelectorAll("#badge");
const tooltip = document.querySelectorAll(".tooltip");

badge.forEach((badge, index) => {
    badge.addEventListener("mouseover", () => {
        console.log("mouseover");
        tooltip[index].classList.remove("hidden");
    });
    badge.addEventListener("mouseout", () => {
        tooltip[index].classList.add("hidden");
    });
});

// quiz modal
const parentQuizOverlay = document.getElementById("parent_quiz_overlay");
const quizOverlay = document.getElementById("quiz_overlay");
const quizModal = document.getElementById("quiz_modal");
const addQuiz = document.getElementById("addQuiz");
const quizClose = document.getElementById("quiz_close");

if (quizOverlay && quizModal) {
    quizOverlay.addEventListener("click", (event) => {
        if (event.target == quizOverlay) {
            parentQuizOverlay.classList.toggle("hidden");
        }
    });
}

if (addQuiz) {
    addQuiz.addEventListener("click", () => {
        parentQuizOverlay.classList.toggle("hidden");
    });
}

if (quizClose) {
    quizClose.addEventListener("click", () => {
        parentQuizOverlay.classList.toggle("hidden");
    });
}

// manipulasi question

const quiz = document.querySelectorAll("#quiz");

quiz.forEach((quiz) => {
    quiz.addEventListener("click", () => {
        const quizId = quiz.getAttribute("data-quizId");
        const quizOption = document.getElementById(`quizOption${quizId}`);

        quiz.children[1].classList.toggle("rotate-90");
        quiz.classList.toggle("rounded-2xl");
        quiz.classList.toggle("rounded-t-2xl");
        quizOption.classList.toggle("hidden");
    });
});

// manupalasi quiz
const editQuiz = document.getElementById("editQuiz");
const inputTask = document.getElementById("inputTask");

if (editQuiz) {
    editQuiz.addEventListener("click", () => {
        modalEdit.classList.toggle("hidden");
        modalEdit.classList.toggle("flex");
    });
}
