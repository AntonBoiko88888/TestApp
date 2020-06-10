<div style="height:100%; position:absolute; width:100%; background: radial-gradient(at top, #FEFFFF, #A7CECC);">
<br><br>
 <div class="row">
 <h2 style="position:relative; float: none; margin: 0 auto;">Вход в приложение-задачник</h2>
 </div>
 <div style="border: 0px solid blue; 
 position:relative; top:10px; float: none; margin: 0 auto; height:200px; width:300px;">
     <br>
<h3>Здравствуйте, <font color="red">гость</font>!</h3> <br/>
<form action="" method="post">
    <div class="form-group">
    <label>логин:</label><br/>
  <input class="form-control" required="" name="user_name" type="text" size="15" maxlength="15"><br/>
    <label>пароль:</label>
  <input class="form-control" required="" name="password" type="password" size="15" maxlength="15">
  </div>
  <button class="btn btn-primary" type="submit">Войти</button><br/><br/>
<p style="color:red;"><b><?php if(isset($data["error"])) echo $data["error"]; ?></b></p>
</form>
</div>
</div>