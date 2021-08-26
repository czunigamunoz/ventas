import { menu, searchSubString, titleLinkHome } from './utils.js';

/*------------- GLOBAL VARIABLES --------------------*/
var textSearch, vecInfo, vecPro, vecSelect, btnSearch;
textSearch = document.getElementById('textSearch');
vecSelect = document.querySelectorAll('.select-items');
vecInfo = document.querySelectorAll('.img-info, .img-price');
vecPro = document.querySelectorAll('.product-item');
btnSearch = document.querySelector('.search-btn');
/*---------------------------------------------------*/

/* 
ks = Cantidad de select diferentes de 0
ki = Cantidad de informacion por producto
ka = Cantidad de aciertos de los select
Segundo for s = Cuenta la cantidad de selectores que hay
 */

function filterSearch(){
    var containerProduct, i, s, p, ks=0, ki=0, ka;
    textSearch.value = "";
    for(s=0; s<vecSelect.length; s++){
        if(vecSelect[s].selectedIndex != 0){
            ks++;
        }
    }
    ki = vecInfo.length / vecPro.length;
    for(p=0; p<vecInfo.length; p+=ki){
        ka=0;
        for(s=0; s<vecSelect.length; s++){
            i = vecSelect[s].selectedIndex;
            if(i != 0){
                if(vecInfo[p+s+1].innerHTML == vecSelect[s].options[i].text){
                    ka++;
                }                
            }
        }
        containerProduct = ((vecInfo[p].parentNode).parentNode).parentNode;
        if(ka === ks){
            containerProduct.classList.remove("inactive");
        }else{
            containerProduct.classList.add("inactive");
        }
    }    
}

function clearFilterSearch(){
    var btnClean, k;
    btnClean = document.querySelector('.btn-clean');
    btnClean.addEventListener('click', (e) =>{
        for(k=0; k<vecSelect.length; k++){
            vecSelect[k].selectedIndex = 0;
        }
        e.preventDefault();
        filterSearch();
    });
}

function searchProducts(){
    var containerProduct, i, k, ki=0, ti;
    for (k = 0; k < vecSelect.length; k++) {
        vecSelect[k].selectedIndex = 0;
    }
    ki = vecInfo.length / vecPro.length;
    for (k = 0; k < vecInfo.length; k += ki) {
        ti = -1;
        for (i = 0; i < ki && ti === -1; i++) {
            ti = searchSubString(vecInfo[k + i].innerHTML.toUpperCase(), textSearch.value.toUpperCase());
        }
        containerProduct = ((vecInfo[k].parentNode).parentNode).parentNode;
        if (ti === -1) {
            containerProduct.classList.add("inactive");
        } else {
            containerProduct.classList.remove("inactive");
        }
    }
}

function keyUp(event){
    if(event.keyCode===13){
        searchProducts();
    }
}

function start(){
    menu();
    titleLinkHome();
    clearFilterSearch();
    textSearch.addEventListener('keyup', keyUp, false);
    btnSearch.addEventListener('click', searchProducts, false);
    vecSelect.forEach(select => {
        select.addEventListener('change', filterSearch, false);
    });
}

document.addEventListener('DOMContentLoaded', start, false);