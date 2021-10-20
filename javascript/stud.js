
// var items = document.querySelectorAll('.poza img');


// for(var i = 0;i<items.length;i++)
// { 
//      items[i].src  =`../pic${i}.jpg`;
//     //cand le ia din DB, o sa folosim altfel



//     // var newDiv = document.createElement('img');
//     // console.log(newDiv);
//     // newDiv.setAttribute('src', '../pic2.jpg');
//     // console.log(newDiv);
//     // document.items[i].appendChild(newDiv);
//     // i--;

// }
// //De aici iei numele din search
// var x = document.querySelectorAll('#fname');


// // for(var i =0;i<x.length;i++)
// // console.log(x[i].value);

// function myFunction(){
//     var y=x[0].value;
//     var z=x[1].value;
//     var w=x[2].value;

//}




const profiles = document.querySelector(".profiles");

 const searchBtn = document.querySelector(".search .mere button");
const form = document.querySelector("form");
var x = document.querySelectorAll('#fname');





searchBtn.onclick = ()=>{

    const aha = document.querySelector(".profiles");
    var posInfo = aha.getBoundingClientRect();
    const i = posInfo.width;

    console.log(i);
    let xhr = new XMLHttpRequest();
    
    //creating XML object
    xhr.open("POST", "php/serch.php", true);
    xhr.onload = ()=>{
       if(xhr.readyState === XMLHttpRequest.DONE)
       {
           if(xhr.status === 200){
               let data = xhr.response;
               if(data == "mast")
               {
                let phr = new XMLHttpRequest();
                //creating XML object
                phr.open("POST", "php/expunere.php", true);
                phr.onload = ()=>{
                   if(phr.readyState === XMLHttpRequest.DONE)
                   {
                       if(phr.status === 200){
                           let fata = phr.response;
                           profiles.innerHTML = fata;
                           
                           
                           
                       }
                   }
                }
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                phr.send("i="+i);
               }
               else
               profiles.innerHTML = data;
               
               
               
           }
       }
    }

    
        var y=x[0].value;
        var z=x[1].value;
        var w=x[2].value;
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// let formData = new FormData(form);
xhr.send("y=" +y+"&"+"z="+z+"&"+"w="+w+"&"+"i="+i);

}

const aha = document.querySelector(".profiles");
var posInfo = aha.getBoundingClientRect();
const i = posInfo.width;
console.log(i);



    let xhr = new XMLHttpRequest();
    //creating XML object
    xhr.open("POST", "php/expunere.php", true);
    xhr.onload = ()=>{
       if(xhr.readyState === XMLHttpRequest.DONE)
       {
           if(xhr.status === 200){
               let data = xhr.response;
               profiles.innerHTML = data;
               
               
               
           }
       }
    }


    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("i="+i);



















