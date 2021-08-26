/*------------- GLOBAL VARIABLES --------------------*/
var textSearch, vecInfo, vecPro, vecSelect, btnSearch;
textSearch = document.getElementById('textSearch');
vecInfo = document.querySelectorAll('.table-data');
vecPro = document.querySelectorAll('.table-row');
btnSearch = document.querySelector('.search-btn');
/*---------------------------------------------------*/

function winOpen(link, width_height = 'width=650, height=600'){
    window.open(link, 'Types of Clients', width_height);
}

function deleteItem(){
    var op = confirm('¿Are you sure do you want to delete it?');
    return op;
}

function searchSubString(text, subText, index){
    var i, position, num;
    num = index || 0;
    for(position=num; position<=text.length - subText.length; position++){
        i = 0;
        while(i<subText.length && text[position+i] === subText[i]){
            i++;
        }
        if(i === subText.length){
            return position;
        }
    }
    return -1;
}

function searchProducts(){
    var containerProduct, i, k, ki=0, ti;
    ki = vecInfo.length / vecPro.length;
    for (k = 0; k < vecInfo.length; k += ki) {
        ti = -1;
        for (i = 0; i < ki && ti === -1; i++) {
            ti = searchSubString(vecInfo[k + i].innerHTML.toUpperCase(), textSearch.value.toUpperCase());
        }
        containerProduct = vecInfo[k].parentNode;
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

textSearch.addEventListener('keyup', keyUp, false);
btnSearch.addEventListener('click', searchProducts, false);