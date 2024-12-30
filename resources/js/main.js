import axios from "axios";

let humburgerDashboard = document.getElementById("humburger-dashboard");
let sidebar = document.getElementById("sidebar");

humburgerDashboard.addEventListener("click", () => {
    humburgerDashboard.classList.toggle("humburger-active");
    sidebar.classList.toggle("-translate-x-96");
    // setTimeout(() => {
    //     sidebar.classList.toggle("absolute");
    // }, 250);
});

let closeSidebar = document.getElementById("close");

closeSidebar.addEventListener("click", () => {
    humburgerDashboard.classList.toggle("humburger-active");
    sidebar.classList.toggle("-translate-x-96");
    console.log("close");
});

let lesson = document.getElementById("lesson");
let content = document.getElementById("content");

lesson.addEventListener("click", () => {
    lesson.children[1].classList.toggle("rotate-90");
    lesson.classList.toggle("rounded-xl");
    lesson.classList.toggle("rounded-t-xl");
    content.classList.toggle("hidden");
});

let modalCreate = document.getElementById("modalCreate");
let addLesson = document.getElementById("addLesson");

modalCreate.addEventListener("click", (event) => {
    if (event.target == modalCreate) {
        modalCreate.classList.add("hidden");
        modalCreate.classList.remove("flex");
    }
});

addLesson.addEventListener("click", () => {
    modalCreate.classList.remove("hidden");
    modalCreate.classList.add("flex");
});

let modalEdit = document.getElementById("modalEdit");

modalEdit.addEventListener("click", (event) => {
    if (event.target == modalEdit) {
        modalEdit.classList.add("hidden");
        modalEdit.classList.remove("flex");
    }
});

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
