<option value="">Tous les Départements</option>
<?php
 foreach ($status as $option)  {
echo "<option value='".$option->id."'>".$option->dpt."</option>";
}
?>
