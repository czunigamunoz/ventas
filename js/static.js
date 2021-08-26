import { menu, titleLinkHome, adminAcces } from './utils.js';

function start(){
    menu();
    titleLinkHome();
    adminAcces();
}

document.addEventListener('DOMContentLoaded', start, false);