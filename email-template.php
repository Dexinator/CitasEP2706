<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Pequecita</title>
	</head>
	<body style="background-color:#F5F6F8;font-family:-apple-system, BlinkMacSystemFont, 'segoe ui', roboto, oxygen, ubuntu, cantarell, 'fira sans', 'droid sans', 'helvetica neue', Arial, sans-serif;box-sizing:border-box;font-size:16px;">
		<div style="background-color:#fff;margin:30px;box-sizing:border-box;font-size:16px;">
			<h1 style="padding:40px;box-sizing:border-box;font-size:24px;color:#ffffff;background-color:#cb5f51;margin:0;">Survey</h1>
			<p style="padding:40px 40px 20px 40px;margin:0;box-sizing:border-box;font-size:16px;">Recuerda que debes traer tus blblbl</p>
			<h2 style="padding:20px 40px;margin:0;color:#394453;box-sizing:border-box;">Aparta la fecha y hora</h2>
			<div style="box-sizing:border-box;padding:0 40px 20px;">
				<table style="border-collapse:collapse;width:100%;">
					<tbody>
						<tr>
							<td style="padding:15px 0;text-decoration:underline;">Nombre</td>
							<td style="text-align:right;"><?=$user_name?></td>
						</tr>
						<tr>
							<td style="padding:15px 0;text-decoration:underline;">Fecha</td>
							<td style="text-align:right;"><?=$user_start?></td>
						</tr>
						<tr>
							<td style="padding:15px 0;text-decoration:underline;">Hora de inicio</td>
							<td style="text-align:right;"><?=$user_end?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>