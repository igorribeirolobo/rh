<?php require 'header.php'; protegePagina(); ?>
 
<div class="header-parallax" style="background-image:url('<?php echo $imagem[16]; ?>'); background-color: #272727; background-size: cover; padding: 100px 0" data-top-bottom="background-position: 50% 0px;" data-bottom-top="background-position: 50% -200px;">
    <div class="container">
        <div class="row">   
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="text-center" style="text-transform: none;text-shadow: 1px 1px 0px rgba(105, 105, 105, 1);"><img src="<?php echo $imagem[15]; ?>" alt="<?php echo $imagem_alt[15]; ?>" title="<?php echo $imagem_title[15]; ?>" style="margin-bottom: 10px; width: 81px"><br>Cotação de Viagens</h1>
            </div>
        </div>
    </div>
</div>
<div class="header">  
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <form class="form-inline" name="search_blog" method="get" action="blog.php">
                    <input type="text" name="searchy" placeholder="Digite o que deseja Buscar" class="form-control" style="width: 300px">
                    <input type="submit" name="enviar" value="Enviar" class="btn btn-primary" style="padding: 10px">
                </form>
            </div>
            <div class="col-sm-6"> 
                <ol class="breadcrumb" style="margin-top: 15px">
                    <li><span class="ion-home breadcrumb-home"></span><a href="index.php">Home</a></li>
                    <li>Cota&ccedil;&atilde;o de Viagens</li>
                </ol>
            </div>
        </div>
    </div> 
</div> 
<section class="content-40mg">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="heading mb20 mt30-xs"><h4><?php echo $texto[40]; ?></h4></div>
                <?php echo $texto[39]; ?>
            </div>
            <div class="col-sm-4 flipInY-animated text-center">
                <img  src="<?php echo $imagem[17]; ?>" alt="<?php echo $imagem_alt[17]; ?>" title="<?php echo $imagem_title[17]; ?>" class="img-responsive" style="max-width: 100%; margin-top: 30px">
            </div>
        </div>
    </div>
