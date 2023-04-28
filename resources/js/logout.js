const $logoutBtn = document.getElementById("logoutBtn");

if(logoutBtn) {
    $logoutBtn.addEventListener("click",(e)=> {
        alert("HOLA");
        e.preventDefault();
        const $formLogin = document.getElementById('logoutForm').submit(); 
    });
}