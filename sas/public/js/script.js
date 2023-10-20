const daysTag = document.querySelector(".days"),
currentDate = document.querySelector(".current-date"),
prevNextIcon = document.querySelectorAll(".icons span");

// getting new date, current year and month
let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();

// storing full name of all months in array
const months = ["Januar", "Februar", "Mart", "April", "Maj", "Jun", "Jul",
              "Avgust", "Septembar", "Oktobar", "Novembar", "Decembar"];

const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // getting first day of month
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // getting last date of month
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // getting last day of month
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // getting last date of previous month
    let liTag = "";

    for (let i = firstDayofMonth; i > 0; i--) { // creating li of previous month last days
        liTag += `<li class="inactive daysi">${lastDateofLastMonth - i + 1}</li>`;
    }

    for (let i = 1; i <= lastDateofMonth; i++) { // creating li of all days of current month
        // adding active class to li if the current day, month, and year matched
        let isToday = i === date.getDate() && currMonth === new Date().getMonth() 
                     && currYear === new Date().getFullYear() ? "active" : "";
            liTag += `<li value="${i}" class="${isToday} daysi monthDay" onclick="pritisnutDatum(${i})">${i}</li>`;
        
    }

    for (let i = lastDayofMonth; i < 6; i++) { // creating li of next month first days
        liTag += `<li class="inactive daysi">${i - lastDayofMonth + 1}</li>`
    }
    currentDate.innerText = `${months[currMonth].toUpperCase()}`; // passing current mon and yr as currentDate text
    daysTag.innerHTML = liTag;
   
    let day = date.getDate();
    pritisnutDatum(day);
    neIsub();
  
}
renderCalendar();
prevNextIcon.forEach(icon => { // getting prev and next icons
    icon.addEventListener("click", () => { // adding click event on both icons
        // if clicked icon is previous icon then decrement current month by 1 else increment it by 1
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        if(currMonth < 0 || currMonth > 11) { // if current month is less than 0 or greater than 11
            // creating a new date of current year & month and pass it as date value
            date = new Date(currYear, currMonth, new Date().getDate());
            currYear = date.getFullYear(); // updating current year with new date year
            currMonth = date.getMonth(); // updating current month with new date month
        } else {
            date = new Date(); // pass the current date as date value
        }
        renderCalendar(); // calling renderCalendar function
    });
  
});

function pritisnutDatum(el){
    
    let datumPr = document.querySelector('#datumHiddenInput');
    let daysii = document.querySelectorAll('.daysi');
    for(let i of daysii){
        if(i.value == el){
            i.classList.add('active');
        }
        else{
            i.classList.remove('active');
        }
    }
    let ima= true;
    let curEl;
    if(currMonth <= 8){
    curEl = (currYear + '-' + '0' + (currMonth + 1) +'-'+ el);
    }
    else{
    curEl = (currYear + '-' + (currMonth + 1) +'-'+ el);
    }  
    let b = curEl.split('-');
    if(b[2].length < 2){   
    curEl = b[0] + '-' + b[1] + '-' + '0' +  b[2];
    }
    proveriZauzete(curEl);
    let ispis = document.querySelector('#ispisAdminRez');
    ispis.innerHTML=' ';
    document.querySelector('#dateIspis').innerHTML='';
    let sve = document.querySelectorAll('.btnTime');
    datumPr.value = curEl;


    for(let i of termini){ 
      
     if(i.date == curEl){
        
        datumPr.value = i.date;
        ima = false;
        let date = new Date(curEl);
        let year = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(date);
        let month = new Intl.DateTimeFormat('en', { month: 'numeric' }).format(date);
        let day = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(date);
        document.querySelector('#dateIspis').innerHTML=`<h4 class="px-3 mb-4 mt-4 datumBaza" ><span class="timeMenjaj"> ${day}/${month}/${year} </span></h4>`;
       
         for(let j of sve){
            if(i.time == j.value){
            if(i.text == 'neki tekst'){
             i.text = 'Nema napomene!';
            }
           let color;
            if(i.role == '1'){
                color="green";
            }
             ispis.innerHTML += `
             <div class="row" id="vremeSort">
             <div class="col-12">
             <p class="px-3 mb-0" ><span style="background-color:${color};" class="timeMenjaj" > ${i.time} </span> <br> ${i.name} ${i.lname} / <small> ${i.email} / ${i.phone} </small> </p>
             <p class="px-3 mb-0"><small>Napomena</small></p>
             <p class="px-3 mb-0" id="staraNapomena${i.id}"> ${i.text} </p>
             <div class="novaNapomena m-3" id="novaNapomena${i.id}">
             <textarea name="napomenaAdmin" class="form-control" id="textarea${i.id}"></textarea>
             <button class="btn btn-primary" onclick="proslediIdNapomena(${i.id})">Dodaj</button>
             </div>
             </div>
             <div class="col-5 offset-7 text-right p-0" id="sakrijPrikaziNapomenu${i.id}">
             <button class="btn btn-primary btn-sm" id="createNapomenaAdmin${i.id}" style="width:80px;" onclick="createNapomenaAdmin(${i.id})">Opis</button>
         
           
             <button class="btn btn-danger btn-sm" style="width:80px;" onclick="proslediIdBrisanje(${i.id})">Obrisi</button>
             </div>
             </div>
             <hr>
             `;
      
            }
         }
     }
     let all =   document.querySelectorAll('#vremeSort');
     sortTime(all);
  
}
let a = curEl.split('-');
if(a[2].length < 2){   
curEl = a[0] + '-' + a[1] + '-' + '0' +  a[2];
}

let date = new Date(curEl);
let year = new Intl.DateTimeFormat('en', { year: 'numeric' }).format(date);
let month = new Intl.DateTimeFormat('en', { month: '2-digit' }).format(date);
let day = new Intl.DateTimeFormat('en', { day: '2-digit' }).format(date);

if(ima){
    document.querySelector('#dateIspis').innerHTML=`<h4 class="px-3 mb-4 mt-4" ><span class="timeMenjaj"> ${day}/${month}/${year} </span></h4>
    <h5 class="px-3">Nema rezervacija za ovaj datum!</h5>
    `
}
}
document.querySelector('.active').click();

