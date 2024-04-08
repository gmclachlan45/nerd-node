async function deletePost(postId, userSession) {
    const endpoint = 'deletePost.php';
    const outputElement = document.getElementById('post-' + postId);
    var formData = new FormData();
    formData.append('id', postId);
    formData.append('userSession', userSession);

    fetch(endpoint, { method: 'POST', body: formData })
        .then(function (response) {
            return response.text();
        })
        .then(function (body) {
            outputElement.outerHTML="";

        });
}

async function dismissPost(postId, userSession) {
    const endpoint = 'dismissPost.php';
    const outputElement = document.getElementById('post-' + postId);
    var formData = new FormData();
    formData.append('id', postId);
    formData.append('userSession', userSession);
    fetch(endpoint, { method: 'POST', body: formData })
        .then(function (response) {
            return response.text();
        })
        .then(function (body) {
            outputElement.outerHTML="";
        });
}

async function deleteComment(postId, userSession) {
    const endpoint = 'deleteComment.php';
    const outputElement = document.getElementById('comment-' + postId);
    var formData = new FormData();
    formData.append('id', postId);
    formData.append('userSession', userSession);
    fetch(endpoint, { method: 'POST', body: formData })
        .then(function (response) {
            return response.text();
        })
        .then(function (body) {
            outputElement.outerHTML="";
        });
}

async function dismissComment(postId, userSession) {
    const endpoint = 'dismissComment.php';
    const outputElement = document.getElementById('comment-' + postId);
    var formData = new FormData();
    formData.append('id', postId);
    formData.append('userSession', userSession);
    fetch(endpoint, { method: 'POST', body: formData })
        .then(function (response) {
            return response.text();
        })
        .then(function (body) {
            outputElement.outerHTML="";
        });
}
