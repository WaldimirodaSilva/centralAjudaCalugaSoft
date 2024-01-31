/*==============selecao de elementos ===========*/
const btnSearch=document.querySelector("#btnSearch");
const formData=document.querySelector("#formData");
 console.log(formData.elements);
/*===============section funcaos ==============*/
  const getSearch= (search) =>{
       const artigos=document.querySelectorAll(".artigo");
       artigos.forEach((artigo)=>{
          const titleArtigo = artigo.innerText.toLowerCase();
           artigo.style.display="flex";
           if(!titleArtigo.includes(search)){
           	  artigo.style.display="none";
           }
       });
   }
/*=====================Evetos====================*/
  btnSearch.addEventListener("keyup",()=>{
   	   getSearch(btnSearch.value);
   }); 

