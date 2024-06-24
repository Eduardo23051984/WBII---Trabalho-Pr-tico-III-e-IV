document.addEventListener('DOMContentLoaded', function() {
    const postForm = document.getElementById('postForm');
    const postContent = document.getElementById('postContent');
    const postContainer = document.getElementById('postContainer');

    postForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const postText = postContent.value.trim();
        if (postText !== '') {
            createPost(postText);
            postContent.value = '';
        }
    });

    function createPost(content) {
        const postDiv = document.createElement('div');
        postDiv.className = 'card mb-3';

        const postBody = document.createElement('div');
        postBody.className = 'card-body';

        const flexDiv = document.createElement('div');
        flexDiv.className = 'd-flex align-items-center justify-content-between';

        const postText = document.createElement('p');
        postText.className = 'card-text';
        postText.textContent = content;

        const buttonGroup = document.createElement('div');
        const likeButton = document.createElement('button');
        likeButton.className = 'btn btn-sm btn-outline-primary me-2';
        likeButton.innerHTML = '<i class="bi bi-heart"></i> Curtir';
        likeButton.addEventListener('click', function() {
            likeButton.classList.toggle('btn-primary');
            likeButton.classList.toggle('btn-outline-primary');
        });

        const deleteButton = document.createElement('button');
        deleteButton.className = 'btn btn-sm btn-outline-danger';
        deleteButton.innerHTML = '<i class="bi bi-trash"></i> Excluir';
        deleteButton.addEventListener('click', function() {
            postDiv.remove();
        });

        buttonGroup.appendChild(likeButton);
        buttonGroup.appendChild(deleteButton);
        flexDiv.appendChild(postText);
        flexDiv.appendChild(buttonGroup);
        postBody.appendChild(flexDiv);
        postDiv.appendChild(postBody);
        postContainer.prepend(postDiv);
    }
});
