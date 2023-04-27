const $logoutBtn = document.getElementById("logoutBtn");

if($logout) {
    document.addEventListener("click",(e)=> {
        // alert("HOLA");
        e.preventDefault();
        const $formLogin = document.getElementById('logoutForm').submit(); 
    });
}