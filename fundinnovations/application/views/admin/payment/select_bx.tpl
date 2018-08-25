  <div class="formValidation">
    <select class="user_select"  id="action_bx" name="action_bx">
     <option value="pending">Pending</option>
      <option value="refunded">Make as Fundinnovation cash</option>
       <option value="completed">Completed</option>
        <!-- <option value="error">Error</option>
          <option value="deleted">Deleted</option>-->
    </select>
    </div>
         <span class="btnlayout">
                        <input type="button" onclick="return change_action('{$baseurl}',{$id})" name="update_btn" id="update_btn" class="button" value="Update">
                        </span>
                         