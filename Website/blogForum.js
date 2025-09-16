function clearText() {
    if (confirm("are you sure you want to clear the text?")) {
        document.getElementById("title").value = "";
        document.getElementById("content").value = "";
        document.getElementById("title").style.borderColor = "initial";
        document.getElementById("content").style.borderColor = "initial";
    }
}

function postContent(event) {
    const title = document.getElementById("title").value.trim();
    const content = document.getElementById("content").value.trim();

    if (title === "" || content === "") {
        event.preventDefault();
        alert("Please fill in all fields.");
    }

    if (title === "") {
        document.getElementById("title").style.borderColor = "red";
    }

    if (content === "") {
        document.getElementById("content").style.borderColor = "red";
    }
}

function resetTitleBorder() {
    document.getElementById("title").style.borderColor = "initial";
    document.getElementById("content").style.borderColor = "initial";
}

function resetContentBorder() {
    document.getElementById("content").style.borderColor = "initial";
    document.getElementById("title").style.borderColor = "initial";
}

// invalid login credentials alert
function invalidLogin() {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('error')) {
        alert('Invalid login credentials. Please try again.');
    }
}

function hidePreview() {
    document.getElementById("previewScreen").style.visibility = "hidden";
    document.getElementById("blogs").style.visibility = "initial";
}

function previewContent() {
    const title = document.getElementById("title").value.trim();
    const content = document.getElementById("content").value.trim();

    if (title === "" || content === "") {
        alert("Please fill in all fields.");
    } else {
        // Populate the preview modal
        document.getElementById("blogs").style.visibility = "hidden";
        document.getElementById("previewScreen").style.visibility = "initial";
        document.getElementById("previewTitle").innerText = title;
        document.getElementById("previewContent").innerText = content;

        // Format the current date and time
        const now = new Date();
        const formattedDate = now.toISOString().replace('T', ' ').split('.')[0] + " (UTC)";
        document.getElementById("previewTime").innerText = "Posted on : " + formattedDate;

        // Populate hidden inputs for the preview form
        document.getElementById("hiddenTitle").value = title;
        document.getElementById("hiddenContent").value = content;
    }
}

document.addEventListener("DOMContentLoaded", hidePreview);
document.addEventListener("DOMContentLoaded", invalidLogin);
document.getElementById("clearButton").addEventListener("click", clearText);
document.getElementById("postButton").addEventListener("click", postContent);
document.getElementById("title").addEventListener("input", resetTitleBorder);
document.getElementById("content").addEventListener("input", resetContentBorder);
document.getElementById("previewButton").addEventListener("click", previewContent);
document.getElementById("editButton").addEventListener("click", hidePreview);