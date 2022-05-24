




 /*Area menu lateral */




 const abriMenu =()=> document.querySelector('.menu-lateral').classList.add('abrirMenuLateral');
 const fecharMenu =()=> document.querySelector('.menu-lateral').classList.remove('abrirMenuLateral');

 let hamburguer = document.querySelector('.menu-hamburguer');

 hamburguer.addEventListener('click', ()=>{
     if(document.querySelector('.menu-lateral').classList.contains('abrirMenuLateral')){
         fecharMenu();
     }else{
         abriMenu();
     }
 });   