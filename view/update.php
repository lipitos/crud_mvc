<?php 

include_once 'dependencias.php'; 
include_once '../model/Conexao.class.php';
include_once '../model/Manager.class.php';

$manager = new Manager();

$id = $_POST['id'];

?>

<h2 class="text-center"><i class="fa fa-user-plus"></i> Atualizar Registros</h2><hr>
<form method="POST" action="../controller/update_client.php">
	<div class="container">
		<div class="form-row">

			<?php foreach($manager->getInfo("registros", $id) as $client_info): ?>

			<div class="col-md-6">
				<i class="fa fa-user"></i> Nome: <input class="form-control" type="text" name="name" value="<?php echo $client_info['name']; ?>" required autofocus><br>
			</div>

			<div class="col-md-6">
				<i class="fa fa-envelope"></i> E-mail: <input class="form-control" type="email" name="email" value="<?php echo $client_info['email'];?>" required><br>
			</div>

			<div class="col-md-4">
				<i class="fa fa-addres-card"></i> CPF: <input class="form-control" type="text" name="cpf" id="cpf" value="<?php echo $client_info['cpf'];?>" required><br>
			</div>

			<div class="col-md-4">
				<i class="fa fa-calendar"></i> Data Nascimento: <input class="form-control" type="date" name="birth" value="<?php echo $client_info['birth']; ?>" required><br>
			</div>	

			<div class="col-md-4">
				<i class="fab fa-whatsapp"></i> Telefone: <input class="form-control" type="text" name="phone" id="phone" value="<?php echo $client_info['phone'];?>" required><br>
			</div>

			<div class="col-md-12">
				<i class="fa fa-map"></i> Endereço: <input class="form-control" type="text" name="address" value="<?php echo $client_info['address'];?>" required><br>
			</div>

			<input type="hidden" name="id" value="<?php echo $client_info['id'];?>">

			<?php endforeach; ?>

			<div class="col-md-4">
				<button class="btn btn-primary btn-lg"><i class="fa fa-user-plus"></i> Atualizar Usuário</button>
				<a href="../index.php" class="btn btn-secondary btn-lg"><i class="fa fa-angle-double-left"></i> Voltar</a>
			</div>											
		</div>
	</div>
</form>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


