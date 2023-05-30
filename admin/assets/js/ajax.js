	$("#themsanpham").on("click", function(){

		 $.ajax({
                    url : "/ajax/themsanpham.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        taikhoan : $('#taikhoan').val(), //Đọc tài khoản
                        matkhau : $('#matkhau').val(), // Đọc mật khẩu
                        giatien : $('#giatien').val(),
                        thongtin1 : $('#thongtin1').val(),
                        thongtin2 : $('#thongtin2').val(),
                        thongtin3 : $('#thongtin3').val(),
                        thongtin4 : $('#thongtin4').val(),
                        thongtin : $('#thongtin').val(),
                        loainick : $('#loainick').val(),
                        img : $('#img').val()
                    },
                    success : function (result){
                        $('#result').html(result); // Lấy thông tin trả về

                    }
                });

	});
	
	
		$("#themrandom").on("click", function(){

		 $.ajax({
                    url : "/ajax/themrandom.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        info : $('#info').val(), //get dữ liệu
                        loainick : $('#loainick').val(),
                        giatien : $('#giatien').val(),
                         server : $('#server').val()
                       
                    },
                    success : function (result){
                        $('#result').html(result); // Lấy thông tin trả về

                    }
                });

	});
	
	$("#themchuyenmuc").on("click", function(){

		 $.ajax({
                    url : "/ajax/themchuyenmuc.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        name : $('#name').val(), //Đọc tài khoản
                        img : $('#img').val(),
                        loaicm : $('#loaicm').val(),
                        info1 : $('#info1').val(),
                        info2 : $('#info2').val(),
                        info3 : $('#info3').val(),
                        info4 : $('#info4').val(),
                        thongbao : $('#thongbao').val()
                    },
                    success : function (result){
                        $('#result').html(result); // Lấy thông tin trả về

                    }
                });

	});
	
	
	
	
		$("#suachuyenmuc").on("click", function(){

		 $.ajax({
                    url : "/ajax/suachuyenmuc.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        id : $('#id').val(),
                        name : $('#name').val(), //Đọc tài khoản
                        img : $('#img').val(),
                        info1 : $('#info1').val(),
                        info2 : $('#info2').val(),
                        info3 : $('#info3').val(),
                        info4 : $('#info4').val(),
                        loaicm : $('#loaicm').val(),
                        thongbao : $('#thongbao').val()
                        
                    },
                    success : function (result){
                        $('#tra_ve').html(result); // Lấy thông tin trả về

                    }
                });

	});
	
	
	
	
		$("#suasanpham").on("click", function(){

		 $.ajax({
                    url : "/ajax/suasanpham.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        id : $('#id').val(),
                       taikhoan : $('#taikhoan').val(), //Đọc tài khoản
                        matkhau : $('#matkhau').val(), // Đọc mật khẩu
                        giatien : $('#giatien').val(),
                        thongtin : $('#thongtin').val(),
                        loainick : $('#loainick').val(),
                        thongtin1 : $('#thongtin1').val(),
                        thongtin2 : $('#thongtin2').val(),
                        thongtin3 : $('#thongtin3').val(),
                        thongtin4 : $('#thongtin4').val(),
                        img : $('#img').val(),
                    },
                    success : function (result){
                        $('#result').html(result); // Lấy thông tin trả về

                    }
                });

	});
	
	
		$("#themgiftcode").on("click", function(){

		 $.ajax({
                    url : "/ajax/themgiftcode.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        soluong : $('#soluong').val(), //Đọc tài khoản
                        chietkhau : $('#chietkhau').val(), // Đọc mật khẩu

                    },
                    success : function (result){
                        $('#result').html(result); // Lấy thông tin trả về

                    }
                });

	});
	
		$("#setting").on("click", function(){

		 $.ajax({
                    url : "/ajax/setting.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        title : $('#title').val(), //Đọc tài khoản
                        phone : $('#phone').val(),
                        percent : $('#percent').val(),
                        baotri : $('#baotri').val(),
                        facebook : $('#facebook').val(),
                        thongbao : $('#thongbao').val(),
                        odp_muanick : $('#odp_muanick').val(),
                        logo : $('#logo').val()
                    },
                    success : function (result){
                        $('#result').html(result); // Lấy thông tin trả về

                    }
                });

	});
	
	$("#congtien").on("click", function(){

		 $.ajax({
                    url : "/ajax/congtien.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        uid : $('#uid').val(),
                        sotien : $('#sotien').val(), //Đọc tài khoản
                    },
                    success : function (result){
                        $('#result').html(result); // Lấy thông tin trả về

                    }
                });

	});
	

	$("#theminbox").on("click", function(){

		 $.ajax({
                    url : "/ajax/theminbox.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        noidung : $('#noidung').val(), //Đọc tài khoản
                        id : $('#id').val()
                    },
                    success : function (result){
                        $('#result').html(result); // Lấy thông tin trả về

                    }
                });

	});
	
		$("#phanquyen").on("click", function(){

		 $.ajax({
                    url : "/ajax/phanquyen.php",
                    type : "post",
                    dataType:"text",
                    data : {
                        chucvu : $('#chucvu').val(),
                        pass : $('#pass').val(),
                        uid : $('#uid').val()
                    },
                    success : function (result){
                        $('#result').html(result); // Lấy thông tin trả về

                    }
                });

	});