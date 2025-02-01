const formSubject = document.getElementById("formSubject");

if (formSubject) {
    formSubject.addEventListener("submit", (e) => {
        const content = document.querySelector("#content");
        console.log("edit content", quill.root.innerHTML);
        content.value = quill.root.innerHTML; // Ambil konten HTML Quill
        // console.log(quill.root.innerHTML);
    });
}

if (document.getElementById("editor")) {
    const quill = new Quill("#editor", {
        theme: "snow",
        modules: {
            toolbar: "#toolbar",
        },
    });
}
