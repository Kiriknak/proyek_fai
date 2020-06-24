<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8" />
  <title>Starting project</title>
  <link rel="stylesheet" type="text/css" href="src/semantic.min.css" />
  <link rel="stylesheet" type="text/css" href="src/hamburger.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"/>

  <style>
    #reg {
      max-width: 500px;
    }
  </style>
</head>
<body>
  <div class="ui pointing borderless menu  stackable">
    <a class="item header">
      NutupLapak.com
    </a>
    <a class="item">
      Home
    </a>
    <a class="item">
      Kategori
    </a>
    <div class="item">
      <div class="ui transparent icon input">
        <input type="text" placeholder="Search...">
        <i class="search link icon"></i>
      </div>
    </div>
    <div class="right menu">
      <div class="item">
        <div class="ui buttons">
          <button class="ui green inverted button">Login</button>
          <div class="or"></div>
          <button class="ui  reverted green button">Register</button>
        </div>
      </div>
    </div>
    <div class="hamburger ">
      <span class="hamburger-bun"></span>
      <span class="hamburger-patty"></span>
      <span class="hamburger-bun"></span>
    </div>
  </div><div class="ui container">
	<center> 
<h1>Sign Up</h1>
</center>

	
	<div class="ui left floated segment">

 

	 <form class="ui form" >
<div class = "sixteen wide field">
  <div class="field">
    <label>Username</label>
    <input type="text" name="username" placeholder="4-10 Character" >
  </div>

<div class="field">
    <label>Email</label>
    <input type="email" name="email" placeholder="Contoh : name@gmail.com" >
  </div>


<div class="field">
    <label>Alamat</label>
	<textarea name="alamat" palceholder="Alamat" ></textarea>

</div>

<div class="field">
	<label>Tanggal Lahir</label>
	<div class="ui right icon input">
            
	<input type="date" name="tanggal" placeholder="" >
        <i class="calender icon"></i>
        </div>    
</div>


<div class="field">
    <label>Kota :</label>
    <input type="text" name="kota" placeholder="">
  </div>

<div class="field">
    <label>Kode Pos :</label>
    <input type="text" name="kode" pattern="^\d{5,6}(?:[-\s]\d{4})?$" placeholder="Contoh : 603482" >
  </div>

<div class="field">
   <label>Nomor Telepon :</label>
    <input type="text" name="telepon" placeholder="contoh : +6283156789234" >
  </div>

<div class="field">
    <label>Password :</label>
    <input type="password" name="password" placeholder="" >
  </div>

<div class="field">
    <label>Confirm Password :</label>
    <input type="password" name="password1" placeholder="" >
  </div>

  <div class="field">
    <div class="ui checkbox">
      <input type="checkbox" tabindex="0" >
      <label>I agree to the Terms and Conditions</label>
    </div>
  </div>
<div class="ui error message"></div>

</form>       
            <center>
  <button class="ui black button" type="submit" name="submit">Sign In</button>
		 </center>


</div>
		 
		 <div class="ui left floated segment">
		 	<div>
<center>
	<lable>Anda Sudah Mempunyai Akun??</lable>
<center>
</br>
	<div>	<div><a href="login.php" class = "ui black submit button">Sign In</a></div>	</div>	

</div>



			 </div>
		

		 </div>
		
	

<script>$(document).ready(function(){
	$('.ui.form').click(function(event)){
	event.preventDefault();	
	$('.ui.form')
  .form({
    fields: {
      username: {
        identifier: 'username',
        rules: [
          {
            type   : 'empty',
            prompt : 'Mohon masukan username'
			
          },
			{
				type   : 'minLength[4]',
			prompt : 'Maaf, User Name minimal 4 karakter'
			}
        ]
      },
      email: {
        identifier: 'email',
        rules: [
			{
				type   : 'empty',
            prompt : 'mohon masukan alamat email'	
			},
			{
            type   : 'email',
            prompt : 'mohon masukan alamat email yang benar'
          }
        ]
      },
      alamat: {
        identifier: 'alamat',
        rules: [
          {
            type   : 'empty',
            prompt : 'mohon masukan alamat'
			
          },
			{
				type   : 'minLength[10]',
			prompt : 'Maaf, panjang karakter kurang dari syarat yang ada'
			}
        ]
      },
		
		telepon: {
        identifier: 'telepon',
        rules: [
          {
            type   : 'empty',
            prompt : 'mohon masukan nomor telepon anda'
			
          },
			{
				type   : 'number',
			prompt : 'Maaf, masukan nomor telepon anda dengan benar'
			}
        ]
      },
		
      tangal: {
        identifier: 'tanggal',
        rules: [
          {
            type   : 'empty',
            prompt : 'mohon masukan tanggal'
			
          },
		{
			type   : 'date',
            prompt : 'mohon masukan tanggal'
		}
        ]
      },
		
	kota: {
        identifier: 'kota',
        rules: [
          {
            type   : 'empty',
            prompt : 'mohon masukan tanggal'
			
          },
		{
			type   : 'minLenght[4]',
            prompt : 'Maaf, kota minimal {ruleValue} karakter'
		}
        ]
      },
		
	kode: {
        identifier: 'kode',
        rules: [
          {
            type   : 'empty',
            prompt : 'mohon masukan kodepos'
			
          },
			{
				type   : 'number',
            prompt : 'Maaf, masukan kodepos dengan benar'
			}
        ]
      },
      password: {
        identifier: 'password',
        rules: [
          {
            type   : 'empty',
            prompt : 'mohon masukan password'
          },
          {
            type   : 'minLength[6]',
            prompt : 'Password anda setidaknya harus {ruleValue} karakter'
          }
        ]
      },
		password1: {
        identifier: 'password1',
        rules: [
          {
            type   : 'empty',
            prompt : 'mohon masukan password'
          },
          {
            type   : 'match[password]',
            prompt : 'Maaf, password tidak cocok'
			}
          
        ]
      },
      terms: {
        identifier: 'terms',
        rules: [
          {
            type   : 'checked',
            prompt : 'Maaf, Syarat dan ketentuan harus disetujui'
          }
        ]
      }
    }
  })
	
	
	
	
	}
						  
	if( $('.ui.form').form('is valid')) {
 		$.ajax({
		URL : daftar1.php,
		data:$(this).serialize();})
	}
	}
						 
						 
						 )
;

		</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
  
</body>
</html>
	
