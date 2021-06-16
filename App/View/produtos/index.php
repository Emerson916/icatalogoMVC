<?php
foreach($dados as $produto){
    //recuperou as variáveis do produto
    $valor = $produto->valor;
    $desconto = $produto->desconto;

    $valorDesconto = 0;

    //Se houver desconto, transforma a porcentagem em valor
    if($desconto > 0){
        $valorDesconto = ($desconto / 100) * $valor;
    }

    //verificou quantidade de parcelas referente ao valor
    
        $qtdDeparcelas = $valor > 1000 ? 12 : 6;
        $valorParcela = $valor / $qtdDeparcelas;
        $valorParcela = number_format($valorParcela, 2, ",", ".");
    ?>
        <article class="card-produto">
            <?php
            if (isset($_SESSION["usuarioId"])) {
            ?>

                <div class="acoes">
                    <img onClick="javascript: window.location = './editar/index.php?id=<?= $produto->id ?>'" src="../imgs/edit.png" />
                    <img onClick="deletar(<?= $produto->id ?>)" src="../imgs/trash.png" />
                </div>
            <?php
            }
            ?>
            <figure>
                <img src="fotos/<?= $produto->imagem ?>" />
            </figure>
            <section>
                <span class="preco">R$<?= number_format($valor, 2, ",", ".") ?>
                    <?php
                    if ($produto->desconto > 0) {
                    ?>
                        <em>
                            <?= $produto->desconto ?> % off
                        </em>
                    <?php
                    }
                    ?>
                </span>

                <span class="parcelamento"> ou em <em><?= $qtdDeparcelas ?> x R$ <?= $valorParcela ?> sem juros</em></span>

                <span class="descricao"><?= $produto->descricao ?> </span>
                <span class="categoria">
                    <em><?= $produto ->categoria ?></em>
                </span>
            </section>
            <footer>

            </footer>
        </article>
    <?php
    }
    ?>
    <form id="formDeletar" method="POST" action="./acoes.php">
        <input type="hidden" name="acao" value="deletar">
        <input id="produtoId" type="hidden" name="produtoId" />
    </form>
</main>