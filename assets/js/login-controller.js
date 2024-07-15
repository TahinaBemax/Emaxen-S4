//document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById("loginForm");
    const alert = form.querySelector('.alert-box');

    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            sendAuthentification()
        })
    }
    function sendAuthentification(){
        const xhr = new XMLHttpRequest();
        const url = "http://localhost/garage/Login/authetification";
        const formData = new FormData(form);
        xhr.responseType = "json";

        xhr.onload = () => {
            if (xhr.status >= 500){
                hideMessage();
                showMessage("alert-danger", "Erreur de connexion au server");
                return ;
            }

            if (xhr.status === 200){
                    hideMessage();
                    const reponse = xhr.response;
                    if (reponse.success){
                        window.location.href = "http://localhost/garage/Home/";
                    } else {
                        showMessage("alert-danger", reponse.message);
                    }
            }
        }
        xhr.open("post", url, true);
        xhr.send(formData);
    }

    function showMessage(type, message){
        if (alert.classList.contains("alert-success")) {
            alert.classList.remove("alert-success") ;
        }
        if(alert.classList.contains("alert-danger")){
            alert.classList.remove("alert-danger");
        }
        alert.classList.remove("hide");

        alert.classList.add(type, "show");
        alert.textContent = message;
    }
    function hideMessage(){
        if (alert.classList.contains("alert-success")) {
            alert.classList.remove("alert-success") ;
        }
        if(alert.classList.contains("alert-danger")){
            alert.classList.remove("alert-danger");
        }
        alert.classList.remove("show");
        alert.classList.add("hide");
        alert.textContent = "";
    }
//})