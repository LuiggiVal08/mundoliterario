import { regExp } from "./helpers/Format";
import { Format } from "./helpers/Format";
import httpRequest from './helpers/httpRequest';
import showToast from './helpers/Toast';
import { validForm } from './helpers/validForm';

export const submitForm = async (e, url) => {
    // console.log(url);
    e.preventDefault();
    const form = e.target;
    const { isValid, formData } = validForm(form.elements);
    if (isValid) {
        console.log(formData);
        const response = await httpRequest(url, 'POST', formData);

        if (response.error) {
            showToast({ title: 'Error', message: response.message, type: 'error', duration: 20000 });
            return;
        }
        showToast({ title: 'Registro exitoso', message: 'Bienvenido a Mundo Literario', type: 'success', duration: 20000 });
        window.location.href = '/auth';
    }
};

const formLogin = document.getElementById('formLogin');
const formRegister = document.getElementById('formRegister');


formLogin.addEventListener('submit', (e) => submitForm(e, '/api/login'));
formRegister.addEventListener('submit', (e) => submitForm(e, '/api/register'));

formLogin.querySelector('input[name="username"]').addEventListener('input', Format.formatInput);
formLogin.querySelector('input[name="password"]').addEventListener('input', Format.formatInput);

formRegister.querySelector('input[name="name"]').addEventListener('input', Format.formatInput);
formRegister.querySelector('input[name="lastname"]').addEventListener('input', Format.formatInput);
formRegister.querySelector('input[name="username"]').addEventListener('input', Format.formatInput);
formRegister.querySelector('input[name="password"]').addEventListener('input', Format.formatInput);


formLogin.querySelector('input[name="username"]').addEventListener('blur', Format.formatInput);
formLogin.querySelector('input[name="password"]').addEventListener('blur', Format.formatInput);

formRegister.querySelector('input[name="name"]').addEventListener('blur', Format.formatInput);
formRegister.querySelector('input[name="lastname"]').addEventListener('blur', Format.formatInput);
formRegister.querySelector('input[name="username"]').addEventListener('blur', Format.formatInput);
formRegister.querySelector('input[name="password"]').addEventListener('blur', Format.formatInput);
