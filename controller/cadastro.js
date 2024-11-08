

document.getElementById('cadastroForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;

    if (password !== confirmPassword) {
        alert('As senhas não coincidem.');
        return;
    }

    alert(`Usuário: ${username}\nEmail: ${email}`);
    // Redirecionar para a homepage
    window.location.href = '../view/homepage.html';
});
