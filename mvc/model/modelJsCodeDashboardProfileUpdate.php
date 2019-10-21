<script>// update profile page disable input and backgroundColor change js;
	// performed by capturing the object using onclick event
	var objEmail = $('#idInputEmailUpdateProfileDashboard');
	var objMobile = $('#idInputMobileUpdateProfileDashboard');
	var objDob = $('#idInputDobUpdateProfileDashboard');
	var objPassword = $('#idInputPasswordUpdateProfileDashboard');
	function removeDisabled(obj){
		
		obj.parentNode.nextSibling.nextElementSibling.disabled = false;
		obj.style.backgroundColor = "#51A5D0";
		var objectSmall = obj.parentNode;


		$(objectSmall).removeClass('text-danger');
		$(objectSmall).addClass('text-info');
		
	}
	
	var emailPattern = /^[^0-9.-_][a-z0-9.-_]{3,20}@[a-z]{3,20}\.[a-z]{2,5}/;
	var mobileNumberPattern = /^\d{11}$/;
	var passwordPattern = /[a-zA-Z0-9_.-@#%$&*()]{6,20}/;

	$('document').ready(function(){
		$('#idButtonUpdateProfileDashboard').click(function(){
			
			// validation starts
			var valueEmail = objEmail.val();
			var valueEmailCheckedStatus = emailPattern.test(valueEmail);

			var valuePassword = objPassword.val();
			var valuePasswordCheckedStatus = passwordPattern.test(valuePassword);

			var valueMobileNumber = objMobile.val();
			var valueMobileNumberCheckedStatus = mobileNumberPattern.test(valueMobileNumber);

			var valueDob = objDob.val();
			

			

			if(valueEmailCheckedStatus==false)
			{
				objEmail.get(0).parentNode.firstElementChild.firstElementChild.textContent = 'Invalid email';
				objEmail.prev().removeClass('text-info');
				objEmail.prev().addClass('text-danger');

			}
			else{
				objEmail.get(0).parentNode.firstElementChild.firstElementChild.textContent = 'valid';
				objEmail.prev().removeClass('text-info', 'text-danger');
				objEmail.prev().addClass('text-success');
			}


			if(valuePasswordCheckedStatus==false)
			{
				objPassword.get(0).parentNode.firstElementChild.firstElementChild.textContent = 'Invalid Password';
				objPassword.prev().removeClass('text-info');
				objPassword.prev().addClass('text-danger');

			}
			else{
				objPassword.get(0).parentNode.firstElementChild.firstElementChild.textContent = 'valid';
				objPassword.prev().removeClass('text-info', 'text-danger');
				objPassword.prev().addClass('text-success');
			}


			//redundant
			// var valueMobileNumber = objMobile.val();
			// var valueMobileNumberCheckedStatus = mobileNumberPattern.test(valueMobileNumber);


			if(valueMobileNumberCheckedStatus==false)
			{
				objMobile.get(0).parentNode.firstElementChild.firstElementChild.textContent = 'Invalid number';
				objMobile.prev().removeClass('text-info');
				objMobile.prev().addClass('text-danger');

			}
			else{
				objMobile.get(0).parentNode.firstElementChild.firstElementChild.textContent = 'valid';
				objMobile.prev().removeClass('text-info', 'text-danger');
				objMobile.prev().addClass('text-success');
			}
			// validation ends


			// ajax and json starts
			


			if(valueEmailCheckedStatus==true && valueMobileNumberCheckedStatus == true)
			{

				jsProfileInfo = { email:valueEmail, mobileNumber:valueMobileNumber, dob: valueDob , password: valuePassword, id: <?php echo $sArray['id']; ?> };
				
				jsonStringDbParam = JSON.stringify(jsProfileInfo);			
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var msg = this.responseText;
						alert(msg);
					}
				};

				<?php 


				$ajaxUrlProductUpdate = $rootAdress."mvc/model/modelDashboardProfileUpdate.php";


				 ?>

				xhttp.open("POST", "<?php echo $ajaxUrlProductUpdate; ?>", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xhttp.send('x=' + jsonStringDbParam);


			}









			//ajax and json ends


		})


	});


</script>