<?php
function userForm()
{
echo'
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Zmiana danych urzytkownika.</h3>
                    </div>
                    <div class="panel-body ">
            <form class="form-horizontal" role="form" id="user" name="account" method="post" action="./ustawienia">
              
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Nazwa urzytkownika:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="user" placeholder="Wpisz nową nazwę urzytkownika">
                </div>
              </div>
              
                            
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Hasło:</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="pass" placeholder="Wpisz nowe hasło">
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Aders email:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="email" placeholder="Wpisz adres email">
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Podpis:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="fromName" placeholder="Wpisz swój podpis załączany w wiadmości">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                  <button type="submit" name="send1" class="btn btn-md btn-gray btn-block container">Zapisz</button>
                </div>
              </div>
              
              
              
              </form>
                        
                                      
			  </div>
            </div>';
}
function serverForm()
{			
echo'                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Configuracja połączenia z serwerm pocztowym.</h3>
                    </div>
                    <div class="panel-body">
                    
            <form class="form-horizontal" role="form" id="bot-settings" name="server_settings" action="./ustawienia" method="post">
              

              
                            
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Aders serwera pocztowego:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="host" placeholder="Wpisz aders serwera pocztowego">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Port:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="port" placeholder="Wpisz port serwera pocztowego">
                </div>
              </div>
              
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Login:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="user" placeholder="Wpisz nową nazwę urzytkownika">
                </div>
              </div>              

              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Hasło:</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="pass" placeholder="Wpisz nowe hasło">
                </div>
              </div>                            

              <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                  <button type="submit" name="send" class="btn btn-md btn-gray btn-block container">zapisz</button>
                </div>
              </div>
              
              
              
              </form>
                        
                                      
			  </div>
            </div> 
';
}

?>