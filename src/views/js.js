document.addEventListener("DOMContentLoaded", function () {
    const tempoDelay = document.querySelectorAll(".acao");
    if (tempoDelay) {
        tempoDelay.forEach(function(nome) {
            nome.addEventListener("click", function (e) {
                e.preventDefault();
                const local = this.getAttribute('href');
                const delayy = 250;

                setTimeout(function () {
                    document.querySelector(local).scrollIntoView({
                        behavior: 'smooth'
                    });
                }, delayy);
            });
        })
    }
})