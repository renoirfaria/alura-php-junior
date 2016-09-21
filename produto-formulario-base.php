<tr>
  <td>
    Nome:
  </td>
  <td>
    <input type="text" name="nome" value="<?=$produto->getNome()?>" class="form-control">
  </td>
</tr>
<tr>
  <td>
    Preco:
  </td>
  <td>
    <input type="number" name="preco" value="<?=$produto->getPreco()?>" class="form-control">
  </td>
</tr>
<tr>
  <td>
    Descrição:
  </td>
  <td>
    <textarea name="descricao" rows="8" cols="40" class="form-control"><?=$produto->getDescricao()?></textarea>
  </td>
</tr>
<tr>
  <td>
    Usado:
  </td>
  <td>
    <input type="checkbox" name="usado" value="1" <?=$produto->getUsado()?>>Usado
  </td>
</tr>
<tr>
  <td>
    Categoria:
  </td>
  <td>
    <select class="form-control" name="categoria_id">
      <?php foreach ($categorias as $categoria):
        $essaEhACategoria = $produto->getCategoria()->getId() == $categoria->getId();
        $selecao = $essaEhACategoria ? "selected='selected'" : "";
        ?>
        <option value="<?=$categoria->getId()?>" <?=$selecao?>>
          <?=$categoria->getNome()?>
        </option>
      <?php endforeach; ?>
    </select>
  </td>
</tr>
<tr>
  <td>
    Tipo do Produto
  </td>
  <td>
    <select class="form-control" name="tipoProduto">
      <?php
        $tipos = array('Produto','Livro');
        foreach ($tipos as $tipo):
          $essaEhOTipo = get_class($produto) == $tipo;
          $selecao = $essaEhOTipo ? "selected='selected'" : "";
          ?>
          <option value="<?=$tipo?>" <?=$selecao?>>
            <?=$tipo?>
        </option>
      <?php endforeach; ?>
    </select>
  </td>
</tr>
<tr>
  <td>
    ISBN
  </td>
  <td>
    <input type="text" name="isbn" value="<?php if($produto->temIsbn()): $produto->getIsbn(); endif?>" placeholder="(caso seja um Livro)" class="form-control">
  </td>
</tr>
