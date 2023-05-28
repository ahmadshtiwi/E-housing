<!--******** جزء الفلتر ******** -->

<form class=''action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post'>
   
<!-- price -->
<div class="filter">
        <div class="filter-contener">
            <label class="filter-item" for="price_id">Price</label>
            <input class="filter-item box" oninput="liveSearch()" id="price_id" value='0' type="text">
        </div>  

<!-- Area -->
        <div class="filter-contener">
            <label class="filter-item" for="area_id">Area</label>
            <input class="filter-item box" oninput="liveSearch()" id="area_id" value='0'  type="text">
        </div>  
    
<!-- Bed Room -->
        <div class="filter-contener">
            
        <label class="filter-item" for="bedroom_id">Bed Rooms</label> 
        <select class="filter-item" oninput="liveSearch()" id="bedroom_id" value='0'>
                <option value='0'>0</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
            </select>
        </div>

<!-- Living Room -->
            
        <div class="filter-contener">
            <label class="filter-item" for="livingroom_id">Living Room</label>
            <select class="string-box" oninput="liveSearch()" id="livingroom_id">

            <option value=''></option>
            <option value='North'>North</option>
            <option value='East'>East</option>
            <option value='South'>South</option>
            <option value='West'>West</option>
            </select>
        </div>

<!-- Gust Room -->        
        <div class="filter-contener">
            <label class="filter-item" for="gustroom_id">Gust Room</label>
            <select class="string-box" oninput="liveSearch()" id="gustroom_id" value='0' >
            <option value=''></option>

            <option value='North'>North</option>
            <option value='East'>East</option>
            <option value='South'>South</option>
            <option value='West'>West</option>
            </select>
        </div>

<!-- Kids Room -->
        <div class="filter-contener">
            <label class="filter-item" for="kidsroom_id">Kids Rooms</label>
            <select class="filter-item" oninput="liveSearch()" id="kidsroom_id" value='0' >
        
                <option value='0'>0</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
            </select>
        </div>

<!-- Bathroom -->        
        <div class="filter-contener">
            <label class="filter-item" for="bathroom_id">Bathrooms</label>
            <select class="filter-item" oninput="liveSearch()" id="bathroom_id" value='0' >
        
                <option value='0'>0</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
            </select>
        </div>
        
 <!-- Kitchen -->       
        <div class="filter-contener">
            <label class="filter-item" for="kitchen_id">Kitchens</label>
            <select class="filter-item" oninput="liveSearch()" id="kitchen_id" value='0' >
        
                <option value='0'>0</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
            </select>
        </div>


 <!-- Balcony -->       
        <div class="filter-contener">
            <label class="filter-item" for="balcony_id">Balcony</label>
            <select class="filter-item" oninput="liveSearch()" id="balcony_id" value='0' >
        
            <option value='0'>0</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
            </select>
        </div>
        
<!-- garage -->     
        <div class="filter-contener">
            <label class="filter-item" for="garage_id">Garages</label>
            <select class="filter-item" oninput="liveSearch()" id="garage_id" value='0' >
        
                <option value='0'>0</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
            </select>
        </div>
<!-- Garden -->     

        <div class="filter-contener">
            <label class="filter-item" for="garden_id">Gardens</label>
            <select class="filter-item" oninput="liveSearch()" id="garden_id" value='0' >
        
                <option value='0'>0</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
            </select>
        </div>

<!-- city -->        
        <div class="filter-contener">
            <label class="filter-item" for="city_id">City</label>
            <select id="city_id" oninput="liveSearch()" class="box-item string-box">
                <option value="">City</option>
                <option value="Amman">Amman</option>
                <option value="Al-Zarqa">Al-Zarqa</option>
                <option value="Al-Balqaa">Al-Balqaa</option>
                <option value="Ajloun">Ajloun</option>
                <option value="Al-Mafraq">Al-Mafraq</option>
                <option value="Irbid">Irbid</option>
                <option value="Jarash">Jarash</option>
                <option value="Aqaba">Aqaba</option>
                <option value="Al-karak">Al-karak</option>
                <option value="Maan">Maan</option>
                <option value="Madaba">Madaba</option>
                <option value="Al-Tafila">Al-Tafila</option>
            </select>
        </div>

 </form>   </div>

