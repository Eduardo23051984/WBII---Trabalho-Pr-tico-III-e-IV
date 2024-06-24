document.addEventListener('DOMContentLoaded', function() {
    const postForm = document.getElementById('postForm');
    const postContent = document.getElementById('postContent');
    const postContainer = document.getElementById('postContainer');

    postForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const postText = postContent.value.trim();
        if (postText !== '') {
            savePost(postText);
            postContent.value = '';
        }
    });

    function savePost(content) {
        fetch('index.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'action': 'save',
                'texto': content
            })
        })
        .then(() => {
            location.reload();
        });
    }

    document.querySelectorAll('.like-button').forEach(button => {
        button.addEventListener('click', function() {
            const postId = this.closest('.card').dataset.id;
            toggleLike(postId, this);
        });
    });

    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function() {
            const postId = this.closest('.card').dataset.id;
            deletePost(postId, this.closest('.card'));
        });
    });

    function toggleLike(postId, likeButton) {
        fetch('index.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'action': 'like',
                'id': postId
            })
        })
        .then(() => {
            likeButton.classList.toggle('btn-primary');
            likeButton.classList.toggle('btn-outline-primary');
        });
    }

    function deletePost(postId, postElement) {
        fetch('index.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                'action': 'delete',
                'id': postId
            })
        })
        .then(() => {
            postElement.remove();
        });
    }
});
