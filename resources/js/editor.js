const formSubject = document.getElementById("formSubject");

if (document.getElementById("editor") || formSubject) {
    const quill = new Quill("#editor", {
        theme: "snow",
        modules: {
            toolbar: "#toolbar",
        },
    });

    quill.format("color", "#171717");

    formSubject.addEventListener("submit", (e) => {
        const content = document.querySelector("#content");
        console.log("edit content", quill.root.innerHTML);
        content.value = quill.root.innerHTML; // Ambil konten HTML Quill
        // console.log(quill.root.innerHTML);
    });
}
