// script.js

const toastBox = document.querySelector('.toastBox');
const success_btn = document.querySelector('.success-btn');
const error_btn = document.querySelector('.error-btn');
const invalid_btn = document.querySelector('.invalid-btn');

const successMsg = 
    '<i class="fas fa-check-circle"></i> Successfully submitted ';
const errorMsg = 
    '<i class="fas fa-times-circle"></i> Please fix the error ! ';
const invalidMsg = 
    '<i class="fas fa-exclamation-circle"></i> Invalid input, check again';

function showToast(message, type) {
    const toast = document.createElement('div');
    toast.classList.add('toast', type);
    toast.innerHTML = '<button class="close-btn">X</button>' + message;
    toastBox.insertBefore(toast, toastBox.firstChild);
    // toastBox.appendChild(toast);

    const closeButton = toast.querySelector('.close-btn');
    closeButton.addEventListener('click', () => { toast.remove(); });

    setTimeout(() => {
        toast.remove();
    }, 3000);
}

success_btn.addEventListener("click", () => {
    showToast(successMsg, 'success');
});

error_btn.addEventListener("click", () => {
    showToast(errorMsg, 'error');
});

invalid_btn.addEventListener("click", () => {
    showToast(invalidMsg, 'invalid');
})
