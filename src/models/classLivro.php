<?php
    require_once 'classCrud.php';

    class Livro extends CRUD{
        protected $table = 'livro';
        protected $id = 'codigo_livro';
        protected $buscar = 'titulo';

        private $ISBN;
        private $data_publicacao;
        private $titulo;
        private $sinopse;
        private $comentario;
        private $nota;
        private $autor;
        private $nacionalidade;
        private $editora;
        private $categoria;
        private $volume;
        private $edicao;
        private $qtd_pag;
        private $url_img;
        private $url_img_64;

        public function setvolume($volume){
            $this->volume = $volume;
        } 
        public function setedicao($edicao){
            $this->edicao = $edicao;
        } 
        public function setqtd_pag($qtd_pag){
            $this->qtd_pag = $qtd_pag;
        }
        public function setISBN($ISBN){
            $this->ISBN = $ISBN;
        }
        public function getISBN(){
            return $this->ISBN;
        }
        public function setdata_publicacao($data_publicacao){
            $this->data_publicacao = $data_publicacao;
        }
        public function getdata_publicacao(){
            return $this->data_publicacao;
        }
        public function settitulo($titulo){
            $this->titulo = $titulo;
        }
        public function gettitulo(){
            return $this->titulo;
        }
        public function setsinopse($sinopse){
            $this->sinopse = $sinopse;
        }
        public function getsinopse(){
            return $this->sinopse;
        }
        public function setcomentario($comentario){
            $this->comentario = $comentario;
        }
        public function getcomentario(){
            return $this->comentario;
        }
        public function setnota($nota){
            $this->nota = $nota;
        }
        public function getnota(){
            return $this->nota;
        }
        public function setautor($autor){
            $this->autor = $autor;
        }
        public function getautor(){
            return $this->autor;
        }
        public function setnacionalidade($nacionalidade){
            $this->nacionalidade = $nacionalidade;
        }
        public function getnacionalidade(){
            return $this->nacionalidade;
        }
        public function seteditora($editora){
            $this->editora = $editora;
        }
        public function geteditora(){
            return $this->editora;
        }
        public function setcategoria($categoria){
            $this->categoria = $categoria;
        }
        public function getcategoria(){
            return $this->categoria;
        }
        public function seturl_img($url_img){
            $this->url_img = $url_img;
        }
        public function geturl_img(){
            return $this->url_img;
        }
        public function seturl_img_64($url_img_64){
            $this->url_img_64 = $url_img_64;
        }
        

        // FUNÇÕES DE LISTAGEM DE DADOS
        public function findAllLivro(){
			$sql = "select codigo_livro, titulo, cat.dsc_categoria as categoria, img_capa, trunc( AVG(lpa.qtd_estrelas),1) as nota,  SUBSTRING(sinopse from 1 for 100) as sinopse  
            FROM livro as li 
            full outer join livro_categoria as lc              on (li.codigo_livro = lc.FK_livro_codigo_livro)
            full outer join categoria as cat                   on (cat.codigo_categoria = lc.FK_categoria_codigo_categoria)
            full outer join livro_pessoa_avalia as lpa         on (lpa.FK_livro_codigo_livro = li.codigo_livro)
            group by  codigo_livro,titulo,categoria,sinopse, img_capa";
			$stmt = Database::prepare($sql);			
			$stmt->execute();
			//retorna um array com os registros da tabela indexado pelo nome da coluna da tabela e por um número
			return $stmt->fetchAll(PDO::FETCH_BOTH );
			
		}

        public function listarTodosDadosLivro($id){
            //LISTAGEM ÚTIL
			$sql = "select trunc( AVG(lpa.qtd_estrelas),0) as nota, img_capa, li.codigo_livro as codigo, li.titulo, li.sinopse, li.ISBN, li.data_publicacao, 
            li.edicao, li.volume, li.qtd_paginas, ed.nome as editora, 
            autor.nome as escritor, cat.dsc_categoria as categoria, autor.nacionalidade, li.sinopse from livro as li
            full outer join editora as ed                      on (li.FK_editora_codigo_edit = ed.codigo_edit)
            full outer join livro_pessoa_avalia as lpa         on (lpa.FK_livro_codigo_livro = li.codigo_livro)
            full outer join livro_categoria as lc              on (li.codigo_livro = lc.FK_livro_codigo_livro)
            full outer join categoria as cat                   on (cat.codigo_categoria = lc.FK_categoria_codigo_categoria)
            full outer join livro_autor as la                  on (li.codigo_livro = la.FK_livro_codigo_livro)
            full outer join autor                              on (la.FK_autor_codigo_autor = autor.codigo_autor)
			where codigo_livro = :codigo_livro
            group by  editora,codigo,escritor,categoria,nacionalidade, img_capa, sinopse";
			$stmt = Database::prepare($sql);
            $stmt->bindParam(':codigo_livro', $id);		
			$stmt->execute();
			//retorna um array com os registros da tabela indexado pelo nome da coluna da tabela e por um número
			return $stmt->fetchAll(PDO::FETCH_BOTH );
			
		}

        public function listarCategoria(){
            $sql="SELECT * from categoria";
            $stmt = Database::prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_BOTH );
        }

        public function listarAvaliacoes($id){
            $sql="select * from livro li
            full outer join livro_pessoa_avalia lpa
            on (li.codigo_livro = lpa.fk_livro_codigo_livro)
            full outer join comentario cmt
            on (lpa.fk_comentario_codigo_avaliacao_comentario = cmt.codigo_comentario)
            full outer join pessoa as pes                      
            on (lpa.FK_pessoa_codigo_pessoa = pes.codigo_pessoa)
            where lpa.FK_livro_codigo_livro = :codigo_livro";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':codigo_livro', $id);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_BOTH );
        }

        public function listarHistorico($id){
            $sql="select * from livro_pessoa_loca lpl
            join pessoa ps on(lpl.fk_pessoa_codigo_pessoa = ps.codigo_pessoa)
            join livro li on(lpl.fk_livro_codigo_livro = li.codigo_livro)
            where codigo_pessoa = :codigo_pessoa";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':codigo_pessoa', $id);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_BOTH );
        }

        #########     FUNÇÕES DE INSERÇÃO DE DADOS     ###########
        public function insert(){
            //insere editora
            $sql3="INSERT INTO editora (nome) VALUES (:nome) RETURNING codigo_edit";
            $stmt3 = Database::prepare($sql3);
            $stmt3->bindParam(':nome', $this->editora);
            $stmt3->execute();
            $FK_EDITORA_codigo_edit = $stmt3->fetch()["codigo_edit"];
            
            //insere na tabela livro
            $sql="INSERT INTO $this->table (ISBN, data_publicacao, titulo, sinopse, FK_EDITORA_codigo_edit, img_capa, volume, edicao, qtd_paginas, img_capa_base64) VALUES (:ISBN,:data_publicacao,:titulo, :sinopse, :FK_EDITORA_codigo_edit, :img_capa, :volume, :edicao, :qtd_paginas, :img_capa_base64) RETURNING codigo_livro";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':ISBN', $this->ISBN);
            $stmt->bindParam(':data_publicacao', $this->data_publicacao);
            $stmt->bindParam(':titulo', $this->titulo);
            $stmt->bindParam(':sinopse', $this->sinopse);
            $stmt->bindParam(':FK_EDITORA_codigo_edit', $FK_EDITORA_codigo_edit);
            $stmt->bindParam(':img_capa', $this->url_img);
            $stmt->bindParam(':volume', $this->volume);
            $stmt->bindParam(':edicao', $this->edicao);
            $stmt->bindParam(':qtd_paginas', $this->qtd_pag);
            $stmt->bindParam(':img_capa_base64', $this->url_img_64);
            $stmt->execute();

            //insere autor na tabela autor
            $sql1="INSERT INTO autor (nome, nacionalidade) VALUES (:nome_autor, :nacionalidade_autor) returning codigo_autor";
            $stmt1 = Database::prepare($sql1);
            $stmt1->bindParam(':nome_autor', $this->autor);
            $stmt1->bindParam(':nacionalidade_autor', $this->nacionalidade);
            $stmt1->execute();

            //associa o autor ao livro
            $FK_LIVRO_codigo_livro = $stmt->fetch()["codigo_livro"]; //id do livro inserido agora
            $FK_LIVRO_codigo_autor = $stmt1->fetch()["codigo_autor"]; //id do autor inserido agora
            $sql2="INSERT INTO livro_autor (FK_LIVRO_codigo_livro, FK_AUTOR_codigo_autor) VALUES (:FK_LIVRO_codigo_livro, :FK_AUTOR_codigo_autor)";
            $stmt2 = Database::prepare($sql2);
            $stmt2->bindParam(':FK_LIVRO_codigo_livro', $FK_LIVRO_codigo_livro);
            $stmt2->bindParam(':FK_AUTOR_codigo_autor', $FK_LIVRO_codigo_autor);            
            $stmt2->execute();

            //associar a categoria selecionada ao livro
            $sql5="INSERT INTO livro_categoria (FK_categoria_codigo_categoria, FK_livro_codigo_livro) VALUES (:FK_categoria_codigo_categoria, :FK_LIVRO_codigo_livro)";
            $stmt5 = Database::prepare($sql5);
            $stmt5->bindParam(':FK_categoria_codigo_categoria', $this->categoria);
            $stmt5->bindParam(':FK_LIVRO_codigo_livro', $FK_LIVRO_codigo_livro);
            $stmt5->execute();
            
        }


        public function inserirAvaliacoes($codigo_livro, $codigo_pessoa,  $nota, $dsc_comentario){
            $sql1 = "INSERT INTO comentario (dsc_comentario) VALUES (:dsc_comentario) returning codigo_comentario";
			$stmt1 = Database::prepare($sql1);
            $stmt1->bindParam(':dsc_comentario', $dsc_comentario);
			$stmt1->execute();

            $id_comentario = $stmt1->fetch()["codigo_comentario"];

            $sql = "INSERT INTO livro_pessoa_avalia (FK_pessoa_codigo_pessoa, FK_livro_codigo_livro, qtd_estrelas, FK_comentario_codigo_avaliacao_comentario) VALUES (:codigo_pessoa,:codigo_livro,:nota, :id_comentario);";
			$stmt = Database::prepare($sql);	
            $stmt->bindParam(':codigo_pessoa', $codigo_pessoa);
			$stmt->bindParam(':codigo_livro', $codigo_livro);
            $stmt->bindParam(':nota', $nota);
            $stmt->bindParam(':id_comentario', $id_comentario);
			$stmt->execute();

			return true;
        }

        #########     FUNÇÕES DE ATUALIZAÇÃO DE DADOS     ###########
        public function locacao($codigo_livro, $codigo_pessoa, $data_locacao, $data_entrega){
            //exibe se o livro está disponível ou não
            $sql="select count(*) as valor from (select livro.codigo_livro,livro.titulo,pessoa.nome,status_loca.codigo_status,
            lpl.data_locacao,lpl.data_entrega from livro_pessoa_loca lpl
            join livro                       on(livro.codigo_livro = lpl.fk_livro_codigo_livro)
            inner join pessoa                on (pessoa.codigo_pessoa = lpl.fk_pessoa_codigo_pessoa)
            inner join status_loca           on status_loca.codigo_status = lpl.fk_status_loca_codigo_status
            where livro.codigo_livro=:codigo_livro and status_loca.codigo_status=1) as teste";
            $stmt = Database::prepare($sql);	
            $stmt->bindParam(':codigo_livro', $codigo_livro);
            $stmt->execute();
            $dados = $stmt->fetch();

            if($dados['valor'] === "0"){//disponivel, possivel locar, cria a locacao com status locado:
                $sql1 = 'insert into livro_pessoa_loca 
                (fk_livro_codigo_livro, fk_pessoa_codigo_pessoa, fk_status_loca_codigo_status, data_locacao)
                values (:codigo_livro, :codigo_pessoa, 1, :data_locacao)';
                $stmt1 = Database::prepare($sql1);	
                $stmt1->bindParam(':codigo_livro', $codigo_livro);
                $stmt1->bindParam(':codigo_pessoa', $codigo_pessoa);
                $stmt1->bindParam(':data_locacao', $data_locacao);
                $stmt1->execute();
                return 'locado';
            }
            else{//se estiver locado, só é possível devolver
                $sql2 = 'update livro_pessoa_loca 
                set fk_status_loca_codigo_status = 2, data_entrega = :data_entrega
                where fk_livro_codigo_livro = :codigo_livro 
                and fk_pessoa_codigo_pessoa = :codigo_pessoa;';
                $stmt2 = Database::prepare($sql2);	
                $stmt2->bindParam(':codigo_livro', $codigo_livro);
                $stmt2->bindParam(':codigo_pessoa', $codigo_pessoa);
                $stmt2->bindParam(':data_entrega', $data_entrega);
                $stmt2->execute();
                $resultado = 0;
                return 'devolvido';
            }
        }


        #########     FUNÇÕES DE LISTAGEM ESPECÍFICA     ###########

        public function rankingNota(){
            //ranking de avaliações
            $sql = "select trunc( AVG(lpa.qtd_estrelas),0) as nota, img_capa, li.codigo_livro as codigo_livro, li.titulo, SUBSTRING(li.sinopse from 1 for 100) as sinopse, 
            li.ISBN, li.data_publicacao, li.volume, li.qtd_paginas, ed.nome as editora,
            autor.nome as autor, cat.dsc_categoria as categoria, autor.nacionalidade as nacao from livro as li
            full outer join editora as ed                      on (li.FK_editora_codigo_edit = ed.codigo_edit)
            full outer join livro_pessoa_avalia as lpa         on (lpa.FK_livro_codigo_livro = li.codigo_livro)
            full outer join livro_categoria as lc              on (li.codigo_livro = lc.FK_livro_codigo_livro)
            full outer join categoria as cat                   on (cat.codigo_categoria = lc.FK_categoria_codigo_categoria)
            full outer join livro_autor as la                  on (li.codigo_livro = la.FK_autor_codigo_autor)
            full outer join autor                              on (la.FK_autor_codigo_autor = autor.codigo_autor)
            group by  editora,codigo_livro,autor,categoria,nacao, img_capa order by nota desc nulls last";
            $stmt = Database::prepare($sql);			
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_BOTH );
        }

        public function buscarLivro($pesquisar){
			$sql="select codigo_livro, titulo, cat.dsc_categoria as categoria, img_capa, trunc( AVG(lpa.qtd_estrelas),1) as nota,  SUBSTRING(sinopse from 1 for 100) as sinopse  
            FROM livro as li 
            full outer join livro_categoria as lc              on (li.codigo_livro = lc.FK_livro_codigo_livro)
            full outer join categoria as cat                   on (cat.codigo_categoria = lc.FK_categoria_codigo_categoria)
            full outer join livro_pessoa_avalia as lpa         on (lpa.FK_livro_codigo_livro = li.codigo_livro)
            WHERE titulo ILIKE :pesquisar or dsc_categoria ILIKE :pesquisar
            group by  codigo_livro,titulo,categoria,sinopse";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':pesquisar', $pesquisar);
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_BOTH );
		}
        
        public function disponibilidade($codigo_livro){
            //exibe se o livro está disponível ou não
            $sql="select count(*) as valor from (select livro.codigo_livro,livro.titulo,pessoa.nome,status_loca.codigo_status,
            lpl.data_locacao,lpl.data_entrega from livro_pessoa_loca lpl
            join livro                       on(livro.codigo_livro = lpl.fk_livro_codigo_livro)
            inner join pessoa                on (pessoa.codigo_pessoa = lpl.fk_pessoa_codigo_pessoa)
            inner join status_loca           on status_loca.codigo_status = lpl.fk_status_loca_codigo_status
            where livro.codigo_livro=:codigo_livro and status_loca.codigo_status=1) as teste";
            $stmt = Database::prepare($sql);	
            $stmt->bindParam(':codigo_livro', $codigo_livro);
            $stmt->execute();
            return $stmt->fetch();
        }


        // FUNÇÃO DE EXCLUSÃO
        public function excluir($id){
            $sql8="DELETE FROM livro_categoria WHERE fk_livro_codigo_livro = :id";
            $stmt8 = Database::prepare($sql8);	
            $stmt8->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt8->execute();

            $sql7="DELETE FROM livro_autor WHERE fk_livro_codigo_livro = :id";
            $stmt7 = Database::prepare($sql7);	
            $stmt7->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt7->execute();

            $sql1="DELETE FROM livro_pessoa_avalia WHERE fk_livro_codigo_livro = :id";
            $stmt1 = Database::prepare($sql1);	
            $stmt1->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt1->execute();

            $sql4="DELETE FROM livro_pessoa_loca WHERE fk_livro_codigo_livro = :id";
            $stmt4 = Database::prepare($sql4);	
            $stmt4->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt4->execute();

            $sql="DELETE FROM livro WHERE codigo_livro = :id";
			$stmt = Database::prepare($sql);	
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
        }
        
        // FUNÇÃO DE UPDATE
        public function update($id){
            //atualiza na tabela livro
            $sql="UPDATE $this->table SET ISBN = :ISBN, data_publicacao = :data_publicacao, 
            titulo = :titulo, sinopse = :sinopse, img_capa = :img_capa WHERE codigo_livro = :id returning fk_editora_codigo_edit";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ISBN', $this->ISBN);
            $stmt->bindParam(':data_publicacao', $this->data_publicacao);
            $stmt->bindParam(':titulo', $this->titulo);
            $stmt->bindParam(':sinopse', $this->sinopse);
            $stmt->bindParam(':img_capa', $this->url_img);
            $stmt->execute();
            $fk_editora_codigo_edit = $stmt->fetch()["fk_editora_codigo_edit"];

            //atualiza editora
            $sql3="UPDATE editora set nome = :nome WHERE codigo_edit = :fk_editora_codigo_edit";
            $stmt3 = Database::prepare($sql3);
            $stmt3->bindParam(':nome', $this->editora);
            $stmt3->bindParam(':fk_editora_codigo_edit', $fk_editora_codigo_edit);
            $stmt3->execute();

            //seleciona o autor ligado ao livro 
            $sql2="SELECT * FROM livro_autor WHERE fk_livro_codigo_livro = :fk_livro_codigo_livro";
            $stmt2 = Database::prepare($sql2);
            $stmt2->bindParam(':fk_livro_codigo_livro', $id);        
            $stmt2->execute();
            $fk_autor_codigo_autor = $stmt2->fetch()["fk_autor_codigo_autor"]; //id do autor inserido agora

            //insere autor na tabela autor
            $sql1="UPDATE autor SET nome =  :nome, nacionalidade = :nacionalidade where codigo_autor = :fk_autor_codigo_autor";
            $stmt1 = Database::prepare($sql1);
            $stmt1->bindParam(':nome', $this->autor);
            $stmt1->bindParam(':nacionalidade', $this->nacionalidade);
            $stmt1->bindParam(':fk_autor_codigo_autor', $fk_autor_codigo_autor);
            $stmt1->execute();

            //associar a categoria selecionada ao livro
            $sql5="UPDATE livro_categoria SET fk_categoria_codigo_categoria = :fk_categoria_codigo_categoria, fk_livro_codigo_livro = :fk_livro_codigo_livro";
            $stmt5 = Database::prepare($sql5);
            $stmt5->bindParam(':fk_categoria_codigo_categoria', $this->categoria);
            $stmt5->bindParam(':fk_livro_codigo_livro', $id);
            $stmt5->execute();
        }

        // FUNÇÃO DE RELATÓRIO
        public function relatorio(){
            $sql="select * from livro_pessoa_loca lpl
            join pessoa ps on(lpl.fk_pessoa_codigo_pessoa = ps.codigo_pessoa)
            join livro li on(lpl.fk_livro_codigo_livro = li.codigo_livro)";
            $stmt = Database::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public static function getImageDataFromUrl($url){
            $urlParts = pathinfo($url);
            $extension = $urlParts['extension'];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            $response = curl_exec($ch);
            curl_close($ch);
            $base64 = 'data:image/' . $extension . ';base64,' . base64_encode($response);
            return $base64;
        }
    }
?>
