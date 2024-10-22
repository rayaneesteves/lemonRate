document.addEventListener("DOMContentLoaded", () => {
    const editBtn = document.getElementById("edit-profile-btn");
    const saveBtn = document.getElementById("save-profile-btn");
    const cancelBtn = document.getElementById("cancel-edit-btn");
    const avatar = document.getElementById("profile-avatar");
    const avatarInput = document.getElementById("avatar-input");
    const nameView = document.getElementById("profile-name-view");
    const nameInput = document.getElementById("name-input");
    const descriptionView = document.getElementById("profile-description");
    const descriptionInput = document.getElementById("description-input");
    const editActions = document.getElementById("edit-actions");
    const profileName = document.getElementById("profile-name");

    // Habilitar edição ao clicar no botão "Editar Perfil"
    editBtn.addEventListener("click", () => {
        nameView.style.display = "none";
        nameInput.style.display = "block";

        descriptionView.style.display = "none";
        descriptionInput.style.display = "block";

        editActions.style.display = "block";
        editBtn.style.display = "none"; // Ocultar o botão de editar durante a edição
    });

    // Salvar as mudanças no perfil
    saveBtn.addEventListener("click", () => {
        const newName = nameInput.value;
        const newDescription = descriptionInput.value;

        // Atualizar a interface com as mudanças
        nameView.textContent = newName;
        descriptionView.textContent = newDescription;
        profileName.textContent = newName; // Atualizar o nome no cabeçalho

        // Ocultar inputs e mostrar os novos valores
        nameView.style.display = "block";
        nameInput.style.display = "none";
        descriptionView.style.display = "block";
        descriptionInput.style.display = "none";

        // Ocultar as ações de edição e mostrar o botão de editar novamente
        editActions.style.display = "none";
        editBtn.style.display = "block";
    });

    // Cancelar a edição
    cancelBtn.addEventListener("click", () => {
        // Restaurar os valores originais
        nameInput.value = nameView.textContent;
        descriptionInput.value = descriptionView.textContent;

        // Ocultar inputs e mostrar os valores antigos
        nameView.style.display = "block";
        nameInput.style.display = "none";
        descriptionView.style.display = "block";
        descriptionInput.style.display = "none";

        editActions.style.display = "none";
        editBtn.style.display = "block";
    });

    // Trocar a foto de perfil ao clicar na imagem
    avatar.addEventListener("click", () => {
        avatarInput.click();
    });

    // Atualizar a imagem de perfil quando o usuário escolher um arquivo
    avatarInput.addEventListener("change", () => {
        const file = avatarInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                avatar.src = e.target.result; // Atualiza o src da imagem para a nova imagem escolhida
            };
            reader.readAsDataURL(file); // Ler o arquivo e exibir a imagem como URL
        }
    });
});
