<option value="">Tous</option>
<?php
 foreach ($status as $option)  {
echo "<option value='".$option->id."'>".$option->dpt."</option>";
}
?>
