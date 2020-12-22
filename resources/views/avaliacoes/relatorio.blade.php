<!DOCTYPE html>
<html>
<head>
	<title>slkdjkalj</title>
</head>
<body style="margin-top: -50px;">
	<center>
		<h2 style="font-family: 'Poppins', sans-serif;">AMBIENTE ESCOLAR</h2>
		<h4 style="font-family: 'Poppins', sans-serif;">B O L E T I M</h4>
	</center>

	<p>Nome: {{ $aluno->nome}}</p>
	<p>Turma: {{$turma->turma}}</p>
	<p>Faltas: {{ $count}}</p>

	<?php $nota = 0; ?>

	<table style="border:1px solid black;" cellpadding="4" cellspacing="5" align="center">
		@foreach($periodos as $periodo)
		<tr> <td colspan="8" align="center"> {{$periodo->bimestre}}° BIMESTRE </td>
			<tr>
				<th>Matéria</th>
				<th>N1</th>
				<th>N2</th>
				<th>N3</th>
				<th>N4</th>
				<th>Recuperação</th>
				<th>Média</th>
				<th>Situação</th>
			</tr>
			@foreach($avaliacoes as $avaliacao)
			<tr>
				<td>
					@foreach($materias as $materia)
					@if($materia->id == $avaliacao->id_materia)
					{{ $materia->materia}}
					@endif
					@endforeach
				</td>
				<td>
					@foreach($materias as $materia)
					@foreach($avaliacoes as $av)
					@if($av->prova == 'n1' && $materia->id == $av->id_materia)
					{{ $avaliacao->nota}}
					<?php $nota += $avaliacao->nota; ?>
					@endif
					@endforeach
					@endforeach
				</td>
				<td>@foreach($materias as $materia)
					@foreach($avaliacoes as $av)
					@if($av->prova == 'n2' && $materia->id == $av->id_materia)
					{{ $avaliacao->nota}}
					<?php $nota += $avaliacao->nota; ?>
					@endif
					@endforeach
					@endforeach</td>
				<td>@foreach($materias as $materia)
					@foreach($avaliacoes as $av)
					@if($av->prova == 'n3' && $materia->id == $av->id_materia)
					{{ $avaliacao->nota}}
					<?php $nota += $avaliacao->nota; ?>
					@endif
					@endforeach
					@endforeach</td>
				<td>@foreach($materias as $materia)
					@foreach($avaliacoes as $av)
					@if($av->prova == 'n4' && $materia->id == $av->id_materia)
					{{ $avaliacao->nota}}
					<?php $nota += $avaliacao->nota; ?>
					@endif
					@endforeach
					@endforeach</td>
				<td>@foreach($materias as $materia)
					@foreach($avaliacoes as $av)
					@if($av->prova == 'recuperacao' && $materia->id == $av->id_materia)
					{{ $avaliacao->nota}}
					@endif
					@endforeach
					@endforeach</td>
				<td><?php $media = $nota/4; echo $media;?></td>
				<td>
					@if($media > 5)
						Aprovado
					@elseif($media > 3 )
						Recuperação
					@else
						Reprovado
					@endif
					</td>
			</tr>
			<?php $nota = 0;?>
			@endforeach
		</tr>
		@endforeach

	</table>
</body>
</html>