<?php 

include '../models/classLivro.php';

if(isset($_POST['codigo_livro'])){
    $recebe = $_POST['codigo_livro'];
    $livro = new Livro();
    $imprimir = $livro->listarTodosDadosLivro($recebe);
        if(count($imprimir)>0){
            foreach($imprimir as $data){
?>

<!-- Modal -->
<meta charset="UTF-8">

<div class="modal fade" id="informacoes" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="hidden" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="dados-livro-avaliar">
                    <div class="img-avaliar w-25">
                        <img src="/public/static/imagens/amoregelato.jpg">
                    </div>       
                    <div class="dados-avaliar w-75">
                       <p><span>Sinopse:</span><?php echo $data['sinopse'];?></p>
                        <p><span>Autor:</span><?php echo $data['titulo'];?></p>
                        <p><span>Editora:</span><?php echo $data['editora'];?></p>
                        <p><span>ISBN:</span><?php echo $data['isbn'];?></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer btn-conclui-cadastro" >
                <button type="button" class="btn btn-pesquisa-bibliotecario" data-bs-dismiss="modal">Voltar</button>
                <button type="button" class="btn btn-pesquisa-bibliotecario" name="avaliacoes">Avaliações</button>
            </div> 
        </div>
    </div>
</div>

<?php 
}
}
}
?>