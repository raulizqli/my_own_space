<?php $questions = array(
	"1. Cuando hago planes persisto en ellos.",
	"2. Normalmente enfrento los problemas de una u otra forma.",
	"3. Soy capaz de depender de mi mismo m&aacutes que otros.",
	"4. Mantener el inter&eacutes en las cosas es importante para mi.",
	"5. Puedo estar s&oacutelo si es necesario.",
	"6. Siento orgullo por haber obtenido cosas en mi vida.",
	"7. Normalmente consigo las cosas sin mucha preocupaci&oacuten.",
	"8. Me quiero a mi mismo.",
	"9. Siento que puedo ocuparme de varias cosas al mismo tiempo.",
	"10. Soy decidido en las cosas que hago en mi vida.",
	"11. Rara vez pienso sobre por qu&eacute suceden las cosas.",
	"12. Hago las cosas (proyectos, actividades e indicaciones) al momento.",
	"13. Puedo superar momentos dif&iacuteciles porque ya he pasado por dificultades anteriores.",
	"14. Soy disciplinado en las cosas que hago.",
	"15. Mantengo el inter&eacutes en las cosas.",
	"16. Normalmente puedo encontrar un motivo para re&iacuter.",
	"17. Creer en m&iacute mismo me hace superar momentos dif&iacuteciles.",
	"18. En una emergencia, las personas pueden contar conmigo.",
	"19. Normalmente trato de mirar una situaci&oacuten desde distintos puntos de vista.",
	"20. A veces me obligo a hacer cosas aunque no quiera hacerlas.",
	"21. Mi vida tiene significado.",
	"22. No me quedo pensando en las cosas que no puedo cambiar.",
	"23. Cuando estoy en una situaci&oacuten dif&iacutecil normalmente encuentro una salida.",
	"24. Tengo energ&iacutea suficiente para lo que necesito hacer.",
	"25. Es normal que existan personas a las que no les caigo bien."
);
$departaments = array(
	"Compras",
	"Ventas",
	"RRHH",
	"TI"
);
?>
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<title>Encuesta</title>
		<style>
			.btn-outline-primary{
				background-color: white;
			}
		</style>
	</head>
	<body>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<div class="container">
			<div class="row">
				<div class="col">
					<form>
						<fieldset>
							<div class="row">
								<div class="col-lg-3 col-6">
									<img src="imgs/stephanie_logo.png" class="rounded img-fluid" alt="Stephanie Leal"/>
								</div>
								<div class="col-lg-2 offset-lg-7 col-4 offset-2">
									<img src="imgs/pale.png" class="rounded img-fluid" alt="Centro Pale"/>
								</div>
							</div>
							<legend class="text-center">&#191;Soy resiliente&#63;</legend>
							<div class="mb-3">
								<label for="employee_no" class="form-label">N&uacutemero de Empleado</label>
								<input type="text" class="form-control" id="employee_no" placeholder="123456">
							</div>
							<div class="mb-3">
								<label class="form-label">Departamento</label>
								<select id="departament" class="form-select" aria-label="Departamento">
									<option value="0" selected>Seleccione un Departamento</option>
									<?php foreach ($departaments as $key => $departament): ?>
										<option value="<?=$departament?>"><?=$departament?></option>
									<?php endforeach;?>
								</select>
							</div>
							<?php foreach ($questions as $key => $question): ?>
								<div class="mb-3">
									<label class="form-label"><?=$question?></label>
									<div class="btn-group form-control" role="group" aria-label="<?=$question?>">
										<input type="radio" value="1" class="btn-check" name="q<?=$key?>" id="btnradio_q<?=$key?>_1" autocomplete="off"/>
										<label class="btn btn-outline-primary" for="btnradio_q<?=$key?>_1">1</label>
										<input type="radio" value="2" class="btn-check" name="q<?=$key?>" id="btnradio_q<?=$key?>_2" autocomplete="off"/>
										<label class="btn btn-outline-primary" for="btnradio_q<?=$key?>_2">2</label>
										<input type="radio" value="3" class="btn-check" name="q<?=$key?>" id="btnradio_q<?=$key?>_3" autocomplete="off"/>
										<label class="btn btn-outline-primary" for="btnradio_q<?=$key?>_3">3</label>
										<input type="radio" value="4" class="btn-check" name="q<?=$key?>" id="btnradio_q<?=$key?>_4" autocomplete="off"/>
										<label class="btn btn-outline-primary" for="btnradio_q<?=$key?>_4">4</label>
										<input type="radio" value="5" class="btn-check" name="q<?=$key?>" id="btnradio_q<?=$key?>_5" autocomplete="off"/>
										<label class="btn btn-outline-primary" for="btnradio_q<?=$key?>_5">5</label>
										<input type="radio" value="6" class="btn-check" name="q<?=$key?>" id="btnradio_q<?=$key?>_6" autocomplete="off"/>
										<label class="btn btn-outline-primary" for="btnradio_q<?=$key?>_6">6</label>
										<input type="radio" value="7" class="btn-check" name="q<?=$key?>" id="btnradio_q<?=$key?>_7" autocomplete="off"/>
										<label class="btn btn-outline-primary" for="btnradio_q<?=$key?>_7">7</label>
									</div>
								</div>
							<?php endforeach;?>
							<div id="progress_container" class="position-fixed top-0 start-0" style="width:100%;display:none;z-index:999;">
								<div class="progress">
	  							<div id="progress_responses" class="progress-bar" role="progressbar" style="width:0%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="mb-3">
								<div class="card">
									<div class="card-body text-center">
										Promedio de Respuestas: <span id="responses_prom">0</span>
								  </div>
								</div>
							</div>
							<div id="alert_error" class="position-fixed top-0 start-0" style="width:100%;display:none;z-index:999;">
								<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
									Faltan de Responder <strong><span id="unanswer_questions">0</span></strong> Preguntas
									<div id="cant_type_employee_no">No se ha Ingresado el <strong>N&uacutemero de Empleado</strong></div>
									<div id="cant_select_departament">No se Seleccion&oacute el <strong>Departamento</strong></div>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							</div>
							<div id="alert_saved" class="position-fixed top-0 start-0" style="width:100%;display:none;z-index:999;">
								<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
									Se guardaron los resultados correctamente
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							</div>
							<div id="alert_unsaved" class="position-fixed top-0 start-0" style="width:100%;display:none;z-index:999;">
								<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
									No se guardaron los resultados correctamente, intentelo otra vez
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
							</div>
							<div class="mb-3">
								<div class="row">
									<div class="col-lg-4 col-md-3">
										
									</div>
									<div class="col-lg-4 col-md-6 col-sm-12">
										<div class="d-grid">
											<button id="submit_responses" type="button" class="row btn btn-primary btn-lg">Enviar Respuestas</button>
										</div>
									</div>
									<div class="col-lg-4 col-md-3">
										
									</div>
								</div>
							</div>
						</fieldset>
					</form>
					<script lang="javascript">
						$("input").on("click",function(){
							$("#progress_container").show();
							var responsesValue = 0;
							var count = 0;
							$("input:checked").each(function(index, item){
								count += 1;
								responsesValue += parseInt($(this).attr("value"));
							});
							$("#progress_responses").css("width", (count/25)*100 + "%");
							$("#responses_prom").text( Math.round((responsesValue/count)*100)/100 );
							$("#progress_container").fadeOut(1000);
						});
						$("#submit_responses").on("click", function(){
							var count = 0;
							var responses = {};
							$("input:checked").each(function(index, item)
							{
								count += 1;
								responses["question_"+(index+1)] = $(this).attr("value");
								$(this).closest("div").addClass("btn-success").removeClass("btn-danger");
							});
							if ( count == 25 && $("#employee_no").val() != "" && $("#departament").val() != "0" )
							{
								var employee_no = $("#employee_no").val();
								var departament = $("#departament").val();
								$.ajax({
									method: "POST",
									url: "set_encuesta.php",
									data: {
										"employee_no" : employee_no, 
										"departament" : departament,
										"responses"   : responses 
									}
								})
								.done(function( msg ) {
									if (msg)
									{
										$("#alert_saved").fadeIn(600);
									}
									else
									{
										$("#alert_unsaved").fadeIn(600);
									}
									$("#employee_no").val("");
									$("#departament").val(0);
								});
							}
							else
							{
								$("#alert_error").show();
								var unanswerQuestions = 0;
								$("div.btn-group").each(function(){
									if ( !$(this).hasClass("btn-success") )
									{
										unanswerQuestions += 1;
										$(this).addClass("btn-danger");
									}
								});
								if ( unanswerQuestions > 0 )
								{
									$("#unanswer_questions").text(unanswerQuestions);
								}
								
								if ( $("#employee_no").val() != "" ) 
								{
									$("#employee_no").removeClass("btn-danger");
									$("#cant_type_employee_no").hide();
								}
								else
								{
									$("#employee_no").addClass("btn-danger");
									$("#cant_type_employee_no").show();
								}
								if ( $("#departament").val() != "0" ) 
								{
									$("#departament").removeClass("btn-danger");
									$("#cant_select_departament").hide();
								}
								else
								{
									$("#departament").addClass("btn-danger");
									$("#cant_select_departament").show();
								}
								$("#alert_error").fadeOut(2500);
							}
						});
					</script>
				</div>
			</div>
		</div>
  </body>
</html>

