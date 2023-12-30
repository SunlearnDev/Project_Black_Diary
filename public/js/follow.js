/* ******************* Follow and Unfollow ****************** */
if (isFollowingBtn != null) {
    isFollowingBtn.addEventListener('click', async function() {
        let userId = this.getAttribute('data-user-id');
        let countFollow = document.getElementById('countFollow');
  
        const followBtn = this; // Thêm dòng này để sử dụng followBtn
        const isFollowed = followBtn.classList.contains('followed'); // Sử dụng followBtn thay vì this
        let url = 'user/' + userId;

        if (isFollowed) {
            url += '/unfollow';
            followBtn.textContent = 'Follow';
            followBtn.classList.remove('followed');
            countFollow.textContent = parseInt(countFollow.textContent) - 1;
        } else {
            url += '/follow';
            followBtn.textContent = 'Unfollow';
            followBtn.classList.add('followed');
            countFollow.textContent = parseInt(countFollow.textContent) + 1;
        }
        try {
            let response = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
            });
            if (!response.ok) {
                throw new Error(
                    `Network response was not ok: ${response.status} - ${response.statusText}`);
            }
            let data = await response.json();
        } catch (error) {
            console.log(error);
        }
    });
}