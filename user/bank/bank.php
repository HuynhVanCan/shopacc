
 <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<h4 class="modal-title">Thêm ngân hàng/Ví</h4>
</div>

<div class="modal-body">
	<div class="c-content-tab-4 c-opt-3" role="tabpanel">
		<ul class="nav nav-justified" role="tablist">
			<li role="presentation" class="active">
				<a href="#payment" role="tab" data-toggle="tab" class="c-font-16">Ngân hàng</a>
			</li>
			<li role="presentation">
				<a href="#info" role="tab" data-toggle="tab" class="c-font-16">Ví điện tử</a>
			</li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="payment">
				<div class="form-horizontal">
			
					
					<div class="modal-body">
						<div class="form-group m-t-10">
							<label class="col-md-3 control-label"><b>Ngân hàng:</b></label>
							<div class="col-md-6">
								<select name="bank_id" id="bank_id" class="form-control c-square c-theme">
									<option value="">
										Chọn ngân hàng</option>
																			<option value="1">Techcombank</option>
																			<option value="2">Vietcombank</option>
																			<option value="3">Vietinbank</option>
																			<option value="4">Bidv</option>
																			<option value="5">Mbbank</option>
																			<option value="6">Sacombank</option>
																			<option value="7">Seabank</option>
																	</select>
							</div>
						</div>
						<div class="form-group m-t-10">
							<label class="col-md-3 control-label"><b>Chủ tài khoản:</b></label>
							<div class="col-md-6">
								<input class="form-control c-square c-theme" type="text" name="holder_name" id="holder_name" placeholder="Chủ tài khoản" required="" autofocus="">
							</div>
						</div>
						<div class="form-group m-t-10">
							<label class="col-md-3 control-label"><b>Số tài khoản:</b></label>
							<div class="col-md-6">
								<input class="form-control c-square c-theme" type="text" name="account_number" id="account_number" placeholder="Số tài khoản" required="" autofocus="">
							</div>
						</div>



						<div class="form-group m-t-10">
							<label class="col-md-3 control-label"><b>Chi nhánh:</b></label>
							<div class="col-md-6">
								<input class="form-control c-square c-theme" type="text" name="brand" id="brand" placeholder="Chi nhánh" required="">
							</div>
						</div>
						<div class="alert alert-success c-font-dark">
						    <b>Các thông tin trên bạn vui lòng cung cấp chính xác để không xảy ra lỗi khi xử lý yêu cầu rút tiền của bạn. Nếu bạn nhập sai thông tin ngân hàng sẽ hoàn trả lại tiền và không hoàn phí rút tiền.</b>
					<br>

						</div>
							<p class="text-align:center;color:red;" id="result"></p>
					</div>
					<div class="modal-footer">
					  
	<button type="submit" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold"  id="thembank" name="thembank" style="">Thêm ngân hàng</button>
					
						<button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>

					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="info">
				
					<div class="modal-body form-horizontal">
						<div class="form-group m-t-10">
							<label class="col-md-3 control-label"><b>Ngân hàng:</b></label>
							<div class="col-md-6">
								<select name="bank_id1" id="bank_id1" class="form-control c-square c-theme">
									<option value="">
										Ví điện tử:</option>
																			<option value="8">tkcr(tkcr.vn)</option>
																			<option value="9">Tcsr(Thecaosieure)</option>
																			<option value="10">TSR(thesieure)</option>
																	
																			<option value="11">Azpro</option>
																			<option value="12">Momo</option>
														
																	</select>
							</div>
						</div>
						<div class="form-group m-t-10">
							<label class="col-md-3 control-label"><b>Tài khoản ví:</b></label>
							<div class="col-md-6">
								<input class="form-control c-square c-theme" type="text" name="account_vi" id="account_vi" placeholder="Tài khoản ví" required="" >
							</div>
						</div>
						<div class="form-group m-t-10">
							<label class="col-md-3 control-label"><b>Nhập lại tài khoản ví:</b></label>
							<div class="col-md-6">
								<input class="form-control c-square c-theme" type="text" name="account_vi_confirmation" id="account_vi_confirmation" placeholder="Nhập lại tài khoản ví" required="">
							</div>
						</div>

						<div class="alert alert-success c-font-dark">
							<b>Rút về các ví điện tử. Tất cả thông tin gồm tên tài khoản hoặc số điện thoại hoặc email tài khoản ở ví đó.</b><br>

						</div>
						<p class="text-align:center;color: red;" id="tra_ve"></p>
					</div>
					<div class="modal-footer">

						<button type="submit" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold"  id="themvi" style="">Thêm ví điện tử</button>
						<button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>

					</div>
				</form>
			</div>
		</div>
	</div>





	
		
		
			
                                
                                    
                                
				
			
		
		
			

		
	




	<div style="clear: both"></div>
</div>



<script>
	$("#thembank").on("click", function(){

		 $.ajax({
                    url : "/ajax/thembank.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        bank_id : $('#bank_id').val(), //Đọc tài khoản
                        holder_name : $('#holder_name').val(), // Đọc mật khẩu
                        account_number : $('#account_number').val(),
                        brand : $('#brand').val(),
                    },
                    success : function (result){
                        $('#result').html(result); // Lấy thông tin trả về

                    }
                });

	});
		$("#themvi").on("click", function(){

		 $.ajax({
                    url : "/ajax/themvi.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        bank_id1 : $('#bank_id1').val(), //Đọc tài khoản
                        account_vi : $('#account_vi').val(), // Đọc mật khẩu
                        account_vi_confirmation : $('#account_vi_confirmation').val(),
                       
                    },
                    success : function (result){
                        $('#tra_ve').html(result); // Lấy thông tin trả về

                    }
                });

	});
    $(document).ready(function () {
        $('.load-modal').each(function (index, elem) {
            $(elem).unbind().click(function (e) {
                e.preventDefault();
                e.preventDefault();
                var curModal= $('#LoadModal');
                curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/TMQ_giaodien/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
            });
        });
    });
</script>