function proslediIdBrisanje(el){
    document.querySelector('.formaBrisanje').action+= '/' + el;
    console.log( document.querySelector('.formaBrisanje').action);

    document.querySelector('#hiddenBTN').innerHTML=`
    <button type="hidden"  id="hdnbtn"></button>
    `;
    document.querySelector('#hdnbtn').click();
}

function proslediIdNapomena(el){
    let asd = document.querySelector('#textarea'+el).value;
    document.querySelector('.formaNovaNapomen').action+= '/' + el + '/' + asd;
    console.log( document.querySelector('.formaNovaNapomen').action);
   
    document.querySelector('#hiddenBTNNewNapomena').innerHTML=`
    <button type="hidden"  id="newNapomenaAddBtn"></button>
    `;
    document.querySelector('#newNapomenaAddBtn').click();
}





function sortTime(all){
    
    let pom;
 

  for(let i =0; i < all.length-1; i++){
    for(let j = i+1; j < all.length; j++)
    {
        let a = all[i].innerText.split(' ');
        let b = all[j].innerText.split(' ');
        
        if(a[0].substr(0, 2) > b[0].substr(0,2)){
           
           
            pom = all[j].innerHTML;
            all[j].innerHTML = all[i].innerHTML;
            all[i].innerHTML = pom;
            
        }
        else if(a[0].substr(0, 2) == b[0].substr(0,2)){
            if(a[0].substr(2,4) > b[0].substr(2,4)){
                pom = all[j].innerHTML;
                all[j].innerHTML = all[i].innerHTML;
                all[i].innerHTML = pom;
            }
        }
        }
  }

}

