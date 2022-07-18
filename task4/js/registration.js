"use strict";

document.getElementsByTagName('form')[0]
    .addEventListener('submit', function (event) {
        event.preventDefault();

        fetch('reg.php', {
            method: 'post',
            body: new FormData(this)
        })
            .then(response => response.text())
            .then(text => {
                let message = document.getElementById("message");
                message.innerText = text;
                setTimeout(() => { message.innerText = ""; }, 3000);
            });
        this.reset();
    });