</section>
<section class="content-bordered background-light-grey border-bottom-none pt40 pb40">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p class="lead text-center"><?php echo strip_tags($texto[41]); ?></p>
                <p class="text-center"><?php echo strip_tags($texto[42]); ?></p>
                <hr style="width:400px;" class="double-hr mt30 mb30">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <form role="form" name="cotacao" method="post" action="requisicao.php" id="validator">
                    <label style="font-weight: normal">Obs.: Campos com * são obrigatórios.</label>
                    <div class="form-group">
                        <label>Digite seu nome *:</label>
                        <input type="text" placeholder="Nome Completo"  class="form-control" id="cotacao[nome]" value="<?php echo $_SESSION['usuarioNome']; ?>" name="cotacao[nome]" data-rule-required="true" >

                    </div>
                    <div class="form-group">
                        <label>E-mail *:</label>
                        <input type="email" placeholder="Seu Email" class="form-control" value="<?php echo $_SESSION['usuarioEmail']; ?>"  id="cotacao[email]" name="cotacao[email]"  data-rule-required="true" >
                    </div>
                    <div class="form-group">
                        <label>Telefone 1:</label>
                        <input type="text" data-mask="(99) 9999-9999?9" data-rule-required="true" class="form-control" id="cotacao[telefone1]" name="cotacao[telefone1]">
                    </div>
                    <div class="form-group">
                        <label>Telefone 2:</label>
                        <input type="text" data-mask="(99) 9999-9999?9" class="form-control" name="cotacao[telefone2]">
                    </div>
                    <div class="form-group">
                        <label>Qual cidade você mora? *</label>
                        <div class="controls">
                            <?php

                            function imprimirLocais($nomes) {
                                $string = '';
                                foreach ($nomes as $nome1) {
                                    $string .= '&quot;' . $nome1 . '&quot;,';
                                }
                                return trim($string, ',');
                            }

                            $nomes = array();
                            $sql = "SELECT nome FROM cidade";
                            $stmt = $db->prepare($sql);
                            $stmt->execute();

                            while ($data = $stmt->fetch()) {
                                $nomes[] = $data['nome'];
                            }
                            ?>
                            <input class="form-control" data-rule-required="true" type="text" value="<?php echo $_SESSION['usuarioCidade']; ?>"  name="cotacao[cidadeQueMora]" placeholder="Digite e escolha" data-provide="typeahead" data-items="6" data-source="[<?php echo imprimirLocais($nomes) ?>]" autocomplete="off" >
                        </div>

                    </div>
                    <div class=" row">
                        <div class="col-md-4 form-group" >
                            <label>Que dia você quer viajar?</label>
                            <select class="form-control" name="cotacao[dia-viagem]"  data-rule-required="true" >
                                <option value="">-- Selecione --</option>
                                <?php
                                for ($i = 1; $i <= 31; $i++) {
                                    echo "<option value='" . $i . "'>" . $i . "</option>";
                                }
                                ?>   
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Que mês você quer viajar? *</label>
                            <select class="form-control"  data-rule-required="true" id="mes-viagem" name="cotacao[mes-viagem]">
                                <option value="">-- Selecione o mês --</option>
                                <option value="Janeiro">Janeiro</option>
                                <option value="Fevereiro">Fevereiro</option>
                                <option value="Março">Março</option>
                                <option value="Abril">Abril</option>
                                <option value="Maio">Maio</option>
                                <option value="Junho">Junho</option>
                                <option value="Julho">Julho</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Setembro">Setembro</option>
                                <option value="Outubro">Outubro</option>
                                <option value="Novembro">Novembro</option>
                                <option value="Dezembro">Dezembro</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label >Em que ano você quer viajar? *</label>
                            <select class="form-control"  data-rule-required="true"  name="cotacao[ano-viagem]"  >
                                <option value="">-- Selecione --</option>
                                <?php
                                for ($i = 2016; $i <= 2021; $i++) {
                                    echo "<option value='" . $i . "'>" . $i . "</option>";
                                }
                                ?>   
                            </select>
                        </div>
                        <input type="checkbox" style="margin-left: 15px" name="cotacao[flexivel]"> Data Flexivel
                    </div>
                    <div class=" row" style="float: left; margin-top:10px ">
                        <label style="margin-left: 15px">Quantas pessoas irão viajar? (considerar a idade na data da viagem) *</label>
                        <div class="clearfix"></div>
                        <div class="col-md-3 form-group">
                            <select name="cotacao[adultos]" data-rule-required="true" class="form-control"  required>
                                <option value="">-- Selecione a quantidade de Adultos --</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <select name="cotacao[jovens]" data-rule-required="true" class="form-control" required>
                                <option value="">-- Selecione a quantidade de Jovens de 12 a 18 anos --</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <select name="cotacao[criancas]" data-rule-required="true" class="form-control" required>
                                <option value="">-- Selecione a quantidade de Crianças de 2 a 12 anos --</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <select name="cotacao[bebes]" data-rule-required="true" class="form-control" required>
                                <option value="">-- Selecione a quantidade de Bebês de 0 a 2 anos --</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>

                        <p style="margin-left: 15px">Obs. : Números acima de 10 viajantes, favor inserir no campo Informações Complementares</p>
                    </div>
                    <div class="form-group row" style=" margin-top:10px">
                        <label style="margin-left: 15px">Alguma necessidade específica?</label>
                        <div class="clearfix"></div>
                        <div class="col-md-3">
                            <input type="checkbox" name="cotacao[necessidade][]" value="Idosos"> Idosos
                        </div>
                        <div class="col-md-3">
                            <input type="checkbox" name="cotacao[necessidade][]" value="Deficiente Físico"> Deficiente Físico
                        </div>
                        <div class="col-md-3">
                            <input type="checkbox" name="cotacao[necessidade][]" value="Pet"> Pet
                        </div>
                        <div class="col-md-3">
                            <input type="checkbox" name="cotacao[necessidade][]" value="Outras"> Outras (Especificar no espaço abaixo)
                        </div>
                        <div class="col-md-12">
                            <textarea class="form-control" name="cotacao[necessidades_outras]"></textarea>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <label>Qual o orçamento planejado para sua viagem? </label>
                        <input type="text" data-rule-required="true" placeholder="Exemplo: De 3.000,00 a 5.000,00" class="form-control" id="orcamento" name="cotacao[orcamento_planejado]">
                    </div>
                    <div class="form-group row" style=" margin-top:10px ">
                        <label style="margin-left: 15px">Você deseja viajar com excursões ou por conta própria?</label>
                        <div class="clearfix"></div>
                        <div class="col-md-4">
                            <input type="radio" data-rule-required="true"  name="cotacao[tipo_excursao]" value="Com excursões"> Com excursões
                        </div>
                        <div class="col-md-4">
                            <input type="radio" data-rule-required="true" name="cotacao[tipo_excursao]" value="Por conta própria"> Por conta própria
                        </div>
                        <div class="col-md-4">
                            <input type="radio"  data-rule-required="true"  name="cotacao[tipo_excursao]" value="Qualquer uma das opções"> Qualquer uma das opções
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Qual a cidade em que você vai iniciar sua viagem?</label>
                        <div class="controls">
                            <input class="form-control" data-rule-required="true" type="text" name="cotacao[cidade_inicio]" placeholder="Digite e escolha" data-provide="typeahead" data-items="4" data-source="[<?php echo imprimirLocais($nomes) ?>]" autocomplete="off" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Qual a cidade em que você vai encerrar sua viagem?</label>
                        <div class="controls">
                            <input class="form-control" data-rule-required="true" type="text" name="cotacao[cidade_fim]" placeholder="Digite e escolha" data-provide="typeahead" data-items="4" data-source="[<?php echo imprimirLocais($nomes) ?>]" autocomplete="off" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Você já definiu seus destinos ou deseja sugestões? </label>
                        <div class="cta" style="background: #248AFD; margin-top:15px; padding: 10px 0;border: 0"> 
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 text-center"> 
                                        <input data-rule-required="true" type="radio" name="cotacao[definir_destino]" id="sim_defini" value="defini" style="float: left;cursor: pointer;margin: 2px 5px;filter:alpha(opacity=0); -moz-opacity:0; -khtml-opacity: 0; opacity: 0;">
                                        <label for="sim_defini" name="defini" id="defini" class="btn btn-rw btn-default btn-lg" style="background: transparent;border: 1px solid #fff;box-shadow: none; margin-top: 2px; cursor: pointer">Já Defini meu destino</label>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mt15-md text-center">
                                        <input data-rule-required="true"  type="radio" name="cotacao[definir_destino]" value="nao_defini" id="defini_nao" style="filter:alpha(opacity=0); -moz-opacity:0; -khtml-opacity: 0; opacity: 0;cursor: pointer;margin: 2px 5px">
                                        <label for="defini_nao" id="nao_defini"  class="btn btn-rw btn-default btn-lg" style="background: transparent; border: 1px solid #fff;box-shadow: none; margin-top: 2px; cursor: pointer">Desejo Sugestões</label>
                                    </div>
                                </div> 
                            </div> 
                        </div> 

                    </div>
                    <div id="ja_defini">
                        <div class="form-group" >
                            <label >Qual é o seu destino? *</label>
                            <input class="form-control" id="qual_destino_defini" type="text" name="cotacao[qual_destino_defini]" placeholder="Digite e escolha" data-provide="typeahead" data-items="4" data-source="[<?php echo imprimirLocais($nomes) ?>]" autocomplete="off" >
                        </div>
                        <div class="form-group" >
                            <label >Qual meio de transporte você quer utilizar para chegar ao seu destino? *</label>
                            <select class="form-control" id="qual_transporte_defini" name="cotacao[qual_transporte_defini]">
                                <option value="">-- Selecione um --</option>
                                <option value="Avião">Avião</option>
                                <option value="Ônibus">Ônibus</option>
                                <option value="Trem">Trem</option>
                                <option value="Navio">Navio</option>
                                <option value="Meios Próprios">Meios Próprios</option>
                            </select>
                        </div>
                        <div class="form-group" >
                            <label >Quantos dias você pretende passar neste destino? *</label>
                            <input type="number" class="form-control"  id="quantos_dias_defini" name="cotacao[quantos_dias_defini]" >
                        </div>
                        <div class="form-group">
                            <label >Onde você gostaria de se hospedar? *</label>
                            <select name="cotacao[onde_hospedar_defini]" id="onde_hospedar_defini" class="form-control">
                                <option value="">-- Selecione um --</option>
                                <?php
                                $sql = 'SELECT * FROM tbl_categorias WHERE tipo = 3 ORDER BY id ASC';
                                try {

                                    $read = $db->prepare($sql);
                                    $read->execute();
                                } catch (PDOException $ex) {
                                    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                }

                                while ($rs = $read->fetch(PDO::FETCH_OBJ)) {
                                    ?>
                                    <option value="<?php echo $rs->nome; ?>"><?php echo $rs->nome; ?></option>
                                <?php } ?>
                                <option value="Já Possuo hospedagem">Já possuo hospedagem</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Gostaria do serviço de transfer até o local de hospedagem? *</label>
                            <input type="checkbox" name="cotacao[transfer_defini]" id="transfer_defini" value="Sim"> Sim
                            
                        </div>    
                        <div class="form-group">
                            <label >Deseja alugar um veículo no destino? *</label>
                            <input type="checkbox" name="cotacao[veiculo_defini]" id="veiculo_defini" value="Sim"> Sim
                            
                        </div>    
                        <div class="form-group">
                            <label >Deseja realizar passeios orientados por guias no destino? *</label>
                            <input type="checkbox" name="cotacao[passeiosorientados_defini]" id="passeiosorientados_defini" value="Sim"> Sim
                            
                        </div>
                        
                        
                        <input type="radio" name="cotacao[definir_mais_um_destino]" id="sim_definir_mais" value="sim" style="float: left;cursor: pointer;margin: 2px 5px;filter:alpha(opacity=0); -moz-opacity:0; -khtml-opacity: 0; opacity: 0;">
                        <label for="sim_definir_mais" name="mais_destinos" id="mais_destinos" class="btn btn-rw btn-default btn-lg" style="background: #248AFD;border: 1px solid #fff;box-shadow: none; margin: 2px 0 5px -25px; cursor: pointer">+ Adicionar mais um Destino</label>
                        <div id="bloco_destinos">
                            <div class="form-group" >
                            <label >Qual é o seu destino? *</label>
                            <input class="form-control" id="qual_destino_defini1" type="text" name="cotacao[qual_destino_defini1]" placeholder="Digite e escolha" data-provide="typeahead" data-items="4" data-source="[<?php echo imprimirLocais($nomes) ?>]" autocomplete="off" >
                        </div>
                        <div class="form-group" >
                            <label >Qual meio de transporte você quer utilizar para chegar ao seu destino? *</label>
                            <select class="form-control" id="qual_transporte_defini1" name="cotacao[qual_transporte_defini1]">
                                <option value="">-- Selecione um --</option>
                                <option value="Avião">Avião</option>
                                <option value="Ônibus">Ônibus</option>
                                <option value="Trem">Trem</option>
                                <option value="Navio">Navio</option>
                                <option value="Meios Próprios">Meios Próprios</option>
                            </select>
                        </div>
                        <div class="form-group" >
                            <label >Quantos dias você pretende passar neste destino? *</label>
                            <input type="number" class="form-control"  id="quantos_dias_defini1" name="cotacao[quantos_dias_defini1]" >
                        </div>
                        <div class="form-group">
                            <label >Onde você gostaria de se hospedar? *</label>
                            <select name="cotacao[onde_hospedar_defini1]" id="onde_hospedar_defini1" class="form-control">
                                <option value="">-- Selecione um --</option>
                                <?php
                                $sql = 'SELECT * FROM tbl_categorias WHERE tipo = 3 ORDER BY id ASC';
                                try {

                                    $read = $db->prepare($sql);
                                    $read->execute();
                                } catch (PDOException $ex) {
                                    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                }

                                while ($rs = $read->fetch(PDO::FETCH_OBJ)) {
                                    ?>
                                    <option value="<?php echo $rs->nome; ?>"><?php echo $rs->nome; ?></option>
                                <?php } ?>
                                <option value="Já Possuo hospedagem">Já possuo hospedagem</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Gostaria do serviço de transfer até o local de hospedagem? *</label>
                            <input type="checkbox" name="cotacao[transfer_defini1]" id="transfer_defini1" value="Sim"> Sim
                        </div>    
                        <div class="form-group">
                            <label >Deseja alugar um veículo no destino? *</label>
                            <input type="checkbox" name="cotacao[veiculo_defini1]" id="veiculo_defini1" value="Sim"> Sim
                        </div>    
                        <div class="form-group">
                            <label >Deseja realizar passeios orientados por guias no destino? *</label>
                            <input type="checkbox" name="definir_destinos1" id="defini"> Sim
                        </div> 
                        </div>
                    </div>

                    <div id="desejo_sugestoes">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label  style="float: left; clear: both">Que tipo de destino você deseja aproveitar?</label>
                            </div>
                            <div class="clearfix"></div>
                            <?php
                            $sql = 'SELECT * FROM tbl_categorias WHERE tipo = 2 ORDER BY id ASC';
                            try {
                                $read = $db->prepare($sql);
                                $read->execute();
                            } catch (PDOException $ex) {
                                echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                            }
                            $contador = 0;
                            while ($rs = $read->fetch(PDO::FETCH_OBJ)) {
                                if ($contador == 0) {
                                    echo '<div class="col-lg-4 col-md-4 col-xs-6">';
                                }
                                ?>
                            <input type="checkbox" id="tipo_destinoo" name="cotacao[tipo_destino][]" value="<?php echo $rs->nome; ?>"> <?php echo $rs->nome; ?> <br/>
                                <?php
                                $contador++;
                                if ($contador == 10) {
                                    echo '</div>';
                                    $contador = 0;
                                }
                            }
                            ?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group" >
                            <label >Você tem alguma preferência de lugares?</label>
                            <input type="text" class="form-control" id="preferencia_lugares" name="cotacao[preferencia_lugares]">
                        </div>
                        <div class="form-group" >
                            <label >Qual meio de transporte você quer utilizar para chegar ao seu destino?</label>
                            <select class="form-control" id="transporte_nao_defini" name="cotacao[transporte_nao_defini]">
                                <option value="">-- Selecione --</option>
                                <option value="Avião">Avião</option>
                                <option value="Ônibus">Ônibus</option>
                                <option value="Trem">Trem</option>
                                <option value="Navio">Navio</option>
                                <option value="Meios Próprios">Meios Próprios</option>
                            </select>
                        </div>
                        <div class="form-group" >
                            <label >Quantos dias você pretende passar neste destino?</label>
                            <input type="number" class="form-control" id="quantos_dias_nao_defini" name="cotacao[quantos_dias_nao_defini]">
                        </div>
                        <div class="form-group">
                            <label >Onde você gostaria de se hospedar?</label>
                            <select name="cotacao[hospedar_nao_defini]" id="hospedar_nao_defini" class="form-control">
                                <option value="">-- Selecione um --</option>
                                <?php
                                $sql = 'SELECT * FROM tbl_categorias WHERE tipo = 3 ORDER BY id ASC';
                                try {

                                    $read = $db->prepare($sql);
                                    $read->execute();
                                } catch (PDOException $ex) {
                                    echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                                }

                                while ($rs = $read->fetch(PDO::FETCH_OBJ)) {
                                    ?>
                                    <option value="<?php echo $rs->nome; ?>"><?php echo $rs->nome; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label >Gostaria do serviço de transfer até o local de hospedagem? </label>
                            <input type="radio"  name="cotacao[transfer_nao_decidi]" id="transfer_nao_decidi" value="Sim"> Sim
                            <input type="radio"  name="cotacao[transfer_nao_decidi]" id="transfer_nao_decidi" value="Nao"> Não
                            
                        </div>    
                        <div class="form-group">
                            <label >Deseja alugar um veículo no destino?</label>
                            <input type="radio"  name="cotacao[veiculo_nao_decidi]" id="veiculo_nao_decidi" value="Sim"> Sim
                            <input type="radio"  name="cotacao[veiculo_nao_decidi]" id="veiculo_nao_decidi" value="Não"> Não
                            
                        </div>    
                        <div class="form-group">
                            <label >Deseja realizar passeios orientados por guias no destino?</label>
                            <input type="radio"  name="cotacao[passeios_nao_decidi]" id="passeios_nao_decidi" value="Sim"> Sim
                            <input type="radio"  name="cotacao[passeios_nao_decidi]" id="passeios_nao_decidi" value="Não"> Não
                            
                        </div> 
                    </div>
            </div>
            <div class="form-group">
                <label >Informações complementares</label>
                <textarea class="form-control" name="cotacao[informacoes_complementares]" ></textarea>
            </div>
            <div class="form-group">
                <input type="checkbox" name="cotacao[receber_sugestoes]" value="Sim" style="margin: 5px"> Aceito receber sugestões dos parceiros ViaJá Brasil
            </div>   
            <div class="form-group">
                <input data-rule-required="true" type="checkbox" name="cotacao[termos_e_condicoes]" value="Sim" style="margin: 5px"> Li e concordo com todos os <a href="politica-de-privacidade.php" target="_blank" >Termos e Condições</a> do site.
            </div>   
            <div class="clearfix"></div>
            <div class="cta" style="background: #248AFD; margin-top:15px; padding: 10px 0;border: 0"> 
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 text-center">
                            <input type="submit" name="visualizarEmPDF" class="btn btn-primary" style="background: transparent;
                                   border: 1px solid #fff;
                                   box-shadow: none; margin-top: 2px; cursor: pointer; font-size: 18px; padding: 10px 40px;" value="Visualizar em PDF">
                        </div>
                        <div class="col-lg-4 col-md-4 mt15-md text-center">
                            <button type="submit" name="SalvarNoPerfil" class="btn btn-primary " style="background: transparent;
                                    border: 1px solid #fff;
                                    box-shadow: none; margin-top: 2px; cursor: pointer; font-size: 18px; padding: 10px 40px;">Salvar no meu perfil</button>
                        </div>
                        <div class="col-lg-4 col-md-4 mt15-md text-center">
                            <button type="submit" name="EnviarCotacao" class="btn btn-primary" style="background: #32CD32;
                                    border: 1px solid #fff;
                                    box-shadow: none; margin-top: 2px; cursor: pointer; padding: 10px 40px; font-size: 18px">Enviar Cotação</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</section>
<footer class="footer-light">
    <div class="container">
        <div class="row">

            <!-- About -->
            <div class="col-sm-3">
                <div class="heading-footer"><h4>Quem Somos</h4></div>
                <ul>
                    <li><a href="o-que-fazemos">O que Fazemos</a></li>
                    <li><a href="sobre">Nossa Missão</a></li>
                    <li><a href="sobre">Nossa Visão</a></li>
                    <li><a href="sobre">Nossos Valores</a></li>
                    <li><a href="politica-de-privacidade">Política de Privacidade & Segurança</a></li>
                    <li><a href="contato">Contato</a></li>
                    <li><a href="trabalhe-conosco">Trabalhe conosco</a></li>
                </ul>
            </div>

            <!-- Social -->
            <div class="col-sm-3 mg25-xs">
                <div class="heading-footer"><h4>Siga-nos</h4></div>

                <a class="btn btn-social-icon btn-instagram btn-lg" href="<?php echo $contato[7]; ?>" target="_blank">
                    <i class="fa fa-instagram" style="margin: 13px; font-size: 20px"></i>
                </a>
                <a class="btn btn-social-icon btn-facebook btn-lg" href="<?php echo $contato[6]; ?>" target="_blank">
                    <i class="fa fa-facebook" style="margin: 13px; font-size: 20px"></i>
                </a>
                <a class="btn btn-social-icon btn-twitter btn-lg" href="<?php echo $contato[8]; ?>" target="_blank">
                    <i class="fa fa-twitter" style="margin: 13px; font-size: 20px" ></i>
                </a>

            </div>
            <!-- Contact -->
            <div class="col-sm-3 mg25-xs">
                <div class="heading-footer"><h4>Fale Conosco</h4></div>
                <p><span class="ion-email footer-info-icons"></span><small class="address"><a href="mailto:contato@vaiviajarbrasil.com.br">contato@vaiviajarbrasil.com.br</a></small></p>
                <p><span class="ion-ios7-telephone footer-info-icons"></span><small class="address"> +55 19 3709 - 2230 </small></p>
            </div>

            <!-- Recent Work -->
            <div class="col-sm-3">
                <div class="heading-footer"><h4>Explorar</h4></div>
                <ul>
                    <?php
                    $sql_modulos = 'SELECT * FROM tbl_conf_modulos ORDER BY id ASC LIMIT 6';
                    try {

                        $read_modulos = $db->prepare($sql_modulos);
                        $read_modulos->execute();
                    } catch (PDOException $ex) {
                        echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                    }

                    while ($rs_modulos = $read_modulos->fetch(PDO::FETCH_OBJ)) {
                        ?>
                        <li><a href="<?php echo $rs_modulos->url ?>"><?php echo $rs_modulos->nome; ?></a></li>
                    <?php } ?>   
                    <li><a href="Blog">Blog</a></li>
                </ul>
            </div>
        </div><!-- /row -->

        <!-- Copyright -->
        <div class="row">
            <hr>
            <div class="col-sm-11 col-xs-10">
                <p class="copyright">© 2015 ViaJá Brasil. Todos os Direitos Reservados.</p>
            </div>
            <div class="col-sm-1 col-xs-2 text-right">
                <a href="http://valloritecnologia.com.br/" target="_blank" title="Desenvolvido por Vallori Tecnologia Soluções Web" ><img src="http://valloritecnologia.com.br/images/desenvolvimento+de+sites+em+bh.png" style="max-width: 60px;" alt="Desenvolvido por Vallori Tecnologia Soluções Web"></a>
            </div>
        </div><!-- /row -->

    </div><!-- /container -->
</footer><!-- /footer -->
<!-- End Footer --> 

</div><!-- /boxed -->
</div><!-- /bg boxed-->
<!-- End Boxed or Fullwidth Layout -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="admin/assets/jquery/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="admin/assets/bootstrap/bootstrap.min.js"></script>
    <script src="admin/assets/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="admin/assets/jquery-cookie/jquery.cookie.js"></script>
    <script type="text/javascript" src="admin/assets/jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript" src="admin/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <script src="admin/js/flaty.js"></script>
    <script src="funcoes.js"></script>
    <script src="js/jquery.maskMoney.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function(){
             $("#orcamento").maskMoney({symbol:'R$ ', 
            showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
             });
            
        </script>
    </body>
</html>