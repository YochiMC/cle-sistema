function setupModal(openButtonSelector, modalSelector, closeButtonSelector) {
    const btnAbrirModal = document.querySelector(openButtonSelector);
    const modal = document.querySelector(modalSelector);
    const btnCerrarModal = document.querySelector(closeButtonSelector);

    if (btnAbrirModal && modal && btnCerrarModal) {
        btnAbrirModal.addEventListener("click", () => {
            modal.showModal();
        });

        btnCerrarModal.addEventListener("click", () => {
            modal.close();
        });
    }
}
