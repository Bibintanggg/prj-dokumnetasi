export function toggleModal(id) {
    const modal = document.getElementById('id');
    const floating = document.getElementById('floatingModal');

    if(modal.classList.contains('hidden')) {
        modal.classList.remove('hidden')
        modal.classList.add('hidden')
    } else {
        modal.classList.add('hidden');
        floating.classList.remove('hidden');
    }
}