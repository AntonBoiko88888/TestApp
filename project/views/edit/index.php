      <?php

    if (isset($_GET['task_id'])) {
       ?>
       
    <div class="modal" data-backdrop="static" data-keyboard="false" id="newUpdateModal" tabindex="-1" role="dialog" aria-labelledby="newUpdateModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 id="newUpdateModalLabel">Редактирование задачи</h5>
            <button type="button" onclick="location.href ='/';" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
        <form method="post" action="/task/?success_id=<?php echo $_GET['task_id']; ?>">
          <input name="desc_old" type="hidden" value="<?php echo $data["Description"]; ?>">
    	  <div class="form-group">
    	     <input class="form-control" type="text" required="" name="Имя" value="<?php echo $data['Name']; ?>" placeholder="Введите имя">
    	    </div>
    	  <div class="form-group">
    	      <input class="form-control" type="email" required="" name="E-mail" value="<?php echo $data["Email"]; ?>" placeholder="Введите E-mail">
    		</div>
    	  <div class="form-group">
    	      <input rows="10" class="form-control" required="" name="description" value="<?php echo $data["Description"]; ?>" placeholder="Описание задачи..."></input>
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
            <button type="submit" class="btn btn-primary">Обновить задачу</button>
          </div>
      </form>
          </div>
          
        </div>
      </div>
    </div>

 <script>
            $('#newUpdateModal').modal('show');
            $("#is_taskCheck").attr("checked", <?= ($data["completed"]) ? true : false; ?>);
   </script>
 
      <?php
    }

?> 