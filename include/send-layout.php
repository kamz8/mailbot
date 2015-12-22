<?php 

echo'			
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Wysyłanie E-maili</h3>
                    </div>
                    <div class="panel-body container">
             <form class="form-horizontal" role="form" id="mailform">
             
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Temat Wiadomości</label>
                <div class="col-sm-10">
                  <input type="input" class="form-control" mame="Subject" placeholder="Wpisz temat wiadomości">
                </div>
              </div>
<!--              
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Wybierz bazę</label>
                <div class="col-sm-10">
                  <select class="form-control">
                  	<option>-</option>
                    <option>baza1</option>
                    <option>baza2</option>
                  </select>
                  
                </div>
                
              </div>-->
  				
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Unikalne adresy</label>
                <div class="col-sm-10">
                 <input type="checkbox" id="checkbox1" name="checkbox" checked="checked">
                </div>
              </div>  
                
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Wybierz szblon email</label>
                <div class="col-sm-10">
                  <input type="file" id="dbFile" name="dbFile"  accept="text/html">
                </div>
              </div>
          
             
              <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                  <button type="button" class="btn btn-md btn-gray btn-block container">Wyślij</button>
                </div>
              </div>
              
              <div class="row">
              
              	 <div class="col-md-offset-2 col-md-10">
                 	
                  <div id="loading" class="progress progress-striped active">
                    	<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"><span class="sr-only">0/100</span>
                    </div>
                    
                 </div>
                 
                </div>
              </div>
              
              </form>
                        
                                      
			  </div>
            </div>
			
			<script src="js/ajax-form.js"></script>
                
';
?>