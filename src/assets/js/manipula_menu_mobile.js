const meu_menu_corpo = document.getElementById('meu_menu_corpo');
const meu_menu_bt = document.getElementById('meu_menu_bt');

meu_menu_bt.addEventListener('click', function(){
    if(meu_menu_corpo.style.right === '-50%'){
            meu_menu_corpo.style.right = '0px';
            meu_menu_corpo.style.display = 'flex';
    }else{
        meu_menu_corpo.style.right = '-50%';
        meu_menu_corpo.style.display = 'none';
    }
});