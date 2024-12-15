function updateFileName(input) {
    console.log("Function called");
    const fileName = input.files[0] ? input.files[0].name : "No file chosen";
    document.getElementById("file_name").textContent = fileName;
}