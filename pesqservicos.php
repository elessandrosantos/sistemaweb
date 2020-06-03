<?php //include $_SERVER['DOCUMENT_ROOT']."/_conexao/conexao.php"; 
?> <div class="container"> 
    <div class="row"><h3>Servicos</h3> 
    </div> 
    <div> 
        <div class="form-group col-md-7"> 
            <label for="nmgetpesquisa">Pesquisa</label> 
            <input type="text" class="form-control" name="nmgetpesquisa" id="idgetpesquisa" size="20" maxlength="100" placeholder="Nome ou CPF/CNPJ"/> 
        </div> 
    </div> 
    <div class="row"> 
        <a href="index.php?p=dlgservicos" class="btn btn-success">+ Incluir</a> 
        <table class="table table-striped table-bordered"> 
            <thead>  
                <tr>     
                    <th width=250>Codigo Principal</th>
                    <th width=250>Descricao</th>
                    <th width=100>Action</th> 
                </tr>    
            </thead> 
            <tbody> 
                <?php
                $conn = conectar();
                $sql = 'SELECT      ' .
                        'CODIGO, ' .
                        'DESCR ' .
                        ' FROM ' . 'geral ';
                foreach ($conn->query($sql) as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['CODIGO'] . '</td>';
                    echo '<td>' . $row['DESCR'] . '</td>';

                    echo '<td width=100>';
                    echo ' ';
                    echo '<a class="btn btn-success" href="update.php?id=' . $row['CODIGO'] . '">Update</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?> 
            </tbody> </table> <a href="index.php" class="btn btn-info"><-Voltar</a> </div> </div>