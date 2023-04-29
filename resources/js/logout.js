const $logoutBtn = document.getElementById("logoutBtn");

if(logoutBtn) {
    $logoutBtn.addEventListener("click",(e)=> {
        alert("Se ha cerrado la sesión");
        e.preventDefault();
        const $formLogin = document.getElementById('logoutForm').submit(); 
    });
}