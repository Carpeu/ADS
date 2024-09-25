

<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    
    <title>Pedido</title>
</head> 

    <body> 
        <h3>Pedido</h3> 
         <form method="post" action="cpedido.php"> 
         ID: <input type="text" name="id_produto" value="<?php echo $arResultado['idProduto']; ?>">
    <br> 
    Nome:
    <input type="text" name="nome_prod" value="<?php echo $arResultado['nomeProduto']; ?>">
    <br>
        Valor: 
        <input type="text" name="valor_prod" value= "<?php echo $arResultado['valorUnitario'];?>">
        </br> 
        Ativo:
    <select name="ativo_prod">
      <option value="XX">Selecione</option>
      <option value="1" <?php if ($arResultado['bolAtivo'] == 1) echo "selected"; ?>>SIM</option>
      <option value="2" <?php if ($arResultado['bolAtivo'] == 2) echo "selected"; ?>>NÃO</option>
    </select>
        </br> 
        <input type="submit" value="EDITAR"> 
        </form> 
    </body> 
</html> 
