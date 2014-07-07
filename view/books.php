<html xmlns=" http://www.w3.org/1999/xhtml ">
	<head>
		<script src="./js/json-getBooks.js" type="text/javascript"></script>
	</head>
	<body>
						<!-- Books
						=============================================================== -->
							<div><caption><p class="text-center">目前館藏</p></caption></div>
							<form class="form-horizontal" id="bookform">
								<fieldset>
									<div class="control-group">
										<!-- ID -->
										<label class="control-label"  for="PUBLISHER">PUBLISHER</label>
										<div class="controls">
											<select id="PUBLISHER" name="PUBLISHER">
												<option>1</option>
											</select>
											<input type="hidden" id="action" name="action" value="getBooksByCategory">
										</div>
									</div>
								</fieldset>
							</form>
							<table class="table table-striped table-condensed">
								<thead>
									<tr>
										<th>#</th>
										<th>出版社</th>
										<th>書名</th>
										<th>圖書編號</th>
										<th>蒐藏日期</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
	</body>
</html>
