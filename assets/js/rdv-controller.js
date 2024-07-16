document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById("application-form");
    const date = document.querySelector(".date-debut")
    const heure = document.querySelector(".heure-debut");
    const service = document.querySelector(".service");
    const success = document.querySelector(".success");
    const unsuccess = document.querySelector(".unsuccess");

    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            sendRdv();
        })
    }

    function sendRdv(){
        const xhr = new XMLHttpRequest();
        const url = "http://localhost/garage/Rdv/faireRendezVous";
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
                    const rep = xhr.response;
                    if (rep.success){
                        showMessage(success,"alert-success", rep.reponse);
                    } else {
                            showMessage(date,"alert-danger", rep.message.date);
                            showMessage(heure,"alert-danger", rep.message.heure);
                            showMessage(service,"alert-danger", rep.message.service);
                            showMessage(unsuccess,"alert-danger", rep.message.autre);
                    }
            }
        }
        xhr.open("post", url, true);
        xhr.send(formData);
    }

    function showMessage(box, type, message){
        if (box.classList.contains("alert-success")) {
            box.classList.remove("alert-success") ;
        }
        if(box.classList.contains("alert-danger")){
            box.classList.remove("alert-danger");
        }
        box.classList.remove("hide");

        box.classList.add(type, "show");
        box.textContent = message;
    }
    function hideMessage(){
        service.textContent = "";
        date.textContent = "";
        heure.textContent = "";
        success.textContent = "";
        unsuccess.textContent = "";
    }
})