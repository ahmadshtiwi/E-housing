function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
}
  

function liveSearch() {

  // get data from posts 
  let cards = document.querySelectorAll('.card');
  let card_price = document.querySelectorAll('.card #price');
  let card_area = document.querySelectorAll(".card #area");
  let card_bed_room = document.querySelectorAll(".card #bed_room");
  let card_living_room = document.querySelectorAll(".card #living_room");
  let card_kids_room = document.querySelectorAll(".card #kids_room");
  let card_gust_room = document.querySelectorAll(".card #gust_room");
  let card_kithcen = document.querySelectorAll(".card #kitchen");
  let card_garge = document.querySelectorAll(".card #garage");
  let card_bathroom = document.querySelectorAll(".card #bathroom");
  let card_balcony = document.querySelectorAll(".card #balcony");
  let card_garden = document.querySelectorAll(".card #garden");
  let card_city = document.querySelectorAll(".card #city");

  
  // get value from filter 
  let price=document.getElementById('price_id').value;
  price = price == 0 ? 100000000:price;

  let area=document.getElementById('area_id').value;
  area = area == 0 ? 100000000 : area;
  
  let bed_room = document.getElementById('bedroom_id').value;
  bed_room = bed_room == '0' ? '-100000000' : bed_room;

  let living_room = document.getElementById('livingroom_id').value;

  let gust_room = document.getElementById('gustroom_id').value;

  let kids_room = document.getElementById('kidsroom_id').value;
  kids_room = kids_room == '0' ? '-100000000' : kids_room;

  let kitchen = document.getElementById('kitchen_id').value;
  kitchen = kitchen == '0' ? '-100000000' : kitchen;

  let garage = document.getElementById('garage_id').value;
  garage = garage == '0' ? '-100000000' : garage;

  let bathroom = document.getElementById('bathroom_id').value;
  bathroom = bathroom == '0' ? '-100000000' : bathroom;

  let balcony=document.getElementById('balcony_id').value;
  balcony = balcony == '0' ? '-100000000' : balcony;

  let garden = document.getElementById('garden_id').value;
  garden = garden == '0' ? '-100000000' : garden;
  let city = document.getElementById('city_id').value;

  
  

  for (var i = 0; i < cards.length; i++) {

    if (Number(card_price[i].innerText) <= Number(price) &&
      Number(card_area[i].innerText) <= Number(area)&&
      Number(card_bed_room[i].innerText) >= Number(bed_room) &&
      Number(card_kids_room[i].innerText) >= Number(kids_room)&&
      Number(card_garge[i].innerText) >= Number(garage)&&
      
      Number(card_kithcen[i].innerText) >= Number(kitchen)&&

      Number(card_bathroom[i].innerText) >= Number(bathroom)&&
      Number(card_garden[i].innerText) >= Number(garden)&&
      Number(card_balcony[i].innerText) >= Number(balcony)&&
      card_city[i].innerText.includes(city)&&
      card_living_room[i].innerText.includes(living_room)&&
      card_gust_room[i].innerText.includes(gust_room) 
      
      )
      {
        cards[i].classList.remove("is-hidden");
    }
    else {

      cards[i].classList.add("is-hidden");
    }
  }
}



