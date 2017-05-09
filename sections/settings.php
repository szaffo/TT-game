<form style="flex-direction: column" action="../mechanic/selector.php" method="POST">
	<h2>Ha nem kívánod módosítani, akkor hagyd üresen</h2>

	<label>Neved:</label>
	<input type="text" name="name">
	
	<label>Jelszó</label>
	<input type="password" name="password">
	
	<label>Email</label>
	<input type="text" name="email">

	<button type="submit" name="pressed" value="settings-save">Mentés</button>
</form>