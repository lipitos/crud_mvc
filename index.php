<?php
/* Realizar alteração para não aparecer dados da tabela fora do model */

include_once 'model/Conexao.class.php';
include_once 'model/Manager.class.php';

$manager = new Manager();

?>

<!DOCTYPE html>
<html>
<head>
	<?php include_once 'view/dependencias.php'; ?>
</head>
<body>
	<div class="container">
		<h2 class="text-center"><i class="fa fa-list"></i>
		Clientes
		</h2>
		<h5 class="text-right">
			<a href="view/register.php" class="btn btn-primary btn-xs">
				<i class="fa fa-user-plus"></i>
			</a>
		</h5>

		<div class="table-responsive">
			<table class="table table-hover">
				<thead class="thead">
					<tr>
						<th>ID</th>
						<th>NOME</th>
						<th>E-MAIL</th>
						<th>CPF</th>
						<th>DATA NASCIMENTO</th>
						<th>TELEFONE</th>
						<th>ENDEREÇO</th>
						<th>AÇÕES</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($manager->listClient("registros") as $client): ?>
					<tr>					
						<td><?php echo $client['id']; ?></td>
						<td><?php echo $client['name']; ?></td>
						<td><?php echo $client['email']; ?></td>
						<td><?php echo $client['cpf']; ?></td>
						<td><?php echo date("d/m/Y", strtotime($client['birth'])); ?></td>
						<td><?php echo $client['phone']; ?></td>
						<td><?php echo $client['address']; ?></td>
						<td>
							<form method="POST" action="view/update.php">
								<input type="hidden" name="id" value="<?php echo $client['id']; ?>">
								<button class="btn btn-warning btn-xs">
									<i class="fa fa-user-edit"></i>
								</button>
							</form>
							<form method="POST" action="controller/delete_client.php" onclick="return confirm('Deseja realmente excluir o registro?');">
								<input type="hidden" name="id" value="<?php echo $client['id']; ?>">
								<button class="btn btn-danger btn-xs">
									<i class="fa fa-trash"></i>
								</button>
							</form>							
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</body>	
</html>