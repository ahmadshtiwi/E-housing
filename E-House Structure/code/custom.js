$(document).ready(function(){

    var count_bed = count_living = count_gust =count_kids =count_kitchen =count_bathroom =1;
    
    
    
    
    

  $("#btn_living_room").click(function(){
    $(".living_room").append("<div class='items'><span class='number-list'>"+count_living+"</span>"
        +" <select name='' class='box-list' id=''><option>North</option><option>West</option><option>East</option><option>South</option></select></div>");
  count_living++;
  }); //end fun
    

  $("#btn_gust_room").click(function(){
    $(".gust_room").append("<div class='items'><span class='number-list'>"+count_gust+"</span>"
        +" <select name='' class='box-list' id=''><option>North</option><option>West</option><option>East</option><option>South</option></select></div>");
  count_gust++;
  }); //end fun
    
    
  $("#btn_bed_room").click(function(){
    $(".bed_room").append("<div class='items'><span class='number-list'>"+count_bed+"</span>"
        +" <select name='' class='box-list' id=''><option>North</option><option>West</option><option>East</option><option>South</option></select></div>");
  count_bed++;
  }); //end fun
    
    
  $("#btn_kids_room").click(function(){
    $(".kids_room").append("<div class='items'><span class='number-list'>"+count_kids+"</span>"
        +" <select name='' class='box-list' id=''><option>North</option><option>West</option><option>East</option><option>South</option></select></div>");
  count_kids++;
  }); //end fun
    
    
  $("#btn_kitchen").click(function(){
    $(".kitchen").append("<div class='items'><span class='number-list'>"+count_kitchen+"</span>"
        +" <select name='' class='box-list' id=''><option>North</option><option>West</option><option>East</option><option>South</option></select></div>");
  count_kitchen++;
  }); //end fun
    
    
  $("#btn_bathroom").click(function(){
    $(".bathroom").append("<div class='items'><span class='number-list'>"+count_bathroom+"</span>"
        +" <select name='' class='box-list' id=''><option>North</option><option>West</option><option>East</option><option>South</option></select></div>");
  count_bathroom++;
  }); //end fun
    
});