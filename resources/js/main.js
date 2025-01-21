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

const quizzes = document.querySelectorAll("#quiz");

quizzes.forEach((quiz) => {
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

if (editQuiz) {
    editQuiz.addEventListener("click", () => {
        modalEdit.classList.toggle("hidden");
        modalEdit.classList.toggle("flex");
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

const formEditQuiz = document.getElementById("formEditQuiz");
const questionInput = document.getElementById(`editQuestion`);
const a = document.getElementById(`editA`);
const b = document.getElementById(`editB`);
const c = document.getElementById(`editC`);
const d = document.getElementById(`editD`);
const e = document.getElementById(`editE`);
const answareInput = document.getElementById(`editAnsware`);
const editQuestion = document.querySelectorAll(`.buttonEditQuestion`);
const editQuizClose = document.getElementById(`edit_quiz_close`);

if (editQuizClose) {
    editQuizClose.addEventListener("click", () => {
        parentEditQuiz.classList.add("hidden");
    });
}

if (editQuestion) {
    editQuestion.forEach((question) => {
        question.addEventListener("click", () => {
            let options = JSON.parse(question.getAttribute("data-options"));

            formEditQuiz.action =
                "/quiz/question/edit/" + question.getAttribute("data-quizId");
            questionInput.value = question.getAttribute("data-question");
            a.value = options.a;
            b.value = options.b;
            c.value = options.c;
            d.value = options.d;
            e.value = options.e;
            answareInput.value = question.getAttribute("data-answare");
        });
        question.addEventListener("click", () => {
            parentEditQuiz.classList.remove("hidden");
        });
    });
}

// modal create essay
const addEssay = document.getElementById("addEssay");
const essayClose = document.getElementById("essay_close");
const parrentEssayOverlay = document.getElementById("parent_essay_overlay");
const essayOverlay = document.getElementById("essay_overlay");

if (addEssay) {
    addEssay.addEventListener("click", () => {
        parrentEssayOverlay.classList.remove("hidden");
    });
}

if (essayClose) {
    essayClose.addEventListener("click", () => {
        parrentEssayOverlay.classList.add("hidden");
    });
}

if (essayOverlay) {
    essayOverlay.addEventListener("click", (event) => {
        if (event.target == essayOverlay) {
            parrentEssayOverlay.classList.add("hidden");
        }
    });
}

// manipulasi essay
const essays = document.querySelectorAll("#essay");

essays.forEach((essay) => {
    essay.addEventListener("click", () => {
        const essayId = essay.getAttribute("data-essayId");
        document.getElementById(`essay${essayId}`).classList.toggle("hidden");
        essay.children[1].children[0].classList.toggle("rotate-90");
    });
});

// manipulasi edit essay
const buttonEditEssay = document.querySelectorAll("#buttonEditEssay");
const parentEditEssayOverlay = document.getElementById(
    "parent_edit_essay_overlay"
);
const editEssayOverlay = document.getElementById("edit_essay_overlay");
const editEssayClose = document.getElementById("edit_essay_close");
const inputEditEssay = document.getElementById("inputEditEssay");
const formEditEssay = document.getElementById("formEditEssay");

if (buttonEditEssay) {
    buttonEditEssay.forEach((essay) => {
        essay.addEventListener("click", () => {
            inputEditEssay.value = essay.getAttribute("data-question");
            formEditEssay.action =
                "/essay/question/edit/" + essay.getAttribute("data-essayId");
            console.log(essay.getAttribute("data-essayId"));
            parentEditEssayOverlay.classList.toggle("hidden");
            parentEditEssayOverlay.classList.toggle("flex");
        });
    });
}

if (editEssayOverlay) {
    editEssayOverlay.addEventListener("click", (event) => {
        if (event.target == editEssayOverlay) {
            parentEditEssayOverlay.classList.add("hidden");
        }
    });
}

if (editEssayClose) {
    editEssayClose.addEventListener("click", () => {
        parentEditEssayOverlay.classList.add("hidden");
    });
}

// manipulasi edit task essay
const editEssay = document.getElementById("editEssay");
const modalEditTaskEssay = document.getElementById("modalEditTaskEssay");

if (editEssay) {
    editEssay.addEventListener("click", () => {
        modalEditTaskEssay.classList.toggle("hidden");
        modalEditTaskEssay.classList.toggle("flex");
    });
}

// manipulasi add upload
const addUpload = document.getElementById("addUpload");
const parentUploadOverlay = document.getElementById("parent_upload_overlay");
const uploadOverlay = document.getElementById("upload_overlay");
const closeUpload = document.getElementById("upload_close");

if (addUpload) {
    addUpload.addEventListener("click", () => {
        parentUploadOverlay.classList.remove("hidden");
    });
}

if (uploadOverlay) {
    uploadOverlay.addEventListener("click", (event) => {
        if (event.target == uploadOverlay) {
            parentUploadOverlay.classList.add("hidden");
        }
    });
}

if (closeUpload) {
    closeUpload.addEventListener("click", () => {
        parentUploadOverlay.classList.add("hidden");
    });
}

// manipulasi edit upload modal
const editUploadTask = document.getElementById("editUploadTask");
const modalEditUpload = document.getElementById("modalEditUpload");
const buttonEditUpload = document.getElementById("buttonEditUpload");
const parent_edit_upload_overlay = document.getElementById(
    "parent_edit_upload_overlay"
);
const edit_upload_overlay = document.getElementById("edit_upload_overlay");
const edit_upload_close = document.getElementById("edit_upload_close");

if (editUploadTask) {
    editUploadTask.addEventListener("click", () => {
        modalEditUpload.classList.remove("hidden");
        modalEditUpload.classList.add("flex");
    });
}

if (modalEditUpload) {
    modalEditUpload.addEventListener("click", (event) => {
        if (event.target == modalEditUpload) {
            modalEditUpload.classList.add("hidden");
            modalEditUpload.classList.remove("flex");
        }
    });
}

if (buttonEditUpload) {
    buttonEditUpload.addEventListener("click", () => {
        parent_edit_upload_overlay.classList.remove("hidden");
    });
}

if (edit_upload_overlay) {
    edit_upload_overlay.addEventListener("click", (event) => {
        if (event.target == edit_upload_overlay) {
            parent_edit_upload_overlay.classList.add("hidden");
        }
    });
}

if (edit_upload_close) {
    edit_upload_close.addEventListener("click", () => {
        parent_edit_upload_overlay.classList.add("hidden");
    });
}

// hideshow multipleChoice
document.addEventListener("DOMContentLoaded", () => {
    function hideshow(hide, show) {
        console.log(hide, show);
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
