<tr>
  <td>
    Nome:
  </td>
  <td>
    <input type="text" name="nome" value="<?=$produto->nome?>" class="form-control">
  </td>
</tr>
<tr>
  <td>
    Preco:
  </td>
  <td>
    <input type="number" name="preco" value="<?=$produto->preco?>" class="form-control">
  </td>
</tr>
<tr>
  <td>
    Descrição:
  </td>
  <td>
    <textarea name="descricao" rows="8" cols="40" class="form-control"><?=$produto->descricao?></textarea>
  </td>
</tr>
<tr>
  <td>
    Usado:
  </td>
  <td>
    <input type="checkbox" name="usado" value="1" <?=$produto->usado?>> Usado
  </td>
</tr>
<tr>
  <td>
    Categoria:
  </td>
  <td>
    <select class="form-control" name="categoria_id">
      <?php foreach ($categorias as $categoria):
        $essaEhACategoria = $produto->categoria->id == $categoria->id;
        $selecao = $essaEhACategoria ? "selected='selected'" : "";
        ?>
        <option value="<?=$categoria->id?>" <?=$selecao?>>
          <?=$categoria->nome?>
        </option>
      <?php endforeach; ?>
    </select>
  </td>
</tr>
