import { menu, searchSubString } from './utils.js';
/* import { searchSubString } from './utils.js'; */

function checkRadioBtn(){
    var vecBtnLabelRadio, vecDressers, vecTables, vecDesks, vecRoginals;
    vecBtnLabelRadio = document.querySelectorAll('.radio-label');
    vecDressers= document.querySelectorAll('.dresser');
    vecTables = document.querySelectorAll('.table');
    vecDesks = document.querySelectorAll('.desk');
    vecRoginals = document.querySelectorAll('.original');
    vecBtnLabelRadio.forEach(btn => {
        btn.addEventListener('click', ()=>{
            console.log(btn.textContent);
            switch (btn.textContent) {
                case "Dressers & Slideboards":
                    vecDressers.forEach(dress => dress.classList.remove("inactive"));
                    vecTables.forEach(table => table.classList.add("inactive"));
                    vecDesks.forEach(desk => desk.classList.add("inactive"));
                    vecRoginals.forEach(original => original.classList.add("inactive"));
                    break;
                case "Tables & Chairs":
                    vecTables.forEach(table => table.classList.remove("inactive"));
                    vecDressers.forEach(dress => dress.classList.add("inactive"));
                    vecDesks.forEach(desk => desk.classList.add("inactive"));
                    vecRoginals.forEach(original => original.classList.add("inactive"));
                    break;
                case "Desks":
                    vecDesks.forEach(desk => desk.classList.remove("inactive"));
                    vecDressers.forEach(dress => dress.classList.add("inactive"));
                    vecTables.forEach(table => table.classList.add("inactive"));
                    vecRoginals.forEach(original => original.classList.add("inactive"));
                    break;
                case "Original Finishes":
                    vecRoginals.forEach(original => original.classList.remove("inactive"));
                    vecDressers.forEach(dress => dress.classList.add("inactive"));
                    vecTables.forEach(table => table.classList.add("inactive"));
                    vecDesks.forEach(desk => desk.classList.add("inactive"));
                    break;          
                default:
                    vecDressers.forEach(dress => dress.classList.remove("inactive"));
                    vecTables.forEach(table => table.classList.remove("inactive"));
                    vecDesks.forEach(desk => desk.classList.remove("inactive"));
                    vecRoginals.forEach(original => original.classList.remove("inactive"));
                    break;
            }
        });        
    });
}

function setTypePrice(){
    var i, vecProducts, vecData;
    vecProducts = document.querySelectorAll('.dresser, .table, .desk, .original');
    vecData = document.getElementsByTagName('data');
    for(i=0; i<vecProducts.length; i++){
        vecProducts[i].querySelector('.img-title').textContent += vecData[i].dataset.tipo;
        vecProducts[i].querySelector('.img-info').textContent += vecData[i].dataset.precio;
    }
}

function searchProducts(){
    var btnSearch, textSearch, vecInfo, type, price, containerProduct, i;
    btnSearch = document.querySelector('.search-btn');
    textSearch = document.getElementById('textSearch');
    vecInfo = document.querySelectorAll('.img-title, .img-info');
    btnSearch.addEventListener('click', (e) =>{
        for(i=0; i<vecInfo.length; i+=2){
            type = searchSubString(vecInfo[i].textContent.toUpperCase(), textSearch.value.toUpperCase());
            price = searchSubString(vecInfo[i+1].textContent, textSearch.value);
            containerProduct = ((vecInfo[i].parentNode).parentNode).parentNode;
            if(type === -1 && price === -1){
                containerProduct.classList.add("inactive");
            }else{
                containerProduct.classList.remove("inactive");
            }
        }
        e.preventDefault();
    });
}

function start(){
    menu();
    checkRadioBtn();
    setTypePrice();
    searchProducts();
}

document.addEventListener('DOMContentLoaded', start, false);