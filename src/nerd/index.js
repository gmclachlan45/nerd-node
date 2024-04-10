async function upvote(postId, userSession) {
    const endpoint = '../upvote.php';
    const outputElement = document.getElementById('post-' + postId);
    var formData = new FormData();
    formData.append('id', postId);
    formData.append('userSession', userSession);
    formData.append('table', 'post');

    fetch(endpoint, { method: 'POST', body: formData })
        .then(function (response) {
            return response.text();
        })
        .then(function (body) {
            var num =outputElement.textContent;
            num = Number.parseInt(num.replace(/,/g,"")) + 1;
            outputElement.textContent =  num.toLocaleString("en-US");
        });
}



function downvote(postId, userSession) {
    const endpoint = '../downvote.php';
    const outputElement = document.getElementById('post-' + postId);
    var formData = new FormData();
    formData.append('id', postId);
    formData.append('userSession', userSession);
    formData.append('table', 'post');

    fetch(endpoint, { method: 'POST', body: formData })
        .then(function (response) {
            return response.text();
        })
        .then(function (body) {
            var num =outputElement.textContent;
            num = Number.parseInt(num.replace(/,/g,"")) - 1;
            outputElement.textContent =  num.toLocaleString("en-US");
        });
}


function disableUser(uname, userSession) {
    const endpoint = './disableUser.php';
    const outputElement = document.getElementById("pageTitle");
    const changeButton = document.getElementById("enableDisable");
    var formData = new FormData();
    formData.append('uname', uname);
    formData.append('userSession', userSession);
    fetch(endpoint, { method: 'POST', body: formData })
        .then(function (response) {
            return response.text();
        })
        .then(function (body) {
            outputElement.textContent =  outputElement.textContent + " - DISABLED";
            changeButton.classList.remove("disUser");
            changeButton.classList.add("enUser");
            changeButton.textContent = "Enable User";
            changeButton.onclick = function() {enableUser(uname,userSession)};
        });
}

function enableUser(uname, userSession) {
    const endpoint = './enableUser.php';
    const outputElement = document.getElementById("pageTitle");
    const changeButton = document.getElementById("enableDisable");
    var formData = new FormData();
    formData.append('uname', uname);
    formData.append('userSession', userSession);
    fetch(endpoint, { method: 'POST', body: formData })
        .then(function (response) {
            return response.text();
        })
        .then(function (body) {
            outputElement.textContent =  outputElement.textContent.split("-")[0];
            changeButton.classList.remove("enUser");
            changeButton.classList.add("disUser");
            changeButton.textContent = "Disable User";
            changeButton.onclick = function() {disableUser(uname,userSession)};
        });
}
function deleteUser(uname, userSession) {
    const endpoint = './deleteUser.php';
    const outputElement = document.getElementById("pageTitle");
    const changeButton = document.getElementById("enableDisable");
    var formData = new FormData();
    formData.append('uname', uname);
    formData.append('userSession', userSession);
    fetch(endpoint, { method: 'POST', body: formData })
        .then(function (response) {
            return response.text();
        })
        .then(function (body) {
            alert("User Deleted!")
            location.href = "..";

        });
}
