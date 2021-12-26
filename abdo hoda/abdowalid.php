<label for="cars">Choose a car:</label>

<select name="cars" id="cars">
    <?php foreach($stores as $i)
    {
        $id=$i['id'];
        $name=$i['name'];
        echo "<option value='$id'>$name</option>";
    }

     ?>
    
  
  <option value="saab">Saab</option>
  <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option>
</select>