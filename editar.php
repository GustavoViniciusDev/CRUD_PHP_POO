
<?php
// Formulário para edição dos dados
if(isset($_GET['action']) && $_GET['action'] == 'update'){
    $id = $_GET['id'];
    $row = $crud->getById($id);
?>

<form method="post" action="?action=update">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="nome_banda">Nome da Banda:</label>
    <input type="text" name="nome_banda" value="<?php echo $row['nome_banda']; ?>" required>
    <label for="genero">Gênero:</label>
    <input type="text" name="genero" value="<?php echo $row['genero']; ?>" required>
    <label for="gravadora">Gravadora:</label>
    <input type="text" name="gravadora" value="<?php echo $row['gravadora']; ?>" required>
    <label for="num_discos">Número de Discos:</label>
    <input type="number" name="num_discos" value="<?php echo $row['num_discos']; ?>" required>
    <label for="qtda_albuns">Quantidade de Álbuns:</label>
    <input type="number" name="qtda_albuns" value="<?php echo $row['qtda_albuns']; ?>" required>
    <input type="submit" value="Salvar">
</form>

<?php
} else {
    // Código para exibir os dados na tabela
}
?>