<style>
.menu{
    position: fixed;
    width: 220px;
    left: 15px;
    margin-top: 15px;
    padding: 10px;
    border-radius: 40%;
    background-color: #e9ecef;
    background-position: center;
    z-index: 22;
    text-align: center;
}
#new_appBtn{
    position: fixed;
    width: 220px;
    padding: 20px;
    margin-left: 15px;
    margin-top: 135px;
    border-radius: 40%;
    z-index: 21;
    color:white;
    text-align: center;
}
.sort{
    position: fixed;
    width: 220px;
    right: 15px;
    margin-top: 15px;
    padding: 10px;
    z-index: 20;
    color:white;
}
</style>

<a id="new_appBtn" onclick="addTask()" class="btn btn-outline-light">Новая задача</a>

<div class="sort">
        <form action="/sort" class="" method="post">
          <input name="uri" type="hidden" id="uri_main">
          <div class="form-group">
             <label for="sort-select"><b>Сортировать по полю:</b></label>
            <select class="form-control font-weight-bold" name="Сортировка_поле" id="sort-select">
              <option value='Name'>Имени</option>
              <option value='Email'>Email</option>
              <option value='completed'>Статусу</option>
            </select>
          </div>
          <div class="form-group">
             <label for="status-sort"><b>Как сортировать:</b></label>
            <select class="form-control font-weight-bold" name="Сортировка_статус" id="status-sort">
              <option value='DESC'>По убыванию</option>
              <option value='ASC'>По возрастанию</option>
            </select>
          </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Применить</button>
          </div>
      </form>
</div>

<script>
    document.getElementById("uri_main").value = window.location.href;
    $("#sort-select").val('<?= $data["SortName"]; ?>');
    $("#status-sort").val('<?= $data["StatusSort"]; ?>');
            
   </script>

<?php               
                       
                        if (empty($_SESSION['login']) or empty($_SESSION['id']))
                        {
			     echo '<div class="menu">Здравствуйте, <b>Гость</b><a href="http://idealist.kl.com.ua/login" style="margin:5px;" class="btn btn-outline-secondary">Войти</a></div>';
                             for( $i = 0; $i < count( $data["task"] ); $i++ )
	                     {
                                if($data["task"][$i]["completed"]) $completed = "Задача выполнена"; else $completed = '';
                                if($data["task"][$i]["edited"]) $edited = "Отредактировано администратором"; else $edited = '';
                      		echo '<div class="card bg-light mb-6 col-6" style="margin: 15px auto;"><div class="card-header">'.$data["task"][$i]['Email'].'</div><div class="card-body"><h5 class="card-title">'.$data["task"][$i]['Name'].'</h5><p class="card-text">'.$data["task"][$i]['Description'].'</p><p class="card-text"><small class="text-success">' . $completed . '</small></p></p><p class="card-text"><small class="text-muted">' . $edited . '</small></p></p></div></div>';
	                     }
                        } else {
                             echo '<div class="menu">Здравствуйте, <b>Админ</b><a href="/logout" style="margin:5px;" class="btn btn-outline-danger">Выйти</a></div>';
                             for( $i = 0; $i < count( $data["task"] ); $i++ )
	                     {
                                if($data["task"][$i]["completed"]) $completed = "Задача выполнена"; else $completed = '';
                                if($data["task"][$i]["edited"]) $edited = "Отредактировано администратором"; else $edited = '';
                      		echo '<div class="card bg-light mb-6 col-6" style="margin: 15px auto;"><div class="card-header">'.$data["task"][$i]['Email'].'</div><div class="card-body"><h5 class="card-title">'.$data["task"][$i]['Name'].'</h5><p class="card-text">'.$data["task"][$i]['Description'].'</p><p class="card-text"><small class="text-success">' . $completed . '</small></p></p><p class="card-text"><small class="text-muted">' . $edited . '</small></p></p><a style="margin-right:10px;" href="/edit/?task_id='.$data["task"][$i]['id'].'" class="btn btn-warning">Редактировать задачу</a><a href="/delete/?task_id='.$data["task"][$i]['id'].'" class="btn btn-danger">Удалить задачу</a></div></div>';
	                     }
                        }

                        echo "<div style='left: 15px;top:15px'>" . $data['pagination'];

       ?>
          

       
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="newAddModal" tabindex="-1" role="dialog" aria-labelledby="newAddModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 id="newAddModalLabel">Новая задача</h5>
            <button type="button" onclick="location.href ='/';" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
        <form method="post" action="/task/?success_id">
    	  <div class="form-group">
    	     <input class="form-control" type="text" required="" name="Имя" value="" placeholder="Введите имя">
    	    </div>
    	  <div class="form-group">
    	      <input class="form-control" type="email" required="" name="E-mail" value="" placeholder="Введите E-mail">
    		</div>
    	  <div class="form-group">
    	      <input rows="10" class="form-control" required="" name="description" value="" placeholder="Описание задачи..."></input>
          </div>
      <?php if (!empty($_SESSION['login']) or !empty($_SESSION['id']))
       {?>
           <div style="color: green; margin: 20px;" class="form-check">
                <input type="hidden" name="is_task" value="0" />
                <input type="checkbox" name="is_task" value="1" class="form-check-input" id="is_taskCheck">
                <label class="form-check-label" for="is_taskCheck">Задача выполнена</label>
           </div>
      <?php } ?>
        <div class="modal-footer">
            <button type="button" onclick="location.href ='/';" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
            <button type="submit" class="btn btn-primary">Сохранить задачу</button>
          </div>
      </form>
          </div>
          
        </div>
      </div>
    </div>

 <script>
    function addTask(){
        $('#newAddModal').modal('show');
        $('#new_appBtn').hide();
    }
            
   </script>
 