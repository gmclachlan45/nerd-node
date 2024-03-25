async function upvote(postId, userSession) {
    const endpoint = 'upvote.php';
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
    const endpoint = 'downvote.php';
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
