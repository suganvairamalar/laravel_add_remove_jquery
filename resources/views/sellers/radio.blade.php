<div class="form-group">
                  <label class="control-label col-sm-2">Gender</label>
                  <div class="col-sm-2">
                     <label class="radio-inline"><input type="radio" name="gender" id="gender1" value="1" {{ $manager->gender == '1' ? "checked" : ''}}>Male</label>
                  </div>
                  <div class="col-sm-2">
                     <label class="radio-inline"><input type="radio" name="gender" id="gender1" value="2" {{ $manager->gender == '2' ? "checked" : '' }}>Female</label>
                  </div>
               </div>