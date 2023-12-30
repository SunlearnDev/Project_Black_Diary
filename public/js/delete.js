 /* *******************  Script delete post ****************** */

        // Hiện from xác nhận
        function showConfirm() {
            openConfirm.classList.add('open');
            let postId = this.getAttribute('data-post-id')
            deleteOk.setAttribute('data-post-id', postId);
        }
        // cancel form xác nhận
        function closeConfirm() {
            openConfirm.classList.remove('open');
        }
        // xử lý sự kiện xác xóa bài viết   
        document.addEventListener('click', function(event) {
            const closestDeleteConfirm = event.target.closest('.delete-confirm');
            const postCount = document.getElementById('postCount');
            if (closestDeleteConfirm) {
                // Sự kiện được kích hoạt từ nút .delete-confirm hoặc từ con của nút đó
                let postId = closestDeleteConfirm.getAttribute('data-post-id');
                if (postId) {
                    $.ajax({
                        url: "user/delete/diary/" + postId,
                        method: "DELETE",
                        success: function(result) {
                            $("#" + result['post']).slideUp("slow");
                            postCount.textContent = parseInt(postCount.textContent) - 1;
                        },
                        error: function(error) {
                            console.error("Error:", error);
                        }
                    });
                }
            }
        });

        for (const delConfirm of delConfirms) {
            delConfirm.addEventListener('click', showConfirm);
        }
        if (openConfirm) {
            openConfirm.addEventListener('click', closeConfirm);
        }
