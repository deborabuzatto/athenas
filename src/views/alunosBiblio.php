<?php 
//Classe Aluno
include_once '../models/classAluno.php';

if(isset($_POST['btn-buscar'])){
    $pesquisar = $_POST['pesquisar'];
    $palavra = '%' . $pesquisar. '%';

    $aluno = new Aluno();
    $busca = $aluno->busca($palavra);
    if(count($busca)>0){
        foreach($busca as $dados){
?>

<div class="centralizar-livro">
    <div class="div-livro-locacao livro"  data-bs-toggle="modal" data-bs-target="#informacoes<?php echo $dados['codigo_pessoa'];?>">
        <div class="img-pessoa1"><img src="../components/dinamic/<?php echo $dados['img_perfil'];?>"></div>
        <div class="table-conteudo">
            <h4><?php echo $dados['nome'];?></h4>
            <p><span>Username:</span><?php echo $dados['username'];?></p>
            <p><span>Data de nascimento:</span><?php echo $dados['data_nasc'];?></p>
            <p><span>E-mail:</span><?php echo $dados['email'];?></p>
        </div>
    </div>
</div>


<?php
}}}
else{
    $aluno = new Aluno();
    $imprimir = $aluno->findAll();
    if(count($imprimir)>0){
        foreach($imprimir as $dados){
?>

<div class="div-livro-externo livro"  data-bs-toggle="modal" data-bs-target="#informacoes<?php echo $dados['codigo_pessoa'];?>">
    <?php 
        if(empty($dados['img_perfil'])){
            $resultado = '/public/static/imagens/default.png';
        }else{
            $resultado = '../components/dinamic/'.$dados['img_perfil'];
        }
    ?>
    <div><img src="<?php echo $resultado;?>"></div>
    <div class="table-conteudo">
        <h4><?php echo $dados['nome'];?></h4>
        <p><span>Username:</span><?php echo $dados['username'];?></p>
        <p><span>Data de nascimento:</span><?php echo $dados['data_nasc'];?></p>
        <p><span>E-mail:</span><?php echo $dados['email'];?></p>
    </div>
</div>



<!-- INFORMAÇÕES LIVRO -->
<div class="modal fade" id="informacoes<?php echo $dados['codigo_pessoa'];?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Usuário selecionado: <?php echo $dados['nome'];?></h5>
                <button type="hidden" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="dados-livro-avaliar">
                    <h4>Escolha uma ação para executar: </h4>
                </div>
            </div>
            <div class="modal-footer btn-conclui-cadastro" >
                <button class="btn btn-pesquisa-bibliotecario" data-bs-dismiss="modal" title="Voltar"><i class="fa fa-arrow-left"></i>Voltar</button>
                <button class="btn btn-pesquisa-bibliotecario" title="Editar Aluno" data-bs-toggle="modal" data-bs-target="#editar<?php echo $dados['codigo_pessoa'];?>"><i class="fa fa-pencil"></i> Editar</button>
                <button class="btn btn-pesquisa-bibliotecario" title="Excluir Aluno" data-bs-toggle="modal" data-bs-target="#excluir<?php echo $dados['codigo_pessoa'];?>"><i class="fa fa-trash"></i> Excluir</button>
            </div> 
        </div>
    </div>
</div>

<!-- EXCLUIR LIVRO -->
<div class="modal fade" id="excluir<?php echo $dados['codigo_pessoa'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">excluir Livro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="cadastrar-livro">
                    <p>Deseja realmente excluir o usuario <?php echo $dados['nome'];?>?</p>
                    <div>
                        <form method="POST" action="../services/excluirAluno.php">
                            <input type="hidden" class="form-control" id="codigo_pessoa" name="codigo_pessoa" 
                            value="<?php echo $dados['codigo_pessoa'];?>">
                            
                            <div type="button" class="btn-conclui-cadastro">
                                <button class="btn btn-pesquisa-bibliotecario" name="btn-excluir">Excluir Aluno</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- EDITAR LIVRO -->
<div class="modal fade" id="editar<?php echo $dados['codigo_pessoa'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Livro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="cadastrar-livro">
                    <form method="POST" action="../services/editarAluno.php">
                        <div class="input-nomes">
                            <input type="hidden" class="form-control" id="codigo_pessoa" name="codigo_pessoa" value="<?php echo $dados['codigo_pessoa'];?>">

                            <label for="nomeContato" class="form-label">Nome completo:</label>
                            <input type="text" class="form-control" id="nomeContato" name="nome" value="<?php echo $dados['nome'];?>">

                            <label for="nomeContato" class="form-label">Nome de usuário:</label>
                            <input type="text" class="form-control" id="nomeContato" name="username" value="<?php echo $dados['username'];?>">
                        
                            <label for="senhaLogin" class="form-label">Data de nascimento:</label>
                            <input type="date" class="form-control" id="senhaLogin" name="data_nasc" value="<?php echo $dados['data_nasc'];?>"> 

                            <label for="email" class="form-label">E-mail:</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $dados['email'];?>">
                        </div>
                        <div class="modal-footer btn-conclui-cadastro" >
                            <div type="button" class="btn-conclui-cadastro">
                                <button class="btn btn-pesquisa-bibliotecario" name="btn-editar">Concluir Edição do Livro</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php
}}}
?>