	<div id="main" class="col-12 bg-white border-right pl-0 vh-100 position-relative">  <!-- Поле доходов/расходов -->
		<div id="mainchild">

					<table class=" table w-100 h3  table-hover">
						@foreach($habits as $habit)
							<tr scope="raw" class="maintr" data-id="{{$habit->id}}">
								<td class="border col-4 text-center">
									{{$habit->habit_name}}
								</td>
								<td class="checkbox col-8 border text-center">
									@for($i=0;$i < strlen($habit->daysOfHabit->habit_status); $i++)
										@if($habit->daysOfHabit->habit_status[$i] == '1')
											<div class="form-check form-check-inline checkbox-xl checkbox-circle">
												<input class="form-check-input " type="checkbox" id="checkbox-3" value="option1" checked />
												<label class="form-check-label" for="checkbox-3"></label>
											</div>
										@else
											<div class="form-check form-check-inline checkbox-xl">
												<input class="form-check-input" type="checkbox" id="checkbox-3" value="option1" />
												<label class="form-check-label" for="checkbox-3"></label>
											</div>
										@endif
									@endfor
								</td>
								<td class="text-center border">
									<a class="d-block text-decoration-none delete" href="">Удалить</a>
								</td>
							</tr>
			        	@endforeach


			        </table>
			        <div class="row  justify-content-center">
			        	<div class="row  w-50 ml-0 pt-2 border-0">
					        <form class="w-100 p-1 main" method="POST" action="" class="" >
					        @csrf
					        	<div class="form-row">
					        	<div class="col-12 d-none" id="add-form">
					        		<input type="text" class="w-100 form-control form-control-lg" name="habit_name">
					        		<input type="submit" name="button" id="addNewHabit" class="btn btn-primary mt-2 ml-0 w-100" value="Отправить" disabled>
					        	</div>
							</form>
					    </div>
		        	</div>
        </div>

			        <div class="row main main-sec">
			        	<div class="row w-100 ml-0 pt-2 border-0 justify-content-center add">
					        <button type="button" id="btn" class="btn btn-primary h-100 w-25 bg-dark float-left " >Добавить</button>
					    </div>

			        	<div class="row w-100 ml-0 pt-2 border-0 justify-content-center">
                            <button type="button" id="return" class="btn btn-primary h-100 w-25 float-left">Вернуться</button>
					    </div>
		        	</div>
    </div>



