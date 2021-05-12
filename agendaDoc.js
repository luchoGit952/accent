    
 let monthNames = ['Enero','Febrero','Marzo','Abril',
                    'Mayo','Junio','Julio','Agosto','Septiembre',
                    'Octubre','Noviembre','Diciembre'];

  let currenDate = new Date();
  let currentDay = currenDate.getDay();
  let monthNumber = currenDate.getMonth();
  let currentYear = currenDate.getFullYear();


  let prevMonth = document.getElementById('prevMonth');
  let nextMonth = document.getElementById('nextMonth')
  let month = document.getElementById('month');
  let year = document.getElementById('year')
  let dates = document.getElementById('date');

  prevMonth.addEventListener('click', ()=>lastMonth());
  nextMonth.addEventListener('click', ()=>nexttMonth());

 

      month.textContent = monthNames[monthNumber];
      year.textContent = currentYear.toString();
  

  
 export  function writeMonth(month){
    for(let i = 1; i<=getTotalDay(month);i++){

        if(i === currentDay){
            dates.innerHTML+=`<div class="dates calendario__i hoy">${i}</div>`;

        }else{
            dates.innerHTML+=`<div class="dates calendario__i">${i}</div>`;

        }
        

    }
  }

  export function getTotalDay(month){
    if(month === -1) month = 11;

    if (month == 0 || month == 2 || month == 4 || month == 6 || month == 7 || month == 9 || month == 11) {
        return  31;

    } else if (month == 3 || month == 5 || month == 8 || month == 10) {
        return 30;

    } else {

        return isLeap() ? 29:28;
    }
   }

  export function isLeap(){
    return ((currentYear % 100 !==0) && (currentYear % 4 === 0) || (currentYear % 400 === 0));
   }

  export function startDay(){
    let start = new Date(currentYear, monthNumber, 1);
    return ((start.getDay()-1) == -1) ? 6 : start.getDay()-1;
    
}

  export function lastMonth(){
    if(monthNumber !== 0){
        monthNumber--;
    }else{
        monthNumber = 11;
        currentYear--;
    }

    setNewDate();
   }

  export function nexttMonth(){
    if(monthNumber !== 11){
        monthNumber++;
    }else{
        monthNumber = 0;
        currentYear++;
    }

    setNewDate();
   }

  export function setNewDate(){
    currenDate.setFullYear(currentYear,monthNumber,currentDay);
    month.textContent = monthNames[monthNumber];
    year.textContent = currentYear.toString();
    dates.textContent = '';
    writeMonth(monthNumber);
}
writeMonth(monthNumber);