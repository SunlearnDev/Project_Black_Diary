 /* ******************* Script like & unlike post ****************** */

 if (reactionsContainer != null) {
    reactionsContainer.addEventListener('click', async function(event) {
        const btnIcon = event.target.closest('.js-button-icon');
        const likeCountLabel = document.getElementById('likeCount');
        if (btnIcon != null) {
            let userId = btnIcon.getAttribute('data-reaction-id');
            const likeBtn = btnIcon.classList.contains('likeBtn');
            let url = 'user/' + userId;
            if (likeBtn) {
                url += '/unlikes',
                btnIcon.classList.remove('bg-red-100', 'likeBtn', 'rounded-full');
                btnIcon.classList.add('rounded-xl');
                likeCountLabel.textContent = parseInt(likeCountLabel.textContent) - 1;
                console.log('Unlike action performed');
            } else {
                url += '/likes',
                btnIcon.classList.remove('rounded-xl');
                btnIcon.classList.add('bg-red-100', 'likeBtn', 'rounded-full');
                likeCountLabel.textContent = parseInt(likeCountLabel.textContent) + 1;
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
            }catch (error) {
            console.log(error);
            }
        }
    });
}