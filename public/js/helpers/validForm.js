import { regExp } from "./Format";

export const validForm = (elements) => {
    const formData = {};
    let isValid = true;

    Array.from(elements).forEach(element => {
        if (element.type === 'submit' || element.type === 'button') {
            return;
        }

        const name = element.name;
        const valid = element.getAttribute('data-valid');
        const regex = element.getAttribute('data-regex') ? new RegExp(element.getAttribute('data-regex')) : regExp[ valid ];

        element.classList.remove('errorInput');
        if (regex) {
            if (!regex.test(element.value)) {
                isValid = false;
                element.classList.add('errorInput');
                console.error(`El campo ${name} no es válido.`);
            }
        } else {
            if (!element.value) {
                isValid = false;
                element.classList.add('errorInput');
                console.error(`El campo ${name} no debe estar vacío.`);
            }
        }

        formData[ name ] = element.value;
    });

    return { isValid, formData };
};
