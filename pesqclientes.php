
<div class="container-fluid"> 
    <div class="row"><h3>Clientes</h3> 
    </div> 
    <div> 
        <div class="form-group col-md-7"> 
            <label for="nmgetpesquisa">Pesquisa</label> 
            <input type="text" class="form-control" name="nmgetpesquisa" id="idgetpesquisa" size="20" maxlength="100" placeholder="Nome ou CPF/CNPJ"/> 
        </div> 
    </div> 
    <div class="row"> 
        <a href="index.php?p=dlgclientes" class="btn btn-success">+ Incluir</a> 
        <table class="table table-striped table-bordered"> 
            <thead>  
                <tr>     
                    <th width=250>Código</th>
                    <th width=250>CNPJ / CPF</th>
                    <th width=250>Razao Social</th>
                    <th width=250>Nome</th>
                    <th width=250>DDD - Telefone</th>
                    <th width=100>Action</th> 
                </tr>    
            </thead> 
            <tbody> 
                <?php
                $conn = conectar();

                $sql = 'SELECT         ' .
                        '   XCLIENTES, ' .
                        '   CGC,       ' .
                        '   RAZAO,     ' .
                        '   NOME,      ' .
                        '   DDD,       ' .
                        '   TEL1       ' .
                        'FROM          ' .
                        '   clientes   ';

                foreach ($conn->query($sql) as $row) {
                   
                    echo '<tr>';
                    echo '<td>' . $row['XCLIENTES'] . '</td>';
                    echo '<td>' . $row['CGC'] . '</td>';
                    echo '<td>' . $row['RAZAO'] . '</td>';
                    echo '<td>' . $row['NOME'] . '</td>';
                    echo '<td>' . $row['DDD'] . ' - ' . $row['TEL1'] . '</td>';
                    echo '<td width=100>';
                    echo ' ';
                    echo '<a class="btn btn-success" href="index.php?p=dlgaltcliente&id=' . $row['XCLIENTES'] . '">Alterar</a>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?> 
            </tbody> </table> <a href="index.php" class="btn btn-info"><-Voltar</a> </div> </div>