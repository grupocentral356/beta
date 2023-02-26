function criptografarSenha() {
        // Obtém a senha do formulário
        var password = document.getElementById("senha").value;
        
        // Criptografa a senha usando SHA-256
        var hash = CryptoJS.SHA256(password);
        
        // Define a senha criptografada como valor do campo de senha
        document.getElementById("senha").value = hash;
}