function togglemodal(modalID) {
    const modal = document.getElementById(modalID);
    if (modal) {
        modal.classList.toggle("hidden");
    }
}