function neIsub(){
    let a = document.querySelector('.timeMenjaj').innerHTML.split('/');
    
   
    
    
    let sve = document.querySelectorAll('.daysi');
    for(let i=0; i < sve.length;i++){
        if(i%7==0){
            sve[i+6].classList.add('inactive');
            sve[i].classList.add('inactive');
            sve[i+6].classList.remove('monthDay');
            sve[i].classList.remove('monthDay');
            sve[i+6].onclick="none";
            sve[i].onclick="none";
    }
}    
slobodiDani(a[1]);
}
function slobodiDani(mm){
    let dateMin=[];
    let days=[];
    let dateZajMin=[];
    let dayZajMin=[];
    let dateZajMax=[];
    let dayZajMax=[];
    let date = new Date();
    let dateMonthNext;
    let brdanaUmesecu = daysInMonth(mm,date.getMonth());
    for(let i of sldani){
        if(mm == i.dateMin.split('-')[1] && mm == i.dateMax.split('-')[1]){
            dateMin.push(i.dateMin.split('-')[2]); 
           days.push(i.dateMax.split('-')[2] - i.dateMin.split('-')[2]);       
           dateMonthNext = i.dateMax.split('-')[1];
    }   
     if(mm == i.dateMin.split('-')[1] && mm != i.dateMax.split('-')[1]){
        
        dateZajMin.push(i.dateMin.split('-')[2]); 
        
        let min  = brdanaUmesecu - i.dateMin.split('-')[2];
       
        dayZajMin.push( parseInt(min));  
       
         dateMonthNext = i.dateMax.split('-')[1];  
        }    
    if(mm != i.dateMin.split('-')[1] && mm == i.dateMax.split('-')[1]){
        
       
        dateZajMax.push(i.dateMax.split('-')[2]); 
        
        let max  =parseInt(i.dateMax.split('-')[2]);
        
        dayZajMax.push( parseInt(max));
         dateMonthNext = i.dateMax.split('-')[1];
             
        }
    
    }

    let sve = document.querySelectorAll('.daysi');
    
    for(let i =0; i < sve.length; i++){
       
        for(let j = 0; j < dateMin.length; j++){
           
        if(sve[i].value == dateMin[j]){
            for(let k = 0; k < days[j]+1; k++){
                sve[i+k].style.setProperty("--colorRez", "rgb(255, 87, 87)");
                sve[i+k].style.color="white";
                 sve[i+k].classList.add('inactive');
            }
        }
       
        
        
        }
        for(let j = 0; j < dateZajMin.length; j++){
        if(sve[i].value == dateZajMin[j]){
            for(let k = 0; k < dayZajMin[j]+1; k++){
                sve[i+k].style.setProperty("--colorRez", "rgb(255, 87, 87)");
                 sve[i+k].classList.add('inactive');
                sve[i+k].style.color="white";
            }
        }
        

       
    
    }
   
   
    for(let i =0; i < sve.length; i++){
    if(mm == dateMonthNext){
        for(let j =0; j < dateZajMax.length; j++){
            
            if(sve[i].value == dateZajMax[j]){  
                
                for(let k = 0; k < dayZajMax[j]; k++){
                    sve[i-k].style.setProperty("--colorRez", "rgb(255, 87, 87)");
                    sve[i-k].style.color="white";
                    sve[i-k].classList.add('inactive');
                }
            }
            
}
}
    }
    }
}


function daysInMonth(month, year) {
    return new Date(year, month, 0).getDate();
}

neIsub();


function promeniMinKodDrugog(el){
    document.querySelector('.dateChange').setAttribute('min',el);
}

function godinjsiprviDeio(el){
    el.style.display="none";
    document.querySelector('.godisnjidrugiDeo').style.display="block";
}



function validacijaGodisnji(){
    let minDatum = document.querySelector('#dateMinValidacija').value;
    let maxDatum = document.querySelector('#dateMaxValidacija').value;
    
    for(let i of sldani){
        if(minDatum >= i.dateMin && minDatum <= i.dateMax){
            alert('Pocetni datum spada u opseg neradnog dana!');
            return false;
        }
        if(minDatum < i.dateMin && maxDatum < i.dateMax){
            alert('Krajnji datum spada u opseg neradnog dana!');
            return false;
        }
        else{
            return true;
        }
    }
    

}

function createNapomenaAdmin(el){

    let htm = document.querySelector('#textarea'+el);
    let text;
    for(let i of termini){
        if(i.id == el){
            text = i.text;
        }
    }
    console.log(text);
    htm.innerHTML = text;
    document.querySelector('#staraNapomena'+el).style.display="none";
    document.querySelector('#novaNapomena'+el).style.display="block";
    document.querySelector('#createNapomenaAdmin'+el).style.display="none";
    document.querySelector('#sakrijPrikaziNapomenu'+el).innerHTML=`
    <button class="btn btn-primary btn-sm" id="sakrijNapomenaAdmin${el}" style="width:80%;" onclick="sakrijNapomenaAdmin(${el})">Sakrij</button>
    `;


}

function sakrijNapomenaAdmin(el){
    document.querySelector('#sakrijPrikaziNapomenu'+el).innerHTML=`
    <button class="btn btn-primary btn-sm" id="createNapomenaAdmin${el}" style="width:80%;" onclick="createNapomenaAdmin(${el})">Opis</button>
    `;
    document.querySelector('#novaNapomena'+el).style.display="none";
    document.querySelector('#createNapomenaAdmin'+el).style.display="block";
    document.querySelector('#staraNapomena'+el).style.display="block";
}
function validacijaRezAdmin(){
    let ad = false;
    let sve = document.querySelectorAll('.btnTime');
    for(let i of sve)
    {
        if(i.getAttribute('name')=='timeTrue'){
            ad = true;
        }
    }
    if(!ad){
        alert('Morate izabrati vreme!');
        return ad;
    }
    else{
        return ad;
    }
    
    
}



