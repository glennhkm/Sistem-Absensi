document.getElementById('tombolMenu').addEventListener('click', function(){
    const menu = document.getElementById('menu');
    // menu.classList.add('duration-[0s]', 'transition-opacity', 'ease-in-out');
    if(menu.classList.contains('hidden')){
        menu.classList.remove('hidden');
    }
    else{
        menu.classList.add('hidden');
    }
})


