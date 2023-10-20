
function promeniDatum(el){
    proveriZauzete(el);
    document.querySelector('.prvi').style.display="none";
    document.querySelector('.drugi').style.display="block";
}

  function proveriZauzete(el){
    let sve = document.querySelectorAll('.btnTime');
    for(let k of sve){
        k.disabled=false;
        k.style.backgroundColor="white";
        k.style.color="black";
    }
    let a = el.split('-');
    if(a[2].length < 2){   
    el = a[0] + '-' + a[1] + '-' + '0' +  a[2];
    }
    
    for(let i of termini){
        
        if(i.date == el){
            for(let j of sve){
                
               if(i.time == j.value){
                j.disabled= true;
                j.style.backgroundColor="#FF5757";
                j.style.color="white";
               }
            }
        }
    }
  }


function rezervacijaKlik(el){
    let tacno = true;
    dateInput = document.querySelector('#dateInput');
    if (!dateInput.value) {
        alert('Prvo morate izabrati datum!');
         tacno = false;
      } 


    if(tacno){
    
    let ele = document.querySelectorAll('.btnTime');
    let kliknutiBtn;
    for(let i of ele){
        if(i.value == el){
            kliknutiBtn = i;
        }
        else{
            i.style.color="black";
            i.style.backgroundColor="#F8F9FA";
            i.name='time';
        }
    }
  
    kliknutiBtn.style.backgroundColor="lightgreen";
    kliknutiBtn.name="timeTrue";
    let ispis = document.querySelector('#realBroj');
    ispis.value = kliknutiBtn.value;
    document.querySelector('.drugi').style.display="none";
    document.querySelector('.treci').style.display="block";
   
    }
}

function rezervacijaKlik2(el){
 


  
    let ele = document.querySelectorAll('.btnTime');
    let kliknutiBtn;
    for(let i of ele){
        if(i.value == el){
            kliknutiBtn = i;
        }
        else if(i.disabled==false){
            i.style.color="black";
            i.style.backgroundColor="white";
            i.name='time';
        }
    }
  
    kliknutiBtn.style.backgroundColor="lightgreen";
    kliknutiBtn.name="timeTrue";
    let ispis = document.querySelector('#realBroj');
    ispis.value = kliknutiBtn.value;

   
}


function closeAndOpenOne(){
   document.querySelector('.predprvi').style.display="none";
   document.querySelector('.prvi').style.display="block";
}
function vratiNaDatum(){
    document.querySelector('.drugi').style.display="none";
    document.querySelector('.prvi').style.display="block";
}
function vratiNaPredPot(){
    document.querySelector('.treci').style.display="none";
    document.querySelector('.drugi').style.display="block";
}
function closee(){
    document.querySelector('.alert').style.display="none";
}

function getDayName(dateStr, locale)
{
    var date = new Date(dateStr);
    return date.toLocaleDateString(locale, { weekday: 'long' });        
}




// Get the modal
var modal = document.getElementById("myModal");
let modalbody = document.getElementById("ispis");
let dater = document.getElementById("dateInput");
let time = document.getElementById("realBroj");


// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
if(btn){
btn.onclick = function() {
    let newDate = dater.value.split('-');
    var day = getDayName(newDate, "sr-Latn-RS");

 let ime = document.querySelector('#inputIme4').value;
 let prezime = document.querySelector('#inputPrezime4').value;
 let email = document.querySelector('#inputEmail4').value;
 let phone = document.querySelector('#inputTelefon4').value;
 if(ime == '' || prezime == '' || email == '' || phone == ''){
    if(ime == '')
        alert('Ime je obavezno polje!');
    else if(prezime == '')
        alert('Prezime je obavezno polje!');
    else if(email == '')
        alert('Email je obavezno polje!');
    else if(phone == '')
        alert('Telefon je obavezno polje!');
    
}
    else{
  modal.style.display = "block";
  modalbody.innerHTML = `
  <p>Termin: ${time.value} / ${newDate[2]}-${newDate[1]}-${newDate[0]}(${day}) </p>
  <p>Klijent: ${ime} ${prezime} </p>
  <p>Podaci: ${email} /  ${phone}</p>
  <button class="btn btn-primary">Potvrdi</button>
  `;
    }
}
}
if(span){
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}



function pretraziEKarton(el){
    let sve = document.querySelectorAll('.skriveniEmail');
    for(let i of sve){
       if(i.value.includes(el)){
        parentDiv = i.parentNode;
        parentDiv.style.display="block";
        
       }
       else{
       parentDiv = i.parentNode;
        parentDiv.style.display="none";
       }
    }

    }


