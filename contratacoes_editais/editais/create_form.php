<?php
  $datetime = new DateTime();

  $a = '<a style = "display: inline-block; margin-bottom: 10%; margin-right: 15%;"><form action = "process_edital.php" method = "POST">
  <label>Nome do edital:</label> <input type = "text" name = "name_edital" value = "" class = "form-control"/>
  <br /><label>Data de Públicação:</label> <input type = "date" name = "data_edital" value = "" class = "form-control"/>
  <br /><label>Descrição: </label><textarea name = "descricao" class = "form-control"></textarea>
  <br /><label>Público alvo: </label>
                <select name="alvo" class = "form-control">
                    <option value="teatro">Teatro</option>
                    <option value="musica">Música</option>
                    <option value="exposicoes">Exposições</option>
                    <option value="oficinas">Oficinas</option>
                 </select><br />
    <label>Anexando edital:</label>
    <input type="file" name = "arquivo" class = "form-control"/>
    <br />
    <input type = "submit" name = "subemter" value = "Públicar edital" class = "form-control"/>
    <input type = "reset" name = "resetar" value = "Limpar informações" class = "form-control"/>
    </form>
    </a>
  ';

  echo $a;

?>
